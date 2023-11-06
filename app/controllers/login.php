<?php

class Login extends Controller{

    
    public function index(){
        
        $data['errors'] = [];
        $data['title'] = 'Login';
        $user = new User();
        
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            
            //validate
            $row = $user->first([
                'username'=>$_POST['username']
            ]);
           
            if($row){
                if(password_verify($_POST['password'],$row->password))
                {
                    //authentication
                    Auth :: authenticate($row);


                    if ($_SESSION['USER_DATA']->role == 'admin') {
                        header('Location: admin');
                    } else if ($_SESSION['USER_DATA']->role == 'dr') {
                        header('Location: dr');
                    } else if ($_SESSION['USER_DATA']->role == 'sar') {
                        header('Location: sar');
                    } else if ($_SESSION['USER_DATA']->role == 'director') {
                        header('Location: director');
                    } else if ($_SESSION['USER_DATA']->role == 'asar') {
                        header('Location: asar');
                    } else if ($_SESSION['USER_DATA']->role == 'clerk') {
                        header('Location: clerk');
                    } else {
                        header('Location: login');
                    }

            
                    // redirect('home');
                    // header('Location: admin/adduser');
                }
            }
            
            $data['errors']['username'] = 'Wrong username or password';
        }
        
        
        $this->view('common/login/login',$data);
        
}
}

?>