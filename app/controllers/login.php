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
            // show($row); die;
            if($row){
                
                $status = $row->password === $_POST['password'];
                
                // echo $status;
                if($row->password === $_POST['password'])
                {
                    //authentication
                    $_SESSION['USER_DATA'] = $row;
            
                    // redirect('home');
                    header('Location: admin/adduser');
                }
            }
            
            $data['errors']['username'] = 'Wrong username or password';
        }
        
        
        $this->view('login/login',$data);
        
}
}

?>