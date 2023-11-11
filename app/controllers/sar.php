<?php

class SAR extends Controller{

    public function index(){
        $degree = new Degree();

        // $degree->insert($_POST);
        // show($_POST);

        $data['degrees'] = $degree->findAll();
        //show($data['degrees']);

        $this->view('sar-interfaces/sar-dashboard2',$data);
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
    public function examination($method=null,$id=null){
        $degree = new Degree();
        $data['degrees'] = $degree->findAll();

        // $degree->insert($_POST);
        // show($_POST);
        if($method=="create" && $id==1){
            $this->view('sar-interfaces/sar-createexam-normal-1');
        }
        else if($method=="create" && $id==2){
            $this->view('sar-interfaces/sar-createexam-normal-2');
        }
        else if($method=="create" && $id==3){
            $this->view('sar-interfaces/sar-createexam-normal-3');
        }
        else{
         $this->view('sar-interfaces/sar-examination',$data);
        }
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