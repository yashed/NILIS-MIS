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

    $this->view('admin-interfaces/admin-dashboard', $data);
  }
  public function dashboard()
  {

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

    $this->view('admin-interfaces/admin-users', $data);
  }

  public function degreeprofile($action = null, $id = null)
  {
    $degree = new Degree();

    $data = [];
    $data['action'] = $action;
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

  public function notifications()
  {
    $notification = new NotificationModel();
    $data['notifications'] = $notification->findAll();
    $this->view('admin-interfaces/admin-notifications', $data);
  }

  public function degreeprograms()
  {
    $degree = new Degree();

    $data['degrees'] = $degree->findAll();


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


    $this->view('admin-interfaces/admin-activity-log', $data);
  }
  public function degree()
  {
  }
}