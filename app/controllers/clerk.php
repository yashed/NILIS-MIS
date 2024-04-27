<?php

class Clerk extends Controller
{

    function __construct()
    {
        if (!Auth::is_clerk()) {
            message('You are not authorized to view this page');
            redirect('login');
        }
    }
    public function index()
    {

        $user = new User();
        $degree = new Degree();
        $student = new StudentModel();
        $exam = new Exam();
        $degreetimetable = new DegreeTimeTable();
        $finalMarks = new FinalMarks();
        $recentExamId = $finalMarks->lastID('examID');

        //join exam and degree tables
        $dataTables = ['degree'];
        $columns = ['*'];
        $examConditions = ['exam.degreeID = degree.DegreeID', 'exam.examID = ' . $recentExamId];
        $data['RecentResultExam'] = $exam->join($dataTables, $columns, $examConditions);

        // show($data['RecentResultExam']);
        // $_SESSION['getid'] = null;
        // unset($_SESSION['getid']);
        $student = new StudentModel();
        $exam = new Exam();
        $degreetimetable = new DegreeTimeTable();
        $finalMarks = new FinalMarks();
        $recentExamId = $finalMarks->lastID('examID');

        //join exam and degree tables
        $dataTables = ['degree'];
        $columns = ['*'];
        $examConditions = ['exam.degreeID = degree.DegreeID', 'exam.examID = ' . $recentExamId];
        $data['RecentResultExam'] = $exam->join($dataTables, $columns, $examConditions);

        // show($data['RecentResultExam']);

        $_SESSION['DegreeID'] = null;
        unset($_SESSION['DegreeID']);

        $data['title'] = 'Dashboard';
        $data['notification_count_obj'] = getNotificationCount();
        $data['user'] = $user->findAll();
        $data['ongoingDegrees'] = $degree->where(['status' => 'ongoing']);
        $data['students'] = $student->findAll();
        $data['exams'] = $exam->findAll();
        $data['degreetimetables'] = $degreetimetable->findAll();
        $this->view('clerk-interfaces/clerk-dashboard', $data);
    }

    public function notification()
    {
        $notification = new NotificationModel();
        $username = $_SESSION['USER_DATA']->username;
        $data['usernames'] = $username;

        $data['notification_count_obj'] = getNotificationCount();
        $data['notifications'] = $notification->findAll();
        $this->view('clerk-interfaces\clerk-notification', $data);
    }

    public function updatedattendance()
    {
        $degree = new Degree();

        if (!empty($_SESSION['DegreeID'])) {
            $degreeId = $_SESSION['DegreeID'];
            $data['degreedata'] = $degree->find($degreeId);

            $attendances = [];

            $att = new studentAttendance();
            $allAttendances = $att->findAll();
            if (!empty($allAttendances)) {
                foreach ($allAttendances as $attendance) {
                    if (is_object($attendance) && $attendance->degree_id == $degreeId) {
                        $attendances[] = $attendance;
                    }
                }
            }
            $data['attendances'] = $attendances;
        } else {
            $data['attendances'] = [];
            // If DegreeID is not set in the session, set $data['attendances'] as an empty array
        }
        $this->view('clerk-interfaces/clerk-updatedattendance', $data);
    }

    public function degreeprograms()
    {
        $degree = new Degree();
        $data['notification_count_obj'] = getNotificationCount();
        $data['degrees'] = $degree->findAll();
        $this->view('clerk-interfaces\clerk-degreeprograms', $data);
    }


    public function settings()
    {
        $user = new User();
        $data = [];
        $data['notification_count_obj'] = getNotificationCount();

        if (isset($_POST['update_user_data'])) {
            // Validate input fields
            $fname = isset($_POST['fname']) ? trim($_POST['fname']) : '';
            $lname = isset($_POST['lname']) ? trim($_POST['lname']) : '';
            $phoneNo = isset($_POST['phoneNo']) ? trim($_POST['phoneNo']) : '';

            // Update user data
            $id = $_SESSION['USER_DATA']->id;
            $dataToUpdate = [
                'fname' => $fname,
                'lname' => $lname,
                'phoneNo' => $phoneNo
            ];

            $user->update($id, $dataToUpdate);
            header('Location:settings');
            exit;
        }

        // Fetch user data for display
        $id = $_SESSION['USER_DATA']->id;
        $data['user'] = $user->first(['id' => $id]);

        if ($data['user'] === null) {
            $data['error'] = 'No user data found.';
        }

        $this->view('clerk-interfaces/clerk-settings', $data);
    }

