<?php

/**
 * users model
 */

 class User extends Model
 {

    public  $errors =[];
    protected $table = 'users';
    protected $allowedColumns =[
        'fname',
        'lname',
        'email',
        'phoneNo',
        'role',
        'password',
        'date',

    ];
    

    //validate input data
    public function validate($data){
      
        $this->errors =[];
 
        if(empty($data['fname'])){
             $this->errors['fname'] = 'A first name is required';

        }
        if(empty($data['lname'])){
             $this->errors['lname'] = 'A last name is required';

        }
        if(empty($data['phoneNo'])){
             $this->errors['phoneNo'] = 'Phone number is required';

        }

        //check email
      
        if(!filter_var($data['email'],FILTER_VALIDATE_EMAIL))
        {
             $this->errors['email'] = 'Email is not valid';

        }else
        {
            if($this->where(['email'=>$data['email']]))
            {
                $this->errors['email'] = 'This email is already exists';
   
           }
        }
        if(empty($this->errors)){
         
            return true;
        }
        return false;
    }

   
 }

?>