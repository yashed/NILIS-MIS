<?php

class DIRECTOR extends Controller
{

    // function __construct()
    // {
    //     if (!Auth::is_director()) {
    //         message('You are not authorized to view this page');
    //         redirect('login');
    //     }
    // }

    public function index()
    {
        $degree = new Degree();
        $exam = new Exam();
        // $notification = new NotificationModel();
        // $notification_count_arr = $notification->countNotifications();
        $finalMarks = new FinalMarks();
        $recentExamId = $finalMarks->lastID('examID');

        //join exam and degree tables
        $dataTables = ['degree'];
        $columns = ['*'];
        $examConditions = ['exam.degreeID = degree.DegreeID', 'exam.examID = ' . $recentExamId];
        $data['RecentResultExam'] = $exam->join($dataTables, $columns, $examConditions);
        // $degree->insert($_POST);
        // show($_POST);
        // $notification = new NotificationModel();
        // $notification_count_arr = $notification->countNotificationsDirector();

        // $data['notification_count_obj'] = $notification_count_arr[0];
        $data['notification_count_obj_director'] = getNotificationCountDirector();

        $data['degrees'] = $degree->findAll();
        //show($data['degrees']);

        $this->view('director-interfaces/director-dashboard', $data);
    }
    public function notification()
    {
        $notification = new NotificationModel();
        $username = $_SESSION['USER_DATA']->username;
        $data['usernames'] = $username;
        $data['notifications'] = $notification->findAll();
        $this->view('director-interfaces/director-notification', $data);
    }
    public function degreeprograms()
    {
        $degree = new Degree();
      

       
        // $degree->insert($_POST);
        // show($_POST);

        $data['degrees'] = $degree->findAll();
        //show($data['degrees']);

        $this->view('director-interfaces/director-degreeprograms', $data);
    }


    public function degreeprofile($action = null, $id = null)
    {
        $data = [];
        $data['action'] = $action;
        $data['id'] = $id;

        if (isset($_GET['id'])) {
            $degreeID = isset($_GET['id']) ? $_GET['id'] : null;
            $_SESSION['DegreeID'] = $degreeID;
            redirect("director/degreeprofile");
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
            $degreeId = $_SESSION['DegreeID']; // Get degree ID from session
            $data['student'] = $studentModel->findwhere("id", $studentId);
            $data['degrees'] = $degree->find($degreeId);
            $data['Degree'] = $degree->findAll();
            $studentIndex = $data['student'][0]->indexNo;
            // echo $studentIndex;
            $data['finalMarks'] = $finalMarks->findwhere("studentIndexNo", $studentIndex);
            $data['exams'] = $exam->find($degreeId);
            $this->view('director-interfaces/director-userprofile', $data);
        } else {
            echo "Error: Student ID not provided in the URL.";
        }
    }
    public function settings()
    {
        $user = new User();
        $data = [];

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

    public function reports()
    {
       $this->view('director-interfaces/director-reports');
    }

    public function attendance()
    {
        $attendance = new studentAttendance();
        $data['attendances'] = $attendance->findAll();
        // show($attendance);
        // show($data['attendances']);
        $degree = new Degree();

        if (!empty($_SESSION['DegreeID'])) {
            $degreeId = $_SESSION['DegreeID'];
        }
        $data['degreedata'] = $degree->find($degreeId);
        // show($data['degreedata']);
        $this->view('director-interfaces\director-attendance', $data);
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
            $this->view('director-interfaces/director-examresults', $data);
        } else if ($method == 'participants') {
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
