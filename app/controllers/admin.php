<?php 

/**
 * Admin class
 */
class Admin extends Controller{
   
   public function addUser(){

      show($_POST);
      $user = new User();


      if($user->validate($_POST)){
         
          //set default passsword
          $password = $_POST['role'].'@123';
          //add date to the POST data
          $_POST['date'] = date("Y-m-d H:i:s"); 

          //add password to the POST data
          $_POST['password'] = $password;

          //call insert function in user.model.php to add data
          $user->insert($_POST);
        
      }
       

      
      //show errors (data validate errors)
      show($user->errors);
      $data['title'] = 'Signup';

      $this->view('adduser',$data);
    }
}


?>