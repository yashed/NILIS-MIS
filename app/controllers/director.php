<?php

class DIRECTOR extends Controller
{

    function __construct()
    {
        if (!Auth::is_director()) {
            message('You are not authorized to view this page');
            redirect('login');
        }
    }

    public function index()
    {
        $degree = new Degree();
        $exam = new Exam();
        $student = new StudentModel();
        $exam = new Exam();
        $degreetimetable = new DegreeTimeTable();
        $attendance = new studentAttendance();
        $data['attendances'] = $attendance->findAll();
      
        $finalMarks = new FinalMarks();

        $recentExamId = $finalMarks->lastID('examID');

        $dataTables = ['degree'];
        $columns = ['*'];
        $examConditions = ['exam.degreeID = degree.DegreeID', 'exam.examID = ' . $recentExamId];
        $data['RecentResultExam'] = $exam->join($dataTables, $columns, $examConditions);
        $data['notification_count_obj_director'] = getNotificationCountDirector();


        $data['degrees'] = $degree->findAll();
        $data['students'] = $student->findAll();
        $data['exams'] = $exam->findAll();
        $data['degreetimetables'] = $degreetimetable->findAll();
        $data['marks'] = $finalMarks->query("SELECT finalMarks FROM final_marks");
        // show($data['marks']);
        $this->view('director-interfaces/director-dashboard', $data);
    }

    public function notification()
    {
        $notification = new NotificationModel();
        $username = $_SESSION['USER_DATA']->username;
        $data['usernames'] = $username;
        $data['notifications'] = $notification->findAll();
        $data['notification_count_obj_director'] = getNotificationCountDirector();
        $this->view('director-interfaces/director-notification', $data);
    }
    public function degreeprograms()
    {
        $degree = new Degree();
        $data['degrees'] = $degree->findAll();
        $data['notification_count_obj_director'] = getNotificationCountDirector();
        $this->view('director-interfaces/director-degreeprograms', $data);
    }


    public function degreeprofile($action = null, $id = null)
    {
        $data = [];
        $data['action'] = $action;
        $data['id'] = $id;
        $data['notification_count_obj_director'] = getNotificationCountDirector();
        if (isset($_GET['id'])) {
            $degreeID = isset($_GET['id']) ? $_GET['id'] : null;
            $_SESSION['DegreeID'] = $degreeID;
            redirect("director/degreeprofile");
        }
        $degreeID = $_SESSION['DegreeID'];

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
            $this->view('director-interfaces/director-degreeprofile', $data);
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
        $data['notification_count_obj_director'] = getNotificationCountDirector();
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
        $this->view('director-interfaces/director-participants', $data);
    }

    public function userprofile($action = null, $id = null)
    {
        $data = [];
        $data['action'] = $action;
        $data['id'] = $id;
        $data['notification_count_obj_director'] = getNotificationCountDirector();
        if (isset($_GET['id'])) {
            $studentId = isset($_GET['id']) ? $_GET['id'] : null;
            $_SESSION['studentId'] = $studentId;
            redirect("director/userprofile");
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
            $degreeId = $_SESSION['DegreeID'];
                       
 // Get degree ID from session
            $data['student'] = $studentModel->findwhere("id", $studentId);
            // show($data['student']);
            $data['degrees'] = $degree->find($degreeId);
            $data['Degree'] = $degree->findAll();
            $studentIndex = $data['student'][0]->indexNo;
            // show($studentIndex);
            $studentreg = $data['student'][0]->regNo;
            // show($studentreg);

            // echo $studentIndex;
            $data['finalMarks'] = $finalMarks->findwhere("studentIndexNo", $studentIndex);
            $data['exams'] = $exam->find($degreeId);
            //   show($data['exams']);
            // show($data['finalMarks']);
            $this->view('director-interfaces/director-userprofile', $data);
        } else {
            echo "Error: Student ID not provided in the URL.";
        }
    }
    public function settings()
    {
        $user = new User();
        $data = [];
        $data['notification_count_obj_director'] = getNotificationCountDirector();
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

        $this->view('director-interfaces/director-settings', $data);
    }

    public function login()
    {
        $this->view('common/login/login.view');
    }

