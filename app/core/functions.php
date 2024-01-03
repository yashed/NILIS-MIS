<?php


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
    header("Location: " . ROOT . "" . $link);
    show($_POST);
    die;
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

function createMarkSheet($inputCSV, $examID, $subCode, $type)
{
    var_dump('inside the function' . $inputCSV . 'exam id ' . $examID . 'subject code ' . $subCode . 'type = ' . $type);

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
        if ($type = 'examiner3') {

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

        var_dump('subject content = ' . $subjectContent);



        for ($i = 4; $i < count($lines); $i++) {
            // Split each line into an array of values
            $values = str_getcsv($lines[$i]);
            $inputIndex = $values[0];
            $inputRegNo = $values[1];

            $examiner1Mark = $values[2];
            // var_dump('examiner 1 mark = ' . $examiner1Mark . 'index = ' . $inputIndex . 'reg no = ' . $inputRegNo);

            $examiner2Mark = $values[3];
            // $examiner3Mark = $values[4];
            $assignmentMark = $values[4];


            for ($j = 4; $j < count($subjectLines); $j++) {
                $subjectValues = str_getcsv($subjectLines[$j]);

                //get index and reg no from subject marks sheet
                $subjectIndexNo = $subjectValues[0];
                $subjectRegNo = $subjectValues[1];

                var_dump('subject index = ' . $subjectIndexNo . 'subject reg no = ' . $subjectRegNo);
                if ($inputIndex == $subjectIndexNo && $inputRegNo == $subjectRegNo) {

                    if ($type == 'assestment') {
                        $subjectValues[4] = $assignmentMark;
                        $subjectLines[$j] = implode(",", $subjectValues);
                        // var_dump('subject line =  ' . $subjectLines[$j]);

                        break;


                    } else if ($type == 'examiner1') {

                        $subjectValues[2] = $examiner1Mark;
                        $subjectLines[$j] = implode(",", $subjectValues);
                        // var_dump('subject line =  ' . $subjectLines[$j]);

                        break;

                    } else if ($type == 'examiner2') {

                        $subjectValues[3] = $examiner2Mark;
                        $subjectLines[$j] = implode(",", $subjectValues);
                        // var_dump('subject line =  ' . $subjectLines[$j]);

                        break;

                    } else if ($type == 'examiner3') {
                        $subjectValues[5] = $examiner2Mark;
                        $subjectLines[$j] = implode(",", $subjectValues);
                    }
                }
            }
        }
        var_dump('all subject lines = ' . $subjectLines);
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

function finalMark($mark1, $mark2, $assigmnet)
{
    $finalMark = ($mark1 + $mark2) / 2 + $assigmnet / 2;
    return $finalMark;
}

function insertMarks($file, $examID, $subCode)
{
    //need to add condition to check the file is full of marks or not
    $mark = new Marks;

    $data['examID'] = $examID;
    $data['subjectCode'] = $subCode;


    $filePath = 'assets/csv/examsheets/final-marksheets' . $file;
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
        $data['examiner2Marks'] = !empty($values[5]) ? $values[5] : '';



    }



}
function activity($message)
{
    show('$message');
    $activity = new Activity;

    //assign data into array
    $data['discription'] = $message;
    $data['user'] = $_SESSION['USER_DATA']->role;
    $data['date'] = date("Y-m-d");
    $data['time'] = date("H:i:s");

    if ($activity->Validate($data)) {

        //insert data to table
        $activity->insert($data);
    }
}

?>