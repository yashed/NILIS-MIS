<?php

class SAR extends Controller
{
    function __construct()
    {
        if (!Auth::is_sar()) {
            message('You are not authorized to view this page', 'error', true);
            redirect('_403_');
        }

    }

    public function index($checkUser = false)
    {
        //uncoment this to add autherization to sar
        // if (!Auth::is_sar()) {
        //     message('You are not authorized to view this page', 'error',true);
        //     header('Location: login');
        // }

        $degree = new Degree();
        $student = new StudentModel();
        $exam = new Exam();
        $degreetimetable = new DegreeTimeTable();
        $finalMarks = new FinalMarks();


        //remove degree data from session
        if (!empty($_SESSION['degreeData'])) {
            unset($_SESSION['degreeData']);
        }
        //remove exam details from session
        if (!empty($_SESSION['examDetails'])) {
            unset($_SESSION['examDetails']);
        }

        //get data to show as upcoming examination in sar dashboard
        $upTable = ['degree'];
        $upColumns = ['*'];
        $upConditions = ['degree_timetable.DegreeID = Degree.DegreeID', 'StartingDate >= CURDATE()'];
        $data['upcomingExams'] = $degreetimetable->join($upTable, $upColumns, $upConditions, 'StartingDate', 2);


        //pass data to graphs and chalender
        $data['degrees'] = $degree->findAll();
        $data['students'] = $student->findAll();
        $data['exam'] = $exam->findAll();
        $data['degreetimetables'] = $degreetimetable->findAll();


        //get last results submitted examination id
        $recentExamId = $finalMarks->lastID('examID');

        //join exam and degree tables
        $dataTables = ['degree'];
        $columns = ['*'];
        $examConditions = ['exam.degreeID = degree.DegreeID', 'exam.examID = ' . $recentExamId];
        $data['RecentResultExam'] = $exam->join($dataTables, $columns, $examConditions);

        $degree = new Degree();

        $data['degrees'] = $degree->findAll();
        $data['checkUser'] = $checkUser;

        $this->view('sar-interfaces/sar-dashboard', $data);
    }
    public function notification()
    {
        $notification = new NotificationModel();

        $data['notifications'] = $notification->findAll();
        $username = $_SESSION['USER_DATA']->username;
        $data['usernames'] = $username;


        $this->view('sar-interfaces/sar-notification', $data);
    }
    public function degreeprograms()
    {

        $degree = new Degree();


        $data['degrees'] = $degree->findAll();


        $this->view('sar-interfaces/sar-degreeprograms', $data);
    }
    public function degreeprofile($action = null, $id = null)
    {
        $degree = new Degree();

        $data = [];
        $data['action'] = $action;
        $data['id'] = $id;
        if (isset($_GET['id'])) {
            $degreeID = isset($_GET['id']) ? $_GET['id'] : null;
            $_SESSION['degreeData'] = $degree->where(['DegreeID' => $degreeID]);
            redirect("sar/degreeprofile");

        }

        $degreeID = $_SESSION['degreeData'][0]->DegreeID;
        // $_SESSION['degreeData']->DegreeID = $degreeID;
        //update session degree data



        // Check if degree ID is provided
        if ($degreeID !== null) {
            $degree = new Degree();
            $subject = new Subjects();
            $degreeTimeTable = new DegreeTimeTable();
            // Fetch the data based on the ID
            $degreeData = $degree->find($degreeID);
            $degreeTimeTableData = $degreeTimeTable->find($degreeID);
            $subjectsData = $subject->find($degreeID);
            $data['degrees'] = $degreeData;
            $subjects = [];
            foreach ($subjectsData as $subject) {
                $semesterNumber = $subject->semester;
                // Create semester array if not already exists
                if (!isset($subjects[$semesterNumber])) {
                    $subjects[$semesterNumber] = [];
                }
                // Add subject to semester array
                $subjects[$semesterNumber][] = $subject;
            }
            $data['subjects'] = $subjects;
            $data['degreeTimeTable'] = $degreeTimeTableData;
            if ($action == "update") {
                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    echo "POST request received";
                    if (isset($_POST['timetableData'])) {
                        $timetableData = json_decode($_POST['timetableData'], true);
                        // Iterate over each subject's data and insert it into the database
                        foreach ($timetableData as $timetableData) {
                            echo "a";
                            // Construct the data array for insertion
                            $data1 = [
                                'EventID' => $timetableData['eventID'],
                                'DegreeID' => $degreeID,
                                'EventName' => $timetableData['eventName'],
                                'EventType' => $timetableData['eventType'],
                                'StartingDate' => $timetableData['eventStart'],
                                'EndingDate' => $timetableData['eventEnd'],
                            ];
                            $degreeTimeTable->update($degreeID, $data1);
                        }
                    }
                }
            } else if ($action == 'delete') {
                $degree->delete(['id' => $degreeID]);
                redirect("sar/degreeprograms");
            }
            // Load the view with the data
            $this->view('sar-interfaces/sar-degreeprofile', $data);
        } else {
            echo "Error: Degree ID not provided in the URL.";
        }
    }


    public function examination($method = null, $id = null)
    {

        //get the degree id from the url
        $examID = isset($_GET['examID']) ? $_GET['examID'] : null;

        //set semester usign session data
        if (!empty($_SESSION['exam-creation-details'])) {
            $selectedSemester = $_SESSION['exam-creation-details']['semester'];
        }

        //need to get these values form the session
        if (!empty($_SESSION['degreeData'])) {
            $degreeID = $_SESSION['degreeData'][0]->DegreeID;

        } else {
            $degreeID = isset($_GET['degreeID']) ? $_GET['degreeID'] : null;
        }

        //unset session message data
        if (!empty($_SESSION['message'])) {
            unset($_SESSION['message']);
        }


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
        $examiner3Eligibility = new Examiner3Subject();
        $finalMarks = new FinalMarks();

        $data['errors'] = [];
        $data['degrees'] = $degree->findAll();
        $data['students'] = $student->where(['degreeID' => $degreeID]);


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
        // if (!empty($_SESSION['examDetails'])) {
        //     unset($_SESSION['examDetails']);
        // }

        //add again examDetaios to session
        if (!empty($examID)) {
            $_SESSION['examDetails'] = $exam->where(['examID' => $examID]);

        }

        //Get currect Degree short name
        $degreeShortName = [$degree->where(['DegreeID' => $degreeID])[0]->DegreeShortName];

        //get the grades of the students join with exam participants table
        $tablesJoin = ['exam_participants'];
        $columnsJoin = ['final_marks.id', 'final_marks.studentIndexNo', 'final_marks.examID', 'final_marks.degreeID', 'final_marks.finalMarks', 'final_marks.grade', 'final_marks.subjectCode', 'exam_participants.studentType', 'exam_participants.semester'];
        $conditionsJoin = ['final_marks.studentIndexNo = exam_participants.indexNo', 'final_marks.examID = exam_participants.examID'];
        $whereConditionsJoin = ['final_marks.grade IS NULL'];
        $marksToGrade = $finalMarks->joinWhere($tablesJoin, $columnsJoin, $conditionsJoin, $whereConditionsJoin);


        //update grades of marks
        if (!empty($marksToGrade)) {
            $finalMarks->updateGrades($marksToGrade);
        }

        //add repete students to repete student table
        //get repete students details(students who has marks less than 50)

        $rtables = ['degree', 'exam_participants'];
        $rcolumns = ['exam_participants.indexNo', 'exam_participants.examID', 'exam_participants.degreeID', 'exam_participants.studentType', 'exam_participants.semester', 'exam_participants.attempt', 'final_marks.subjectCode', 'final_marks.finalMarks', 'final_marks.grade', 'degree.DegreeShortName'];
        $rconditions = ['final_marks.studentIndexNo = exam_participants.indexNo', 'exam_participants.degreeID = degree.DegreeID', 'final_marks.examID = exam_participants.examID'];
        $rwhereConditions = ['final_marks.finalMarks <' . 49.5];
        $repeateStudentsData = $finalMarks->joinWhere($rtables, $rcolumns, $rconditions, $rwhereConditions);


        //add repete students to repete student table
        if (!empty($repeateStudentsData)) {
            $finalMarks->addRepeteStudents($repeateStudentsData);
        }


        //check whether examination creation cancle or not
        if (isset($_POST['cancel-exam'])) {
            if ($_POST['cancel-exam'] == 'cancel') {

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

                redirect('sar/examination');
            }
        }

        if ($method == "create" && $id == "0") {


            if (isset($_POST['submit']) && !empty($_POST['exam-type'])) {

                //add degreeId to post to validation
                $_POST['degreeID'] = $degreeID;
                //add examination creation data to session
                if ($exam->examDataValidation($_POST)) {
                    $_SESSION['exam-creation-details'] = $_POST;

                    if ($_POST['exam-type'] == 'normal') {
                        redirect('sar/examination/create/1');
                    } else if ($_POST['exam-type'] == 'special') {
                        redirect('sar/examination/special/1');
                    }
                }



            }

            $data['errors'] = $exam->errors;
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
            $whereConditions1 = ['medical_students.degreeShortName =' . "'" . $degreeShortName[0] . "'", 'medical_students.written = 0'];
            $joinStudnetData1 = $medicalStudents->joinWhere($tables, $columns, $conditions1, $whereConditions1);

            // show($degreeShortName);
            // show($joinStudnetData1);

            //Get join data from repeat students and degree tables 
            $conditions2 = ['repeat_students.degreeID = degree.degreeID', 'repeat_students.paymentStatus=1', 'repeat_students.semester= ' . $selectedSemester];
            $whereConditions2 = ['repeat_students.degreeShortName=' . "'" . $degreeShortName[0] . "'", 'repeat_students.written = 0'];
            $joinStudnetData2 = $repeatStudents->joinWhere($tables, $columns, $conditions2, $whereConditions2);

            if (!empty($joinStudnetData1)) {
                foreach ($joinStudnetData1 as $medicalStudent) {
                    if (in_array($medicalStudent->DegreeShortName, $degreeShortName)) {
                        $data['medicalStudents'][] = $medicalStudent;
                    }
                }
            }

            if (!empty($joinStudnetData2)) {
                foreach ($joinStudnetData2 as $repeatStudent) {
                    if (in_array($repeatStudent->DegreeShortName, $degreeShortName)) {
                        $data['repeatStudents'][] = $repeatStudent;
                    }
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
                        redirect('sar/examination/special/2');
                    } else {

                        //Handel Selected Medical submitted students data
                        foreach ($data['medicalStudents'] as $medicalStudent) {
                            if (in_array($medicalStudent->id, $selectedIds)) {
                                if (!in_array($medicalStudent->id, $processedStudentID2)) {
                                    $medicalStudent->degreeID = $degreeID;
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
                                    $repeatStudent->degreeID = $degreeID;
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

                        //check if there both repete and medical students
                        $rmStudents = processStudents($selectedRMStudents);

                        // show($selectedRMStudents);
                        //create null array to pass as argument
                        $nullArray = [];
                        $_SESSION['Selected_RM_Students'] = $rmStudents;

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

            //get semster from session
            $selectedSemester = $_SESSION['exam-creation-details']['semester'];

            //subject data
            $data['subjects'] = $subjects->where(['degreeID' => $degreeID, 'semester' => $selectedSemester]);

            if (isset($_POST['submit'])) {
                if ($_POST['submit'] == "timetable-special") {

                    //exam creation
                    $ExamData['examType'] = 'Special';
                    $ExamData['degreeID'] = $degreeID;
                    $ExamData['semester'] = $_SESSION['exam-creation-details']['semester'];
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
                            message("Exam Was Created Successfully", "success", true);
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
                        $_SESSION['Selected_Normal_Students'] = [];
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
            $whereConditions1 = ['medical_students.degreeShortName =' . "'" . $degreeShortName[0] . "'", 'medical_students.written = 0'];
            $joinStudnetData1 = $medicalStudents->joinWhere($tables, $columns, $conditions1, $whereConditions1);

            // show($degreeShortName);


            //Get join data from repeat students and degree tables 
            $conditions2 = ['repeat_students.degreeID = degree.degreeID', 'repeat_students.paymentStatus=1', 'repeat_students.semester= ' . $selectedSemester];
            $whereConditions2 = ['repeat_students.degreeShortName=' . "'" . $degreeShortName[0] . "'", 'repeat_students.written = 0', 'repeat_students.attempt <' . 5];
            //need add condition about the attempt of repete student <5
            $joinStudnetData2 = $repeatStudents->joinWhere($tables, $columns, $conditions2, $whereConditions2);



            //filter medical students data according to degree short name
            //students are repeate the exam with next batch and they have different degree id that is why it checks the desgree short name

            if (!empty($joinStudnetData1)) {
                foreach ($joinStudnetData1 as $medicalStudent) {
                    if (in_array($medicalStudent->DegreeShortName, $degreeShortName)) {
                        $data['medicalStudents'][] = $medicalStudent;
                    }
                }
            }

            if (!empty($joinStudnetData2)) {
                foreach ($joinStudnetData2 as $repeatStudent) {
                    if (in_array($repeatStudent->DegreeShortName, $degreeShortName)) {
                        $data['repeatStudents'][] = $repeatStudent;
                    }
                }
            }

            // show($_POST);
            if (isset($_POST['submit']) || isset($_POST['back2'])) {
                if ($_POST['submit'] == 'next2' || $_POST['back2'] == 'back2') {
                    //remove checked students ids to session
                    unset($_SESSION['checked_RM_students']);

                    $selectedIds = $_POST['item'];

                    if (empty($selectedIds)) {
                        if ($_POST['submit'] == 'next2') {

                            //set session data to null
                            $_SESSION['Selected_RM_Students'] = null;
                            redirect('sar/examination/create/3');

                        } else if ($_POST['back2'] == 'back2') {
                            redirect('sar/examination/create/1');
                        }

                    } else {

                        // show($data['medicalStudents']);
                        // show($data['repeatStudents']);

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
                                $_SESSION['checked_RM_students']['medical'][$medicalStudent->id] = true;
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
                                $_SESSION['checked_RM_students']['repeat'][$repeatStudent->id] = true;
                            }
                        }

                        //check if there both repete and medical students (consider student type repete, medical , medical/repeate)
                        $rmStudents = processStudents($selectedRMStudents);

                        //add processed students to session
                        $_SESSION['Selected_RM_Students'] = $rmStudents;



                        if (!empty($_POST['back2'])) {
                            if ($_POST['back2'] == 'back2') {
                                redirect('sar/examination/create/1');
                            }
                        }
                        if (!empty($_POST['submit'])) {
                            if ($_POST['submit'] == 'next2') {
                                redirect('sar/examination/create/3');
                            }
                        }

                    }
                }
            }

            $this->view('sar-interfaces/sar-createexam-normal-2', $data);

        } else if ($method == "create" && $id == 3) {

            // show($_SESSION['checked_RM_students']);

            //get RM students and generate distinct student data list

            $distinctData = $examParticipants->getDistinctElements($_SESSION['Selected_Normal_Students'], $_SESSION['Selected_RM_Students'], 'indexNo');
            $_SESSION['Normal-Exam-Participants'] = $distinctData;

            //get semster from session
            $selectedSemester = $_SESSION['exam-creation-details']['semester'];
            $selectedExamDetails = $exam->where(['degreeID' => $degreeID, 'semester' => $selectedSemester, 'status' => 'upcoming']);

            //get new examid
            if (!empty($selectedExamDetails)) {

                $examID = $selectedExamDetails[0]->examID;
            }


            //subject data
            $data['subjects'] = $subjects->where(['degreeID' => $degreeID, 'semester' => $selectedSemester]);


            if (isset($_POST['submit'])) {
                if ($_POST['submit'] == "timetable") {


                    //update exam status as ongoing 
                    $exam->updateRows
                    (
                        ['status' => 'ongoing'],
                        ['examID' => $examID]
                    );


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
                            show($student);
                            show($examID);
                            $student->examID = $examID;
                            $examParticipants->insert($student);
                        }

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
                            message("Exam Was Created Successfully", "success", true);
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


            if (!empty($examID)) {
                //add examination details to the session
                $_SESSION['examDetails'] = $exam->where(['examID' => $examID]);
            }

            //set examination id
            if (!empty($_SESSION['examDetails'])) {
                $examID = $_SESSION['examDetails'][0]->examID;
                $semester = $_SESSION['examDetails'][0]->semester;
                $degreeID = $_SESSION['examDetails'][0]->degreeID;

            } else {

                $examID = null;
                $semester = null;
            }

            //get subject details
            $data['subjects'] = $subjects->where(['degreeID' => $degreeID, 'semester' => $semester]);

            //get subjects in the exam
            $ExamSubjects = $subjects->where(['degreeID' => $degreeID, 'semester' => $semester]);

            if ($method == 'participants') {

                if (!empty($_GET['examID']) && !empty($_GET['degreeID'])) {
                    redirect('sar/examination/participants');
                }


                $admissionMail = new Mail();

                //handle the attendance popup
                $attetdancePopup = false;

                $table = ['student'];
                $columns = ['student.Email', 'student.name'];
                $conditions0 = ['student.degreeID = exam_participants.DegreeID', 'student.indexNo = exam_participants.indexNo', 'exam_participants.examID= ' . $examID];
                $participantsMailName = $examParticipants->join($table, $columns, $conditions0);



                //get the count of exam participants
                $data['examCount'] = $examParticipants->count(['examID' => $examID]);

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
                        if ($admissionMail->send($to, $mailSubject, '', $name) == false) {
                            $mailSendCheck = false;
                        }
                    }

                    //need to add a message to show the result of the mail sending
                    if ($mailSendCheck) {
                        message("Admission Cards Sent Successfully", "success", true);
                        $_POST['admission'] = '';
                    } else {
                        message("Admission Cards Sent Failed", "error", true);
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

                        if (!empty($Participants)) {
                            foreach ($Participants as $participant) {

                                $examStudents[] = $participant;
                            }
                        }

                        //get repeat student details
                        $tables = ['repeat_students', 'student'];
                        $columns = ['*'];
                        $condition2 = ['repeat_students.indexNo = exam_participants.indexNo', 'student.indexNo = repeat_students.indexNo'];
                        $whereCondition2 = ['exam_participants.examID= ' . $examID, '(exam_participants.studentType = "repeate") OR (exam_participants.studentType = "medical/repeat")', 'repeat_students.semester = ' . $semester, 'repeat_students.paymentStatus = 1'];
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
                        $whereCondition3 = ['medical_students.semester = ' . $semester, 'medical_students.status = 1', 'exam_participants.examID= ' . $examID, '(exam_participants.studentType = "medical") OR (exam_participants.studentType = "medical/repeat")'];
                        $MedicalStudents = $examParticipants->joinWhere($tables, $columns, $condition3, $whereCondition3);
                        // show($MedicalStudents);

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
                    if (!empty($_POST['presentIds'])) {
                        $presendIds = $_POST['presentIds'];
                    }

                    $allIds = $_POST['ids'];

                    if (!empty($presendIds) && !empty($allIds)) {
                        $absentIds = array_diff($allIds, $presendIds);

                    }
                    if (empty($presendIds)) {
                        $absentIds = $allIds;
                    }

                    //update the attendance table with present students
                    if (!empty($presendIds)) {
                        foreach ($presendIds as $id) {

                            $examAttendance->updateRows(
                                ['attendance' => 1],
                                ['id' => $id]
                            );
                        }
                    }

                    //update the attendance table with absent students
                    if (!empty($absentIds)) {
                        foreach ($absentIds as $id) {
                            $examAttendance->updateRows(
                                ['attendance' => 0],
                                ['id' => $id]
                            );
                        }
                    }
                    //close the popup
                    $attetdancePopup = false;
                    message("Attendance Submitted Successfully", "success", true);
                    activity("Attendance Submitted Successfully");

                }
                //get exam participant data to pass to the view
                $epTables = ['student'];
                $epColumns = ['student.name', 'student.indexNo', 'exam_participants.studentType', 'exam_participants.examID', 'exam_participants.DegreeID', 'exam_participants.attempt'];
                $epConditions = ['student.indexNo = exam_participants.indexNo'];
                $epWhereCondition = ['exam_participants.examID= ' . $examID];
                $examParticipantsData = $examParticipants->joinWhere($epTables, $epColumns, $epConditions, $epWhereCondition);


                //data that pass to view

                $data['examParticipants'] = $examParticipantsData;
                $data['examID'] = $examID;
                $data['degreeID'] = $degreeID;
                $data['ExamSubjects'] = $ExamSubjects;
                $data['attendacePopupStatus'] = $attetdancePopup;

                //delete examination
                // show($_POST);
                if (isset($_POST['delete-exam'])) {
                    if ($_POST['delete-exam'] == 'delete') {
                        //update examination status as upcoming
                        $exam->updateRows(
                            ['status' => 'upcoming'],
                            ['examID' => $examID]
                        );

                        $examParticipants->delete(['examID' => $examID]);
                        $examAttendance->delete(['examID' => $examID]);
                        $examtimetable->delete(['examID' => $examID]);
                        message("Examination Deleted Successfully", "success", true);
                        $msg = "Delete Examination Data Successfully , ExamId =  " . $examID;
                        activity($msg);
                        redirect('sar/examination');
                    }
                }

                //delete Examination permenently
                if (isset($_POST['delete-exam'])) {
                    if ($_POST['delete-exam'] == 'delete-forever') {

                        //delete examination
                        $exam->delete(['examID' => $examID]);
                        $examParticipants->delete(['examID' => $examID]);
                        $examAttendance->delete(['examID' => $examID]);
                        $examtimetable->delete(['examID' => $examID]);
                        message("Examination Deleted Successfully", "success", true);
                        $msg = "Delete Examination Data Successfully , ExamId =  " . $examID;
                        activity($msg);
                        redirect('sar/examination');
                    }
                }


                //change degree status
                if (isset($_POST['mark'])) {

                    if (($_POST['mark'] == 'Mark as Complete') || ($_POST['mark'] == 'Mark as Ongoing')) {
                        if ($_POST['exam-type'] == 'ongoing') {
                            $exam->updateRows(
                                ['status' => 'completed'],
                                ['examID' => $examID]
                            );

                            $msg = "Examination statues changed as Completed";

                        } elseif ($_POST['exam-type'] == 'completed') {
                            $exam->updateRows(
                                ['status' => 'ongoing'],
                                ['examID' => $examID]
                            );

                            $msg = "Examination statues changed as Ongoing";
                        }

                        //update session data
                        $_SESSION['examDetails'] = $exam->where(['examID' => $examID]);
                        unset($_POST['mark']);
                        unset($_POST['exam-type']);


                    }
                    message($msg, "success", true);
                    activity($msg);
                }

                $this->view('sar-interfaces/sar-examparticipants', $data);
                //send mails 
                // if ($admissionMail->send($to, $mailSubject, '', $name) == false) {
                //     $mailSendCheck = false;
                // }

            } else if ($method == 'resultsupload') {

                if (!empty($_GET['examID']) && !empty($_GET['degreeID'])) {
                    redirect('sar/examination/resultsupload');
                }

                //get examID and DegreeID from session
                if (!empty($_SESSION['examDetails'])) {
                    $examID = $_SESSION['examDetails'][0]->examID;
                    $degreeID = $_SESSION['examDetails'][0]->degreeID;
                    $semester = $_SESSION['examDetails'][0]->semester;
                }



                //examiner3 variable (this is added for use of reload page)
                $examiner3 = false;

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
                $condition2 = ['repeat_students.indexNo = exam_participants.indexNo', 'student.indexNo = repeat_students.indexNo'];
                $whereCondition2 = ['exam_participants.examID= ' . $examID, '(exam_participants.studentType = "repeate") OR (exam_participants.studentType = "medical/repeat")', 'repeat_students.semester = ' . $semester, 'repeat_students.paymentStatus = 1'];
                $RepeatStudents = $examParticipants->joinWhere($tables, $columns, $condition2, $whereCondition2);


                //get medical student details
                $tables = ['medical_students', 'student'];
                $columns = ['*'];
                $condition3 = ['medical_students.indexNo = exam_participants.indexNo', 'student.indexNo = medical_students.indexNo'];
                $whereCondition3 = ['medical_students.semester = ' . $semester, 'medical_students.status = 1', 'exam_participants.examID= ' . $examID, '(exam_participants.studentType = "medical") OR (exam_participants.studentType = "medical/repeat")'];
                $MedicalStudents = $examParticipants->joinWhere($tables, $columns, $condition3, $whereCondition3);

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
                        $head = 'Name of  Programme  : ' . $_SESSION['degreeData'][0]->DegreeName;
                        $title = 'Subject  : ' . $subject->SubjectName;

                        $rowHeadings = ['Index No', 'Registration No', 'Examiner 01 Marks', 'Examiner 02 Marks', 'Assignment Marks', 'Examiner 03 Marks'];
                        $markSheet = 'assets/csv/output/MarkSheet_' . $subject->SubjectCode . '.csv';
                        exec('chmod -R 777 ');

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
                            $sortedData = sortArray($NormalParticipants, 'indexNo');

                            //add indexNo and regNo to marksheet
                            if (!empty($sortedData)) {
                                foreach ($sortedData as $participant) {
                                    $rowData = [$participant->indexNo, $participant->regNo];
                                    fputcsv($f, $rowData);
                                }
                            }
                            //add repeate students details to marksheet
                            if (!empty($RepeatStudents)) {
                                foreach ($RepeatStudents as $Rparticipant) {
                                    if ($Rparticipant->subjectCode == $subject->SubjectCode) {

                                        $rowData = [$Rparticipant->indexNo, $Rparticipant->regNo];
                                        fputcsv($f, $rowData);
                                    }
                                }
                            }

                            //add medical students details to mark sheets
                            if (!empty($MedicalStudents)) {
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

                //handle continue without examiner3

                if (isset($_POST['cw-E3'])) {
                    $e3SubCode = $_POST['cw-E3'];

                    //update the status of the examiner 3 eligibility
                    $examiner3Eligibility->updateRows(
                        ['status' => 0],
                        ['examID' => $examID, 'subCode' => $e3SubCode]
                    );

                    //check if all 3 marksheet are uploaded
                    $uploadedRes = $resultSheet->where([
                        'examId' => $examID,
                        'subjectCode' => $e3SubCode,
                    ]);

                    if (!empty($uploadedRes)) {
                        if (count($uploadedRes) >= 3) {
                            //generate file name 
                            $fileName = $examID . '_' . $e3SubCode . '.csv';

                            //insert marks
                            insertMarks($fileName, $examID, $degreeID, $e3SubCode);

                            //update activity table
                            $message = 'Upload Marks for ' . $e3SubCode . ' in ExamId = ' . $examID . ' successfully. Continue without Examiner 3.';
                            activity($message);
                        }
                    }

                }

                //get uploaded marksheet details 
                $submittedMarksheets = $resultSheet->where(['examId' => $examID]);
                //get examiner3 eligibility data
                $examina3EligibilityData = $examiner3Eligibility->where(['examID' => $examID, 'status' => 1]);


                $groupedData = groupByColumn($submittedMarksheets, 'subjectCode');
                $data['subjectData'] = json_encode($groupedData);
                $data['examiner3Data'] = json_encode($examina3EligibilityData);

                //delete marksheet from the database
                if (isset($_POST['submit']) == 'delete-rs') {

                    $_POST['examid'] = $examID;

                    //delete marksheet
                    $resultSheet->delete2($_POST);

                    //refresh the page
                    header("Refresh:0");

                }

                if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {

                    // show('inside file upload');

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

                        //define examiner 3 data array
                        $eligibilityData = [];
                        // $data['examiner3'] = false;
                        $examiner3 = false;
                        $subjectIDExaminer3 = null;
                        // Insert data into the database
                        if ($resultSheet->examValidate($examSheet)) {
                            show('inside insert marksheet');
                            //add record to database table
                            $resultSheet->insert($examSheet);
                            $message = 'Upload ' . $marksType . ' Marksheet for ' . $subCode . ' in ExamId = ' . $examID . ' successfully.';

                            //uncomment this to add activity log
                            activity($message);

                            //call crateMarkSheet function to update csv file
                            createMarkSheet($uniqueFileName, $examID, $subCode, $marksType);

                            echo json_encode(['success' => true, 'message' => 'File uploaded successfully.']);

                            foreach ($data['subjects'] as $subject) {
                                var_dump('subject code = ' . $subject->SubjectCode);
                                $uploadedRes = $resultSheet->whereOr([
                                    'examId' => $examID,
                                    'subjectCode' => $subject->SubjectCode,
                                    'type' => ['type' => 'OR', 'values' => ['examiner1', 'examiner2']]
                                ]);

                                if (is_array($uploadedRes)) {

                                    var_dump('Result sheets = ', $uploadedRes, 'count = ' . count($uploadedRes));
                                }

                                if (is_array($uploadedRes)) {
                                    if (count($uploadedRes) >= 2) {

                                        //generate file name 
                                        $fileName = $examID . '_' . $subject->SubjectCode . '.csv';

                                        //call the function to check the gap
                                        if (checkGap($fileName, $examID, $subject->SubjectCode)) {


                                            // $data = [
                                            //     'examiner3' => true,
                                            //     'examiner3SubCode' => $subject->SubjectCode,
                                            //     'subjectIDExaminer3' => $subject->SubjectID
                                            // ];

                                            //add examiner 3 eligible data to array
                                            // $eligibilityData[] = $object;

                                            $examiner3 = true;
                                            $examiner3SubCode = $subject->SubjectCode;
                                            $subjectIDExaminer3 = $subject->SubjectID;

                                            $examiner3SubData['subCode'] = $subject->SubjectCode;
                                            $examiner3SubData['examID'] = $examID;
                                            $examiner3SubData['degreeID'] = $degreeID;
                                            $examiner3SubData['semester'] = $semester;
                                            $examiner3SubData['status'] = 1;

                                            //validate the data and insert into the database
                                            if ($examiner3Eligibility->DataValidate($examiner3SubData)) {
                                                show('Insert Examiner 3 data to database');
                                                $examiner3 = true;
                                                $examiner3Eligibility->insert($examiner3SubData);
                                            }

                                            //check whether examiner3 marks are available
                                            $examiner3Marks = $resultSheet->whereOr([
                                                'examId' => $examID,
                                                'subjectCode' => $subject->SubjectCode,
                                                'type' => ['type' => 'OR', 'values' => ['examiner3', 'assestment']]
                                            ]);

                                            if (count($examiner3Marks) == 2) {

                                                $examiner3 = false;

                                                //upload the student marks to database
                                                $resFileName = $examID . '_' . $subject->SubjectCode . '.csv';

                                                //call the function to upload marks to database
                                                insertMarks($resFileName, $examID, $degreeID, $subject->SubjectCode);




                                                $msg = 'Uploaded Examination Results with Examiner 3 marks for ' . $subject->SubjectCode . ' successfully , ExamID = ' . $examID;
                                                activity($msg);

                                            } else {
                                                echo 'Examiner 3 marks or Assestment marks are not available';
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
                                                insertMarks($resFileName, $examID, $degreeID, $subject->SubjectCode);

                                                $msg = 'Uploaded Examination Results for ' . $subject->SubjectCode . ' successfully , ExamID = ' . $examID;
                                                activity($msg);

                                            } else {
                                                echo 'Assestment marks are not available';
                                                $data['assignment'] = false;

                                            }



                                        }
                                        /** The case in there is when we pass the data into view to show them it must reload 
                                         * but when using fetch it did't reload the file. must fix this  */


                                        /**when uploading marks get the least gap marks and calculate final marks and upload to database
                                         */

                                        if ($examiner3) {
                                            echo "<div class='examiner3-status'>$examiner3</div>";
                                            echo "<div class='examiner3SubCode'>$examiner3SubCode</div>";
                                            echo "<div class='examiner3SubID'>$subjectIDExaminer3</div>";

                                        }
                                    }
                                }
                            }

                            echo "<div class='marksheet-errors'>NULL</div>";
                        } else {
                            // Error inserting data into the database
                            $data['errors'] = $resultSheet->errors;

                            echo "<div class='marksheet-errors'>" . $resultSheet->errors['marks'] . "</div>";
                            echo json_encode(['success' => false, 'message' => 'Error inserting data into the database.']);
                        }

                    } else {
                        // Error moving the file
                        echo json_encode(['success' => false, 'message' => 'Error moving the uploaded file.']);
                    }


                } else {
                    // Handle file upload error
                    // message("File upload error", "error", true);
                    // echo json_encode(['success' => false, 'message' => 'File upload error.']);
                }


                $data['examId'] = $examID;
                $this->view('sar-interfaces/sar-examresultupload', $data);



            } else if ($method == 'results') {

                $examMarks = new Marks();
                $degreeID = isset($_GET['degreeID']) ? $_GET['degreeID'] : null;

                //get examID from session
                if (!empty($_SESSION['examDetails'])) {
                    $examID = $_SESSION['examDetails'][0]->examID;
                    $semester = $_SESSION['examDetails'][0]->semester;
                }

                //get subjects in the exam
                $examSubjects = $examtimetable->where(['examID' => $examID]);

                //get subject code from post data
                if (isset($_POST['submit'])) {
                    $resultSubCode = isset($_POST['subCode']) ? $_POST['subCode'] : '';
                    // show($resultSubCode);


                } else {
                    $resultSubCode = '';
                }

                // remove any leading or trailing spaces from the string
                $resultSubCode = trim($resultSubCode);

                //get subject details
                $subjectDetails = $subjects->where(['SubjectCode' => $resultSubCode, 'DegreeID' => $degreeID]);




                //get examination results using marks and final marks
                $tables = ['final_marks', 'exam_participants'];
                $columns = ['*'];
                $conditions = ['marks.examID = final_marks.examID', 'marks.studentIndexNo = exam_participants.indexNo', 'marks.studentIndexNo = final_marks.studentIndexNo', 'marks.subjectCode = final_marks.subjectCode'];
                $whereConditions = ['marks.examID = ' . $examID, 'marks.subjectCode =  "' . $resultSubCode . '"', 'exam_participants.examID = ' . $examID];
                $examResults = $examMarks->joinWhere($tables, $columns, $conditions, $whereConditions);

                //generate csv file name
                $fileName = $examID . '_' . $resultSubCode . '.csv';
                $newFileName = $examID . '_' . $resultSubCode . '_new.csv';

                //generate updated marksheet as csv file
                if (!empty($resultSubCode)) {
                    updateMarksheet($fileName, $examResults, $newFileName);
                }

                $data['subjectDetails'] = $subjectDetails;
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


        $this->view('sar-interfaces/sar-settings', $data);
    }
    public function login()
    {
        $this->view('common/login/login.view');
    }

    public function results()
    {
        $this->view('sar-interfaces/sar-examresults');
    }

    public function showresults()
    {
        $this->view('sar-interfaces/sar-examresultshow');
    }

    public function participants($id = null, $action = null, $id2 = null)
    {
        $st = new StudentModel();
        $RepeatStudents = new RepeatStudents();
        $MedicalStudents = new MedicalStudents();

        if (!empty($_SESSION['degreeData'])) {
            $degreeID = $_SESSION['degreeData'][0]->DegreeID;
        }



        if (!empty($id)) {
            if (!empty($action)) {
                if ($action === 'delete' && !empty($id2)) {
                    $st->delete(['id' => $id2]);
                }
            } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // print_r( $_POST );
                // die;
                $st->update($_POST['id'], $_POST);
                // redirect( 'student/'.$id );
                $data['student'] = $st->where(['indexNo' => $id])[0];

                $this->view('common/student/student.view', $data);
                return;
            } else {
                $data['student'] = $st->where(['indexNo' => $id])[0];

                $this->view('common/student/student.view', $data);
                return;
            }
        }
        $data['students'] = $st->where(['degreeID' => $degreeID]);

        $RMPopup = false;

        //get repeate and medical student data according to the option
        if (isset($_POST['selectOption']) == 'option') {

            if (!empty($_POST['SelectedOption'])) {
                $selectedOption = $_POST['SelectedOption'];
                $data['selectedOption'] = $selectedOption;
                $RMPopup = true;
            }


            if ($selectedOption == 'repete') {

                //join data with student table and get regNo
                $tables = ['student'];
                $columns = ['repeat_students.id', 'repeat_students.indexNo', 'student.regNo', 'repeat_students.degreeID', 'repeat_students.paymentStatus', 'repeat_students.attempt', 'repeat_students.subjectCode'];
                $conditions = ['student.indexNo = repeat_students.indexNo'];
                $whereConditions = ['repeat_students.degreeID = ' . $degreeID, 'repeat_students.paymentStatus = 0', 'repeat_students.written = 0'];
                $data['rmstudents'] = $RepeatStudents->joinWhere($tables, $columns, $conditions, $whereConditions);

            } else if ($selectedOption == 'medical') {

                //join data with student table and get regNo
                $tables = ['student'];
                $columns = ['medical_students.id', 'medical_students.indexNo', 'student.regNo', 'medical_students.degreeID', 'medical_students.status', 'medical_students.attempt', 'medical_students.subjectCode'];
                $conditions = ['student.indexNo = medical_students.indexNo'];
                $whereConditions = ['medical_students.degreeID = ' . $degreeID, 'medical_students.status = 0', 'medical_students.written = 0'];
                $data['rmstudents'] = $MedicalStudents->joinWhere($tables, $columns, $conditions, $whereConditions);

            }

        }

        //update the status of the repete and medical students
        if (isset($_POST['submitStatus']) == 'status') {

            if (!empty($_POST['ids'])) {


                if (!empty($_POST['presentIds'])) {
                    $ids = $_POST['presentIds'];
                }

                if (!empty($_POST['option'])) {
                    $selectedOption = $_POST['option'];
                }

                if ($selectedOption == 'repete') {
                    foreach ($ids as $id) {
                        $RepeatStudents->updateRows(
                            ['paymentStatus' => 1],
                            ['id' => $id]
                        );
                    }
                } else if ($selectedOption == 'medical') {
                    foreach ($ids as $id) {
                        $MedicalStudents->updateRows(
                            ['status' => 1],
                            ['id' => $id]
                        );
                    }
                }
            }
            $RMPopup = false;
        }

        $data['RMpopupStatus'] = $RMPopup;

        $this->view('sar-interfaces/sar-degreeparticipants', $data);
    }

    public function userprofile($action = null, $id = null)
    {
        $degree = new Degree();
        $studentModel = new StudentModel();
        $finalMarks = new FinalMarks();

        $data = [];
        $data['action'] = $action;
        $data['id'] = $id;
        // Fetch the specific student data using the ID from the URL
        $studentId = isset($_GET['id']) ? $_GET['id'] : null;


        $data['student'] = $studentModel->where(['id' => $studentId]);

        if (empty($data['student'])) {
            redirect('_404_');
            return;

            //need to handle only access to the specific degree student data
        } else {
            $indexNo = $data['student'][0]->indexNo;
        }


        //get student results currently uploaded
        $tables = ['subject'];
        $columns = ['*'];
        $conditions = ['subject.SubjectCode = final_marks.subjectCode', 'subject.DegreeID = final_marks.degreeID'];
        $whereConditions = ["final_marks.studentIndexNo = " . "'$indexNo'"];
        $studnetRes = $finalMarks->joinWhere($tables, $columns, $conditions, $whereConditions);

        $data['studentResults'] = groupByColumn($studnetRes, 'semester');



        // Check if the student ID is provided in the URL
        if ($studentId) {


            $degree_id = $data['student'][0]->degreeID;
            $data['degree'] = $degree->find($degree_id);
            if ($data['student']) {
                $this->view('sar-interfaces/sar-student-profile', $data);
            } else {
                echo "Error: Student not found.";
            }
            if ($action == "update") {
                echo "POST request received";
            } else if ($action == "add") {
            } else if ($action == 'delete') {
                $studentModel->delete(['id' => $studentId]);
                redirect("sar/participants");
            }
        } else {
            echo "Error: Student ID not provided in the URL.";
        }
    }

    public function reports($method = null)
    {
        $subjects = new Subjects();
        $gradings = new Grades();
        $finalMarks = new FinalMarks();
        $student = new StudentModel();

        $data = [];
        $data['degreeDetails'] = $_SESSION['degreeData'];
        //get semester from get data
        $data['semester'] = isset($_GET['semester']) ? $_GET['semester'] : null;
        $data['subjects'] = $subjects->where(['DegreeID' => $data['degreeDetails'][0]->DegreeID, 'semester' => $data['semester']]);
        $data['subjectsCodes'] = $subjects->whereSpecificColumn(['DegreeID' => $data['degreeDetails'][0]->DegreeID, 'semester' => $data['semester']], 'SubjectCode');

        $data['grades'] = $gradings->where(['DegreeID' => $data['degreeDetails'][0]->DegreeID]);
        $students = $student->where(['DegreeID' => $data['degreeDetails'][0]->DegreeID]);
        $data['students'] = $students;
        $data['studentRes'] = [];

        foreach ($students as $student) {
            $indexNo = $student->indexNo;

            $tables = ['subject', 'exam_attendance'];
            $columns = ['*'];
            $conditions = [
                'subject.SubjectCode = final_marks.subjectCode',
                'subject.DegreeID = final_marks.degreeID',
                'exam_attendance.examID = final_marks.examID',
                'exam_attendance.IndexNo = final_marks.studentIndexNo',
                'final_marks.subjectCode = exam_attendance.subjectCode',
            ];
            $whereConditions = [
                "final_marks.studentIndexNo = " . "'$indexNo'",
                "exam_attendance.IndexNo = " . "'$indexNo'",

            ];

            $studnetRes = $finalMarks->joinWhere($tables, $columns, $conditions, $whereConditions);
            $groupedData = groupByColumn($studnetRes, 'subjectCode');

            //get best marks
            $bestData = getBestMarks($groupedData, 'finalMarks');
            $data['studentRes'][$indexNo] = $bestData;
            // show($bestData);

        }
        // show($data['studentRes']);

        if ($method == '1') {
            $this->view('reports/reports-1', $data);
        } else if ($method == '2') {

            $this->view('reports/reports-2', $data);
        } else if ($method == 'roe') {

            redirect('roe/login');
        } else {

            $this->view('sar-interfaces/sar-reports', $data);
        }
    }






}