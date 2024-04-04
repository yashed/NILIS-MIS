<?php

class pwdchange extends Controller
{

    function __construct()
    {
        if ($_SESSION['USER_DATA']->status == 'active') {
            // Redirect the user to the appropriate page
            redirect($_SESSION['USER_DATA']->role);
        }
    }
    public function index()
    {
        //prevent loding this page to password changed users

        $user = new User();

        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            //validate
            // show($_POST);
            if ($user->validatePassword($_POST)) {
                // $user->update($_SESSION['USER_DATA']->id, $_POST);

                //hash the password
                $password = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);

                //update the user password
                $user->updateRows(['password' => $password, 'status' => 'active', 'cpassword' => $password, 'newpassword' => $password], ['id' => $_SESSION['USER_DATA']->id]);
                $userData = $user->first([
                    'id' => $_POST['id']
                ]);

                //authentication
                Auth::authenticate($userData);

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