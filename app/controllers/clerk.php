<?php

class Clerk extends Controller
{

    public function index()
    {
        $user=new User();
        
        $data['title'] = 'Dashboard';
        $data['user'] = $user->findAll();
        $this->view('clerk-interfaces/clerk-dashboard', $data);
    }

    public function notifications()
    {
        $this->view('clerk-interfaces\clerk-notifications');
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
    
public function attendance()
{
   
    if (isset($_POST['importSubmit'])) {
        // Check if the uploaded file is present and no errors occurred during upload
        if ($_FILES['csvFile']['error'] == 0 && !empty($_FILES['csvFile']['tmp_name'])) {
            // Load StudentModel
            $studentModel = new StudentModel();

            // Process the CSV file
            $csvFile = fopen($_FILES['csvFile']['tmp_name'], 'r');

            // Skip the header row
            fgetcsv($csvFile);

            // Loop through each row in the CSV file
            while (($line = fgetcsv($csvFile)) !== FALSE) {
                $index = $line[0];
                $name = $line[1];
                $attendance = $line[2];

                // Execute SQL query to update attendance directly
                $updateQuery = "UPDATE student SET attendance = '$attendance', name = '$name' WHERE indexNo = '$index';";
                $studentModel->query($updateQuery);
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
