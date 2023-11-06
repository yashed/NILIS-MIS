<?php

class Admission extends Controller{

    public function index(){
        
        // $db = new Database();
        // $db->create_tables();
     
    }
    
    public function login(){

        $this->view('sar-interfaces/admission-card-login');
    }
     
    public function Card(){

        $this->view('sar-interfaces/admission-card');
    }
}
?>