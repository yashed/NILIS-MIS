<?php 

/**
 * Admin class
 */
class Admin extends Controller{
   
  public function index(){

    $data['title'] = 'Dashboard';
    $this->view('admin-interfaces/admin-dashboard',$data);

  }
   public function users(){

      echo "Admin users";
      $data['errors'] = [];
      $user = new User();

    //uncomment bellow code to create user table
    //   $user->create_tables();
      if($_SERVER['REQUEST_METHOD'] =='POST'){
        echo "Admin users";
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
          
          }
      }
      // $id = $id ?? Auth::getId();

      echo "Admin users12";
      //get all data from database
      $data['users'] = $user->findAll();
      
      
    
      $data['errors'] = $user->errors;
      $data['title'] = 'Users';
     
      $this->view('admin-interfaces/admin-users',$data);
    }
    public function update($id = null){

        $user = new User();
        echo "Admin users22";
        if(!Auth::logged_in())
		     {
		        	message('please login to view the admin section');
		 	        redirect('login');
		       }
           echo "Admin user21s";
        $id = $id ?? Auth::getId();
        $data['title'] = 'Update';
        $data['row'] = $row = $user->first(['id'=>$id]);
        show($data['row']);
        if($_SERVER['REQUEST_METHOD'] == "POST" && $row)
        {
		      $user->update($id,$_POST);
          message("User profile Updated successfully created");
          header('Location: admin-interfaces/admin-users');
        } 
        
        $this->view('admin-interfaces/admin-user-update',$data);

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