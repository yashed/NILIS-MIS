<?php

/**
 * users model
 */

 class User
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
        if(empty($data['email'])){
             $this->errors['email'] = 'email is required';

        }
        if(empty($this->errors)){
         
            return true;
        }
        return false;
    }

    public function insert($data){
       
     //remove unwanted column
     if(!empty($this->allowedColumns))
     {
      foreach($data as $key => $value);
      {
        if(!in_array($key,$this->allowedColumns))
        {
            unset($data[$key]);
        }
      }
     }
    
     //get array keys from data
     $keys=array_keys($data);
      
     //define query to add user data
     $query = "insert into users ";
     //add column names and values to the query (impolad function devide data by given character in array)
     $query .= "(".implode(",",$keys) .") values (:".implode(",:", $keys) .")";

     $db = new Database();
     $db->query($query,$data);
     
    //  echo "query = " . $query;

    }
 }

?>