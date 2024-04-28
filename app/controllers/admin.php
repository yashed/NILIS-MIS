<?php

/**
 * Admin class
 */
class Admin extends Controller
{

  function __construct()
  {
    if (!Auth::is_admin()) {
      show("Error");
      redirect('_403_');
    }
  }

  public function index()
  {
    //uncoment this to add autherization

    if (!Auth::is_admin()) {

      redirect('_403_');
    }

    $degree = new Degree();
    $student = new StudentModel();
    $exam = new Exam();
    $degreetimetable = new DegreeTimeTable();
    $user = new User();


    $degree = new Degree();
    $exam = new Exam();
    $finalMarks = new FinalMarks();

    $data['title'] = 'Dashboard';
    $data['degrees'] = $degree->findAll();
    $data['students'] = $student->findAll();
    $data['exam'] = $exam->findAll();
    $data['degreetimetables'] = $degreetimetable->findAll();

    //find all ongoing degree programs
    $data['ongoing_degrees'] = $degree->where(['Status' => 'ongoing']);
    $data['ongoing_exam'] = $exam->where(['status' => 'ongoing']);
    $data['users'] = $user->findAll();

    $recentExamId = $finalMarks->lastID('examID');

    //join exam and degree tables
    $dataTables = ['degree'];
    $columns = ['*'];
    $examConditions = ['exam.degreeID = degree.DegreeID', 'exam.examID = ' . $recentExamId];
    $data['RecentResultExam'] = $exam->join($dataTables, $columns, $examConditions);
    $data['title'] = "Page not found";
    $data['notification_count_obj_admin'] = getNotificationCountAdmin();

    $this->view('admin-interfaces/admin-dashboard', $data);
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
    $data['notification_count_obj_admin'] = getNotificationCountAdmin();


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


      $this->view('admin-interfaces/admin-exam-results', $data);

    } else if ($method == 'participants') {


      if (!empty($_GET['examID']) && !empty($_GET['degreeID'])) {
        redirect('admin/examination/participants');
      }

      //get the count of exam participants
      $data['examCount'] = $examParticipants->count(['examID' => $examID]);

      $participants[] = $examParticipants->where(['examID' => $examID]);

      $data['examParticipants'] = $participants;

      $this->view('admin-interfaces/admin.examparticipants', $data);
    } else {


      $this->view('admin-interfaces/admin-examination', $data);
    }

  }
  public function users()
  {

    $data['errors'] = [];
    $user = new User();

    $popupCreate = false;
    $popupUpdate = false;



    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      //call insert function in user.model.php to add data
      // $user->insert($_POST);

      // header('Location: users');
      if (!empty($_POST['reset-pw'])) {
        if ($_POST['reset-pw'] == "reset-pw") {

          if (!empty($_POST['role'])) {
            $password = $_POST['role'] . '123';
          }

          $dataToUpdate = [
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'status' => 'initial'
          ];

          $user->update($_POST['id'], $dataToUpdate);
          message("User password was successfully reset", 'success', true);
        }
      }
      if (!empty($_POST['submit'])) {
        if ($_POST['submit'] == "update") {


          if ($user->validateUpdate($_POST)) {
            $popupUpdate = false;

            $user->update($_POST['id'], $_POST);
            message("User profile was successfully updated", 'success', true);
          } else {

            $popupUpdate = true;
            message("User profile was not updated Corectly", 'error', true);
          }
        } else if ($_POST['submit'] == "add") {
          if ($user->validate($_POST)) {
            $popupCreate = false;

            //unset submit value in POST data
            unset($_POST['submit']);

            try {
              //set default passsword
              $password = $_POST['role'] . '123';
              //add date to the POST data
              $_POST['date'] = date("Y-m-d H:i:s");
              //add password to the POST data
              $_POST['password'] = password_hash($password, PASSWORD_DEFAULT);
              $_POST['status'] = 'initial';

              $user->insert($_POST);
              message("User profile was successfully created", 'success', true);

              //refresh the page
              // header("Refresh:0");

            } catch (\Throwable $th) {
              // var_dump($th);
            }
          } else {
            $popupCreate = true;
            message("User profile was not created Corectly", 'error', true);
          }
        } else if ($_POST['submit'] == "delete") {


          $user->delete2($_POST);
          message("User profile was successfully Deleted", 'success', true);

          //if user delete admin account then user automatically got logout
          if ($_POST['id'] == $_SESSION['USER_DATA']->id) {
            Auth::logout();
            //redirect to login
            redirect('login');
          }
        }
      }
    }
    //get all data from database
    $data['users'] = $user->findAll();
    $data['errors'] = $user->errors;
    $data['title'] = 'Users';
    $data['popupCreate'] = $popupCreate;
    $data['popupUpdate'] = $popupUpdate;
    $data['notification_count_obj_admin'] = getNotificationCountAdmin();


    $this->view('admin-interfaces/admin-users', $data);
  }

  public function degreeprofile($action = null, $id = null)
  {
    $degree = new Degree();

    $data = [];
    $data['action'] = $action;
    $data['notification_count_obj_admin'] = getNotificationCountAdmin();
    $data['id'] = $id;
    if (isset($_GET['id'])) {
      $degreeID = isset($_GET['id']) ? $_GET['id'] : null;
      $_SESSION['degreeData'] = $degree->where(['DegreeID' => $degreeID]);
      redirect("admin/degreeprofile");

    }

    $degreeID = $_SESSION['degreeData'][0]->DegreeID;
    // $_SESSION['degreeData']->DegreeID = $degreeID;
    //update session degree data



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
        redirect("admin/degreeprograms");
      }
      // Load the view with the data
      $this->view('admin-interfaces/admin-degreeprofile', $data);
    } else {
      echo "Error: Degree ID not provided in the URL.";
    }
  }

  public function notification()
  {
    $notification = new NotificationModel();
    $data['notifications'] = $notification->findAll();
    $data['notification_count_obj_admin'] = getNotificationCountAdmin();

    $this->view('admin-interfaces/admin-notifications', $data);
  }

  public function degreeprograms()
  {
    $degree = new Degree();

    $data['degrees'] = $degree->findAll();
    $data['notification_count_obj_admin'] = getNotificationCountAdmin();


    $this->view('admin-interfaces/admin-degreeprograms', $data);
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
      $data['notification_count_obj_admin'] = getNotificationCountAdmin();

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


  public function activity()
  {
    $activity = new Activity();
    $perPage = 20; // Number of records per page
    $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
    $start = ($page - 1) * $perPage;

    // Assuming findAll can take limit and offset
    $data['activities'] = $activity->findLimit($start, $perPage);

    if (!empty($data['activities'])) {
      $data['totalRows'] = count($activity->findAll());
    }

    $data['currentPage'] = $page;
    $data['perPage'] = $perPage;
    $data['notification_count_obj_admin'] = getNotificationCountAdmin();


    $this->view('admin-interfaces/admin-activity-log', $data);
  }
  public function degree()
  {
  }
}