<?php
/**
 * main model class
 */

 class Model extends Database 
 {

    protected $table = "";
    public function insert($data){
      
        //remove unwanted column 
        //this is not a serious error , the code is working with this
        echo "No error";
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

       //get all data 
       public function findAll(){

       
        
        $query = "select * from " .$this->table;
        
        //define query to add user data
        $res = $this->query($query);
        
       if(is_array($res))
       {
        return $res;
       }

       return false;
   
       }

       public function where($data){

        $keys = array_keys($data);
        
        $query = "select * from " .$this->table. " where ";
        
        foreach($keys as $key){

            $query .= $key . "=:" . $key . " && ";
        }

        //trim lasf && and space if there exists
        $query = trim($query,'&& '); 
        //define query to add user data
        $res = $this->query($query,$data);
        
       if(is_array($res))
       {
        return $res;
       }

       return false;
   
       }

       //get first data in the request
       public function first($data){

        $keys = array_keys($data);
        
        $query = "select * from " .$this->table. " where ";
        
        foreach($keys as $key){

            $query .= $key . "=:" . $key . " && ";
        }

        //trim lasf && and space if there exists
        $query = trim($query,'&& '); 

        $query.= " order by id desc limit 1 ";
        //define query to add user data
        $res = $this->query($query,$data);
        
        
       if(is_array($res))
       {
        return $res[0];
       }

       return false;
   
       }

    //delete form database
    public function delete($id):bool{
        $query="DELETE FROM ".$this->table." WHERE ".$this->primaryKey."=:id limit 1";
        $this->query($query,['id'=>$id]);
        return true;
    }

       public function update($id,$data)
	{

        //remove unwanted fields
        if(!empty($this->allowedColumns)){

         foreach($data as $key => $value){
             if(!in_array($key,$this->allowedColumns)){
                 unset($data[$key]);
             }
         }

     }

     $keys=array_keys($data);
      
     $query="update ".$this->table." set ";

     foreach($keys as $key){
         $query.=$key."=:".$key.",";
     }
     $query=trim($query,",");
     $query.=" WHERE ".$this->primaryKey."=:id";
    //  unset($data['id']);

    //  print_r($data);
    //  print_r($id);

    //  die;

     //adding id into the array before executing 
    //  show($query);
    // //  $data['id']=$id;
    //  print_r($id);
    //  die;
     // show($data);
     // die;
     //we can call query qithout creating new database instance since we inherit 
     // this class from database class
     $this->query($query,$data);
     // show($query);
     // show($data);
 }



 }


?>