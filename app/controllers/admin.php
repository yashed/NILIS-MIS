<?php 

/**
 * Admin class
 */
class Admin extends Controller{
   
  public function index(){

    $data['title'] = 'Dashboard';
    $this->view('admin-interfaces/admin-dashboard',$data);

  }
   public function users($action = null,$id = null){

    
      // show($_POST);


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
              $_POST['password'] = password_hash($password, PASSWORD_DEFAULT);
    
              //call insert function in user.model.php to add data
              $user->insert($_POST);

              message("User profile was successfully created");
              // header('Location: users');
              // redirect('users');
              
            
          }
      }
        
      //get all data from database
      $data['users'] = $user->findAll();
      
      //show errors (data validate errors)
      // show($data['users']);
      // show($user->errors);
      $data['errors'] = $user->errors;
      $data['title'] = 'Signup';
      
      $this->view('admin-interfaces/admin-users',$data);
    }

    public function notification()
    {

    }

    public function settings()
    {
       
    }
    public function degree(){
        
       
    }
}


?>