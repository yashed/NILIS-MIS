<?php

/**
 * Admin class
 */
class Admin extends Controller
{

  function __construct()
  {
    if (!Auth::is_admin()) {
      message('You are not authorized to view this page');
      show("Error");
      redirect('_403_');
    }
  }

  public function index()
  {
    //uncoment this to add autherization

    // if (!Auth::is_admin()) {
    //   message('You are not authorized to view this page',s 'error');
    //   header('Location: login');
    // }

    $degree = new Degree();
    $exam = new Exam();
    $finalMarks = new FinalMarks();

    $data['title'] = 'Dashboard';

    //find all ongoing degree programs
    $data['ongoing_degrees'] = $degree->where(['Status' => 'ongoing']);


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


  public function notifications()
  {
    $notification = new NotificationModel();
    $notification_count_arr = $notification->countNotificationsAdmin();
    $data['notification_count_obj'] = $notification_count_arr[0];
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
      $email = isset($_POST['email']) ? trim($_POST['email']) : '';
      $phoneNo = isset($_POST['phoneNo']) ? trim($_POST['phoneNo']) : '';

      $errorMessage = '';

      if (empty($fname) || empty($lname) || empty($email) || empty($phoneNo)) {
        $errorMessage = '*All fields are required.';
      } else {
        // Additional validation for phone number
        $phoneNoPattern = '/^\d{10}$/'; // Regex pattern to match exactly 10 digits
        if (!preg_match($phoneNoPattern, $phoneNo)) {
          $errorMessage = 'Phone number is not valid. It should contain exactly 10 digits.';
        } else {
          // Update user data
          $id = $_SESSION['USER_DATA']->id;
          $dataToUpdate = [
            'fname' => $fname,
            'lname' => $lname,
            'email' => $email,
            'phoneNo' => $phoneNo
          ];

          $user->update($id, $dataToUpdate);

          // Fetch updated user data
          $updatedUserData = $user->first(['id' => $id]);

          if ($updatedUserData === null) {
            $errorMessage = 'No user data found after update.';
          } else {
            $data['user'] = $updatedUserData;
          }
        }
      }

      if (!empty($errorMessage)) {
        // Display error message and retain user input
        $data['error'] = $errorMessage;
        $data['user'] = (object) [
          'fname' => $fname,
          'lname' => $lname,
          'email' => $email,
          'phoneNo' => $phoneNo
        ];
      }
    } else {
      // Fetch user data for display
      $id = $_SESSION['USER_DATA']->id;
      $data['user'] = $user->first(['id' => $id]);

      if ($data['user'] === null) {
        $data['error'] = 'No user data found.';
      }
    }
    $this->view('admin-interfaces/admin-settings', $data);
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