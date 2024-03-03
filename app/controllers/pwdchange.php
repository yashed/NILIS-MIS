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