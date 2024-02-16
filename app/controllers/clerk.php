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
        $dbHost     = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName     = "nilis_db";


        $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);


        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }


        $st = new StudentModel();

        if (isset($_POST['importSubmit'])) {
            if ($_FILES['csvFile']['error'] == 0) {
                // Check if the uploaded file is a CSV file
                $fileType = pathinfo($_FILES['csvFile']['name'], PATHINFO_EXTENSION);
                if (strtolower($fileType) == 'csv') {
                    // Process the CSV file
                    $csvFile = fopen($_FILES['csvFile']['tmp_name'], 'r');
                    // Skip the header row
                    fgetcsv($csvFile);

                    while (($line = fgetcsv($csvFile)) !== FALSE) {
                        $index = $line[0];
                        $name = $line[1];
                        $attendance = $line[2];

                        $prevQuery = "SELECT * FROM student WHERE indexNo = '$index' LIMIT 1;";
                        $prevResult = $db->query($prevQuery);

                        if ($prevResult->num_rows > 0) {
                            $db->query("UPDATE student SET attendance = '$attendance', name='$name' WHERE indexNo = '$index'");
                        }
                    }
                    fclose($csvFile);
                } else {
                    echo "Please upload a valid CSV file.";
                }
            } else {
                echo "Error uploading the file.";
            }
        }

        $this->view('clerk-interfaces\clerk-attendance');
    }
}
