<?php

function reloadPageOnce()
{

    if (!isset($_SESSION['page_reloaded'])) {
        // Set the session variable to indicate that the page has been reloaded
        $_SESSION['page_reloaded'] = true;

        // Reload the page using PHP
        header("Refresh:0");
        exit();
    }
}

function show($stuff)
{
    echo "<pre>";
    print_r($stuff);
    echo "</pre>";
}

function set_value($key)
{

    if (!empty($_POST[$key])) {
        return $_POST[$key];
    }

    return '';
}

function redirect($link)
{
    header("Location:" . ROOT . "" . $link);
    die();

}

function redirect_blank($link)
{
    echo "<script>window.open('" . ROOT . $link . "', '_blank')</script>";
    die();
}

//using this function we can pass msg to frontend using SESSION
function message($msg = '', $type = 'success', $erase = false)
{
    if (!empty($msg)) {
        $_SESSION['message'] = $msg;
        $_SESSION['message_type'] = $type;
    } else {
        if (!empty($_SESSION['message'])) {
            $msg = $_SESSION['message'];
            if ($erase) {
                unset($_SESSION['message']);
            }
            return $msg;
        }
    }

    return false;
}

function getBestMarks($data, $attribute)
{
    $result = [];

    foreach ($data as $subjectCode => $records) {
        $maxMark = -1;
        $bestRecord = null;

        foreach ($records as $record) {
            if ($record->$attribute > $maxMark) {
                $maxMark = $record->$attribute;
                $bestRecord = $record;
            }
        }

        if ($bestRecord !== null) {
            $result[$subjectCode] = [$bestRecord];
        }
    }

    return $result;
}

function calculateGPA($marksArray, $gradesArray, $subjectCodesArray)
{
    // Initialize variables for GPA calculation
    $totalCredits = 0;
    $totalGradePoints = 0;

    // Iterate through each subject code
    foreach ($subjectCodesArray as $subject) {
        $subjectCode = $subject->SubjectCode;

        // Check if marks are available for this subject
        if (isset($marksArray[$subjectCode])) {
            // Retrieve marks for this subject
            $subjectMarks = $marksArray[$subjectCode][0];

            // Retrieve credits for this subject
            $credits = $subjectMarks->NoCredits;

            // Retrieve grade for this subject
            $grade = $subjectMarks->grade;

            // Find GPV for this grade
            $gpv = 0;
            foreach ($gradesArray as $gradeInfo) {
                if ($gradeInfo->Grade === $grade) {
                    $gpv = $gradeInfo->GPV;
                    break;
                }
            }

            // Calculate grade points for this subject
            $gradePoints = $gpv * $credits;

            // Add to total grade points and total credits
            $totalGradePoints += $gradePoints;
            $totalCredits += $credits;
        } else {
            // If marks are not available, consider credits as 0
            $totalCredits += 0;
        }
    }

    // Calculate GPA
    if ($totalCredits > 0) {
        $gpa = $totalGradePoints / $totalCredits;
        return $gpa;
    } else {
        return 0; // Handle division by zero error
    }
}
function groupByColumn($data, $columnName)
{
    // Check if $data is not an array or if it's empty
    if (!is_array($data) || empty($data)) {
        return [];
    }

    $groupedData = [];

    // Iterate through the input data
    foreach ($data as $item) {
        // Get the value of the specified column for grouping
        $columnValue = $item->{$columnName};

        // Check if the column value key exists in the grouped data array
        if (!array_key_exists($columnValue, $groupedData)) {
            // If not, initialize an empty array for that column value
            $groupedData[$columnValue] = [];
        }

        // Add the item to the array under the respective column value key
        $groupedData[$columnValue][] = $item;
    }

    return $groupedData;
}


