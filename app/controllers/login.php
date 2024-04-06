<?php

class Login extends Controller
{


    public function index()
    {

        $data['errors'] = [];
        $data['title'] = 'Login';
        $user = new User();
        
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            //validate
            $row = $user->first([
                'username' => $_POST['username']
            ]);
            
            if ($row) {
                if (password_verify($_POST['password'], $row->password)) {
                    //authentication
                    Auth::authenticate($row);
                    show($_SESSION['USER_DATA']);

                    if ($_SESSION['USER_DATA']->role == 'admin') {
                        if ($_SESSION['USER_DATA']->status == 'initial') {

                            header('Location:pwdchange');
                        } else {
                            header('Location: admin');
                        }
                    } else if ($_SESSION['USER_DATA']->role == 'dr') {
                        if ($_SESSION['USER_DATA']->status == 'initial') {

                            header('Location:pwdchange');
                        } else {
                            header('Location: dr');
                        }
                    } else if ($_SESSION['USER_DATA']->role == 'sar') {

                        if ($_SESSION['USER_DATA']->status == 'initial') {
                            // $checkUser = true;
                            header('Location:pwdchange');
                        } else {
                            header('Location: sar');
                        }
                    } else if ($_SESSION['USER_DATA']->role == 'director') {
                        if ($_SESSION['USER_DATA']->status == 'initial') {

                            header('Location:pwdchange');
                        } else {
                            header('Location: director');
                        }
                    } else if ($_SESSION['USER_DATA']->role == 'asar') {
                        if ($_SESSION['USER_DATA']->status == 'initial') {

                            header('Location:pwdchange');
                        } else {
                            header('Location: asar');
                        }
                    } else if ($_SESSION['USER_DATA']->role == 'clerk') {
                        if ($_SESSION['USER_DATA']->status == 'initial') {

                            header('Location:pwdchange');
                        } else {
                            header('Location: clerk');
                        }
                    } else {
                        header('Location: login');
                    }


                    // redirect('home');
                    // header('Location: admin/adduser');
                }
            }

            $data['errors']['username'] = 'Wrong username or password';
        }


        $this->view('common/login/login', $data);
    }
}
