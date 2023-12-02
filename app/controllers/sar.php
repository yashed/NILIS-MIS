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
        $student = new StudentModel();
        $examParticipants = new ExamParticipants();
        $medicalStudents = new MedicalStudents();
        $repeatStudents = new RepeatStudents();
        $examtimetable = new ExamTimeTable();

        $data['errors'] = [];
        $selectedStudents = [];

        $data['degrees'] = $degree->findAll();
        $data['students'] = $student->findAll();

        //need complete filtering part of repeat and medical students data
        $data['medicalStudents'] = $medicalStudents->findAll();
        $repeatStudents->setid(10000);
        $data['repeatStudents'] = $repeatStudents->findAll();

        if ($method == "create" && $id == 1) {
            if (isset($_POST['submit'])) {
                if ($_POST['submit'] == "next1") {

                    //remove session data about checked students
                    unset($_SESSION['checked_students']);

                    $selectedIds = $_POST['item'];
                    $selectedStudents = [];

                    //reset the selected student array if it is not empty
                    if (!empty($selectedStudents)) {
                        reset($selectedStudents);
                    }
                    //Select only selected student's data
                    foreach ($data['students'] as $student) {
                        if (in_array($student->id, $selectedIds)) {
                            $selectedStudents[] = $student;

                            //add checked students id to session
                            $_SESSION['checked_students'][$student->id] = true;
                        }
                    }
                    show($selectedStudents);


                    foreach ($selectedStudents as $student) {
                        $student->degreeID = 1;
                        $student->semester = 1;
                        $student->attempt = 1;
                        $student->studentType = 'initial';

                        //add data to exam participants table
                        if ($examParticipants->examParticipantValidation($student)) {
                            // $examParticipants->insert($student);
                        } else {
                            $data['errors'] = $examParticipants->errors;
                        }

                    }
                }
            }
            $this->view('sar-interfaces/sar-createexam-normal-1', $data);
        } else if ($method == "create" && $id == 2) {

            //need complete filtering part of repeat and medical students data


            // show($data['medicalStudents']);
            // show($data['repeatStudents']);
            if (isset($_POST['submit'])) {
                if ($_POST['submit'] == 'next2') {
                    show($_POST);
                }
            }

            $this->view('sar-interfaces/sar-createexam-normal-2', $data);
        } else if ($method == "create" && $id == 3) {
            if (isset($_POST['submit'])) {
                if ($_POST['submit'] == "timetable") {

                    $subCount = count($_POST['subName']);

                    for ($x = 0; $x < $subCount; $x++) {
                        $timeTableRow['subjectCode'] = strval($x + 1);
                        $timeTableRow['subjectName'] = $_POST['subName'][$x];
                        $timeTableRow['date'] = $_POST['examDate'][$x];
                        $timeTableRow['time'] = $_POST['examTime'][$x];
                        $timeTableRow['degreeID'] = '01';
                        $timeTableRow['semester'] = 01;

                        if ($examtimetable->examTimetableValidate($timeTableRow)) {
                            $examtimetable->insert($timeTableRow);
                            redirect('sar/examination');
                        } else {
                        }
                    }
                }
            }
            $data['errors'] = $examtimetable->errors;
            $this->view('sar-interfaces/sar-createexam-normal-3', $data);
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
