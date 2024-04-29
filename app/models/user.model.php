<?php

/**
 * users model
 */

class User extends Model
{

     public $errors = [];
     protected $table = 'users';
     protected $allowedColumns = [
          'fname',
          'lname',
          'email',
          'username',
          'phoneNo',
          'role',
          'password',
          'date',
          'cpassword',
          'newpassword',
          'status'

     ];


     //validate input data
     public function validate($data)
     {

          $this->errors = [];

          if (empty($data['fname'])) {
               $this->errors['fname'] = 'A first name is required';

          }
          if (empty($data['lname'])) {
               $this->errors['lname'] = 'A last name is required';

          }
          if (empty($data['phoneNo'])) {
               $this->errors['phoneNo'] = 'Phone number is required';

          }
          //validate phone number
          // Validate phone number
          if (empty($data['phoneNo'])) {
               $this->errors['phoneNo'] = 'Phone number is required';
          } elseif (!preg_match('/^\d{10}$/', $data['phoneNo'])) {
               $this->errors['phoneNo'] = 'Phone number must be exactly 10 digits';
          }


          //check confirm password
          if (empty($data['cpassword']) && !empty($data['newpassword'])) {
               $this->errors['cpassword'] = 'Confirm Password is required';

          } else {
               if ($data['cpassword'] != $data['newpassword']) {
                    $this->errors['password'] = 'Password do not match';

               }

          }

          //check username
          if (empty($data['username'])) {
               $this->errors['username'] = 'Username is required';

          } else {
               if ($this->where2(['username' => $data['username']])) {
                    $this->errors['username'] = 'This Username is already exists';

               }

          }

          //check email

          if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
               $this->errors['email'] = 'Email is not valid';

          } else {
               if ($this->where2(['email' => $data['email']])) {
                    $this->errors['email'] = 'This email is already exists';

               }
          }


          if (empty($this->errors)) {

               return true;
          }
          return false;
     }

     public function validateUpdate($data)
     {

          $this->errors = [];

          if (empty($data['fname'])) {
               $this->errors['u-fname'] = 'A first name is required';

          }
          if (empty($data['lname'])) {
               $this->errors['u-lname'] = 'A last name is required';

          }
          if (empty($data['phoneNo'])) {
               $this->errors['u-phoneNo'] = 'Phone number is required';

          }
          // Validate phone number
          if (empty($data['phoneNo'])) {
               $this->errors['u-phoneNo'] = 'Phone number is required';
          } elseif (!preg_match('/^\d{10}$/', $data['phoneNo'])) {
               $this->errors['u-phoneNo'] = 'Phone number must be exactly 10 digits';
          }


          if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
               $this->errors['u-email'] = 'Email is not valid';

          } else {
               //get user mail
               $mail = $this->whereSpecificColumn(['id' => $data['id']], 'email');
               if (!empty($mail)) {
                    if ($mail[0]->email != $data['email']) {
                         if ($this->where2(['email' => $data['email']])) {
                              $this->errors['u-email'] = 'This email is already exists';

                         }
                    }
               }
          }


          if (empty($this->errors)) {

               return true;
          }
          return false;

     }

     public function validatePassword($data)
     {

          $this->errors = [];

          if (!empty($data)) {
               if (empty($data['newPassword'])) {
                    $this->errors['newPassword'] = 'New Password is required';
               } elseif (strlen($data['newPassword']) < 8) {
                    $this->errors['newPassword'] = 'Password must be at least 8 characters long';
               }

               if (empty($data['Cpassword'])) {
                    $this->errors['cpassword'] = 'Confirm Password is required';
               } elseif ($data['Cpassword'] != $data['newPassword']) {
                    $this->errors['cpassword'] = 'Password do not match';
               }

               // Check if the password is the same as the existing password
               if (isset($_SESSION['USER_DATA']) && password_verify($data['newPassword'], $_SESSION['USER_DATA']->password)) {
                    $this->errors['newPassword'] = 'New Password is the same as the existing password';
               }

               if (empty($this->errors)) {
                    return true;
               }
          }
          return false;
     }
}
?>