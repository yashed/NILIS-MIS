<?php

class Admission extends Controller
{

    public function index()
    {
    }

    public function login()
    {
        $exam = new Exam();
        $degree = new Degree();

        $examID = isset($_GET['examID']) ? $_GET['examID'] : null;

        //get exam details
        if ($examID != null) {

            $examDetails = $exam->where(['examID' => intval($examID)]);

        }

        $degreeID = $examDetails[0]->degreeID;

        //get degree details
        $degreeDetails = $degree->where(['degreeID' => intval($degreeID)]);

        //create data array
        $data['examDetails'] = $examDetails;
        $data['degreeDetails'] = $degreeDetails;

        if (isset($_POST['submit'])) {
            show("workd");

            redirect('admission/card?index=' . $_POST['index'] . '');

        }
        $this->view('sar-interfaces/admission-card-login', $data);
    }

    public function Card()
    {
        $indexNo = isset($_GET['index']) ? $_GET['index'] : null;

        $this->view('sar-interfaces/admission-card');
    }
}
