<?php

/**
 * reports class
 */

class Reports extends Controller
{
    public function index()
    {
        echo "Invalid URL";
    }
    public function ROE()
    {
        $this->view('reports/report-roe-login');
    }
    public function exam_results()
    {

        // get degree id 

        //check wheter this can handel through session
        $degreeID = isset($_GET['degreeID']) ? $_GET['degreeID'] : null;
        $degreeID = 2;

        $marks = new FinalMarks();

        //get all marks for degree
        $marks = $marks->where(['degreeID' => $degreeID]);
        $this->view('reports/report-roe-card');
    }
}