    public function reports($method = null)
    {

        //send notification count to the view
        $data['notification_count_obj_director'] = getNotificationCountDirector();

        $subjects = new Subjects();
        $gradings = new Grades();
        $finalMarks = new FinalMarks();
        $student = new StudentModel();
        $exam = new Exam();

        $data = [];
        $data['degreeDetails'] = $_SESSION['degreeData'];
        //get semester from get data
        $data['semester'] = isset($_GET['semester']) ? $_GET['semester'] : null;
        $data['subjects'] = $subjects->where(['DegreeID' => $data['degreeDetails'][0]->DegreeID, 'semester' => $data['semester']]);
        $data['subjectsCodes'] = $subjects->whereSpecificColumn(['DegreeID' => $data['degreeDetails'][0]->DegreeID, 'semester' => $data['semester']], 'SubjectCode');

        $data['grades'] = $gradings->where(['DegreeID' => $data['degreeDetails'][0]->DegreeID]);
        $students = $student->where(['DegreeID' => $data['degreeDetails'][0]->DegreeID, 'status' => 'continue']);
        $data['students'] = $students;
        $data['studentRes'] = [];

        foreach ($students as $student) {
            $indexNo = $student->indexNo;

            $tables = ['subject', 'exam_attendance'];
            $columns = ['*'];
            $conditions = [
                'subject.SubjectCode = final_marks.subjectCode',
                'subject.DegreeID = final_marks.degreeID',
                'exam_attendance.examID = final_marks.examID',
                'exam_attendance.IndexNo = final_marks.studentIndexNo',
                'final_marks.subjectCode = exam_attendance.subjectCode',
            ];
            $whereConditions = [
                "final_marks.studentIndexNo = " . "'$indexNo'",
                "exam_attendance.IndexNo = " . "'$indexNo'",

            ];

            $studnetRes = $finalMarks->joinWhere($tables, $columns, $conditions, $whereConditions);
            $groupedData = groupByColumn($studnetRes, 'subjectCode');

            //get best marks
            $bestData = getBestMarks($groupedData, 'finalMarks');
            $data['studentRes'][$indexNo] = $bestData;
            // show($bestData);

        }

        //validate data, check wheter examination is completed
        $data['examtype'] = $exam->whereSpecificColumn(['DegreeID' => $data['degreeDetails'][0]->DegreeID, 'semester' => $data['semester']], 'status');
        $data['degreetype'] = $_SESSION['degreeData'][0]->DegreeType;


        if ($method == '1') {

            $this->view('reports/reports-1', $data);

        } else if ($method == '2') {

            $this->view('reports/reports-2', $data);
        } else if ($method == 'roe') {

            redirect('roe/login');
        } else if ($method == 'transcript') {

            redirect('transcript/login');
        } else {

            $this->view('director-interfaces/director-reports', $data);
        }

    }

    public function attendance()
    {
        $degree = new Degree();
        $data['notification_count_obj_director'] = getNotificationCountDirector();

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
        // show($degreeId);
        $this->view('director-interfaces\director-attendance', $data);
    }

    public function examination($method = null, $id = null)
    {
        $model = new Model();
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

        $data['notification_count_obj_director'] = getNotificationCountDirector();
        //get the degree id from the url
        $examID = isset($_GET['examID']) ? $_GET['examID'] : null;
        $degreeID = isset($_GET['degreeID']) ? $_GET['degreeID'] : null;

        //add degree data to session 
        if (!empty($degreeID)) {
            $_SESSION['degreeData'] = $degree->where(['DegreeID' => $degreeID]);
        }

        //add exam data to session
        if (!empty($examID)) {
            $_SESSION['examDetails'] = $exam->where(['examID' => $examID]);
        }

        //define degree id and exam id globally for the examination part
        if (!empty($_SESSION['degreeData'])) {

            $degreeID = $_SESSION['degreeData'][0]->DegreeID;
        }
        if (!empty($_SESSION['examDetails'])) {
            $examID = $_SESSION['examDetails'][0]->examID;
        }


        //unset session message data
        if (!empty($_SESSION['message'])) {
            unset($_SESSION['message']);
        }

        //get the count of exam participants
        $data['errors'] = [];
        $data['degrees'] = $degree->findAll();
        $data['students'] = $student->where(['degreeID' => $degreeID]);


        //get exam details with degree details
        $dataTables = ['degree'];
        $columns = ['*'];
        $examConditions = ['exam.degreeID = degree.DegreeID', 'exam.degreeID= ' . $degreeID];
        $data['examDetails'] = $exam->join($dataTables, $columns, $examConditions);


        //add again examDetaios to session
        if (!empty($examID)) {
            $_SESSION['examDetails'] = $exam->where(['examID' => $examID]);

        }

        //get the grades of the students join with exam participants table
        $tablesJoin = ['exam_participants'];
        $columnsJoin = ['final_marks.id', 'final_marks.studentIndexNo', 'final_marks.examID', 'final_marks.degreeID', 'final_marks.finalMarks', 'final_marks.grade', 'final_marks.subjectCode', 'exam_participants.studentType', 'exam_participants.semester'];
        $conditionsJoin = ['final_marks.studentIndexNo = exam_participants.indexNo', 'final_marks.examID = exam_participants.examID'];
        $whereConditionsJoin = ['final_marks.grade IS NULL'];
        $marksToGrade = $finalMarks->joinWhere($tablesJoin, $columnsJoin, $conditionsJoin, $whereConditionsJoin);


        //update grades of marks
        if (!empty($marksToGrade)) {
            $finalMarks->updateGrades($marksToGrade);
        }

        //send notification count to the view
        $data['notification_count_obj_sar'] = getNotificationCountAssistSAR();

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


            $this->view('director-interfaces/director-examresults', $data);

        } else if ($method == 'participants') {


            if (!empty($_GET['examID']) && !empty($_GET['degreeID'])) {
                redirect('director/examination/participants');
            }

            //get the count of exam participants
            $data['examCount'] = $examParticipants->count(['examID' => $examID]);

            $participants[] = $examParticipants->where(['examID' => $examID]);

            $data['examParticipants'] = $participants;

            $this->view('director-interfaces/director-examparticipants', $data);
        } else {


            $this->view('director-interfaces/director-examination', $data);
        }

    }

}
