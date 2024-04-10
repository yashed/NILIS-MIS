<?php

//uncommet this if it gives error remove bellow code
// spl_autoload_register(function ($class_name){
//     require "../app/models/" . $class_name . ".model.php";
// });


spl_autoload_register(function ($class_name) {

    // Check if the class is in the models directory
    $model_path = "app/models/" . $class_name . ".model.php";
    if (file_exists($model_path)) {
        require_once $model_path;
        return;
    }


    // Check if the class is in the thirdparty directory
    $thirdparty_path = "../app/thirdparty/" . $class_name . ".php";
    if (file_exists($thirdparty_path)) {
        require_once $thirdparty_path;
        return;
    }

    // Add more custom paths as needed

    // If the class is not found in known directories, handle it accordingly
    // For example, you can throw an exception or log an error.
    throw new Exception("Class $class_name not found");
});




require "config.php";
require "functions.php";
require "database.php";
require "model.php";
require "controller.php";
require "app.php";

?>