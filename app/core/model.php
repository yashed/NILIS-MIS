<?php

/**
 * main model class
 */

class Model extends Database
{

    protected $table = "";
    protected $allowedColumns = [];

    public function insert($data)
    {

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

        // $db = new Database();
        $this->query($query, $data);

        //  echo "query = " . $query;
        return true;
    }

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


    public function update2($id, $data)
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

        //show($query);
        //show($data);

        $this->query($query, $data);
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

    //get first data in the request
    public function first($data)
    {

        $keys = array_keys($data);

        $query = "select * from " . $this->table . " where ";

        foreach ($keys as $key) {

            $query .= $key . "=:" . $key . " && ";
        }

        //trim lasf && and space if there exists
        $query = trim($query, '&& ');

        $query .= " order by id desc limit 1 ";
        //define query to add user data
        $res = $this->query($query, $data);


        if (is_array($res)) {
            return $res[0];
        }

        return false;
    }

    public function delete2($data)
    {
        if ($data['submit']) unset($data['submit']);
        $keys = array_keys($data);

        $query = "delete from " . $this->table . " where ";

        foreach ($keys as $key) {
            $query .= $key . "=:" . $key . " && ";
        }

        $query = trim($query, "&& ");
        $this->query($query, $data);

        return true;
    }
}
