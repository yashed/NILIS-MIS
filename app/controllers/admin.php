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

          //unset submit 
          unset($_POST['submit']);

          try {
            //set default passsword
            $password = $_POST['role'] . '123';
            //add date to the POST data
            $_POST['date'] = date("Y-m-d H:i:s");

            //add password to the POST data
            $_POST['password'] = password_hash($password, PASSWORD_DEFAULT);

            $user->insert($_POST);
            message("User profile was successfully created");
          } catch (\Throwable $th) {
            var_dump($th);
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


  public function notification()
  {
    $this->view('admin-interfaces/admin-notification');
  }
  public function degreeprograms()
  {
    $degree = new Degree();

    // $degree->insert($_POST);


    $data['degrees'] = $degree->findAll();


    $this->view('admin-interfaces/admin-degreeprograms', $data);
  }
  public function settings()
  {
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