    public function attendance()
    {
        $degree = new Degree();
        $attendance = new studentAttendance();
        // $data['attendances'] = $attendance->findAll();
        // show($attendance);
        // show($data['attendances']);

        if (!empty($_SESSION['DegreeID'])) {
            $degreeId = $_SESSION['DegreeID'];
        }

        $degree_info = (object) $degree->findByID($degreeId);
        $data['degrees'] = $degree->find($degreeId);
        $degreeShortName = $degree_info->DegreeShortName;
        // show($degreeShortName);
        $data['degreedata'] = $degree->find($degreeId);
        // show($_SESSION['DegreeID']);
        // show($data['degreedata']);
        $data['notification_count_obj'] = getNotificationCount();
        $st = new StudentModel();
        foreach ($st->findAll() as $student) {
            if (is_object($student) && $student->degreeID == $degreeId && $student->status == "continue") {
                $students[] = $student;
                // show($student);
            }
        }
        if (!empty($students)) {
            if (!empty($degreeId)) {
                $head = 'Name of  Programme  : ' . $degreeShortName;
                $rowHeadings = ['Index No', 'Registration No', 'Attendance'];
                $attedancesheet = 'assets/csv/output/Attendance_' . $degreeId . '.csv';
                $f = fopen($attedancesheet, 'w');

                if ($f == false) {
                    echo 'file is not open successfully';
                } else {
                    fputcsv($f, [$head]);
                    fputcsv($f, array());
                    fputcsv($f, $rowHeadings);

                    $sortedData = sortArray($students, 'indexNo');

                    if (!empty($sortedData)) {
                        foreach ($sortedData as $participant) {
                            $rowData = [$participant->indexNo, $participant->regNo];
                            fputcsv($f, $rowData);
                        }
                    }
                    fclose($f);
                }
            }
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['importSubmit'])) {
            // Check if the uploaded file is present and no errors occurred during upload
            if ($_FILES['csvFile']['error'] == 0 && !empty($_FILES['csvFile']['tmp_name'])) {
                // Load StudentModel
                $studentAttendance = new studentAttendance();
                $degree_name = $_POST['selectDegree'];
                $degree_id = $_POST['selectID'];
                // Process the CSV file
                $csvFile = fopen($_FILES['csvFile']['tmp_name'], 'r');

                // Skip the first four rows
                for ($i = 0; $i < 3; $i++) {
                    fgetcsv($csvFile);
                }

                while (($line = fgetcsv($csvFile)) !== FALSE) {
                    $index_no = $line[0];
                    $reg_no = $line[1];
                    $attendance = $line[2];


                    // Check if the record already exists
                    $existingData = $studentAttendance->where(['index_no' => $index_no]);
                    if ($existingData) {
                        // Check if the attendance value is not empty
                        if (!empty($attendance)) {
                            // If record exists and attendance value is not empty, update it
                            $updateData = [
                                'attendance' => $attendance,
                                'degree_name' => $degree_name,
                                'degree_id' => $degree_id
                            ];
                            $whereConditions = [
                                'index_no' => $index_no
                            ];
                            $studentAttendance->updateRows($updateData, $whereConditions);
                        }
                    } else {
                        // show($_POST);
                        //only If record not existing, insert it
                        $insertData = [
                            'index_no' => $index_no,
                            'degree_name' => $degree_name,
                            'attendance' => $attendance,
                            'degree_id' => $degree_id
                        ];
                        $studentAttendance->insert($insertData);
                    }
                }

                fclose($csvFile);
                header('Location: ' . $_SERVER['REQUEST_URI']);
                exit();
            } else {
                echo "Error uploading the file.";
            }
        }
        // echo "$_SESSION[getid]";
        // $data['degrees'] = $degree->findAll();

