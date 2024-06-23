<?php

class ASAR extends Controller
{

    function __construct()
    {
        if (!Auth::is_asar()) {
            show("Error");
            redirect('_403_');
        }
    }

    public function index()
    {
        $degree = new Degree();
        $student = new StudentModel();
        $exam = new Exam();
        $degreetimetable = new DegreeTimeTable();
        $finalMarks = new FinalMarks();
        $db = new Database();
        $finalMarks = new FinalMarks();
        $repeateStudents = new RepeatStudents();


        //remove degree data from session
        if (!empty($_SESSION['degreeData'])) {
            unset($_SESSION['degreeData']);
        }
        //remove exam details from session
        if (!empty($_SESSION['examDetails'])) {
            unset($_SESSION['examDetails']);
        }

        //get data to show as upcoming examination in sar dashboard
        $upTable = ['degree'];
        $upColumns = ['*'];
        $upConditions = ['degree_timetable.DegreeID = degree.DegreeID', 'StartingDate >= CURDATE()'];
        $data['upcomingExams'] = $degreetimetable->join($upTable, $upColumns, $upConditions, 'StartingDate', 2);


        //pass data to graphs and chalender
        $data['degrees'] = $degree->findAll();
        $data['students'] = $student->findAll();
        $data['exams'] = $exam->findAll();
        $data['degreetimetables'] = $degreetimetable->findAll();
        $data['repeateStudents'] = $repeateStudents->findAll();


        //get last results submitted examination id
        $recentExamId = $finalMarks->lastID('examID');

        //join exam and degree tables
        if (!empty($recentExamId)) {
            $dataTables = ['degree'];
            $columns = ['*'];
            $examConditions = ['exam.degreeID = degree.DegreeID', 'exam.examID = ' . $recentExamId];
            $data['RecentResultExam'] = $exam->join($dataTables, $columns, $examConditions);
        } else {
            $data['RecentResultExam'] = null;
        }

        $degree = new Degree();

        $data['marks'] = $finalMarks->query("SELECT finalMarks FROM final_marks");
        $data['degrees'] = $degree->findAll();

        //send notification count to the view

        $this->view('assist-sar-interfaces/assist-sar-dashboard', $data);
    }

    public function degreeprograms()
    {

        $degree = new Degree();


        $data['degrees'] = $degree->findAll();


        $this->view('assist-sar-interfaces/asar-degreeprograms', $data);
    }
    public function degreeprofile($action = null, $id = null)
    {
        $degree = new Degree();

        $data = [];
        $data['action'] = $action;
        $data['id'] = $id;
        $degreeID = isset($_GET['id']) ? $_GET['id'] : null;

        //update session degree data
        if (!empty($degreeID)) {
            $_SESSION['degreeData'] = $degree->where(['DegreeID' => $degreeID]);
        }

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
            if ($action == "update") {
                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    echo "POST request received";
                    if (isset($_POST['timetableData'])) {
                        $timetableData = json_decode($_POST['timetableData'], true);
                        // Iterate over each subject's data and insert it into the database
                        foreach ($timetableData as $timetableData) {
                            echo "a";
                            // Construct the data array for insertion
                            $data1 = [
                                'EventID' => $timetableData['eventID'],
                                'DegreeID' => $degreeID,
                                'EventName' => $timetableData['eventName'],
                                'EventType' => $timetableData['eventType'],
                                'StartingDate' => $timetableData['eventStart'],
                                'EndingDate' => $timetableData['eventEnd'],
                            ];
                            $degreeTimeTable->update($degreeID, $data1);
                        }
                    }
                }
            } else if ($action == 'delete') {
                $degree->delete(['id' => $degreeID]);
                redirect("assist-sar-interfaces/degreeprograms");
            }
            // Load the view with the data
            $this->view('assist-sar-interfaces/asar-degreeprofile', $data);
        } else {
            echo "Error: Degree ID not provided in the URL.";
        }
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


            $this->view('assist-sar-interfaces/assist-examresults', $data);

        } else if ($method == 'participants') {


            if (!empty($_GET['examID']) && !empty($_GET['degreeID'])) {
                redirect('asar/examination/participants');
            }

            //get the count of exam participants
            $data['examCount'] = $examParticipants->count(['examID' => $examID]);

            $participants[] = $examParticipants->where(['examID' => $examID]);

            $data['examParticipants'] = $participants;

            $this->view('assist-sar-interfaces/assist-sar-participants', $data);
        } else {


            $this->view('assist-sar-interfaces/assist-examination', $data);
        }

    }

    public function notifications()
    {
        $notification = new NotificationModel();
        $data['notifications'] = $notification->findAll();

        $this->view('director-interfaces/director-notification', $data);
    }

    public function participants($id = null, $action = null, $id2 = null)
    {

        $st = new StudentModel();
        if (!empty($id)) {
            if (!empty($action)) {
                if ($action === 'delete' && !empty($id2)) {
                    $st->delete(["id" => $id2]);
                }
            } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // print_r($_POST);
                // die;
                $st->update($_POST['id'], $_POST);
                //    redirect('student/'.$id);
                $data['student'] = $st->where(['indexNo' => $id])[0];

                $this->view('common/student/student.view', $data);
                return;
            } else {
                $data['student'] = $st->where(['indexNo' => $id])[0];

                $this->view('common/student/student.view', $data);
                return;
            }
        }
        $data['students'] = $st->findAll();
        //print_r($data);
        // die;
        $this->view('director-interfaces/director-participants', $data);
    }



    // public function userprofile()
    // {
    //     $degree = new Degree();

    //     // $degree->insert($_POST);
    //     // show($_POST);
    //     $student = new StudentModel();
    //     $data['student'] = $student->findAll();
    //     $data['degrees'] = $degree->findAll();
    //     //show($data['degrees']);

    //     $this->view('director-interfaces/director-userprofile', $data);
    // }
    public function settings()
    {
        $user = new User();


        if (isset($_POST['update_user_data'])) {
            $id = $_SESSION['USER_DATA']->id;
            $dataToUpdate = [
                'fname' => $_POST['fname'],
                'lname' => $_POST['lname'],
                'email' => $_POST['email'],
                'phoneNo' => $_POST['phoneNo']
            ];

            $user->update($id, $dataToUpdate);

            $updatedUserData = $user->first(['id' => $id]);

            if ($updatedUserData === null) {
                echo 'No user data found after update.';
                exit();
            }

            $data['user'] = $updatedUserData;
        } else {
            $id = $_SESSION['USER_DATA']->id;
            $data['user'] = $user->first(['id' => $id]);

            if ($data['user'] === null) {
                echo 'No user data found.';
                exit();
            }
        }

        $this->view('director-interfaces/director-settings', $data);
    }

    public function userprofile()
    {
        $degree = new Degree();
        $data['degrees'] = $degree->findAll();

        // Fetch the specific student data using the ID from the URL
        $studentId = isset($_GET['studentId']) ? $_GET['studentId'] : null;
        // show($studentId);
        // Check if the student ID is provided in the URL
        if ($studentId) {
            $studentModel = new StudentModel();
            $data['student'] = $studentModel->find($studentId);
            // var_dump($data['student']);
            // Check if the student data is retrieved
            if ($data['student']) {
                $this->view('director-interfaces/director-userprofile', $data);
            } else {
                echo "Error: Student not found.";
            }
        } else {
            echo "Error: Student ID not provided in the URL.";
        }
    }
    public function login()
    {
        $this->view('common/login/login.view');
    }
}
