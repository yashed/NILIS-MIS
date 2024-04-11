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
        
        $data['title'] = 'Dashboard';
        $data['user'] = $user->findAll();
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
        $studentModel = new StudentModel();
        $students = $studentModel->findAll(); // Assuming findAll() retrieves all students
    
        $data['students'] = $students;
    
        $this->view('clerk-interfaces\clerk-updatedattendance', $data);
    }

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
    if (isset($_POST['importSubmit'])) {
        // Check if the uploaded file is present and no errors occurred during upload
        if ($_FILES['csvFile']['error'] == 0 && !empty($_FILES['csvFile']['tmp_name'])) {
            // Load StudentModel
            $studentAttendance = new studentAttendance();

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
                        'attendance' => $attendance
                    ];
                    $whereConditions = [
                        'index_no' => $index_no
                    ];
                    $studentAttendance->updateRows($updateData, $whereConditions);
                } else {
                    // If record doesn't exist, insert it
                    $insertData = [
                        'index_no' => $index_no,
                        'attendance' => $attendance
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
    $this->view('clerk-interfaces/clerk-attendance');
}

}
