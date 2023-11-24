<?php

class SAR extends Controller
{

    public function index()
    {
        //uncoment this to add autherization to sar
        // if (!Auth::is_sar()) {
        //     message('You are not authorized to view this page', 'error');
        //     header('Location: login');
        // }

        $degree = new Degree();

        $data['degrees'] = $degree->findAll();

        $this->view('sar-interfaces/sar-dashboard', $data);
    }
    public function notification()
    {
        $this->view('sar-interfaces/sar-notification');
    }
    public function degreeprograms()
    {
        $degree = new Degree();


        $data['degrees'] = $degree->findAll();


        $this->view('sar-interfaces/sar-degreeprograms', $data);
    }
    public function degreeprofile()
    {
        $degree = new Degree();


        $data['degrees'] = $degree->findAll();


        $this->view('sar-interfaces/sar-degreeprofile', $data);
    }
    public function examination($method = null, $id = null)
    {
        $degree = new Degree();
        $data['degrees'] = $degree->findAll();



        if ($method == "create" && $id == 1) {

            if ($_POST['submit'] == "next1") {

                show($_POST);
                header('Location: 2');
            }
            $this->view('sar-interfaces/sar-createexam-normal-1');
        } else if ($method == "create" && $id == 2) {

            $this->view('sar-interfaces/sar-createexam-normal-2');
        } else if ($method == "create" && $id == 3) {
            $this->view('sar-interfaces/sar-createexam-normal-3');
        } else {
            $this->view('sar-interfaces/sar-examination', $data);
        }
    }

    public function participants()
    {
        $this->view('sar-interfaces/sar-participants');
    }
    public function settings()
    {
        $this->view('sar-interfaces/sar-settings');
    }
    public function login()
    {
        $this->view('common/login/login.view');
    }
    public function resultupload()
    {
        $this->view('sar-interfaces/sar-examresultupload');
    }
    public function results()
    {
        $this->view('sar-interfaces/sar-examresults');
    }
    public function examparticipants()
    {
        $this->view('sar-interfaces/sar-examparticipants');
    }
    public function showresults()
    {
        $this->view('sar-interfaces/sar-examresultshow');
    }
}