function createMarkSheet($inputCSV, $examID, $subCode, $type)
{
    $examiner3 = false;
    $filePath = 'assets/csv/examsheets/final-marksheets';
    $markSheet = $filePath . '/' . $examID . '_' . $subCode . '.csv';

    // Check if the directory exists, create it if not
    if (!is_dir($filePath)) {
        mkdir($filePath, 0777, true);
    }

    // Check if marksheet already exists
    if (file_exists($markSheet)) {
        // Open file to do modifications
        $f = fopen($markSheet, 'a');

        //add column if examiner 3
        if ($type == 'examiner3') {

            $examiner3 = true;
            $egnoreLines = file($markSheet, FILE_IGNORE_NEW_LINES);
            $egnoreLines[3] = '"Index No","Registration No","Examiner 01 Mark","Examiner 02 Marks","Assignment Marks","Examiner 03 Marks" ';
            // Write the modified content 
            file_put_contents($markSheet, implode("\n", $egnoreLines));
        }


        // Perform your modifications here if needed
        $content = file_get_contents('assets/csv/examsheets/' . $inputCSV);
        $lines = explode("\n", $content);

        //read the content form existing marks sheet
        $subjectContent = file_get_contents($markSheet);
        $subjectLines = explode("\n", $subjectContent);




        for ($i = 4; $i < count($lines); $i++) {
            // Split each line into an array of values
            $values = str_getcsv($lines[$i]);

            $inputIndex = $values[0];
            $inputRegNo = $values[1];
            $examiner1Mark = $values[2];
            // var_dump('examiner 1 mark = ' . $examiner1Mark . 'index = ' . $inputIndex . 'reg no = ' . $inputRegNo);
            $examiner2Mark = $values[3];
            $assignmentMark = $values[4];

            //check the examiner 3 is there or not
            if ($examiner3) {
                $examiner3Mark = $values[5];
            }

            for ($j = 4; $j < count($subjectLines); $j++) {
                $subjectValues = str_getcsv($subjectLines[$j]);

                //get index and reg no from subject marks sheet
                $subjectIndexNo = $subjectValues[0];
                $subjectRegNo = $subjectValues[1];

                // var_dump('subject index = ' . $subjectIndexNo . 'subject reg no = ' . $subjectRegNo);
                if ($inputIndex == $subjectIndexNo && $inputRegNo == $subjectRegNo) {


                    if ($type == 'assestment') {

                        $subjectValues[4] = $assignmentMark;


                    } else if ($type == 'examiner1') {


                        $subjectValues[2] = $examiner1Mark;


                    } else if ($type == 'examiner2') {

                        $subjectValues[3] = $examiner2Mark;


                    } else if ($type == 'examiner3') {
                        $subjectValues[5] = $examiner3Mark;

                    }

                    // Update the line in the final mark sheet

                    $subjectLines[$j] = implode(",", $subjectValues);

                    // Break out of the inner loop once the entry is found and updated
                    break;
                }
            }
        }
        // var_dump('all subject lines = ' . $subjectLines);
        file_put_contents($markSheet, implode("\n", $subjectLines));
        // Close the file
        fclose($f);
    } else {
        // If the file doesn't exist, create it and write content
        $content = file_get_contents('assets/csv/examsheets/' . $inputCSV);

        file_put_contents($markSheet, $content);
    }
}

function leastGap($mark1, $mark2, $mark3)
{
    $gap1 = abs($mark1 - $mark2);
    $gap2 = abs($mark2 - $mark3);
    $gap3 = abs($mark1 - $mark3);

    if ($gap1 < $gap2) {
        if ($gap1 < $gap3) {
            $marks = [$mark1, $mark2];
            return $marks;
        } else {
            $marks = [$mark2, $mark3];
            return $marks;
        }
    } else {
        if ($gap2 < $gap3) {
            $marks = [$mark1, $mark2];
            return $marks;
        } else {
            $marks = [$mark2, $mark3];
            return $marks;
        }
    }
}

function getRepeatedSubjects($indexNo, $semester = null)
{
    $repeatStudents = new RepeatStudents;

    //get repeated subjects
    if ($semester == null) {
        $repeatedSubjects = $repeatStudents->whereSpecificColumn(['indexNo' => $indexNo], 'subjectCode');
    } else {
        $repeatedSubjects = $repeatStudents->whereSpecificColumn(['indexNo' => $indexNo, 'semester' => $semester,], 'subjectCode');
    }
    return $repeatedSubjects;
}

function getMedicalSubjects($indexNo, $semester = null)
{
    $medicalStudents = new MedicalStudents;

    //get repeated subjects
    if ($semester == null) {
        $medicalSubjects = $medicalStudents->whereSpecificColumn(['indexNo' => $indexNo], 'subjectCode');
    } else {
        $medicalSubjects = $medicalStudents->whereSpecificColumn(['indexNo' => $indexNo, 'semester' => $semester], 'subjectCode');
    }
    return $medicalSubjects;
}

function processStudents(&$selectedRMStudents)
{
    $processedStudents = [];
    $uindex = null;
    foreach ($selectedRMStudents as $student) {
        $index = $student->indexNo;
        if (isset($student) && $student->studentType === 'medical' && isset($student->indexNo)) {

            $foundRepeat = false;
            foreach ($selectedRMStudents as $otherStudent) {
                if (isset($otherStudent) && $otherStudent->indexNo === $index && $otherStudent->studentType === 'repeate') {
                    $student->studentType = 'medical/repeat';
                    $processedStudents[] = $student;
                    $uindex = $index;
                    break;
                }
            }
            if ($uindex !== $index) {
                $processedStudents[] = $student;
            }
        } else {

            if ($uindex !== $index) {
                $processedStudents[] = $student;
            }
        }
    }

    $selectedRMStudents = $processedStudents;
    return $selectedRMStudents;
}


