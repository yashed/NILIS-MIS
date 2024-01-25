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

        // $result1 = $degree->validate($_POST);
        // $result2 = $subject->validate($_POST);
        // $degree->insert( $_POST );
        show($_POST);

        $data['degrees'] = $degree->findAll();
        $data['subjects'] = $subject->findAll();
        //show( $data[ 'degrees' ] );

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

                // Replace with your desired directory path
                // Ensure the directory exists
                // if ( !is_dir( $uploadDirectory ) ) {
                //         mkdir( $uploadDirectory, 0777, true );
                //     }

                $fileName = $_FILES['student-data']['name'];
                $fileTmpName = $_FILES['student-data']['tmp_name'];
                $targetPath = $uploadDirectory . $fileName;
                echo $targetPath;
                if (move_uploaded_file($fileTmpName, $targetPath)) {
                    echo 'File uploaded successfully.';
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
