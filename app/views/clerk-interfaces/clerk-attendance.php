<?php
$role = "Clerk";
$data['role'] = $role;

?>

<?php $this->view('components/navside-bar/header', $data) ?>
<?php $this->view('components/navside-bar/sidebar', $data) ?>
<?php $this->view('components/navside-bar/footer', $data) ?>

<?php
// Database configuration
$dbHost     = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName     = "nilis_db";

// Create database connection
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>temp2 Dashboard</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

    * {
        font-family: 'Poppins', sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    :root {
        --body-color: #E2E2E2;
        --sidebar-color: #17376E;
        --primary-color: #9AD6FF;
        --text-color: #ffffff;
        --tran-02: all 0.2s ease;
        --tran-03: all 0.3s ease;
        --tran-04: all 0.4s ease;
        --tran-05: all 0.5s ease;
    }

    body {
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }

    .temp2-home {
        height: 100vh;
        left: 250px;
        position: relative;
        width: calc(100% - 250px);
        transition: var(--tran-05);
        background: var(--body-color);
    }

    .temp2-title {
        font-size: 1.8vw;
        font-weight: 600;
        color: black;
        padding: 10px 0px 10px 32px;
        background-color: var(--text-color);
        border-radius: 6px;
        margin: 7px 4px 7px 4px;
    }

    .sidebar.close~.temp2-home {
        left: 88px;
        width: calc(100% - 88px);
    }

    .temp2-subsection-1 {
        background-color: #ffffff;
        border-radius: 6px;
        height: 18vw;
        padding: 1vw 2vw 1vw 2vw;
        margin-left: 4px;
        padding-top: 1vw;
    }


    .temp2-sub-title1 {

        color: #17376E;
        font-family: Poppins;
        font-size: 22px;
        font-style: normal;
        font-weight: 600;
        font-size: 1.2vw;

    }




    .temp2-subsection-2 {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        margin-top: 10px;
    }



    .temp2-subsection-21 {
        padding-top: 3vw;
        background-color: var(--text-color);
        padding: 1% 1% 1% 1%;
        border-radius: 6px;
        width: 100%;
        height: 50vw;
        padding: 1vw 2vw 1vw 2vw;
    }




    .temp2-sub-title2 {
        color: #17376E;
        font-family: Poppins;
        font-size: 22px;
        font-style: normal;
        font-weight: 600;
        font-size: 1.2vw;
    }



    .temp2-footer {
        margin-top: auto;
    }





    .file-input-icon {
        width: 5vw;
        height: 5vw;
        background-image: url('<?= ROOT ?>/assets/file-icon.png');
        background-size: cover;
        background-repeat: no-repeat;
        cursor: pointer;
    }


    .text1 {
        padding-top: 0.5vw;
        font-size: 1vw;
    }

    .browse-label {
        color: #9AD6FF;
        cursor: pointer;
    }

    .sub-name {
        padding-left: 2%;
        font-size: 20px;
    }

    .record-file {
        color: #000000;
        font-family: Poppins;
        font-size: 22px;
        font-style: normal;
        font-weight: 500;
        font-size: 1.2vw;
        text-align: center;
        padding-top: 1vw;
    }


    .dashed-container1 {
        border: 2px dashed #333;
        border-radius: 8px;
        padding: 10px;
        width: 60vw;
        height: 20vw;
        margin-top: 3vw;
        margin-left: 15vw;
        margin-bottom: 5vw;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .admission-button2 {
        padding: 1% 1% 1% 1%;
        background-color: #E2E2E2;
        color: #333;
        text-decoration: none;
        align-items: center;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        width: 12vw;
        font-size: 0.8vw;
        margin-left: 40vw;
    }

    .admission-button2:hover {
        background-color: #909090;
    }
</style>

<body>
    <div class="temp2-home">
        <div class="temp2-title">Examination</div>


        <div class="temp2-subsection-2">
            <div class="temp2-subsection-21">
               
                <div class="record-file">Add Attendance Record File</div>
                <div class="dashed-container1">
                    <label for="fileInput" class="file-input-icon"></label>
                    <br>

                    <div class="col-md-12 head">
                        <div class="float-right">
                            <p class="text1">Drag and drop or
                                <a href="javascript:void(0);" class="btn btn-success" onclick="formToggle('importFrm');"><i class="plus"></i> browse </a>
                                attendance file.
                            </p>
                        </div>
                    </div>
                    <!-- CSV file upload form -->
                    <div class="col-md-12" id="importFrm" style="display: none;">
                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="file" class="btn btn-primary" name="csvFile" />
                            <input type="submit" class="btn btn-primary" name="importSubmit" value="Submit">
                        </form>
                    </div>
                </div>
                <button class="admission-button2" onclick="redirectToUpdatedAttendance()">Record Attendance</button>

            </div>
        </div>

        <div class="temp2-footer">
            <?php $this->view('components/footer/index', $data) ?>
        </div>

        <?php
                if (isset($_POST['importSubmit'])) {
                    // Allowed mime types
                    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');

                    // Validate whether the selected file is a CSV file
                    if (!empty($_FILES['csvFile']['name']) && in_array($_FILES['csvFile']['type'], $csvMimes)) {
                        // If the file is uploaded
                        if (is_uploaded_file($_FILES['csvFile']['tmp_name'])) {
                            // Your existing code for processing attendance
                            echo '<script>alert("File submitted successfully!");</script>';
                        } else {
                            echo '<script>alert("Error: File upload failed!");</script>';
                        }
                    } else {
                        echo '<script>alert("Error: Please select a valid CSV file!");</script>';
                    }
                }
                ?>

        <script>
            function formToggle(ID) {
                var element = document.getElementById(ID);
                if (element.style.display === "none") {
                    element.style.display = "block";
                } else {
                    element.style.display = "none";
                }
            }

            function redirectToUpdatedAttendance() {
                window.location.href = "updatedattendance";
            }
        </script>
</body>

</html>