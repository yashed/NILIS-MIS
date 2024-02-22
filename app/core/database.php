<?php

/**
 * database calss
 */

class Database
{

    private function connect()
    {
        $str = DBDRIVER . ":hostname=" . DBHOST . ";dbname=" . DBNAME;
        return new PDO($str, DBUSER, DBPASS);
    }
    public function query($query, $data = [], $type = 'object')
    {
        $con = $this->connect();
        $stm = $con->prepare($query);
        if ($stm) {
            $check = $stm->execute($data);
            if ($check) {

                if ($type == 'object') {
                    $type = PDO::FETCH_OBJ;
                } else {
                    $type = PDO::FETCH_ASSOC;
                }
                $result = $stm->fetchAll($type);

                if (is_array($result) && count($result) > 0) {
                    return $result;
                }
            }
        }
        return false;
    }

    function create_tables()
    {
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
            cpassword varchar(255) NOT NULL,
            newpassword varchar(255) NOT NULL,
            date date DEFAULT NULL,
            PRIMARY KEY (id),
            KEY email (email),
            KEY date (date)
        ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4
        ";

        //remove SubjectID and GradeID
        $this->query($query);
        //Degree Table
        $query = "
    CREATE TABLE IF NOT EXISTS `degree` (
        `DegreeID` int(11) NOT NULL AUTO_INCREMENT,
        `DegreeType` varchar(50) NOT NULL,
        `DegreeShortName` varchar(50) NOT NULL,
        `DegreeName` text NOT NULL,
        `Duration` int(20) NULL,
        `AcademicYear` int(20) NOT NULL,
        PRIMARY KEY (`DegreeID`),
        UNIQUE KEY `DegreeID` (`DegreeID`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci
    ";

        $this->query($query);
        //Subject Table
        $query = "
        CREATE TABLE IF NOT EXISTS `subject` (
            `SubjectID` int(11) NOT NULL AUTO_INCREMENT,
            `SubjectCode` varchar(50) NOT NULL,
            `SubjectName` text NOT NULL,
            `NoCredits` int(10) NOT NULL,
            `DegreeID` int(11) NOT NULL,
            `semester` int(10) NOT NULL,
            FOREIGN KEY (DegreeID) REFERENCES degree(DegreeID),
            PRIMARY KEY (`SubjectID`),
            UNIQUE KEY `SubjectCode` (`SubjectCode`) 
           ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci
        ";

        $this->query($query);

        //Grading Values Table
        $query = "
        CREATE TABLE IF NOT EXISTS `grading_values` (
            `GradeID` int(11) NOT NULL AUTO_INCREMENT,
            `DegreeID` int(11) NOT NULL,
            `Grade` varchar(5) NOT NULL,
            `MaxMarks` int(10) NOT NULL,
            `MinMarks` int(10) NOT NULL,
            `GPV` varchar(20) NOT NULL,
            PRIMARY KEY (`GradeID`),
            FOREIGN KEY (DegreeID) REFERENCES degree(DegreeID),
            UNIQUE KEY `Grade` (`Grade`)
           ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci
        ";

        $this->query($query);
        //Degree Time table table
        $query = "
        CREATE TABLE IF NOT EXISTS `degree_timetable` (
            `EventID` INT NOT NULL AUTO_INCREMENT,
            `DegreeID` int(11) NOT NULL,
            `EventName` VARCHAR(50) NOT NULL,
            `EventType` VARCHAR(30) NOT NULL,
            `StartingDate` DATE NOT NULL,
            `EndingDate` DATE NOT NULL,
            PRIMARY KEY (`EventID`,`DegreeID`),
            KEY `DegreeID` (`DegreeID`),
            CONSTRAINT `degree_timetable_ibfk_1` FOREIGN KEY (`DegreeID`) REFERENCES `degree` (`DegreeID`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci
        ";
        $this->query($query);
        //student Table
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
            whatsappNo int(12) NOT NULL,
            address varchar(100) NOT NULL,
            phoneNo int(20) NOT NULL,
            degreeID INT(11) NOT NULL,
            PRIMARY KEY (id),
            UNIQUE KEY `indexNo` (`indexNo`),
            FOREIGN KEY (degreeID) references degree(DegreeID)
        ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4
        ";
        $this->query($query);

        //Exam Tables
        //exam table
        $query = "
        CREATE TABLE IF NOT EXISTS exam(
            examID int(11) AUTO_INCREMENT,
            examType varchar(20) NOT NULL ,
            degreeID  INT(11) NOT NULL,
            semester INT(10) NOT NULL,
            status varchar(30) NOT NULL,
            FOREIGN KEY (degreeID) references degree(DegreeID),
            PRIMARY KEY (examID)
            ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4
        
        ";

        $this->query($query);
        //exam participation table
        $query = "
        CREATE TABLE IF NOT EXISTS exam_participants (
            id INT AUTO_INCREMENT PRIMARY KEY,
            examID int(11) NOT NULL,
            degreeID INT(11) NOT NULL,
            semester INT(10) NOT NULL,
            indexNo VARCHAR(40) NOT NULL,
            attempt INT(10) NOT NULL,
            studentType VARCHAR(40) NOT NULL,
            FOREIGN KEY (degreeID) REFERENCES degree(DegreeID),
            FOREIGN KEY (indexNo) REFERENCES student(indexNo),
            FOREIGN KEY (examID) REFERENCES exam(examID),
            UNIQUE KEY unique_participant (degreeID, semester, indexNo)
        ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4; 
        ";

        $this->query($query);

        $query = "
        CREATE TABLE IF NOT EXISTS medical_students (
            id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            examID int(11) NOT NULL,
            degreeID int(11) NOT NULL,
            semester int(10) NOT NULL,
            indexNo varchar(40) NOT NULL,
            subjectCode varchar(50) NOT NULL,
            attempt int(10) NOT NULL,
            status boolean NOT NULL DEFAULT 0,
            FOREIGN KEY (degreeID) REFERENCES degree(DegreeID),
            FOREIGN KEY (indexNo) REFERENCES student(indexNo),
            FOREIGN KEY (examID) REFERENCES exam(examID),
            FOREIGN KEY (subjectCode) REFERENCES subject(SubjectCode)
        ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci; ";

        $this->query($query);

        $query = "
     CREATE TABLE IF NOT EXISTS repeat_students(
        id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        degreeID int(11) NOT NULL,
        examID int(11) NOT NULL,
        semester int(10) NOT NULL,
        indexNo varchar(40) NOT NULL,
        subjectCode varchar(50) NOT NULL,
        attempt int(10) NOT NULL,
        paymentStatus boolean NOT NULL DEFAULT 0,
        FOREIGN KEY (degreeID) REFERENCES degree(DegreeID),
        FOREIGN KEY (indexNo) REFERENCES student(indexNo),
        FOREIGN KEY (subjectCode) REFERENCES subject(SubjectCode),
        FOREIGN KEY (examID) REFERENCES exam(examID)
     ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4
     ";
        $this->query($query);


        $query = "
 CREATE TABLE IF NOT EXISTS exam_timetable(
    subjectCode varchar(50) NOT NULL,
    examID int(11) NOT NULL,
    subjectName varchar(50) NOT NULL,
    date date NOT NULL,
    time time NOT NULL,
    degreeID int(11) NOT NULL,
    semester int(10) NOT NULL,
    FOREIGN KEY (degreeID) REFERENCES degree(DegreeID),
    Foreign key (examID) references exam(examID),
    FOREIGN KEY (subjectCode) REFERENCES subject(SubjectCode),
    primary key (subjectCode, degreeID, semester)
 ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4
 ";
        $this->query($query);


        $query = "
        CREATE TABLE IF NOT EXISTS `mark_sheets` (
            `Id` int(11) NOT NULL AUTO_INCREMENT,
            `uploadName` varchar(50) NOT NULL,
            `newName` varchar(50) NOT NULL,
            `formId` varchar(20) NOT NULL,
            `subjectCode` varchar(50) NOT NULL,
            `type` varchar(30) NOT NULL,
            `examId` int(11) NOT NULL,
            `date` date NOT NULL,
            PRIMARY KEY (`Id`),
            Foreign key (examId) references exam(examID),
            FOREIGN KEY (subjectCode) REFERENCES subject(SubjectCode)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci
        ";

        $this->query($query);

        $query = "
        CREATE TABLE IF NOT EXISTS `marks` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `studentIndexNo` varchar(40) NOT NULL,
            `subjectCode` varchar(50) NOT NULL,
            `examID` int(11) NOT NULL,
            `examiner1Marks` int(10) DEFAULT NULL,
            `examiner2Marks` int(10) DEFAULT NULL,
            `examiner3Marks` int(10) DEFAULT NULL,
            `assessmentMarks` int(10) DEFAULT NULL,
            PRIMARY KEY (`id`),
            FOREIGN KEY (`studentIndexNo`) REFERENCES `student` (`indexNo`),
            FOREIGN KEY (`subjectCode`) REFERENCES `subject` (`SubjectCode`),
            FOREIGN KEY (`examID`) REFERENCES `exam` (`examID`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
        ";

        $this->query($query);


        $query = "
        CREATE TABLE IF NOT EXISTS `attempts` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `studentIndexNo` varchar(40) NOT NULL,
            `subjectCode` varchar(50) NOT NULL,
            `examID` int(11) NOT NULL,
            `attempts` int(10) DEFAULT NULL,
            PRIMARY KEY (`id`),
            FOREIGN KEY (`studentIndexNo`) REFERENCES `student` (`indexNo`),
            FOREIGN KEY (`subjectCode`) REFERENCES `subject` (`SubjectCode`),
            FOREIGN KEY (`examID`) REFERENCES `exam` (`examID`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
        ";

        $this->query($query);


        $query = "
        CREATE TABLE IF NOT EXISTS `final_marks` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `studentIndexNo` varchar(40) NOT NULL,
            `subjectCode` varchar(50) NOT NULL,
            `examID` int(11) NOT NULL,
            `degreeID` int(11) NOT NULL,
            `finalMarks` int(10) DEFAULT NULL,
            `grade` varchar(10) DEFAULT NULL,
            PRIMARY KEY (`id`),
            FOREIGN KEY (`studentIndexNo`) REFERENCES `student` (`indexNo`),
            FOREIGN KEY (`degreeID`) REFERENCES `degree` (`DegreeID`),
            FOREIGN KEY (`subjectCode`) REFERENCES `subject` (`SubjectCode`),
            FOREIGN KEY (`examID`) REFERENCES `exam` (`examID`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
        ";

        $this->query($query);

        $query = "
        CREATE TABLE IF NOT EXISTS `activity` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `user` varchar(40) NOT NULL,
            `discription` varchar(500) NOT NULL,
            `date` date NOT NULL,
            `time` TIME NOT NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
        ";

        $this->query($query);


        $query = "
        CREATE TABLE IF NOT EXISTS `index_token` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `indexNo` varchar(40) NOT NULL,
            `examID` int(11) NOT NULL,
            `token` varchar(255) NOT NULL,
            PRIMARY KEY (`id`),
            FOREIGN KEY (`indexNo`) REFERENCES `exam_participants` (`indexNo`),
            FOREIGN KEY (`examID`) REFERENCES `exam` (`examID`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
            ";

        $this->query($query);

        $query="
        CREATE TABLE IF NOT EXISTS `notifications` (
            `notify_id` int(11) NOT NULL,
            `description` varchar(255) NOT NULL,
            `type` varchar(50) NOT NULL,
            `msg_type` varchar(100) NOT NULL
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
           "; 
           $this->query($query);

            }

    public function create_procedure()
    {
        // Procedure creation query
        $query = "
        CREATE PROCEDURE IF NOT EXISTS `InsertNotification`()
        BEGIN
            DECLARE currentDate DATE;
            DECLARE eventStartDate DATE;
            DECLARE userId INT;
            DECLARE daysRemaining INT;
            DECLARE degreeName TEXT; -- Specify the length for VARCHAR
    
            DECLARE str1 VARCHAR(255); -- Declare variables for string concatenation
            DECLARE str2 VARCHAR(255);
    
            DECLARE eventCursor CURSOR FOR
                SELECT dt.StartingDate, d.DegreeName
                FROM degree_timetable AS dt
                JOIN degree AS d ON dt.DegreeID = d.DegreeID;
    
            -- Set the current date
            SET currentDate = CURDATE();
    
            OPEN eventCursor;
    
            read_loop: LOOP
                FETCH eventCursor INTO eventStartDate, degreeName;
                IF eventStartDate IS NULL THEN
                    LEAVE read_loop;
                END IF;
    
                -- Calculate the days remaining
                SET daysRemaining = DATEDIFF(eventStartDate, currentDate);
    
                -- Check if days remaining is less than or equal to 14 and greater than 0
                IF (daysRemaining <= 14 AND daysRemaining > 0) THEN
                   -- Construct notification message
                    SET str1 = CONCAT('There will be an upcoming examination scheduled on ', eventStartDate);
                    SET str2 = CONCAT(' for the diploma ', degreeName, ' examination');
    
                    -- Print concatenated strings to console (optional)
                    -- SELECT CONCAT(str1, str2);
    
                    -- Insert record into notifications table
                    INSERT INTO notifications (description, type, msg_type)
                    VALUES (CONCAT(str1, str2), 'Examination', 'msg1');
                END IF;
            END LOOP;
    
            CLOSE eventCursor;
        END;
        ";
    
        // Execute the procedure creation query
        $this->query($query);
    }

    public function create_event()
    {
        // Event creation query
        $query = "
        CREATE EVENT IF NOT EXISTS `daily_event` 
        ON SCHEDULE EVERY 30 MINUTE STARTS '2024-02-20 08:34:00' 
        ON COMPLETION NOT PRESERVE ENABLE 
        DO 
            CALL InsertNotification();
        ";

        // Execute the event creation query
        $this->query($query);
    }
    
}
