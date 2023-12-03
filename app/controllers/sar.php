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
        $model = new Model();
        $degree = new Degree();
        $student = new StudentModel();
        $examParticipants = new ExamParticipants();
        $medicalStudents = new MedicalStudents();
        $repeatStudents = new RepeatStudents();
        $examtimetable = new ExamTimeTable();

        $data['errors'] = [];

        $data['degrees'] = $degree->findAll();
        $data['students'] = $student->findAll();

        //need complete filtering part of repeat and medical students data
        // $data['medicalStudents'] = $medicalStudents->where(['degreeID' => 1, 'semester' => 1, 'status' => 1]);
        $repeatStudents->setid(1000);
        $data['repeatStudents'] = $repeatStudents->where(['degreeID' => 1, 'semester' => 1, 'paymentStatus' => 1]);
        $degreeID = 1;

        $selectedNormalStudents1 = [];
        $selectedRMStudents = [];
        $processedStudentID = [];
        $processedStudentID2 = [];
        $timeTableData = [];

        //Get currect Degree short name
        $degreeShortName = [$degree->where(['DegreeID' => $degreeID])[0]->DegreeShortName];

        if ($method == "create" && $id == 1) {
            if (isset($_POST['submit'])) {
                // show($_POST);
                if ($_POST['submit'] == "next1") {

                    //remove session data about checked students
                    unset($_SESSION['checked_normal_students']);

                    $selectedIds = $_POST['item'];



                    //Select only selected student's data
                    //Handel Selected students data
                    if (empty($selectedIds)) {
                        redirect('sar/examination/create/2');
                    } else {
                        foreach ($data['students'] as $student) {
                            if (in_array($student->id, $selectedIds)) {
                                if (!in_array($student->id, $processedStudentID)) {
                                    $student->degreeID = 1;
                                    $student->semester = 1;
                                    $student->attempt = 1;
                                    $student->studentType = 'initial';

                                    // Check if the data about the student already exists
                                    if ($examParticipants->examParticipantValidation($student)) {
                                        // Add student to the array
                                        //we can use this array to insert data to exam participants table
                                        $selectedNormalStudents1[] = $student;
                                        // Update the list of processed student IDs
                                        $processedStudentID[] = $student->id;
                                    } else {
                                        $data['errors'] = $examParticipants->errors;
                                    }

                                }

                                //add checked students id to session
                                $_SESSION['checked_normal_students'][$student->id] = true;
                            }
                        }
                        // show($selectedNormalStudents1);
                        redirect('sar/examination/create/2');

                    }
                    // foreach ($selectedStudents as $student) {
                    //     $student->degreeID = 1;
                    //     $student->semester = 1;
                    //     $student->attempt = 1;
                    //     $student->studentType = 'initial';

                    //     //add data to exam participants table
                    //     if ($examParticipants->examParticipantValidation($student)) {
                    //         //need to handel insertion part after press final submit button
                    //         $selectedNormalStudents1 = $student;
                    //     } else {
                    //         $data['errors'] = $examParticipants->errors;
                    //     }

                    //     redirect('sar/examination/create/2');
                    // }
                }
            }
            $this->view('sar-interfaces/sar-createexam-normal-1', $data);
        } else if ($method == "create" && $id == 2) {


            //Get join data from medical students and degree tables
            $tables = ['degree'];
            $columns = ['*'];
            $conditions1 = ['medical_students.degreeID = degree.DegreeID', 'medical_students.status=1'];
            $joinStudnetData1 = $medicalStudents->join($tables, $columns, $conditions1);

            // show($degreeShortName);
            // show($joinStudnetData1);

            //Get join data from repeat students and degree tables 
            $conditions2 = ['repeat_students.degreeID = degree.DegreeID', 'repeat_students.paymentStatus=1'];
            $joinStudnetData2 = $repeatStudents->join($tables, $columns, $conditions2);


            //filter medical students data according to degree short name
            foreach ($joinStudnetData1 as $medicalStudent) {
                if (in_array($medicalStudent->DegreeShortName, $degreeShortName)) {
                    $data['medicalStudents'][] = $medicalStudent;
                }
            }

            foreach ($joinStudnetData2 as $repeatStudent) {
                if (in_array($repeatStudent->DegreeShortName, $degreeShortName)) {
                    $data['repeatStudents'][] = $repeatStudent;
                }
            }

            if (isset($_POST['submit'])) {
                if ($_POST['submit'] == 'next2') {
                    // show($_POST);


                    //remove checked students ids to session
                    unset($_SESSION['checked_RM_students']);

                    $selectedIds = $_POST['item'];

                    if (empty($selectedIds)) {
                        redirect('sar/examination/create/3');
                    } else {

                        //Handel Selected Medical submitted students data
                        foreach ($data['medicalStudents'] as $medicalStudent) {
                            if (in_array($medicalStudent->id, $selectedIds)) {
                                if (!in_array($medicalStudent->id, $processedStudentID2)) {
                                    $medicalStudent->degreeID = 1;
                                    $medicalStudent->semester = 1;
                                    $medicalStudent->attempt = $medicalStudent->attempt;
                                    ;
                                    $medicalStudent->studentType = 'medical';
                                    $medicalStudent->status = 1;

                                    // Check if the data about the student already exists
                                    if ($examParticipants->examParticipantValidation($medicalStudent)) {
                                        // Add student to the array
                                        //We can use this array to insert data to exam participants table
                                        $selectedRMStudents[] = $medicalStudent;
                                        // Update the list of processed student IDs
                                        $processedStudentID2[] = $medicalStudent->id;
                                    } else {
                                        $data['errors'] = $examParticipants->errors;
                                    }
                                }
                                //add checked students id to session
                                $_SESSION['checked_RM_students'][$medicalStudent->id] = true;
                            }
                        }

                        //Handel Selected eligiable Repeat students data
                        foreach ($data['repeatStudents'] as $repeatStudent) {
                            if (in_array($repeatStudent->id, $selectedIds)) {
                                if (!in_array($repeatStudent->id, $processedStudentID2)) {
                                    $repeatStudent->degreeID = 1;
                                    $repeatStudent->semester = 1;
                                    $repeatStudent->attempt = intval($repeatStudent->attempt) + 1;
                                    $repeatStudent->studentType = 'repeate';
                                    $repeatStudent->paymentStatus = 1;

                                    // Check if the data about the student already exists
                                    if ($examParticipants->examParticipantValidation($repeatStudent)) {
                                        // Add student to the array
                                        //We can use this array to insert data to exam participants table
                                        $selectedRMStudents[] = $repeatStudent;
                                        // Update the list of processed student IDs
                                        $processedStudentID2[] = $repeatStudent->id;
                                    } else {
                                        $data['errors'] = $examParticipants->errors;
                                    }
                                }
                                //add checked students id to session
                                $_SESSION['checked_RM_students'][$repeatStudent->id] = true;
                            }
                        }
                        // show($selectedRMStudents);
                        // redirect('sar/examination/create/3');

                    }

                    if ($examParticipants->examParticipantValidation($student)) {
                        // $examParticipants->insert($student);

                        // redirect('sar/examination/create/3');
                    } else {
                        $data['errors'] = $examParticipants->errors;
                    }

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

                            $timeTableData[] = $timeTableRow;
                            // $examtimetable->insert($timeTableRow);
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