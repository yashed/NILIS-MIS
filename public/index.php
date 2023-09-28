<?php

class app{

    protected $controller = '_404';
    function __construct(){
        $arr = $this->getURL();

        $filename = "../app/controllers/".ucfirst($arr[0]).".php";
        if(file_exists($filename)){
            require $filename;
            $this->controller = $arr[0];
        }
        else{
            require "../app/controllers/".$this->$controller.".php";
        }

        $mycontroller = new $this->controller();
    }

    private function getURL(){
        $url = $_GET['url'] ?? 'home';
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $arr = explode("/", $url);
        return $arr;
    }

}

$app =new App();