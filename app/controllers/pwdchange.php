<?php

class pwdchange extends Controller
{



    public function index()
    {
        $user = new User();

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            //validate


            // show($_POST);
            if ($user->validatePassword($_POST)) {
                // $user->update($_SESSION['USER_DATA']->id, $_POST);

                //hash the password
                $password = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);

                //update the user table
                // $userData['id'] = $_SESSION['USER_DATA']->id;
                // $userData['password'] = $password;
                // $userData['status'] = 'active';
                // $userData['cpassword'] = $password;
                // $userData['newpassword'] = $password;
                // $userData['date']->$_SESSION['USER_DATA']->date;
                // $userData['fname']->$_SESSION['USER_DATA']->fname;
                // $userData['lname']->$_SESSION['USER_DATA']->lname;
                // $userData['email']->$_SESSION['USER_DATA']->email;
                // $userData['username']->$_SESSION['USER_DATA']->username;
                // $userData['phoneNo']->$_SESSION['USER_DATA']->phoneNo;
                // $userData['role']->$_SESSION['USER_DATA']->role;

                $user->updateRows(['password' => $password, 'status' => 'active', 'cpassword' => $password, 'newpassword' => $password], ['id' => $_SESSION['USER_DATA']->id]);

                message("Password was successfully updated");

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
                }
            }

        }
        // show($_SESSION['USER_DATA']);
        $data['errors'] = $user->errors;
        $this->view('common/pwdchange/pwdchange', $data);
    }

}
?>