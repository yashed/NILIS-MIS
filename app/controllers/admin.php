<?php 

/**
 * Admin class
 */
class Admin extends Controller{
   
   public function addUser(){

    
      show($_POST);


      $data['errors'] = [];
      $user = new User();

    //uncomment bellow code to create user table
    //   $user->create_tables();
      if($_SERVER['REQUEST_METHOD'] =='POST'){
        
          if($user->validate($_POST)){
             
              //set default passsword
              $password = $_POST['role'].'123';
              //add date to the POST data
              $_POST['date'] = date("Y-m-d H:i:s");  
    
              //add password to the POST data
              $_POST['password'] = $password;
    
              //call insert function in user.model.php to add data
              $user->insert($_POST);

              message("User profile was successfully created");
              // header('Location: adduser');
              // redirect('adduser');
              
            
          }
      }
       

      
      //show errors (data validate errors)
      show($user->errors);
      $data['errors'] = $user->errors;
      $data['title'] = 'Signup';

      $this->view('admin-interfaces/admin-users',$data);
    }
}


?>