        // Load the view with the data
        $this->view('clerk-interfaces/clerk-attendance', $data);
    }

    public function degreeprofile($action = null, $id = null)
    {
        $data = [];
        $data['action'] = $action;
        $data['id'] = $id;
        $data['notification_count_obj'] = getNotificationCount();
        if (isset($_GET['id'])) {
            $degreeID = isset($_GET['id']) ? $_GET['id'] : null;
            $_SESSION['DegreeID'] = $degreeID;
            redirect("clerk/degreeprofile");
        }
        $degreeID = $_SESSION['DegreeID'];
        $_SESSION['DegreeID'] = $degreeID;
        // Check if degree ID is provided
        if ($degreeID !== null) {
            $degree = new Degree();
            $subject = new Subjects();
            $degreeTimeTable = new DegreeTimeTable();
            // Fetch the data based on the ID
            $degreeData = $degree->find($degreeID);
            $degreeTimeTableData = $degreeTimeTable->find($degreeID);
            $subjectsData = $subject->find($degreeID);
            $data['degrees'] = $degreeData;
            $subjects = [];
            foreach ($subjectsData as $subject) {
                $semesterNumber = $subject->semester;
                // Create semester array if not already exists
                if (!isset($subjects[$semesterNumber])) {
                    $subjects[$semesterNumber] = [];
                }
                // Add subject to semester array
                $subjects[$semesterNumber][] = $subject;
            }
            $data['subjects'] = $subjects;
            $data['degreeTimeTable'] = $degreeTimeTableData;

            // Load the view with the data
            $this->view('clerk-interfaces/clerk-degreeprofile', $data);
        } else {
            echo "Error: Degree ID not provided in the URL.";
        }
    }

    public function participants($id = null, $action = null)
    {
        $st = new StudentModel();
        $degree = new Degree();
        $data = [];
        $data['action'] = $action;
        $data['id'] = $id;
        $data['notification_count_obj'] = getNotificationCount();
        unset($_SESSION['studentId']);
        if (isset($_SESSION['DegreeID'])) {
            $degreeID = $_SESSION['DegreeID'];
            // Iterate through students to find those with the given DegreeID
            foreach ($st->findAll() as $student) {
                if (is_object($student) && $student->degreeID == $degreeID) {
                    $data['students'][] = $student; // Add student to data array
                }
            }
            $data['degrees'] = $degree->find($degreeID);
        } else {
            echo "Error: DegreeID not provided in the session."; // If DegreeID is not set in the session
        }
        $this->view('clerk-interfaces/clerk-participants', $data);
    }

    public function userprofile($action = null, $id = null)
    {
        $data = [];
        $data['action'] = $action;
        $data['id'] = $id;
        $data['notification_count_obj'] = getNotificationCount();
        if (isset($_GET['id'])) {
            $studentId = isset($_GET['id']) ? $_GET['id'] : null;
            $_SESSION['studentId'] = $studentId;
            redirect("clerk/userprofile");
        } else {
            $studentId = null;
        }
        $studentId = $_SESSION['studentId'];
        $_SESSION['studentId'] = $studentId;
        if ($studentId) {  // Check if the student ID is provided in the URL
            $degree = new Degree();
            $studentModel = new StudentModel();
            $finalMarks = new FinalMarks();
            $exam = new Exam();
            $studentId = $_SESSION['studentId']; // Get student ID from session
            $degreeId = $_SESSION['DegreeID']; // Get degree ID from session
            $data['student'] = $studentModel->findwhere("id", $studentId);
            $data['degrees'] = $degree->find($degreeId);
            $data['Degree'] = $degree->findAll();
            $studentIndex = $data['student'][0]->indexNo;
            // echo $studentIndex;
            $data['finalMarks'] = $finalMarks->findwhere("studentIndexNo", $studentIndex);
            $data['exams'] = $exam->find($degreeId);
            $this->view('clerk-interfaces/clerk-userprofile', $data);
        } else {
            echo "Error: Student ID not provided in the URL.";
        }
    }

    public function reports()
    {
        $data['notification_count_obj'] = getNotificationCount();
        $this->view('clerk-interfaces/clerk-reports', $data);
    }

    public function examination($method = null)
    {
        $degree = new Degree();
        $student = new StudentModel();
        $examParticipants = new ExamParticipants();
        $medicalStudents = new MedicalStudents();
        $repeatStudents = new RepeatStudents();
        $examtimetable = new ExamTimeTable();
        $subjects = new Subjects();
        $exam = new Exam();
        $resultSheet = new ResultSheet();
        $examAttendance = new Attendance();
        $examiner3Eligibility = new Examiner3Subject();
        $finalMarks = new FinalMarks();

        //need to add degree details to session 
        if (!empty($_SESSION['DegreeID'])) {
            $degreeID = $_SESSION['DegreeID']->DegreeID;
        }
        $examID = isset($_GET['examID']) ? $_GET['examID'] : null;

        if (!empty($examID)) {
            $_SESSION['examDetails'] = $exam->where(['examID' => $examID]);
        }
        //unset session message data
        if (!empty($_SESSION['message'])) {
            unset($_SESSION['message']);
        }
        //set examination id
        if (!empty($_SESSION['examDetails'])) {
            $examID = $_SESSION['examDetails'][0]->examID;
            $semester = $_SESSION['examDetails'][0]->semester;
        } else {
            $examID = null;
            $semester = null;
        }
        //give 403 error
        if ($examID == null) {
            redirect('_403_');
        }

        $data['errors'] = [];
        $data['degrees'] = $degree->findAll();
        $data['students'] = $student->where(['degreeID' => $degreeID]);

        //get exam details with degree details
        $dataTables = ['degree'];
        $columns = ['*'];
        $examConditions = ['exam.degreeID = degree.DegreeID', 'exam.degreeID= ' . $degreeID];
        $data['examDetails'] = $exam->join($dataTables, $columns, $examConditions);

        $repeatStudents->setid(1000);
        if ($method == 'results') {

            $examMarks = new Marks();
            $degreeID = isset($_GET['degreeID']) ? $_GET['degreeID'] : null;
            //get examID from session
            if (!empty($_SESSION['examDetails'])) {
                $examID = $_SESSION['examDetails'][0]->examID;
                $semester = $_SESSION['examDetails'][0]->semester;
            }
            //get subjects in the exam
            $examSubjects = $examtimetable->where(['examID' => $examID]);
            //get subject code from post data
            if (isset($_POST['submit'])) {
                $resultSubCode = isset($_POST['subCode']) ? $_POST['subCode'] : '';
                // show($resultSubCode);
            } else {
                $resultSubCode = '';
            }
            // remove any leading or trailing spaces from the string
            $resultSubCode = trim($resultSubCode);

            //get subject details
            $subjectDetails = $subjects->where(['SubjectCode' => $resultSubCode, 'DegreeID' => $degreeID]);
            //get examination results using marks and final marks
            $tables = ['final_marks', 'exam_participants'];
            $columns = ['*'];
            $conditions = ['marks.examID = final_marks.examID', 'marks.studentIndexNo = exam_participants.indexNo', 'marks.studentIndexNo = final_marks.studentIndexNo', 'marks.subjectCode = final_marks.subjectCode'];
            $whereConditions = ['marks.examID = ' . $examID, 'marks.subjectCode =  "' . $resultSubCode . '"', 'exam_participants.examID = ' . $examID];
            $examResults = $examMarks->joinWhere($tables, $columns, $conditions, $whereConditions);
            //generate csv file name
            $fileName = $examID . '_' . $resultSubCode . '.csv';
            $newFileName = $examID . '_' . $resultSubCode . '_new.csv';
            //generate updated marksheet as csv file
            if (!empty($resultSubCode)) {
                updateMarksheet($fileName, $examResults, $newFileName);
            }
            $data['subjectDetails'] = $subjectDetails;
            $data['subNames'] = $examSubjects;
            $data['examResults'] = $examResults;
            $this->view('clerk-interfaces/clerk-examresults', $data);
        } else if ($method == 'participants') {
            //get the count of exam participants
            $data['examCount'] = $examParticipants->count(['examID' => $examID]);
            $participants[] = $examParticipants->where(['examID' => $examID]);
            $data['examParticipants'] = $participants;
            $this->view('clerk-interfaces/clerk-examparticipants', $data);
        } else {
            $this->view('clerk-interfaces/clerk-examination', $data);
        }
    }
}
