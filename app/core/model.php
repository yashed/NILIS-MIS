<?php

/**
 * main model class
 */

class Model extends Database
{
    protected $table = "";
    protected $primaryKey = "";
    protected $allowedColumns = [];

    public function insert($data)
    {

        // Convert object to array if $data is an object
        if (is_object($data)) {
            $data = (array) $data;
        }


        //remove unwanted column 
        //this is not a serious error , the code is working with this
        //secho "No error";

        if (!empty($this->allowedColumns)) {

            foreach ($data as $key => $value) {
                if (!in_array($key, $this->allowedColumns)) {
                    unset($data[$key]);
                }
            }
        }

        //get array keys from data
        $keys = array_keys($data);

        //define query to add user data
        $query = "insert into " . $this->table;

        //add column names and values to the query (impolad function devide data by given character in array)
        $query .= "(" . implode(",", $keys) . ") values (:" . implode(",:", $keys) . ")";
        show($query);

        //call query function to execute the query
        $this->query($query, $data);

        return true;
    }
    /* public function insert($data)
    {
        //remove unwanted columns
        if(!empty($this->allowedColumns))
        {
            foreach ($data as $key => $value) {
                if(!in_array($key, $this->allowedColumns))
                {
                    unset($data[$key]);
                }
            }
        }

        $keys = array_keys($data);

        $query = "insert into " . $this->table;
        $query .= " (".implode(",", $keys) .") values (:".implode(",:", $keys) .")";

        $this->query($query,$data);

    } */

    //get all data 
    public function findAll()
    {

        $query = "select * from " . $this->table;

        //define query to add user data
        $res = $this->query($query);

        if (is_array($res)) {
            return $res;
        }

        return false;
    }
    /* public function findAll($order = 'desc')
    {

        $query = "select * from ".$this->table;
 
        $res = $this->query($query);

        if(is_array($res))
        {
            return $res;
        }

        return false;

    } */

    public function setid($id)
    {

        $query = 'set @id =' . $id . ';' . 'UPDATE ' . $this->table . ' SET id = (@id := @id + 1);';
        $this->query($query);
    }
    public function update($id, $data)
    {

        //remove unwanted columns
        if (!empty($this->allowedColumns)) {
            foreach ($data as $key => $value) {
                if (!in_array($key, $this->allowedColumns)) {
                    unset($data[$key]);
                }
            }
        }

        $keys = array_keys($data);
        $query = "update " . $this->table . " set ";

        foreach ($keys as $key) {
            $query .= $key . "=:" . $key . ",";
        }

        $query = trim($query, ",");
        $query .= " where id = :id ";

        $data['id'] = $id;
        $this->query($query, $data);
    }

    public function update2($id, $data)
    {
        show($id);
        //remove unwanted colmns
        if (!empty($this->allowedColumns)) {
            foreach ($data as $key => $value) {
                if (!in_array($key, $this->allowedColumns)) {
                    unset($data[$key]);
                }
            }
        }
    }

    public function where2($data)
    {

        $keys = array_keys($data);

        $query = "select * from " . $this->table . " where ";

        foreach ($keys as $key) {
            $query .= $key . "=:" . $key . " && ";
        }

        $query = trim($query, "&& ");
        $res = $this->query($query, $data);

        if (is_array($res)) {
            return $res;
        }

        return false;
    }

    public function join($tables, $columns, $conditions, $order = null, $limit = null)
    {
        // Build the query
        $query = "SELECT " . implode(", ", $columns) . " FROM " . $this->table;

        foreach ($tables as $table) {
            $query .= " JOIN $table";
        }

        // Add conditions
        if (!empty($conditions)) {
            $query .= " ON " . implode(" AND ", $conditions);
        }

        // Add order and limit clauses if provided
        if ($order) {
            $query .= " ORDER BY $order";
        }

        if ($limit) {
            $query .= " LIMIT $limit";
        }

        // Execute the query
        return $this->query($query);
    }

    public function first($data, $order = 'desc')
    {

        $keys = array_keys($data);

        $query = "select * from " . $this->table . " where ";

        foreach ($keys as $key) {
            $query .= $key . "=:" . $key . " && ";
        }

        $query = trim($query, "&& ");
        $query .= " order by id $order limit 1";

        $res = $this->query($query, $data);

        if (is_array($res)) {
            return $res[0];
        }

        return false;
    }

    //get newly added column id 
    public function lastID($primaryKey = 'id')
    {
        $query = "SELECT MAX($primaryKey) AS lastID FROM " . $this->table;
        show($query);
        $result = $this->query($query);
        show($result);
        if ($result !== false) {
            // Check if the result is an array or object
            show($result);
            if (is_array($result)) {
                return $result[0]->lastID;
            }
        }

        return null;
    }


    // public function delete($data, $order = 'desc')
    // {
    //     // var_dump($_POST);
    //     if($this->coachModel->deleteCoach($_POST["submit"]) && $this->coachUserModel->deleteUser($_POST["submit"])) {
    //         die("User Deleted Successfully");
    //         // redirect("Users/register");
    //     }else{
    //         die("Something Went Wrong");
    //     }
    // }

    public function delete($data)
    {
        $keys = array_keys($data);

        $query = "delete from " . $this->table . " where ";

        foreach ($keys as $key) {
            $query .= $key . "=:" . $key . " && ";
        }

        $query = trim($query, "&& ");
        $this->query($query, $data);

        return true;
    }


    public function where($data)
    {

        $keys = array_keys($data);

        $query = "select * from " . $this->table . " where ";
        foreach ($keys as $key) {

            $query .= $key . "=:" . $key . " && ";
        }

        //trim lasf && and space if there exists
        $query = trim($query, '&& ');
        //define query to add user data
        $res = $this->query($query, $data);
        if (is_array($res)) {
            return $res;
        }

        return false;
    }

    public function delete2($data)
    {
        if ($data['submit'])
            unset($data['submit']);
        $keys = array_keys($data);

        $query = "delete from " . $this->table . " where ";

        foreach ($keys as $key) {
            $query .= $key . "=:" . $key . " && ";
        }

        $query = trim($query, "&& ");
        $this->query($query, $data);

        return true;
    }

    /*    public function update($id,$data)
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
 } */
}