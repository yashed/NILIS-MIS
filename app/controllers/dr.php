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

    public function degreeprograms()
    {
        $degree = new Degree();
        $subject = new Subjects();
        $grade = new Grades();

        $data['degrees'] = $degree->findAll();
        $data['subjects'] = $subject->findAll();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Check if all form data is present
            // if (isset($_POST['form1']) && isset($_POST['form2']) && isset($_POST['form3'])) {
            if (isset($_POST['formData1'])) {
                $form1Data = $_POST['formData1'];
                show($form1Data);
                $degreeType = $form1Data['degree_type'];
                $selectDegreeType = $form1Data['select_degree_type'];
                $degreeName = $form1Data['degree_name'];
                $duration = $form1Data['duration'];

                // Insert into the 'Degree' table
                $degree->insert([
                    'DegreeType' => $degreeType,
                    'DegreeShortName' => $selectDegreeType,
                    'DegreeName' => $degreeName,
                    'Duration' => $duration,
                    'AcademicYear' => '2023',
                ]);

                echo "Data successfully saved in the database";
            } else {
                echo "Incomplete form data";
            }
            $connect = mysqli_connect("localhost", "root", "", "nilis_db");
            if (isset($_POST["SubjectName"])) {
                $SubjectName = $_POST["SubjectName"];
                $SubjectCode = $_POST["SubjectCode"];
                $NoCredits = $_POST["NoCredits"];
                $query = '';
                for ($count = 0; $count < count($SubjectName); $count++) {
                    $SubjectName_clean = mysqli_real_escape_string($connect, $SubjectName[$count]);
                    $SubjectCode_clean = mysqli_real_escape_string($connect, $SubjectCode[$count]);
                    $NoCredits_clean = mysqli_real_escape_string($connect, $NoCredits[$count]);
                    if ($SubjectName_clean != '' && $SubjectCode_clean != '' && $NoCredits_clean != '') {
                        $query .= '
                        INSERT INTO item(SubjectName, SubjectCode, NoCredits, DegreeID, semester) 
                        VALUES("' . $SubjectName_clean . '", "' . $SubjectCode_clean . '", "' . $NoCredits_clean . '"); 
                        ';
                    }
                }
            }
        } else {
            echo "Invalid request method";
        }

        print_r($_POST);
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

    // public function userprofile()
    // {
    //     $degree = new Degree();
    //     $st = new StudentModel();

    //     // $degree->insert( $_POST );
    //     // show( $_POST );

    //     $data['degrees'] = $degree->findAll();
    //     $data['students'] = $st->findAll();
    //     //show( $data[ 'degrees' ] );

    //     $this->view('dr-interfaces/dr-userprofile', $data);
    // }

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
