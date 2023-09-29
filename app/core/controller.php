<?php

// main controller class 


class Controller {

   public function view($view,$data = [])
   {
      // echo $view;
      extract($data);
      $filename = "../app/views/".$view.".view.php";
      // $filename = "../app/views/".$view.".php";
      
      
      // echo "<br>".$filename;

      if(file_exists($filename)){
        require $filename;
      }else{

        echo "could not find view file : ". $filename;
      }
    }
}

?>