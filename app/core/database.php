<?php

/**
 * database calss
 */

class Database {

    private function connect()
    {
        $str = DBDRIVER.":hostname=".DBHOST.";dbname=nilis_db";
       return new PDO($str,DBUSER,DBPASS);

       
       
        
    }
    public function query($query,$data = [],$type = 'object'){
        $con = $this->connect();
       
        $stm = $con->prepare($query);
        if($stm){

          $check= $stm->execute($data);

          if($check){
            
              if($type == 'object'){
                  $type = PDO::FETCH_OBJ;
            }
            else{
                $type = PDO::FETCH_ASSOC;

            }
            $result = $stm->fetchAll($type);

            if(is_array($result) && count($result) > 0)
            {
                return $result;
            }
          }
        }
        return false;
      
    }

    function create_tables(){
        //user table 
        $query = "
        CREATE TABLE IF NOT EXISTS users (
            id int(11) NOT NULL AUTO_INCREMENT,
            fname varchar(50) NOT NULL,
            lname varchar(50) NOT NULL,
            username varchar(20) NOT NULL,
            email varchar(100) NOT NULL,
            phoneNo varchar(12) NOT NULL,
            role varchar(20) NOT NULL,
            password varchar(255) NOT NULL,
            date date DEFAULT NULL,
            PRIMARY KEY (id),
            KEY email (email),
            KEY date (date)
        ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4
        ";
    
        $this->query($query);
        //Degree Table
        $query = "
        CREATE TABLE `degree` (
            `DegreeID` varchar(20) NOT NULL,
            `DegreeType` varchar(50) NOT NULL,
            `DegreeName` text NOT NULL,
            `Duration` int(20) DEFAULT NULL,
            `AcademicYear` int(20) NOT NULL,
            `SubjectID` int(20) NOT NULL,
            `GradeID` int(20) NOT NULL,
            PRIMARY KEY (`DegreeID`),
            UNIQUE KEY `SubjectID` (`SubjectID`,`GradeID`)
           ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci
        ";
    
        $this->query($query);
        //Subject Table
        $query = "
        CREATE TABLE `subject` (
            `SubjectID` varchar(50) NOT NULL,
            `SubjectCode` varchar(50) DEFAULT NULL,
            `SubjectName` text NOT NULL,
            `NoCredits` int(10) NOT NULL,
            PRIMARY KEY (`SubjectID`),
            UNIQUE KEY `SubjectCode` (`SubjectCode`,`SubjectName`) USING HASH
           ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci
        ";
    
        $this->query($query);

        //Grading VAlues Table
        $query = "
        CREATE TABLE `grading values` (
            `GradeID` int(10) NOT NULL,
            `Grade` varchar(5) NOT NULL,
            `Max Marks` int(10) NOT NULL,
            `Min Marks` int(10) NOT NULL,
            `GPV` varchar(20) NOT NULL,
            PRIMARY KEY (`GradeID`),
            UNIQUE KEY `Grade` (`Grade`)
           ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci
        ";
    
        $this->query($query);

        
    }
    function create_student_table(){
        //student table 
        $query = "
        CREATE TABLE IF NOT EXISTS student(
            id int(11) NOT NULL AUTO_INCREMENT,
            Email varchar(40) NOT NULL,
            regNo varchar(40) NOT NULL,
            country varchar(40) NOT NULL,
            indexNo varchar(40) NOT NULL,
            name text NOT NULL,
            nicNo varchar(40) NOT NULL,
            birthdate varchar(40) NOT NULL,
            fax varchar(40) NOT NULL,
            address varchar(100) NOT NULL,
            phoneNo int(20) NOT NULL,
            PRIMARY KEY (id)
        ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4
        ";
        $this->query($query);
    }
}

?>