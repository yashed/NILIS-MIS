<?php
/**
 * main model class
 */

 class Model extends Database
 {

    protected $table = "";
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
        $query = "insert into " .$this->table;
        
        //add column names and values to the query (impolad function devide data by given character in array)
        $query .= "(".implode(",",$keys) .") values (:".implode(",:", $keys) .")";
   
        // $db = new Database();
        $this->query($query,$data);
        
       //  echo "query = " . $query;
   
       }


 }


?>