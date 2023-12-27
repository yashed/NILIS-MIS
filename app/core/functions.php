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

function createMarkSheet($inputCSV, $examID, $subCode)
{

    $filePath = 'assets/csv/examsheets/final-marksheets';
    $markSheet = $filePath . '/' . $examID . '_' . $subCode . '.csv';

    //check if marksheet already exists
    if (file_exists($markSheet)) {
        $f = fopen($markSheet, 'w');

    } else {
        file_put_contents($markSheet, $inputCSV);
    }

}
?>