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
               $this->errors['fname'] = 'A first name is required';

          }
          if (empty($data['lname'])) {
               $this->errors['lname'] = 'A last name is required';

          }
          if (empty($data['phoneNo'])) {
               $this->errors['phoneNo'] = 'Phone number is required';
           } elseif (!preg_match("/^[0-9]{10}$/", $data['phoneNo'])) {
               $this->errors['phoneNo'] = 'Phone number must contain exactly 10 digits';
           }

          //check confirm password
          if (empty($data['cpassword']) && !empty($data['newpassword'])) {
               $this->errors['cpassword'] = 'Confirm Password is required';

          } else {
               if ($data['cpassword'] != $data['newpassword']) {
                    $this->errors['password'] = 'Password do not match';

               }

          }

          if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
               $this->errors['email'] = 'Email is not valid';

          }


          if (empty($this->errors)) {

               return true;
          }
          return false;

     }
    
}

     





?>