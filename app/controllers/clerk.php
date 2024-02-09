<?php

class Clerk extends Controller
{

    public function index()
    {
        $data['title'] = 'Dashboard';
        $this->view('clerk-interfaces/clerk-dashboard', $data);
    }

    public function notifications()
    {
        $this->view('clerk-interfaces\clerk-notifications');
    }

    public function settings()
    {
        $user = new User();

        // $con = mysqli_connect("localhost","root","","nilis_db");
        
        if(isset($_POST['update_user_data']))
        {
            $id = $_POST['id'];
            unset($_POST['id']);
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
            $phoneNo = $_POST['phoneNo'];
        
            // $query = "UPDATE users SET fname='$fname',lname='$lname',email='$email',phoneNo='$phoneNo' WHERE id='$id' ";
            // $query_run = mysqli_query($con, $query);

            $user->update($id, $_POST);
        
            // if($query_run)
            // {
            //     $_SESSION['status'] = "Data Updated Successfully";
            //     header("Location: clerk-settings.php");
            // }
            // else
            // {
            //     $_SESSION['status'] = "Not Updated";
            //     header("Location: clerk-settings.php");
            // }
        }
          $this->view('clerk-interfaces/clerk-settings');
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
