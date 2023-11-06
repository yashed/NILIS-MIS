<?php

/**
 * Admin class
 */
class Admin extends Controller
{

  public function index()
  {

    $data['title'] = 'Dashboard';
    $this->view('admin-interfaces/admin-dashboard', $data);
  }
  public function users()
  {


    $data['errors'] = [];
    $user = new User();

    //uncomment bellow code to create user table
    //   $user->create_tables();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      //call insert function in user.model.php to add data
      // $user->insert($_POST);

      // header('Location: users');
      if ($_POST['submit'] == "update") {
        $user->update($_POST['id'], $_POST);
        message("User profile was successfully updated");
      }
       else if ($_POST['submit'] == "add") {
        if ($user->validate($_POST)) {
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
    // show($_POST);
    $this->view('admin-interfaces/admin-users', $data);
  }
  // public function update(){

  //     $user = new User();

  //     echo "Admin users22";
  //     if(!Auth::logged_in())
  //      {
  //         	message('please login to view the admin section');
  //  	        redirect('login');
  //        }
  //        echo "Admin user21s";
  //     $id = $id ?? Auth::getId();
  //     $data['title'] = 'Update';
  //     $data['row'] = $row = $user->first(['id'=>$id]);
  //     show($data['row']);
  //     if($_SERVER['REQUEST_METHOD'] == "POST" && $row)
  //     {
  //       $user->update($id,$_POST);
  //       message("User profile Updated successfully created");
  //       header('Location: admin-interfaces/admin-users');
  //     } 

  //     $this->view('admin-interfaces/admin-user-update',$data);

  // }

  public function notification()
  {
  }

  public function settings()
  {
  }
  public function degree()
  {
  }
}
