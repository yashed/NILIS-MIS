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
            `DegreeID` varchar(100) NOT NULL,
            `DegreeType` varchar(255) DEFAULT NULL,
            `DegreeName` text NOT NULL,
            `Duration` varchar(100) DEFAULT NULL,
            `AcademicYear` int(11) NOT NULL,
            `SubjectID` varchar(100) DEFAULT NULL,
            `GradeID` int(10) DEFAULT NULL,
            PRIMARY KEY (`DegreeID`(50)),
            UNIQUE KEY `SubjectID` (`SubjectID`),
            UNIQUE KEY `GradeID` (`GradeID`)
           ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci
        ";
    
        $this->query($query);
        //Subject Table


        //Grading VAlues Table
    }
}

?>