<?php

class Clerk extends Controller
{

    // function __construct()
    // {
    //     if (!Auth::is_clerk()) {
    //         message('You are not authorized to view this page');
    //         redirect('login');
    //     }
    // }
    public function index()
    {
        $user=new User();
        $degree = new Degree();

        $data['title'] = 'Dashboard';
        $data['user'] = $user->findAll();
        $data['degrees'] = $degree->findAll();
        $this->view('clerk-interfaces/clerk-dashboard', $data);
    }

    public function notifications()
    {
        $notification = new NotificationModel();

        $data['notifications'] = $notification->findAll();
        $this->view('clerk-interfaces\clerk-notifications',$data);
    }

    public function updatedattendance()
    {
        $attendance = new studentAttendance();
        $data['attendances'] = $attendance->findAll();
    
        $this->view('clerk-interfaces\clerk-updatedattendance', $data);
    }

    public function degreeprograms()
    {
        
    $degree=new Degree();
    $data['degrees'] = $degree->findAll();
    $this->view('clerk-interfaces\clerk-degreeprograms', $data);
    }
public function settings()
{
    $user = new User();
    $data = [];

    if (isset($_POST['update_user_data'])) {
        // Validate input fields
        $fname = isset($_POST['fname']) ? trim($_POST['fname']) : '';
        $lname = isset($_POST['lname']) ? trim($_POST['lname']) : '';
        $email = isset($_POST['email']) ? trim($_POST['email']) : '';
        $phoneNo = isset($_POST['phoneNo']) ? trim($_POST['phoneNo']) : '';

        $errorMessage = '';

        if (empty($fname) || empty($lname) || empty($email) || empty($phoneNo)) {
            $errorMessage = '*All fields are required.';
        } else {
            // Additional validation for phone number
            $phoneNoPattern = '/^\d{10}$/'; // Regex pattern to match exactly 10 digits
            if (!preg_match($phoneNoPattern, $phoneNo)) {
                $errorMessage = 'Phone number is not valid. It should contain exactly 10 digits.';
            } else {
                // Update user data
                $id = $_SESSION['USER_DATA']->id;
                $dataToUpdate = [
                    'fname' => $fname,
                    'lname' => $lname,
                    'email' => $email,
                    'phoneNo' => $phoneNo
                ];

                $user->update($id, $dataToUpdate);

                // Fetch updated user data
                $updatedUserData = $user->first(['id' => $id]);

                if ($updatedUserData === null) {
                    $errorMessage = 'No user data found after update.';
                } else {
                    $data['user'] = $updatedUserData;
                }
            }
        }

        if (!empty($errorMessage)) {
            // Display error message and retain user input
            $data['error'] = $errorMessage;
            $data['user'] = (object)[
                'fname' => $fname,
                'lname' => $lname,
                'email' => $email,
                'phoneNo' => $phoneNo
            ];
        }
    } else {
        // Fetch user data for display
        $id = $_SESSION['USER_DATA']->id;
        $data['user'] = $user->first(['id' => $id]);

        if ($data['user'] === null) {
            $data['error'] = 'No user data found.';
        }
    }

    $this->view('clerk-interfaces/clerk-settings', $data);
}

    
// public function attendance()
// {
//     if (isset($_POST['importSubmit'])) {
//         // Check if the uploaded file is present and no errors occurred during upload
//         if ($_FILES['csvFile']['error'] == 0 && !empty($_FILES['csvFile']['tmp_name'])) {
//             // Load StudentModel
//             $studentAttendance = new studentAttendance();

//             // Process the CSV file
//             $csvFile = fopen($_FILES['csvFile']['tmp_name'], 'r');

//             // Skip the first three rows
//             for ($i = 0; $i < 3; $i++) {
//                 fgetcsv($csvFile);
//             }

//             // Start reading from the 4th row and first column
//             $row = 3; // Initialize row number
//             while (($line = fgetcsv($csvFile)) !== FALSE) {
//                 $row++;

//                 // Skip rows until reaching the 4th row
//                 if ($row < 4) {
//                     continue;
//                 }

//                 // Read data from the first column (index 0)
//                 $index_no = $line[0];
//                 $attendance = $line[1];

//                 // Update attendance using updateRows function
//                 $updateData = [
//                     'attendance' => $attendance,
                    
//                 ];
//                 $whereConditions = [
//                     'index_no' => $index_no
//                 ];
//                 $studentAttendance->updateRows($updateData, $whereConditions);
//             }

//             fclose($csvFile);
//         } else {
//             echo "Error uploading the file.";
//         }
//     }

//     // Load the view
//     $this->view('clerk-interfaces/clerk-attendance');
// }
// public function attendance()
// {

//     $attendance = new studentAttendance;

//    $filePath = 'assets/csv/output/Student_attendance.csv';
//     $content = file_get_contents($filePath);
//     $lines = explode("\n", $content);


//     //iterate through data in file
//     for ($i = 4; $i < count($lines) - 1; $i++) {

//         //get line
//         $values = str_getcsv($lines[$i]);

//         //catch data 
//         $data['index_no'] = $values[0];
//         $data['attendance'] = $values[1];
       
//         //insert data into table
      

//                 $attendance->insert($data);
            
//             // $mark->insert($data);
//         }
//         $this->view('clerk-interfaces/clerk-attendance');
//     }

// public function attendance()
// {
//     if (isset($_POST['importSubmit'])) {
//         // Check if the uploaded file is present and no errors occurred during upload
//         if ($_FILES['csvFile']['error'] == 0 && !empty($_FILES['csvFile']['tmp_name'])) {
//             // Load StudentModel
//             $studentAttendance = new studentAttendance();

//             // Process the CSV file
//             $csvFile = fopen($_FILES['csvFile']['tmp_name'], 'r');

//             // Skip the first three rows
//             for ($i = 0; $i < 4; $i++) {
//                 fgetcsv($csvFile);
//             }

//             // Start reading from the 4th row and first column
//             $row = 3; // Initialize row number
//             while (($line = fgetcsv($csvFile)) !== FALSE) {
//                 $row++;

//                 // Skip rows until reaching the 4th row
//                 if ($row < 4) {
//                     continue;
//                 }

//                 // Read data from the first column (index 0)
//                 $index_no = $line[0];
//                 $attendance = $line[1];

//                 // Update attendance using updateRows function
//                 $updateData = [
//                     'index_no' => $index_no,
//                     'attendance' => $attendance
                    
//                 ];
               
//                 $studentAttendance->insert($updateData);
//             }

//             fclose($csvFile);
//         } else {
//             echo "Error uploading the file.";
//         }
//     }

//     // Load the view
//     $this->view('clerk-interfaces/clerk-attendance');
// }

public function attendance()
{
    $degree = new Degree();
    $notification = new NotificationModel();
    $data['notifications'] = $notification->findAll();
 
    $data['degrees'] = $degree->findAll();

    if (isset($_POST['importSubmit'])) {
        // Check if the uploaded file is present and no errors occurred during upload
        if ($_FILES['csvFile']['error'] == 0 && !empty($_FILES['csvFile']['tmp_name'])) {
            // Load StudentModel
            $studentAttendance = new studentAttendance();
            $degree_name = $_POST['selectDegree'];
            // Process the CSV file
            $csvFile = fopen($_FILES['csvFile']['tmp_name'], 'r');

            // Skip the first four rows
            for ($i = 0; $i < 4; $i++) {
                fgetcsv($csvFile);
            }

            // Start reading from the 4th row and first column
            $row = 3; // Initialize row number
            while (($line = fgetcsv($csvFile)) !== FALSE) {
                $row++;

                // Skip rows until reaching the 4th row
                if ($row < 4) {
                    continue;
                }

                // Read data from the first column (index 0)
                $index_no = $line[0];
                $attendance = $line[1];
               

                // Check if the record already exists
                $existingData = $studentAttendance->where(['index_no' => $index_no]);
                if ($existingData) {
                    // If record exists, update it
                    $updateData = [
                        'attendance' => $attendance,
                        'degree_name' => $degree_name
                    ];
                    $whereConditions = [
                        'index_no' => $index_no
                    ];
                    $studentAttendance->updateRows($updateData, $whereConditions);
                } else {
                    // If record doesn't exist, insert it
                    $insertData = [
                        'index_no' => $index_no,
                        'attendance' => $attendance,
                        'degree_name' => $degree_name
                        ];
                    $studentAttendance->insert($insertData);
                }
            }

            fclose($csvFile);
        } else {
            echo "Error uploading the file.";
        }
    }

    // Load the view
    $this->view('clerk-interfaces/clerk-attendance',$data);
    
}

public function degreeprofile($action = null, $id = null)
{
    $data = [];
    $data['action'] = $action;
    $data['id'] = $id;
    $degreeID = isset($_GET['id']) ? $_GET['id'] : null;
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

        // Load the view with the data
        $this->view('clerk-interfaces/clerk-degreeprofile', $data);
    } else {
        echo "Error: Degree ID not provided in the URL.";
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
    $this->view('clerk-interfaces/clerk-participants', $data);
}

// 
}
