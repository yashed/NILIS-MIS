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
        $admissionToken = new AdmissionToken();


        $examID = isset($_GET['examID']) ? $_GET['examID'] : null;

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
        $this->view('sar-interfaces/admission-card-login', $data);
    }

    public function Card()
    {
        $token = isset($_GET['token']) ? $_GET['token'] : null;

        if ($token != null) {
            $admissionToken = new AdmissionToken();
            $tokenData = $admissionToken->where(['token' => $token]);
            $indexNo = $tokenData[0]->indexNo;
            $examID = $tokenData[0]->examID;
        } else {

            message('Invalid Token', 'danger');
        }

        //get student data


        $student = new StudentModel();
        $indexNo = isset($_GET['index']) ? $_GET['index'] : null;

        $studentData = $student->where(['indexNo' => $indexNo]);
        $data['studentData'] = $studentData;


        $this->view('sar-interfaces/admission-card', $data);
    }
}
