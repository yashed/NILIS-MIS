<?php

class DR extends Controller
{
    public function index()
    {

        $degree = new Degree();

        // $degree->insert( $_POST );
        // show( $_POST );

        $data['degrees'] = $degree->findAll();
        //show( $data[ 'degrees' ] );
        // echo 'view';
        $this->view('dr-interfaces/dr-dashboard', $data);
    }

    public function notification()
    {
        $this->view('dr-interfaces/dr-notification');
    }

    public function degreeprograms($action = null, $id = null)
    {
        $degree_name = "";
        $duration = 0;
        show($_POST);
        $degree = new Degree();
        $subject = new Subjects();
        $grade = new Grades();
        
        $data = [];
        $data['action'] = $action;
        $data['id'] = $id;
        
        if ($action == 'add') {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if ($_POST['degree_type'] === "1 Year") {
                    $duration = 1;
                } else if ($_POST['degree_type'] === "2 Year") {
                    $duration = 2;
                } 
                if (($_POST['select_degree_type']) === 'DLMS') {
                    $degree_name = "Diploma in Library Management Studies";
                } else if (($_POST['select_degree_type']) === 'ENCM') {
                    $degree_name = "Executive National Certificate in Management";
                } else if (($_POST['select_degree_type']) === 'DSL') {
                    $degree_name = "Diploma in Science Library";
                }
                $data = [
                    'DegreeType' => $_POST['degree_type'],
                    'DegreeShortName' => $_POST['select_degree_type'],
                    'DegreeName' => $degree_name,
                    'Duration' => $duration,
                    'AcademicYear' => '2023',
                ];
                $degree->insert($data);
                $degree_id = $degree->lastID('DegreeID');
                if (isset($_POST['subjectsData'])) {
                    // Decode the JSON string sent with key 'subjectsData'
                    $subjectsData = json_decode($_POST['subjectsData'], true);
                    // Iterate over each subject's data and insert it into the database
                    foreach ($subjectsData as $subjectData) {
                        // Construct the data array for insertion
                        $data1 = [
                            'SubjectCode' => $subjectData['subjectCode'],
                            'SubjectName' => $subjectData['subjectName'],
                            'NoCredits' => $subjectData['credits'],
                            'DegreeID' => $degree_id,
                            'semester' => $subjectData['semester'],
                        ];
                        // Insert the subject's data into the database
                        $subject->insert($data1);
                    }
                }
                if (isset($_POST['gradesData'])) {
                    // Decode the JSON string sent with key 'gradesData'
                    $gradesData = json_decode($_POST['gradesData'], true);
                    // Iterate over each subject's data and insert it into the database
                    foreach ($gradesData as $gradeData) {
                        // Construct the data array for insertion
                        $data2 = [
                            'Grade' => $gradeData['grade'],
                            'Max Marks' => $gradeData['maxMarks'],
                            'Min Marks' => $gradeData['minMarks'],
                            'GPV' => $gradeData['gpv'],
                            'DegreeID' => $degree_id,
                        ];
                        // Insert the subject's data into the database
                        $subject->insert($data2);
                    }
                }
                // show("Your Diploma was successfuly created");
                // $data['errors'] = $course->errors;
            }
        } elseif ($action == 'delete') {

            // $categories = $category->findAll('asc');
            // $languages = $language->findAll('asc');
            // $levels = $level->findAll('asc');
            // $prices = $price->findAll('asc');
            // $currencies = $currency->findAll('asc');

            // //get course information
            // $data['row'] = $row = $course->first(['user_id'=>$user_id,'id'=>$id]);

            // if($_SERVER['REQUEST_METHOD'] == "POST" && $row)
            // {

            // 	$course->delete($row->id);
            // 	message("Course deleted successfully");
            // 	redirect('admin/courses');
            // }

        }

        $data['degrees'] = $degree->findAll();
        $data['subjects'] = $subject->findAll();
        // $data['grades'] = $grade->findAll();

