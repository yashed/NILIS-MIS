<?php

class DR extends Controller{

    public function index(){
        $degree = new Degree();

        // $degree->insert($_POST);
        // show($_POST);

        $data['degrees'] = $degree->findAll();
        //show($data['degrees']);

        $this->view('dr-interfaces/dr-dashboard',$data);
    }
    public function notification(){
        $this->view('dr-interfaces/dr-notification');
    }
    public function degreeprograms(){
        $degree = new Degree();

        // $degree->insert($_POST);
        // show($_POST);

        $data['degrees'] = $degree->findAll();
        //show($data['degrees']);

        $this->view('dr-interfaces/dr-degreeprograms',$data);
    }
    public function degreeprofile(){
        $degree = new Degree();

        // $degree->insert($_POST);
        // show($_POST);

        $data['degrees'] = $degree->findAll();
        //show($data['degrees']);

        $this->view('dr-interfaces/dr-degreeprofile',$data);
    }
    public function participants(){
        $this->view('dr-interfaces/dr-participants');
    }
    public function settings(){
        $this->view('dr-interfaces/dr-settings');
    }
    public function login(){
        $this->view('login/login.view');
    }

}

?>