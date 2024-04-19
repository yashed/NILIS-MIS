<?php

/**
 * reports class
 */

function __construct()
{
    if (!Auth::is_dr()) {
        message('You are not authorized to view this page');
        redirect('login');
    }
}
class ROE extends Controller
{
    public function index()
    {


    }
    public function login()
    {
        $exam = new Exam();
        $degree = new Degree();
        $admissionToken = new AdmissionToken();
        $examID = isset($_GET['examID']) ? $_GET['examID'] : null;
        $indexNo = isset($_GET['indexNo']) ? $_GET['indexNo'] : null;

        //get exam details
        if ($examID != null) {

            $examDetails = $exam->where(['examID' => intval($examID)]);

        } else {
            $examDetails = null;
        }
        if ($examDetails != null) {
            $degreeID = $examDetails[0]->degreeID;

            //get degree details
            if ($degreeID != null) {
                $degreeDetails = $degree->where(['degreeID' => intval($degreeID)]);

            } else {
                $degreeDetails = null;
            }

            $data['degreeDetails'] = $degreeDetails;

        }

        //create data array
        $data['examDetails'] = $examDetails;
        $data['indexNo'] = $indexNo;


        if (isset($_POST['submit'])) {

            //create token according to index number and examID
            $token = md5($_POST['index'] . $examID);

            $tokenData['indexNo'] = $_POST['index'];
            $tokenData['examID'] = $examID;
            $tokenData['token'] = $token;

            //insert token to database
            if ($admissionToken->Validate($tokenData)) {

                $admissionToken->insert($tokenData);
            }

            redirect('admission/card?token=' . $token);

        }

        $this->view('reports/report-roe-login');
    }

}
