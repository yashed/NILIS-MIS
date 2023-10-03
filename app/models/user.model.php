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
        if(empty($data['phone'])){
             $this->errors['phone'] = 'Phone number is required';

        }

        //check email
        $query = "select * from users where email = :email limit 1";
        if(!filter_var($data['email'],FILTER_VALIDATE_EMAIL))
        {
             $this->errors['email'] = 'Email is not valid';

        }else
        {
            if($this->query($query,['email'=>$data['email']]))
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