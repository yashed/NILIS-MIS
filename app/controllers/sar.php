<?php

class SAR extends Controller
{
    function __construct()
    {
        // if (!Auth::is_dr()) {
        //     message('You are not authorized to view this page');
        //     redirect('login');
        // }

    }

    public function index($checkUser = false)
    {

        //uncoment this to add autherization to sar
        // if (!Auth::is_sar()) {
        //     message('You are not authorized to view this page', 'error');
        //     header('Location: login');
        // }

        $degree = new Degree();

        $data['degrees'] = $degree->findAll();
        $data['checkUser'] = $checkUser;

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

        //get the degree id from the url
        $degreeID = isset($_GET['degreeID']) ? $_GET['degreeID'] : null;
        $examID = isset($_GET['examID']) ? $_GET['examID'] : null;

        //need to get the semster to handel the two yaer exam
        $semester = isset($_GET['semester']) ? $_GET['semester'] : null;

        // show($degreeID);
        // show($degreeID);

        //need to get these values form the session
        $degreeID = 4;
        $semester = 1;
        $examID = 63;

        $model = new Model();
        $degree = new Degree();
        $student = new StudentModel();
        $examParticipants = new ExamParticipants();
        $medicalStudents = new MedicalStudents();
        $repeatStudents = new RepeatStudents();
        $examtimetable = new ExamTimeTable();
        $subjects = new Subjects();
        $exam = new Exam();
        $resultSheet = new ResultSheet();
        $examAttendance = new Attendance();

        $data['errors'] = [];
        $data['degrees'] = $degree->findAll();
        $data['students'] = $student->where(['degreeID' => $degreeID]);
        $data['subjects'] = $subjects->where(['degreeID' => $degreeID, 'semester' => $semester]);

        //get exam details with degree details
        $dataTables = ['degree'];
        $columns = ['*'];
        $examConditions = ['exam.degreeID = degree.DegreeID', 'exam.degreeID= ' . $degreeID];
        $data['examDetails'] = $exam->join($dataTables, $columns, $examConditions);


        //need complete filtering part of repeat and medical students data
        // $data['medicalStudents'] = $medicalStudents->where(['degreeID' => 1, 'semester' => 1, 'status' => 1]);
        $repeatStudents->setid(1000);
        // $data['repeatStudents'] = $repeatStudents->where(['degreeID' => 1, 'semester' => 1, 'paymentStatus' => 1]);
        // show($data['repeatStudents']);


        $selectedNormalStudents = [];
        $selectedRMStudents = [];
        $processedStudentID = [];
        $processedStudentID2 = [];
        $timeTableData = [];
        $ExamData = [];


        //remove session data
        if (!empty($_SESSION['examDetails'])) {
            unset($_SESSION['examDetails']);
        }

        //Get currect Degree short name
        $degreeShortName = [$degree->where(['DegreeID' => $degreeID])[0]->DegreeShortName];


        if ($method == "create" && $id == "0") {

            if (isset($_POST['submit']) && !empty($_POST['exam-type'])) {

                //add examination creation data to session
                $_SESSION['exam-creation-details'] = $_POST;

                if ($_POST['exam-type'] == 'normal') {
                    redirect('sar/examination/create/1');
                } else if ($_POST['exam-type'] == 'special') {
                    redirect('sar/examination/special/1');
                }
            }

            $this->view('sar-interfaces/sar-createexam-0', $data);

        } else if ($method == "special" && $id == 1) {

            $selectedSemester = $_SESSION['exam-creation-details']['semester'];
            // show($selectedSemester);



            //get the current degree short name
            $degreeShortName = [$degree->where(['DegreeID' => $degreeID])[0]->DegreeShortName];
            //Get join data from medical students and degree tables
            $tables = ['degree'];
            $columns = ['*'];
            $conditions1 = ['medical_students.degreeID = degree.degreeID', 'medical_students.status=1', 'medical_students.semester= ' . $selectedSemester];
            $whereConditions1 = ['medical_students.degreeShortName =' . "'" . $degreeShortName[0] . "'"];
            $joinStudnetData1 = $medicalStudents->joinWhere($tables, $columns, $conditions1, $whereConditions1);

            // show($degreeShortName);
            // show($joinStudnetData1);

            //Get join data from repeat students and degree tables 
            $conditions2 = ['repeat_students.degreeID = degree.degreeID', 'repeat_students.paymentStatus=1', 'repeat_students.semester= ' . $selectedSemester];
            $whereConditions2 = ['repeat_students.degreeShortName=' . "'" . $degreeShortName[0] . "'"];
            $joinStudnetData2 = $repeatStudents->joinWhere($tables, $columns, $conditions2, $whereConditions2);

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


            if (isset($_POST['submit']) || isset($_POST['cancel'])) {

                if ($_POST['cancel'] == 'cancel-special') {

                    if (!empty($_SESSION['checked_normal_students'])) {
                        unset($_SESSION['checked_normal_students']);
                    }
                    if (!empty($_SESSION['checked_RM_students'])) {
                        unset($_SESSION['checked_RM_students']);
                    }
                    if (!empty($_SESSION['Selected_Normal_Students'])) {
                        unset($_SESSION['Selected_Normal_Students']);
                    }
                    if (!empty($_SESSION['Selected_RM_Students'])) {
                        unset($_SESSION['Selected_RM_Students']);
                    }
                    if (!empty($_SESSION['Special-Exam-Participants'])) {
                        unset($_SESSION['Special-Exam-Participants']);
                    }
                    if (!empty($_SESSION['exam-creation-details'])) {
                        unset($_SESSION['exam-creation-details']);
                    }

                    redirect('sar/examination/create/0');
                }

                if ($_POST['submit'] == 'special-next2') {

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
                                    $medicalStudent->degreeID = $degreeID;
                                    $medicalStudent->semester = $semester;
                                    $medicalStudent->attempt = $medicalStudent->attempt;
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

                                    //need to slove this issue
                                    $repeatStudent->degreeID = $degreeID;
                                    $repeatStudent->semester = $semester;
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
                        //create null array to pass as argument
                        $nullArray = [];
                        $_SESSION['Selected_RM_Students'] = $selectedRMStudents;

                        $distinctDataSpecial = $examParticipants->getDistinctElements($nullArray, $_SESSION['Selected_RM_Students'], 'indexNo');
                        $_SESSION['Special-Exam-Participants'] = $distinctDataSpecial;
                        redirect('sar/examination/special/2');

                    }

                    if ($examParticipants->examParticipantValidation($student)) {
                        // $examParticipants->insert($student);

                        // redirect('sar/examination/create/3');
                    } else {
                        $data['errors'] = $examParticipants->errors;
                    }
                }
            }

            $this->view('sar-interfaces/sar-createexam-special-1', $data);

        } else if ($method == "special" && $id == 2) {

            if (isset($_POST['submit'])) {
                if ($_POST['submit'] == "timetable-special") {

                    //exam creation
                    $ExamData['examType'] = 'Special';
                    $ExamData['degreeID'] = $degreeID;
                    $ExamData['semester'] = $semester;
                    $ExamData['status'] = 'ongoing';

                    //insert data to exam table
                    if ($exam->examValidate($ExamData)) {
                        $exam->insert($ExamData);
                        $examID = $exam->lastID('examID');

                    } else {
                        $data['errors'] = $exam->errors;
                    }

                    $subCount = count($_POST['subName']);

                    for ($x = 0; $x < $subCount; $x++) {
                        $timeTableRow['subjectCode'] = $_POST['subCode'][$x];
                        $timeTableRow['subjectName'] = $_POST['subName'][$x];
                        $timeTableRow['date'] = $_POST['examDate'][$x];
                        $timeTableRow['time'] = $_POST['examTime'][$x];
                        $timeTableRow['degreeID'] = '01';
                        $timeTableRow['semester'] = 01;
                        $timeTableRow['examID'] = $examID;

                        $timeTableData[] = $timeTableRow;

                    }
                    $examCreation = true;
                    if (empty($data['errors'])) {
                        $selectedRMStudents = $_SESSION['Selected_RM_Students'];
                        $examParticipantsData = $_SESSION['Special-Exam-Participants'];




                        // foreach ($selectedNormalStudents as $student) {
                        //     //unset the student id
                        //     unset($student->id);
                        //     $student->examID = $examID;
                        //     show($student);
                        //     $examParticipants->insert($student);
                        // }
                        // foreach ($selectedRMStudents as $student) {
                        //     //unset the student id  
                        //     unset($student->id);
                        //     $student->examID = $examID;
                        //     show($student);
                        //     $examParticipants->insert($student);
                        // }


                        foreach ($examParticipantsData as $student) {
                            //convert object to array
                            $student = (object) $student;
                            //unset the student id
                            if (!empty($student->id)) {
                                unset($student->id);
                            }
                            $student->examID = $examID;
                            $examParticipants->insert($student);
                        }

                        //need to add actucal data to add data to tables
                        foreach ($timeTableData as $timeTableRow) {
                            show($timeTableRow);
                            //validate the exam timetable data
                            if ($examtimetable->examTimetableValidate($timeTableRow)) {

                                $examtimetable->insert($timeTableRow);
                            } else {
                                $examCreation = false;
                                $data['errors'] = $examtimetable->errors;
                            }
                        }



                        if ($examCreation) {
                            message("Exam Was Created Successfully", "success");
                            redirect('sar/examination');
                        }

                    }
                }
            }


            $data['errors'] = $examtimetable->errors;


            $this->view('sar-interfaces/sar-createexam-special-2', $data);

        } else if ($method == "create" && $id == 1) {

            if (isset($_POST['submit']) || isset($_POST['cancel'])) {

                if ($_POST['cancel'] == 'cancel') {

                    if (!empty($_SESSION['checked_normal_students'])) {
                        unset($_SESSION['checked_normal_students']);
                    }
                    if (!empty($_SESSION['checked_RM_students'])) {
                        unset($_SESSION['checked_RM_students']);
                    }
                    if (!empty($_SESSION['Selected_Normal_Students'])) {
                        unset($_SESSION['Selected_Normal_Students']);
                    }
                    if (!empty($_SESSION['Selected_RM_Students'])) {
                        unset($_SESSION['Selected_RM_Students']);
                    }
                    if (!empty($_SESSION['Normal-Exam-Participants'])) {
                        unset($_SESSION['Normal-Exam-Participants']);
                    }
                    if (!empty($_SESSION['Special-Exam-Participants'])) {
                        unset($_SESSION['Special-Exam-Participants']);
                    }
                    if (!empty($_SESSION['exam-creation-details'])) {
                        unset($_SESSION['exam-creation-details']);
                    }

                    redirect('sar/examination/create/0');
                }

                if ($_POST['submit'] == "next1") {

                    //remove session data about checked students
                    unset($_SESSION['checked_normal_students']);

                    $selectedIds = $_POST['item'];

                    //get semster from session
                    $selectedSemester = $_SESSION['exam-creation-details']['semester'];

                    //Select only selected student's data
                    //Handel Selected students data
                    if (empty($selectedIds)) {
                        redirect('sar/examination/create/2');
                    } else {
                        foreach ($data['students'] as $student) {
                            if (in_array($student->id, $selectedIds)) {
                                if (!in_array($student->id, $processedStudentID)) {
                                    $student->degreeID = $degreeID;
                                    $student->semester = $selectedSemester;
                                    $student->attempt = 1;
                                    $student->studentType = 'initial';

                                    // Check if the data about the student already exists
                                    if ($examParticipants->examParticipantValidation($student)) {
                                        // Add student to the array
                                        //we can use this array to insert data to exam participants table
                                        $selectedNormalStudents[] = $student;
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
                        $_SESSION['Selected_Normal_Students'] = $selectedNormalStudents;
                        // show($selectedNormalStudents);
                        redirect('sar/examination/create/2');

                    }

                }
            }
            $this->view('sar-interfaces/sar-createexam-normal-1', $data);
        } else if ($method == "create" && $id == 2) {

            //get semster from session
            $selectedSemester = $_SESSION['exam-creation-details']['semester'];



            //get the current degree short name
            $degreeShortName = [$degree->where(['DegreeID' => $degreeID])[0]->DegreeShortName];
            //Get join data from medical students and degree tables
            $tables = ['degree'];
            $columns = ['*'];
            $conditions1 = ['medical_students.degreeID = degree.degreeID', 'medical_students.status=1', 'medical_students.semester= ' . $selectedSemester];
            $whereConditions1 = ['medical_students.degreeShortName =' . "'" . $degreeShortName[0] . "'"];
            $joinStudnetData1 = $medicalStudents->joinWhere($tables, $columns, $conditions1, $whereConditions1);

            // show($degreeShortName);


            //Get join data from repeat students and degree tables 
            $conditions2 = ['repeat_students.degreeID = degree.degreeID', 'repeat_students.paymentStatus=1', 'repeat_students.semester= ' . $selectedSemester];
            $whereConditions2 = ['repeat_students.degreeShortName=' . "'" . $degreeShortName[0] . "'"];
            $joinStudnetData2 = $repeatStudents->joinWhere($tables, $columns, $conditions2, $whereConditions2);



            //filter medical students data according to degree short name
            //students are repeate the exam with next batch and they have different degree id that is why it checks the desgree short name
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


            // show($_POST);
            if (isset($_POST['submit']) || isset($_POST['back2'])) {
                if ($_POST['submit'] == 'next2' || $_POST['back2'] == 'back2') {
                    //remove checked students ids to session
                    unset($_SESSION['checked_RM_students']);

                    $selectedIds = $_POST['item'];



                    if (empty($selectedIds)) {
                        redirect('sar/examination/create/3');
                    } else {

                        // show($data['medicalStudents']);
                        // show($data['repeatStudents']);

                        $rmStudentData = $data['medicalStudents'] + $data['repeatStudents'];
                        // show($rmStudentData);


                        //Handel Selected Medical submitted students data
                        foreach ($data['medicalStudents'] as $medicalStudent) {
                            if (in_array($medicalStudent->id, $selectedIds)) {
                                if (!in_array($medicalStudent->id, $processedStudentID2)) {

                                    $medicalStudent->semester = $selectedSemester;
                                    $medicalStudent->attempt = $medicalStudent->attempt;
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

                                    //need to slove this issue
                                    $repeatStudent->semester = $selectedSemester;
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
                        $_SESSION['Selected_RM_Students'] = $selectedRMStudents;

                        $distinctData = $examParticipants->getDistinctElements($_SESSION['Selected_Normal_Students'], $_SESSION['Selected_RM_Students'], 'indexNo');
                        $_SESSION['Normal-Exam-Participants'] = $distinctData;

                        if (!empty($_POST['back2'])) {
                            if ($_POST['back2'] == 'back2') {
                                redirect('sar/examination/create/1');
                            }

                        }
                        // redirect('sar/examination/create/3');

                    }

                    if ($examParticipants->examParticipantValidation($distinctData)) {
                        // $examParticipants->insert($student);

                        // redirect('sar/examination/create/3');
                    } else {
                        $data['errors'] = $examParticipants->errors;
                    }
                }
            }

            $this->view('sar-interfaces/sar-createexam-normal-2', $data);
        } else if ($method == "create" && $id == 3) {

            //get semster from session
            $selectedSemester = $_SESSION['exam-creation-details']['semester'];

            if (isset($_POST['submit'])) {
                if ($_POST['submit'] == "timetable") {

                    //exam creation
                    $ExamData['examType'] = 'Normal';
                    $ExamData['degreeID'] = $degreeID;
                    $ExamData['semester'] = $selectedSemester;
                    $ExamData['status'] = 'ongoing';

                    //insert data to exam table
                    if ($exam->examValidate($ExamData)) {
                        $exam->insert($ExamData);
                        $examID = $exam->lastID('examID');

                    } else {
                        $data['errors'] = $exam->errors;
                    }

                    $subCount = count($_POST['subName']);

                    for ($x = 0; $x < $subCount; $x++) {
                        $timeTableRow['subjectCode'] = $_POST['subCode'][$x];
                        $timeTableRow['subjectName'] = $_POST['subName'][$x];
                        $timeTableRow['date'] = $_POST['examDate'][$x];
                        $timeTableRow['time'] = $_POST['examTime'][$x];
                        $timeTableRow['degreeID'] = '01';
                        $timeTableRow['semester'] = $selectedSemester;
                        $timeTableRow['examID'] = $examID;

                        $timeTableData[] = $timeTableRow;

                    }

                    if (empty($data['errors'])) {
                        $selectedRMStudents = $_SESSION['Selected_RM_Students'];
                        $selectedNormalStudents = $_SESSION['Selected_Normal_Students'];
                        $examParticipantsData = $_SESSION['Normal-Exam-Participants'];



                        foreach ($examParticipantsData as $student) {

                            //comvert object to array
                            $student = (object) $student;
                            //unset the student id
                            if (!empty($student->id)) {

                                unset($student->id);
                            }

                            $student->examID = $examID;
                            $examParticipants->insert($student);
                        }


                        // foreach ($selectedNormalStudents as $student) {
                        //     //unset the student id
                        //     unset($student->id);
                        //     $student->examID = $examID;
                        //     $examParticipants->insert($student);
                        // }
                        // foreach ($selectedRMStudents as $student) {
                        //     //unset the student id
                        //     unset($student->id);
                        //     $student->examID = $examID;
                        //     $examParticipants->insert($student);
                        // }


                        //need to add actucal data to add data to tables
                        $createExam = true;
                        foreach ($timeTableData as $timeTableRow) {
                            //validate the exam timetable data
                            if ($examtimetable->examTimetableValidate($timeTableRow)) {
                                $examtimetable->insert($timeTableRow);
                            } else {
                                $createExam = false;
                                $data['errors'] = $examtimetable->errors;
                            }
                        }

                        if ($createExam) {
                            message("Exam Was Created Successfully", "success");
                            redirect('sar/examination');
                        }

                    }
                }
            }


            $data['errors'] = $examtimetable->errors;
            $this->view('sar-interfaces/sar-createexam-normal-3', $data);
        } else {



            //get examid and degree id from link
            $degreeID = isset($_GET['degreeID']) ? $_GET['degreeID'] : null;
            $examID = isset($_GET['examID']) ? $_GET['examID'] : null;

            //add examination details to the session
            $_SESSION['examDetails'] = $exam->where(['examID' => $examID]);

            //set examination id
            if (!empty($_SESSION['examDetails'])) {
                $examID = $_SESSION['examDetails'][0]->examID;

            }

            //get subjects in the exam
            $ExamSubjects = $subjects->where(['degreeID' => $degreeID, 'semester' => $semester]);

            if ($method == 'participants') {

                $admissionMail = new Mail();

                //handle the attendance popup
                $attetdancePopup = false;

                $table = ['student'];
                $columns = ['student.Email', 'student.name'];
                $conditions0 = ['student.degreeID = exam_participants.DegreeID', 'student.indexNo = exam_participants.indexNo', 'exam_participants.examID= ' . $examID];
                $participantsMailName = $examParticipants->join($table, $columns, $conditions0);



                //get the count of exam participants
                $numberOfStudnets = $examParticipants->count(['examID' => $examID]);

                $participants[] = $examParticipants->where(['examID' => $examID]);
                // show($participants);


                //run the mail sending function after click the button
                if (isset($_POST['admission']) == 'clicked') {
                    $mailSendCheck = true;
                    foreach ($participantsMailName as $participant) {
                        $to = $participant->Email;
                        $mailSubject = "Admission Card";
                        $name = $participant->name;

                        //send mails 
                        // if ($admissionMail->send($to, $mailSubject, '', $name) == false) {
                        //     $mailSendCheck = false;
                        // }
                    }

                    //need to add a message to show the result of the mail sending
                    if ($mailSendCheck) {
                        message("Admission Cards Sent Successfully", "success");
                        $_POST['admission'] = '';
                    } else {
                        message("Admission Cards Sent Failed", "error");
                    }
                }

                //examination attendance handle
                if (isset($_POST['selectSubject']) == 'selectSubjectCode') {
                    $selectedSubject = $_POST['SelectedSubCode'];
                    $data['selectedSubject'] = $selectedSubject;
                    //set popup active after select subject
                    if (!empty($selectedSubject)) {
                        $attetdancePopup = true;

                        $examStudents = [];

                        //get semester from session
                        $semester = $_SESSION['examDetails'][0]->semester;

                        //get students data from exam participants table
                        $tables = ['student'];
                        $columns = ['*'];
                        $conditions1 = ['student.degreeID = exam_participants.DegreeID', 'student.indexNo = exam_participants.indexNo', 'exam_participants.studentType="initial"', 'exam_participants.examID= ' . $examID];
                        $Participants = $examParticipants->join($tables, $columns, $conditions1);


                        //append data to examStudents array
                        foreach ($Participants as $participant) {

                            $examStudents[] = $participant;

                        }

                        //get repeat student details
                        $tables = ['repeat_students', 'student'];
                        $columns = ['*'];
                        $condition2 = ['repeat_students.indexNo = exam_participants.indexNo', 'student.indexNo = repeat_students.indexNo'];
                        $whereCondition2 = ['exam_participants.examID= ' . $examID, 'exam_participants.studentType = "repeate"', 'repeat_students.semester = ' . $semester, 'repeat_students.paymentStatus = 1'];
                        $RepeatStudents = $examParticipants->joinWhere($tables, $columns, $condition2, $whereCondition2);



                        //get selected subject repeate students
                        if (!empty($RepeatStudents)) {
                            foreach ($RepeatStudents as $Rparticipant) {

                                if ($Rparticipant->subjectCode == $selectedSubject) {
                                    //append data to examStudents array

                                    $examStudents[] = $Rparticipant;
                                }
                            }
                        }
                        //get medical student details
                        $tables = ['medical_students', 'student'];
                        $columns = ['*'];
                        $condition3 = ['medical_students.indexNo = exam_participants.indexNo', 'student.indexNo = medical_students.indexNo'];
                        $whereCondition3 = ['medical_students.semester = ' . $semester, 'medical_students.status = 1', 'exam_participants.examID= ' . $examID, 'exam_participants.studentType = "medical"'];
                        $MedicalStudents = $examParticipants->joinWhere($tables, $columns, $condition3, $whereCondition3);


                        //get selected subject medical students
                        if (!empty($MedicalStudents)) {
                            foreach ($MedicalStudents as $Mparticipant) {
                                if ($Mparticipant->subjectCode == $selectedSubject) {

                                    //append data to examStudents array
                                    $examStudents[] = $Mparticipant;
                                }
                            }
                        }


                        //insert data into the exam attendance table
                        foreach ($examStudents as $student) {

                            $studentData = [];
                            $studentData['examID'] = $_SESSION['examDetails'][0]->examID;
                            $studentData['degreeID'] = $student->degreeID;
                            $studentData['semester'] = $student->semester;
                            $studentData['subjectCode'] = $selectedSubject;
                            $studentData['attempt'] = $student->attempt;
                            $studentData['type'] = $student->studentType;
                            $studentData['regNo'] = $student->regNo;
                            $studentData['indexNo'] = $student->indexNo;

                            if ($examAttendance->ValidateAttendance($studentData)) {
                                $examAttendance->insert($studentData);
                            }
                        }


                        //get data from exam attendance table and pass them to view
                        $setStudents = $examAttendance->where(['examID' => $examID, 'subjectCode' => $selectedSubject]);
                        // show($setStudents);
                        $data['setStudents'] = $setStudents;

                    }
                }
                if (isset($_POST['submitAttendance']) == 'attendance') {

                    //get abset students data from post data
                    $presendIds = $_POST['presentIds'];
                    $allIds = $_POST['ids'];

                    if (!empty($presendIds) && !empty($allIds)) {
                        $absentIds = array_diff($allIds, $presendIds);

                    }

                    //update the attendance table with present students
                    foreach ($presendIds as $id) {

                        $examAttendance->updateRows(
                            ['attendance' => 1],
                            ['id' => $id]
                        );
                    }

                    //update the attendance table with absent students
                    foreach ($absentIds as $id) {
                        $examAttendance->updateRows(
                            ['attendance' => 0],
                            ['id' => $id]
                        );
                    }


                    //close the popup
                    $attetdancePopup = false;
                    message("Attendance Submitted Successfully", "success");
                    activity("Attendance Submitted Successfully");

                }


                //data that pass to view

                $data['examParticipants'] = $participants;
                $data['examID'] = $examID;
                $data['degreeID'] = $degreeID;
                $data['ExamSubjects'] = $ExamSubjects;
                $data['attendacePopupStatus'] = $attetdancePopup;


                $this->view('sar-interfaces/sar-examparticipants', $data);
                //send mails 
                // if ($admissionMail->send($to, $mailSubject, '', $name) == false) {
                //     $mailSendCheck = false;
                // }

            } else if ($method == 'resultsupload') {

                //redirect ro examination page if examID null
                if (empty($examID)) {
                    redirect('sar/examination');
                }

                //get students data from exam participants table
                $tables = ['student'];
                $columns = ['*'];
                $conditions1 = ['student.indexNo = exam_participants.indexNo'];
                $whereCondition1 = ['exam_participants.examID= ' . $examID];
                $Participants = $examParticipants->joinWhere($tables, $columns, $conditions1, $whereCondition1);
                // show($Participants);

                //get repeat student details
                $tables = ['repeat_students', 'student'];
                $columns = ['*'];
                $condition2 = ['repeat_students.degreeID = exam_participants.DegreeID', 'repeat_students.indexNo = exam_participants.indexNo', 'exam_participants.examID= ' . $examID, 'exam_participants.studentType = "repeate"', 'student.indexNo = repeat_students.indexNo'];
                $RepeatStudents = $examParticipants->join($tables, $columns, $condition2);
                // show($RepeatStudents);

                //get medical student details
                $tables = ['medical_students', 'student'];
                $columns = ['*'];
                $condition3 = ['medical_students.degreeID = exam_participants.DegreeID', 'medical_students.indexNo = exam_participants.indexNo', 'exam_participants.examID= ' . $examID, 'exam_participants.studentType = "medical"', 'student.indexNo = medical_students.indexNo'];
                $MedicalStudents = $examParticipants->join($tables, $columns, $condition3);

                // show($MedicalStudents);
                $NormalParticipants = [];


                //repeat students subject code == subject code in loop

                //Catogaries participants and store these data in array
                if (!empty($Participants)) {
                    foreach ($Participants as $participant) {
                        if ($participant->studentType == 'initial') {
                            $NormalParticipants[] = $participant;
                        }
                    }

                }


                $data['examSubjects'] = $ExamSubjects;
                //generate seperate CSV files for each subject
                if (!empty($ExamSubjects)) {
                    foreach ($ExamSubjects as $subject) {

                        //generate marksheet as csv file 
                        $head = 'Name of  Programme  : ' . $degreeID; //must change to degree name
                        $title = 'Subject  : ' . $subject->SubjectName;

                        $rowHeadings = ['Index No', 'Registration No', 'Examiner 01 Marks', 'Examiner 02 Marks', 'Assignment Marks', 'Examiner 03 Marks'];
                        $markSheet = 'assets/csv/output/MarkSheet_' . $subject->SubjectCode . '.csv';
                        $f = fopen($markSheet, 'w');


                        if ($f == false) {
                            echo 'file is not open successfully';
                        } else {


                            // Write the header row to the CSV file
                            fputcsv($f, [$head]);
                            fputcsv($f, [$title]);
                            fputcsv($f, array());
                            fputcsv($f, $rowHeadings);

                            //add indexNo and regNo to marksheet
                            if (!empty($NormalParticipants)) {
                                foreach ($NormalParticipants as $participant) {
                                    $rowData = [$participant->indexNo, $participant->regNo];
                                    fputcsv($f, $rowData);
                                }
                            }
                            //add repeate students details to marksheet
                            if (!empty($Rparticipant)) {
                                foreach ($RepeatStudents as $Rparticipant) {


                                    if ($Rparticipant->subjectCode == $subject->SubjectCode) {
                                        // echo $Rparticipant->subjectCode . " " . $subject->SubjectCode;
                                        // show($Rparticipant);
                                        $rowData = [$Rparticipant->indexNo, $Rparticipant->regNo];
                                        fputcsv($f, $rowData);
                                    }
                                }
                            }

                            //add medical students details to mark sheets
                            if (!empty($Mparticipant)) {
                                foreach ($MedicalStudents as $Mparticipant) {
                                    if ($Mparticipant->subjectCode == $subject->SubjectCode) {
                                        // echo $Rparticipant->subjectCode . " " . $subject->SubjectCode;
                                        // show($Rparticipant);
                                        $rowData = [$Mparticipant->indexNo, $Mparticipant->regNo];
                                        fputcsv($f, $rowData);
                                    }
                                }
                            }
                            fclose($f);
                        }
                    }
                }

                // save file in specific location
                // Check if the file was uploaded successfully


                //get uploaded marksheet details 
                $submittedMarksheets = $resultSheet->where(['examId' => $examID]);
                $groupedData = groupByColumn($submittedMarksheets, 'subjectCode');
                $data['subjectData'] = json_encode($groupedData);

                //delete marksheet from the database
                if (isset($_POST['submit']) == 'delete-rs') {

                    $_POST['examid'] = $examID;

                    //delete marksheet
                    $resultSheet->delete2($_POST);

                    //refresh the page
                    header("Refresh:0");


                }


                if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {

                    // Specify the target directory
                    $targetDirectory = 'assets/csv/examsheets/';

                    // Get the original file name
                    $originalFileName = basename($_FILES['file']['name']);

                    // Generate a unique filename to avoid overwriting existing files
                    $uniqueFileName = $_POST['subjectCode'] . '_' . $examID . '_' . $_POST['type'] . '.csv';

                    // Set the target path
                    $targetPath = $targetDirectory . $uniqueFileName;

                    //catch data and save in variables
                    $subCode = isset($_POST['subjectCode']) ? $_POST['subjectCode'] : '';
                    $formID = isset($_POST['formId']) ? $_POST['formId'] : '';
                    $marksType = isset($_POST['type']) ? $_POST['type'] : '';


                    // Move the uploaded file to the target directory
                    if (move_uploaded_file($_FILES['file']['tmp_name'], $targetPath)) {

                        // File uploaded successfully, now insert data into the database
                        $examSheet = [];
                        $examSheet['formId'] = $formID;
                        $examSheet['subjectCode'] = $subCode;
                        $examSheet['degreeId'] = $degreeID;
                        $examSheet['date'] = date("Y-m-d H:i:s");
                        $examSheet['uploadName'] = $originalFileName;
                        $examSheet['newName'] = $uniqueFileName;
                        $examSheet['type'] = $marksType;
                        $examSheet['examId'] = $examID;



                        // $data['examiner3'] = false;
                        $examiner3 = false;
                        // Insert data into the database
                        if ($resultSheet->examValidate($examSheet)) {


                            //add record to database table
                            $resultSheet->insert($examSheet);
                            $message = 'Upload ' . $marksType . ' Marksheet for ' . $subCode . ' in ExamId = ' . $examID . ' successfully.';


                            //uncomment this to add activity log
                            // activity($message);



                            //call crateMarkSheet function to update csv file
                            createMarkSheet($uniqueFileName, $examID, $subCode, $marksType);

                            echo json_encode(['success' => true, 'message' => 'File uploaded successfully.']);


                            //enable examiner3 marks upload
                            // $data['examiner3'] = true;
                            foreach ($data['subjects'] as $subject) {
                                var_dump('subject code = ' . $subject->SubjectCode);
                                $uploadedRes = $resultSheet->where(['examId' => $examID, 'subjectCode' => $subject->SubjectCode]);
                                // show($uploadedRes);

                                if (is_array($uploadedRes)) {

                                    if (count($uploadedRes) >= 2) {

                                        $validate = false;
                                        foreach ($uploadedRes as $res) {
                                            if ($res->type == 'examiner1' || $res->type == 'examiner2') {
                                                $validate = true;
                                            } else {
                                                $validate = false;
                                            }
                                        }
                                        //check the marks gap between examiner1 and examiner2
                                        if ($validate) {
                                            $fileName = $examID . '_' . $subject->SubjectCode . '.csv';

                                            //call the function to check the gap
                                            if (checkGap($fileName, $examID, $subject->SubjectCode)) {
                                                // $data['examiner3'] = true;
                                                // $data['examiner3SubCode'] = $subject->SubjectCode;
                                                $examiner3 = true;
                                                $examiner3SubCode = $subject->SubjectCode;


                                                /*after upload the examiner 3 marks when we update examination mark 
                                                sheet system has to handle that marksheet also. because if exminer 3 already uploaded 
                                                then it didnt handle the mark sheet again and insert or update marks again*/

                                                //check whether examiner3 marks are available
                                                $examiner3Marks = $resultSheet->where([
                                                    'examId' => $examID,
                                                    'subjectCode' => $subject->SubjectCode,
                                                    'type' => 'examiner3'
                                                ]);

                                                if (!empty($examiner3Marks)) {
                                                    // $data['examiner3'] = true;
                                                    //upload the student marks to database
                                                    $resFileName = $examID . '_' . $subject->SubjectCode . '.csv';

                                                    //call the function to upload marks to database
                                                    insertMarks($resFileName, $examID, $degreeID, $subject->SubjectCode);
                                                } else {
                                                    // $data['examiner3'] = false;
                                                }

                                            } else {
                                                // $data['examiner3'] = false;
                                                $examiner3 = false;
                                                //check whether assestment marks are available
                                                $assignmentMarks = $resultSheet->where([
                                                    'examId' => $examID,
                                                    'subjectCode' => $subject->SubjectCode,
                                                    'type' => 'assestment'
                                                ]);

                                                if (!empty($assignmentMarks)) {
                                                    $data['assignment'] = true;
                                                    //upload the student marks to database
                                                    $resFileName = $examID . '_' . $subject->SubjectCode . '.csv';

                                                    //call the function to upload marks to database
                                                    echo 'call insertMarks function';
                                                    // show($resFileName);
                                                    insertMarks($resFileName, $examID, $degreeID, $subject->SubjectCode);


                                                } else {
                                                    $data['assignment'] = false;

                                                }



                                            }
                                            /** The case in there is when we pass the data into view to show them it must reload 
                                             * but when using fetch it did't reload the file. must fix this  */


                                            /**when uploading marks get the least gap marks and calculate final marks and upload to database
                                             */

                                            // echo json_encode($data);
                                        } else {
                                            if ($marksType == 'examiner3') {
                                                //check whether assestment marks are available
                                                $assignmentMarks = $resultSheet->where([
                                                    'examId' => $examID,
                                                    'subjectCode' => $subject->SubjectCode,
                                                    'type' => 'assestment'
                                                ]);
                                                var_dump("assignment marks ", $assignmentMarks);
                                                if (!empty($assignmentMarks)) {
                                                    $data['assignment'] = true;
                                                    //upload the student marks to database
                                                    $resFileName = $examID . '_' . $subject->SubjectCode . '.csv';

                                                    //call the function to upload marks to database

                                                    // show($resFileName);
                                                    insertMarks($resFileName, $examID, $degreeID, $subject->SubjectCode);


                                                } else {
                                                    $data['assignment'] = false;

                                                }

                                            } else {
                                                echo 'examiner1 or examiner2 marks are not available';
                                            }
                                        }
                                    }
                                }
                            }
                        } else {
                            // Error inserting data into the database
                            $data['errors'] = $resultSheet->errors;
                            // show($data['errors']);
                            // var_dump('errors = ' . $resultSheet->errors['marks']);
                            echo json_encode(['success' => false, 'message' => 'Error inserting data into the database.']);
                        }

                    } else {
                        // Error moving the file
                        echo json_encode(['success' => false, 'message' => 'Error moving the uploaded file.']);
                    }
                    if ($examiner3) {
                        echo (
                            "<div id='examiner3-status'>$examiner3</div>
                              <div id='examiner3SubCode'>$examiner3SubCode</div>"
                        );

                    }



                } else {
                    // Handle file upload error
                    message("File upload error", "error");
                    // echo json_encode(['success' => false, 'message' => 'File upload error.']);
                }






                //pass examid
                $data['examId'] = $examID;
                $this->view('sar-interfaces/sar-examresultupload', $data);



            } else if ($method == 'results') {

                $examMarks = new Marks();

                $examSubjects = $examtimetable->where(['examID' => $examID]);

                if (isset($_POST['submit'])) {


                    $resultSubCode = isset($_POST['subCode']) ? $_POST['subCode'] : '';
                    // show($resultSubCode);


                } else {
                    $resultSubCode = '';
                }

                $subjectDetails = $subjects->where(['SubjectCode' => $resultSubCode, 'DegreeID' => $degreeID]);
                // show($subjectDetails);
                // remove any leading or trailing spaces from the string
                $resultSubCode = trim($resultSubCode);


                //get examination results using marks and final marks
                $tables = ['final_marks'];
                $columns = ['*'];
                $conditions = ['marks.examID = final_marks.examID', 'marks.studentIndexNo = final_marks.studentIndexNo', 'marks.subjectCode = final_marks.subjectCode', 'marks.examID = ' . $examID, 'marks.subjectCode =  "' . $resultSubCode . '"'];
                $examResults = $examMarks->join($tables, $columns, $conditions);
                // show($examResults);



                $data['subNames'] = $examSubjects;
                $data['examResults'] = $examResults;


                $this->view('sar-interfaces/sar-examresults', $data);

            } else {

                $this->view('sar-interfaces/sar-examination', $data);
            }
        }
    }


    // public function participants()
    // {
    //     $this->view('sar-interfaces/sar-participants');
    // }
    public function settings()
    {
        
            $user = new User();
    
    
            if (isset($_POST['update_user_data'])) {
                $id = $_SESSION['USER_DATA']->id;
                $dataToUpdate = [
                    'fname' => $_POST['fname'],
                    'lname' => $_POST['lname'],
                    'email' => $_POST['email'],
                    'phoneNo' => $_POST['phoneNo']
                ];
    
                $user->update($id, $dataToUpdate);
    
                $updatedUserData = $user->first(['id' => $id]);
    
                if ($updatedUserData === null) {
                    echo 'No user data found after update.';
                    exit();
                }
    
                $data['user'] = $updatedUserData;
            } else {
                $id = $_SESSION['USER_DATA']->id;
                $data['user'] = $user->first(['id' => $id]);
    
                if ($data['user'] === null) {
                    echo 'No user data found.';
                    exit();
                }
            }
    
        $this->view('sar-interfaces/sar-settings');
    }

    public function login()
    {
        $this->view('common/login/login.view');
    }
    // public function resultupload()
    // {
    //     $this->view('sar-interfaces/sar-examresultupload');
    // }
    public function results()
    {
        $this->view('sar-interfaces/sar-examresults');
    }
    // public function examparticipants()
    // {
    //     $this->view('sar-interfaces/sar-examparticipants');
    // }
    public function showresults()
    {
        $this->view('sar-interfaces/sar-examresultshow');
    }
    public function notifications()
    {
        $notification = new NotificationModel();
        $notification_count_arr = $notification->countNotificationsSAR();
        $data['notification_count_obj'] = $notification_count_arr[0];
        $data['notifications'] = $notification->findAll();

        $this->view('sar-interfaces/sar-notification',$data);
    }

}