<?php

class Home extends Controller{

    public function index(){
        // $this->view('dr-interfaces/dr-dashboard');
        
        $db = new Database();
        $db->create_tables();
        $this->view('login/login');
    }
    public function edit(){
        echo "Home edit ";
    }
    public function delete(){
        echo "Home delete ";
    }


}

?>