        $this->view('dr-interfaces/dr-degreeprograms', $data);
    }

    public function degreeprofile()
    {
        $degree = new Degree();

        // $degree->insert( $_POST );
        // show( $_POST );

        $data['degrees'] = $degree->findAll();
        // show( $data[ 'degrees' ] );

        $this->view('dr-interfaces/dr-degreeprofile', $data);
    }

    public function newDegree()
    {
        //Create CSV file to getstudent data
        $degree = new Degree();
        $rowData = ['Full-Name', 'Email', 'Country', 'NIC-No', 'Date-Of-Birth', 'Fax', 'Address', 'Phone-No'];
        $studentCSV = 'assets/csv/output/student-data-input.csv';
        $f = fopen($studentCSV, 'w');
        if ($f == false) {
            echo 'file is not open successfully';
        }
        // Write the header row to the CSV file
        fputcsv($f, $rowData);
        fclose($f);

        //get uploaded csv file
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['student-data'] == 'upload-csv') {
            show($_POST);
            show($_FILES);
            if (isset($_FILES['student-data']) && $_FILES['student-data']['error'] === UPLOAD_ERR_OK) {
                $uploadDirectory = 'assets/csv/input/';
                // Ensure the directory exists and set proper permissions
                if (!is_dir($uploadDirectory)) {
                    mkdir($uploadDirectory, 0777, true);
                    chmod($uploadDirectory, 0777);
                }

                $fileName = $_FILES['student-data']['name'];
                $fileTmpName = $_FILES['student-data']['tmp_name'];
                $targetPath = $uploadDirectory . basename($fileName);
                echo $targetPath;
                if (move_uploaded_file($fileTmpName, $targetPath)) {
                    echo 'File uploaded successfully.';
                    // Inside your newDegree function after successful file upload
                    $csvFile = fopen($targetPath, 'r');

                    // Skip the header row
                    fgetcsv($csvFile);

                    // Initialize Degree model or your database interaction method
                    $degree = new Degree();

                    while (($rowData = fgetcsv($csvFile)) !== false) {
                        // Assuming the order of columns in the CSV matches the order in the $rowData array
                        $data = [
                            'full_name' => $rowData[0],
                            'email' => $rowData[1],
                            'country' => $rowData[2],
                            'nic_no' => $rowData[3],
                            'date_of_birth' => $rowData[4],
                            'fax' => $rowData[5],
                            'address' => $rowData[6],
                            'phone_no' => $rowData[7],
                        ];

                        // For debugging, show the data before calling insert
                        show($data);

                        // Insert data into the database
                        $degree->insert($data);
                    }

                    fclose($csvFile);
                } else {
                    echo 'Failed to upload file.';
                }
            } else {
                echo 'Error uploading file.';
            }
        }

        $data['degrees'] = $degree->findAll();
        //show( $data[ 'degrees' ] );

        $this->view('dr-interfaces/dr-newdegree', $data);
    }
    public function userprofile()
    {
        $degree = new Degree();
        $data['degrees'] = $degree->findAll();

        // Fetch the specific student data using the ID from the URL
        $studentId = isset($_GET['studentId']) ? $_GET['studentId'] : null;
        // show($studentId);
        // Check if the student ID is provided in the URL
        if ($studentId) {
            $studentModel = new StudentModel();
            $data['student'] = $studentModel->find($studentId);
            // var_dump($data['student']);
            // Check if the student data is retrieved
            if ($data['student']) {
                $this->view('dr-interfaces/dr-userprofile', $data);
            } else {
                echo "Error: Student not found.";
            }
        } else {
            echo "Error: Student ID not provided in the URL.";
        }
    }



    public function participants($id = null, $action = null, $id2 = null)
    {

        $st = new StudentModel();
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
        $data['students'] = $st->findAll();
        //print_r( $data );
        // die;
        $this->view('dr-interfaces/dr-participants', $data);
    }

    public function settings()
    {
        $this->view('dr-interfaces/dr-settings');
    }
    public function reports()
    {
        $this->view('dr-interfaces/dr-reports');
    }
    public function attendance()
    {
        $this->view('dr-interfaces/dr-attendance');
    }
    public function examination()
    {
        $this->view('dr-interfaces/dr-examination');
    }
    public function login()
    {
        $this->view('login/login.view');
    }
}