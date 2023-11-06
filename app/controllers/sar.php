<?php

class SAR extends Controller{

    public function index(){
        $degree = new Degree();

        // $degree->insert($_POST);
        // show($_POST);

        $data['degrees'] = $degree->findAll();
        //show($data['degrees']);

        $this->view('sar-interfaces/sar-dashboard',$data);
    }
    public function notification(){
        $this->view('sar-interfaces/sar-notification');
    }
    public function degreeprograms(){
        $degree = new Degree();

        // $degree->insert($_POST);
        // show($_POST);

        $data['degrees'] = $degree->findAll();
        //show($data['degrees']);

        $this->view('sar-interfaces/sar-degreeprograms',$data);
    }
    public function degreeprofile(){
        $degree = new Degree();

        // $degree->insert($_POST);
        // show($_POST);

        $data['degrees'] = $degree->findAll();
        //show($data['degrees']);

        $this->view('sar-interfaces/sar-degreeprofile',$data);
    }
    public function examination(){
        $degree = new Degree();

        // $degree->insert($_POST);
        // show($_POST);

        $data['degrees'] = $degree->findAll();
        //show($data['degrees']);

        $this->view('sar-interfaces/sar-examination',$data);
    }
    public function participants(){
        $this->view('sar-interfaces/sar-participants');
    }
    public function settings(){
        $this->view('sar-interfaces/sar-settings');
    }
    public function login(){
        $this->view('common/login/login.view');
    }

}

?>