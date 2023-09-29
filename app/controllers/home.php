<?php

class Home extends Controller{

    public function index(){
        $this->view('DR-Interfaces/DR-Dashboard');
        
        $db = new Database();
        $db->create_tables();
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