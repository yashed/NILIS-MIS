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
                if(password_verify($_POST['password'],$row->password))
                {
                    //authentication
                    Auth :: authenticate($row);
            
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