function finalMark($mark1, $mark2, $assigmnet)
{
    $finalMark = ($mark1 + $mark2) / 2 + $assigmnet / 2;
    return $finalMark;
}

function insertMarks($file, $examID, $degreeID, $subCode)
{

    // var_dump($file, $examID, $degreeID, $subCode);
    //need to add condition to check the file is full of marks or not
    $mark = new Marks;

    $data['examID'] = $examID;
    $data['degreeID'] = $degreeID;
    $data['subjectCode'] = $subCode;


    $filePath = 'assets/csv/examsheets/final-marksheets/' . $file;
    $content = file_get_contents($filePath);
    $lines = explode("\n", $content);


    //iterate through data in file
    for ($i = 4; $i < count($lines); $i++) {

        //get line
        $values = str_getcsv($lines[$i]);

        //catch data 
        $data['studentIndexNo'] = $values[0];
        $data['examiner1Marks'] = $values[2];
        $data['examiner2Marks'] = $values[3];
        $data['assessmentMarks'] = $values[4];
        $data['examiner3Marks'] = !empty($values[5]) ? $values[5] : -1;

        //insert or update data into table
        if (!empty($mark->markValidate($data))) {
            if ($mark->markValidate($data)->status == 'update') {
                $id = $mark->markValidate($data)->id;
                // show("Id === ");
                // show($id);
                //update data in the databse marks table
                $mark->update($id, $data);
            } else if ($mark->markValidate($data)->status == 'insert') {

                $mark->insert($data);
            }

        }

    }



}
function activity($message)
{

    $activity = new Activity;

    // show($_SESSION['USER_DATA']);
    //assign data into array
    $data['discription'] = $message;
    $data['user'] = $_SESSION['USER_DATA']->username;
    $data['date'] = date("Y-m-d");
    $data['time'] = date("H:i:s");

    if ($activity->Validate($data)) {

        //insert data to table
        $activity->insert($data);
    }
}


function checkGap($file, $examId, $subCode)
{

    $filePath = 'assets/csv/examsheets/final-marksheets/' . $file;
    $content = file_get_contents($filePath);
    $lines = explode("\n", $content);

    //iterate through data in file
    for ($i = 4; $i < count($lines) - 1; $i++) {

        //get line
        $values = str_getcsv($lines[$i]);

        //check the gap
        // var_dump('values = ' . $values);
        $gap = abs($values[2] - $values[3]);
        if ($gap > 10) {
            var_dump('gap is greater than 10');
            return true;
        }
    }
    return false;

}

function sortArray($array, $key, $order = 'asc')
{
    // Define a custom comparison function
    $compare = function ($a, $b) use ($key, $order) {
        if ($order === 'asc') {
            return $a->$key > $b->$key ? 1 : -1;
        } else {
            return $a->$key < $b->$key ? 1 : -1;
        }
    };

    // Sort the array using the custom comparison function
    usort($array, $compare);

    return $array;
}

function updateMarksheet($csvFileName, $dataArray, $newFileName)
{
    $csvFilePath = 'assets/csv/examsheets/final-marksheets/' . $csvFileName;
    $newFilePath = 'assets/csv/examsheets/output/final-marksheets/' . $newFileName;


    // Ensure the output directory exists
    $newFileDir = dirname($newFilePath);
    if (!is_dir($newFileDir)) {
        mkdir($newFileDir, 0777, true);
    }


    // Read the existing CSV file
    $rows = [];
    $headerData = [];
    if (file_exists($csvFilePath)) {
        if (($handle = fopen($csvFilePath, "r")) !== FALSE) {
            $lineCount = 0;
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $lineCount++;
                if ($lineCount <= 3) {
                    // Collect program and subject lines
                    $headerData[] = $data;
                    continue;
                } else if ($lineCount == 4) {
                    // Skip the redundant header line
                    continue;
                }
                $rows[] = $data;
            }
            fclose($handle);
        }
    }

    // Open a new file to write the updated data
    $newFile = fopen($newFilePath, 'w');

    // Write the program name and subject headers first
    foreach ($headerData as $headerRow) {
        fputcsv($newFile, $headerRow);
    }

    // Write the correct column headers
    $correctHeader = ['Index No', 'Registration No', 'Examiner 01 Marks', 'Examiner 02 Marks', 'Assignment Marks', 'Examiner 03 Marks', 'Final Marks', 'Grade'];
    fputcsv($newFile, $correctHeader);

    // Process each row and add new data from $dataArray
    foreach ($rows as $row) {
        if (count($row) < 2)
            continue; // Skip empty rows
        $indexNo = $row[0]; // Assuming 'Index No' is the first column
        if (!empty($dataArray)) {
            foreach ($dataArray as $data) {
                if ($data->indexNo == $indexNo) {
                    // Update existing row with final marks and grade
                    $row[5] = $data->examiner3Marks != -1 ? $data->examiner3Marks : "N/A";
                    $row[6] = $data->finalMarks;
                    $row[7] = $data->grade ? $data->grade : "N/A";
                    break;
                }
            }
        }
        fputcsv($newFile, $row);
    }

    fclose($newFile);
    // chmod($newFilePath, 0777);
}

