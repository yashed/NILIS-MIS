<?php

class DIRECTOR extends Controller{

    public function index(){
        $degree = new Degree();

        // $degree->insert($_POST);
        // show($_POST);

        $data['degrees'] = $degree->findAll();
        //show($data['degrees']);

        $this->view('director-interfaces/director-dashboard',$data);
    }
    public function notification(){
        $this->view('director-interfaces/director-notification');
    }
    public function degreeprograms(){
        $degree = new Degree();

        // $degree->insert($_POST);
        // show($_POST);

        $data['degrees'] = $degree->findAll();
        //show($data['degrees']);

        $this->view('director-interfaces/director-degreeprograms',$data);
    }
    public function degreeprofile(){
        $degree = new Degree();

        // $degree->insert($_POST);
        // show($_POST);

        $data['degrees'] = $degree->findAll();
        //show($data['degrees']);

        $this->view('director-interfaces/director-degreeprofile',$data);
    }
    public function participants(){
        $this->view('director-interfaces/director-participants');
    }
    public function settings(){
        $this->view('director-interfaces/director-settings');
    }
    public function login(){
        $this->view('login/login.view');
    }

}

?>