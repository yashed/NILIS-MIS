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
    { // Convert object to array if $data is an object
        if (is_object($data)) {
            $data = (array) $data;
        }

        // Check if $data is empty
        if (empty($data)) {
            return false;
        }

        // Check for allowed columns
        if (!empty($this->allowedColumns)) {
            foreach ($data as $key => $value) {
                if (!in_array($key, $this->allowedColumns)) {

                    unset($data[$key]);
                }
            }
        }
        // Get array keys from data
        $keys = array_keys($data);

        //define query to add user data
        $query = "insert into " . $this->table;
        //add column names and values to the query (impolad function devide data by given character in array)
        $query .= "(" . implode(",", $keys) . ") values (:" . implode(",:", $keys) . ")";
        //call query function to execute the query
        // show($query);
        // show($data);
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

    public function findLimit($start = 0, $perPage = 20)
    {
        $start = (int) $start;   // Ensure $start is an integer
        $perPage = (int) $perPage; // Ensure $perPage is an integer

        // Directly include $start and $perPage in the SQL query
        $query = "SELECT * FROM " . $this->table . " LIMIT $start, $perPage";

        // Since LIMIT values are now directly in the query, there's no need to pass them as parameters
        $result = $this->query($query, [], 'object');

        // Check if result is valid and return
        if ($result !== false && count($result) > 0) {
            return $result;
        } else {
            return []; // Return an empty array if no results
        }
    }


    public function find($id)
    {
        $query = "select * from " . $this->table . " WHERE DegreeID = :id";
        $params = [':id' => $id];
        $result = $this->query($query, $params);
        // Check if the query was successful
        if (is_array($result) && !empty($result)) {
            return $result;
        } else {
            return null;
        }
    }

    public function findwhere($where, $id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE {$where} = :id";
        $params = [':id' => $id];
        $result = $this->query($query, $params);
        // Check if the query was successful
        if (is_array($result) && !empty($result)) {
            return $result;
        } else {
            return null;
        }
    }

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

    public function whereOr($data)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE ";

        $conditions = [];

        foreach ($data as $key => $value) {
            if (is_array($value)) {

                $orConditions = [];
                foreach ($value['values'] as $item) {
                    $orConditions[] = $key . "=:" . $key . count($orConditions);
                }
                $conditions[] = "(" . implode(" OR ", $orConditions) . ")";
            } else {
                // Normal conditions, key = value
                $conditions[] = $key . "=:" . $key;
            }
        }

        $query .= implode(" AND ", $conditions);

        // Binding values
        $bindValues = [];
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                foreach ($value['values'] as $index => $item) {
                    $bindValues[$key . $index] = $item;
                }
            } else {
                $bindValues[$key] = $value;
            }
        }

        // show($query);
        show($bindValues);
        // Execute the query
        $res = $this->query($query, $bindValues);

        return is_array($res) ? $res : false;
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

    public function joinWhere($tables, $columns, $conditions, $whereConditions, $group = null, $order = null, $limit = null)
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

        // Add where conditions
        if (!empty($whereConditions)) {
            $query .= " WHERE " . implode(" AND ", $whereConditions);
        }

        // Add order and limit clauses if provided
        if ($order) {
            $query .= " ORDER BY $order";
        }

        if ($order) {
            $query .= " GROUP BY  $group";
        }

        if ($limit) {
            $query .= " LIMIT $limit";
        }
        // show($query);
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

    public function whereSpecificColumn($data, $columns = '*')
    {
        // Ensure $columns is a valid string or array
        if (!is_string($columns) && !is_array($columns)) {
            return false;
        }

        // If $columns is an array, convert it to a comma-separated string
        if (is_array($columns)) {
            $columns = implode(',', $columns);
        }

        $keys = array_keys($data);

        $query = "SELECT $columns FROM " . $this->table . " WHERE ";
        foreach ($keys as $key) {
            $query .= "$key = :$key AND ";
        }

        // Trim last AND and space if they exist
        $query = rtrim($query, 'AND ');

        // Define query to add user data
        $res = $this->query($query, $data);

        if (is_array($res)) {
            return $res;
        }

        return false;
    }


    public function group($column, $conditions = [])
    {
        $query = "SELECT * FROM " . $this->table;

        // Check if conditions are provided
        if (!empty($conditions)) {
            $query .= " WHERE ";
            $conditionsString = "";
            foreach ($conditions as $key => $value) {
                $conditionsString .= $key . "=:" . $key . " AND ";
            }
            $conditionsString = rtrim($conditionsString, " AND ");
            $query .= $conditionsString;
        }
        $query .= " GROUP BY " . $column;
        // Execute the query
        $res = $this->query($query, $conditions);

        if (is_array($res)) {
            return $res;
        }

        return false;
    }


    //get the count that match the conditions
    public function count($data)
    {
        $keys = array_keys($data);

        $query = "SELECT COUNT(*) AS ExamParticipants FROM " . $this->table . " WHERE ";
        foreach ($keys as $key) {
            $query .= $key . "=:" . $key . " && ";
        }
        // Trim last AND and space if there exist
        $query = trim($query, '&& ');

        // Execute the query
        $result = $this->query($query, $data);

        // If the query executed successfully and returned a result
        if ($result !== false) {
            return $result;
        }

        return 0; // Return 0 if there are no records or an error occurred
    }

    //get newly added column id 
    public function lastID($primaryKey = 'id')
    {
        $query = "SELECT MAX($primaryKey) AS lastID FROM " . $this->table;
        // show($query);
        $result = $this->query($query);
        // show($result);
        if ($result !== false) {
            // Check if the result is an array or object
            // show($result);
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

        show($query);
        $this->query($query, $data);

        return true;
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
        // show($query);
        return true;
    }

    public function updateRows($setConditions, $whereConditions)
    {
        // Generate SET part of the query
        $setPart = '';
        foreach ($setConditions as $key => $value) {
            $setPart .= "{$key}=:$key,";
        }
        $setPart = rtrim($setPart, ',');

        // Generate WHERE part of the query
        $wherePart = '';
        foreach ($whereConditions as $key => $value) {
            $wherePart .= " {$key}=:$key AND";
        }
        $wherePart = rtrim($wherePart, 'AND');

        // Construct the final query
        $query = "UPDATE {$this->table} SET {$setPart} WHERE {$wherePart}";

        // Merge set and where conditions
        $data = array_merge($setConditions, $whereConditions);

        // Execute the query
        // show($query);
        $this->query($query, $data);
    }
    public function generateIndexRegNumber($degreeShortName, $currentYear)
    {
        $query = "SELECT MAX(CAST(SUBSTRING_INDEX(student.indexNo, '/', -1) AS UNSIGNED)) AS max_index_number
        FROM student
        JOIN degree ON student.degreeID = degree.DegreeID
        WHERE degree.DegreeShortName = ?";
        $data = [$degreeShortName]; // Data to be bound to the query
        $result = $this->query($query, $data);

        if ($result && isset($result[0]->max_index_number)) {
            $maxIndexNumber = $result[0]->max_index_number;
        } else {
            $maxIndexNumber = 0;
        }
        // Increment the last number and generate index and registration numbers
        $nextNumber = $maxIndexNumber + 1;
        $IndexNo = $degreeShortName . '/' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
        $RegistationNo = $degreeShortName . '/' . $currentYear . '/' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
        // Return the generated numbers
        $data = [
            'IndexNo' => $IndexNo,
            'RegistationNo' => $RegistationNo
        ];
        return $data;
    }

    public function findByID($id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE DegreeID = :id";
        $params = array(':id' => $id);
        $res = $this->query($query, $params);

        if ($res && count($res) > 0) {
            return $res[0]; // Return the first row if there is a result
        } else {
            return false;
        }
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
    function getDistinctElements($array1, $array2, $key)
    {
        // Combine arrays (even if one is null)
        $data = array_merge((array) $array1, (array) $array2);

        // Ensure $data is an array
        if (!is_array($data)) {
            return [];
        }

        // Initialize empty result array
        $result = [];

        // Iterate through each object in the combined data
        foreach ($data as $object) {
            // Check if key exists and is allowed
            if (isset($object->$key) && in_array($key, $this->allowedColumns)) {
                // Extract value of the key
                $value = $object->$key;

                // Check if value is already present using efficient isset and === comparison
                if (!isset($result[$value])) {
                    // Extract only allowed properties and create a new array
                    $allowedItem = [];
                    foreach ($this->allowedColumns as $column) {
                        if (isset($object->$column)) {
                            $allowedItem[$column] = $object->$column;
                        }
                    }
                    $result[$value] = $allowedItem;
                }
            }
        }

        // Return the result as an array of arrays
        return array_values($result);
    }



}