function getNotificationCount()
{
    $notification = new NotificationModel();
    $username = $_SESSION['USER_DATA']->username;
    $data['usernames'] = $username;
    $notification_count_arr = $notification->countNotifications($username);
    $data['notification_count_obj'] = $notification_count_arr[0];
    return $notification_count_arr[0];

}

function getNotificationCountDirector()
{
    $notification = new NotificationModel();
    $username = $_SESSION['USER_DATA']->username;
    $data['usernames'] = $username;
    $notification_count_arr = $notification->countNotificationsDirector($username);
    $data['notification_count_obj_director'] = $notification_count_arr[0];

    return $notification_count_arr[0];
}

function getNotificationCountSAR()
{
    $notification = new NotificationModel();
    $username = $_SESSION['USER_DATA']->username;
    $data['usernames'] = $username;
    $notification_count_arr = $notification->countNotificationsSAR($username);
    $data['notification_count_obj_sar'] = $notification_count_arr[0];

    return $notification_count_arr[0];
}

function getNotificationCountDR()
{
    $notification = new NotificationModel();
    $username = $_SESSION['USER_DATA']->username;
    $data['usernames'] = $username;
    $notification_count_arr = $notification->countNotificationsDR($username);
    $data['notification_count_obj_dr'] = $notification_count_arr[0];

    return $notification_count_arr[0];
}

function getNotificationCountAssistSAR()
{
    $notification = new NotificationModel();
    $username = $_SESSION['USER_DATA']->username;
    $data['usernames'] = $username;
    $notification_count_arr = $notification->countNotificationsAssistSAR($username);
    $data['notification_count_obj_ASAR'] = $notification_count_arr[0];

    return $notification_count_arr[0];
}

function getNotificationCountAdmin()
{
    $notification = new NotificationModel();
    $username = $_SESSION['USER_DATA']->username;
    $data['usernames'] = $username;
    $notification_count_arr = $notification->countNotificationsAdmin($username);
    $data['notification_count_obj_admin'] = $notification_count_arr[0];

    return $notification_count_arr[0];
}
function validateRowData($rowData)
{
    // Validate Full-Name
    if (empty($rowData[0]) && !preg_match('/^[a-zA-Z\s]+$/', $rowData[0])) {
        return false;
    }
    // Validate Email
    if (!filter_var($rowData[1], FILTER_VALIDATE_EMAIL)) {
        return false; // Email must be valid
    }
    // Validate Country
    if (empty($rowData[2]) && !preg_match("/^[A-Z][a-z'-]+(?:\s[A-Z][a-z'-]+)+$/", $rowData[2])) {
        return false; // Country cannot be empty
    }
    // Validate NIC-No
    if (!preg_match('/^\d{12}$|^\d{9}[VX]$/', $rowData[3])) {
        return false; // NIC No must match the specific pattern (e.g., 123456789V)
    }
    // Validate Date-Of-Birth
    $dob = DateTime::createFromFormat('Y-m-d', $rowData[4]);
    $now = new DateTime();
    if ($dob === false) {
        return false; // Date must be a valid date
    }
    // Validate whatsappNo
    if (!preg_match('/^\+?[\d\s]{9,15}$/', $rowData[5])) {
        return false; // Whatsapp number must be in a valid phone number format
    }
    // Validate Address
    if (empty($rowData[6]) && !preg_match("/^[A-Za-z0-9\s/,-]+(?:[A-Za-z0-9\s/,-]+)*$/", $rowData[6])) {
        return false; // Address cannot be empty
    }
    // Validate Phone-No
    if (!preg_match('/^\+?[\d\s]{9,15}$/', $rowData[7])) {
        return false; // Phone number must be in a valid phone number format
    }
    // Validate Gender
    if ($rowData[8] !== 'M' && $rowData[8] !== 'F') {
        return false; // Gender must be either 'M' or 'F'
    }
    return true; // All validations passed
}


?>