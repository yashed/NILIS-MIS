<?php

class Home extends Controller{

    public function index(){
       $this->view('login');
    }
    public function edit(){
        echo "Home eddit ";
    }
    public function delete(){
        echo "Home delete ";
    }


}

?>