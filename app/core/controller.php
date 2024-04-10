<?php

// main controller class 
class Controller
{

  public function view($view, $data = [])
  {
    extract($data);
    $filename = "app/views/" . $view . ".php";


    if (file_exists($filename)) {
      require $filename;
    } else {

      echo "could not find view file : " . $filename;
    }
  }

  public function load_model($modle)
  {
    if (file_exists("../private/models/" . $modle . ".model.php")) {
      require ("../private/models/" . $modle . ".model.php");
      return new $modle();
    } else {
      require ("../private/views/404.view.php");
    }
  }
}

?>