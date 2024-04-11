<?php

/**
 * Admin class
 */
class Admin extends Controller
{

  // function __construct()
  // {
  //   if (!Auth::is_admin()) {
  //     message('You are not authorized to view this page');
  //     show("Error");
  //     redirect('login');
  //   }
  // }

  public function index()
  {
    //uncoment this to add autherization

    // if (!Auth::is_admin()) {
    //   message('You are not authorized to view this page',s 'error');
    //   header('Location: login');
    // }

    $data['title'] = "Page not found";

    $this->view('admin-interfaces/admin-dashboard', $data);
  }
  public function dashboard()
  {
    $data['title'] = 'Dashboard';
    $this->view('admin-interfaces/admin-dashboard', $data);
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
      if ($_POST['submit'] == "update") {

        if ($user->validateUpdate($_POST)) {
          $popupUpdate = false;

          $user->update($_POST['id'], $_POST);
          message("User profile was successfully updated");
        } else {

          $popupUpdate = true;
          message("User profile was not updated Corectly", 'error');
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
            message("User profile was successfully created");

            //refresh the page
            // header("Refresh:0");

          } catch (\Throwable $th) {
            // var_dump($th);
          }
        } else {
          $popupCreate = true;
          message("User profile was not created Corectly", 'error');
        }
      } else if ($_POST['submit'] == "delete") {

        $user->delete2($_POST);
        message("User profile was successfully Deleted");
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
    $this->view('admin-interfaces/admin-settings');
  }

  public function activity()
  {

    $activity = new Activity();

    $data['activities'] = $activity->findAll();


    $this->view('admin-interfaces/admin-activity-log', $data);
  }
  public function degree()
  {
  }
}