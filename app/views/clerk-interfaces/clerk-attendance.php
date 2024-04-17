<?php
$role = "Clerk";
$data['role'] = $role;

?>

<?php $this->view('components/navside-bar/degreeprogramsidebar', $data) ?>
<?php $this->view('components/navside-bar/footer', $data) ?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>temp2 Dashboard</title>
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

        .btn-secondary-2 {
            width: 20vw;
            height: 5vh;
            padding: 5px 15px 5px 15px;
            border-radius: 10px;
            background: #ffffff;
            box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.2);
            border: 0px;
            margin-bottom: 10px;
            border: 1px solid #17376e;
            font-size: 1vw;
            margin-top: 2%;
            margin-left: 39%;
        }

        .popup-form {
            position: fixed;
            top: 50%;
            left: 50%;
            height: 43%;
            width: 35%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding-left: 70px;
            padding-top: 40px;
            padding-bottom: 40px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            z-index: 999;
        }

        .popup-form label {
            display: block;
            margin-bottom: 20px;
            font-size: 20px;
            width: 80%;
        }

        .popup-form input[type="file"] {
            display: block;
            margin-bottom: 20px;
            font-size: 15px;
            background-color: #909090;
            width: 80%;
        }

        .import-button {
            background-color: #17376e;
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 3px;
            cursor: pointer;
        }

        .popup-form button:hover {
            background-color: #0056b3;
        }

        .close-button {
            margin-top: 10px;
            margin-left: 70%;
            width: 10%;
        }

        .btn-secondary-2:hover {
            color: black;
            background-color: #E2E2E2;
            border: 1px solid #17376e;
        }

        /* Add blur effect */
        .blur-background {
            filter: blur(5px);
        }

        #form-element-dropdown {
            width: 80%;
            outline: none;
            border: 1px solid #aaa;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        #form-element-dropdown option {
            width: 80%;
            outline: none;
            border: 1px solid #aaa;
            border-radius: 10px;
        }

        .download-button {
            color: #17376e;
            text-decoration: none;
            background-color: #ffffff;
        }

        .download-button:hover {
            color: black;
            background-color: #E2E2E2;
        }

        .dr-degree-programs-title {
            font-size: 36px;
            font-weight: 500;
            color: black;
            padding: 10px 0px 10px 32px;
            background-color: var(--text-color);
            border-radius: 6px;
            /* margin: 5px 4px 5px 4px; */
        }

        .dr-degree-programs-title1-core {
            color: #17376e;
            font-size: 22px;
            /* margin: 1px 0px 5px 0px; */
            font-weight: 300;
            font-size: 27px;
        }
    </style>
</head>

<body>

    <div class="temp2-home" id="blur-background">
    <div class="dr-degree-programs-title">
            <div class="dr-degree-programs-title1">Attendance</div>
            <div class="dr-degree-programs-title1-core"><?= $degrees[0]->DegreeName ?></div>
        </div>
        <!-- <?php foreach ($degrees as $degree) : ?>
               <?= $degree-> DegreeShortName ?>
            <?php endforeach; ?> -->

        <div class="temp2-subsection-2">
            <div class="temp2-subsection-21">
                <button class="btn-secondary-2" onclick="downloadAttendanceSheet()">Download Attendance Sheet</button>
                <div class="dashed-container1">
                    <a href="javascript:toggleForm('importFrm');">
                        <div class="file-input-icon"></div>
                    </a>
                    <br>
                    <div class="col-md-12 head">
                        <div class="float-right">
                            <p class="text1">
                                Submit the attendance file of the students.
                            </p>
                        </div>
                    </div>

                </div>
                <button class="admission-button2" onclick="redirectToUpdatedAttendance()">Student Attendance</button>
            </div>
        </div>
    </div>
    <div id="importFrm" class="popup-form" style="display: none;">
        <form action="" method="post" enctype="multipart/form-data" onsubmit="validateForm()">
            <label for="csvFile">Upload CSV File:</label>
            <div class="form-element">
           
    <input type="hidden" name="selectDegree" value="<?= $degrees[0]->DegreeShortName ?>">
    <label for="selectDegree">Degree Name: <?= $degrees[0]->DegreeShortName ?></label>

            </div>
            <input type="file" name="csvFile" id="csvFile" accept=".csv" required>
            <button type="submit" name="importSubmit" class="import-button">Submit file</button>
        </form>
        <button class="close-button" onclick="toggleForm('importFrm')">Close</button>
    </div>

    <div class="temp2-footer">
        <!-- Footer content -->
    </div>

    <script>
        function toggleForm(formId) {
            var form = document.getElementById(formId);
            var blurBackground = document.getElementById("blur-background");
            if (form.style.display === "none") {
                form.style.display = "block";
                blurBackground.classList.add("blur-background"); // Apply blur effect
            } else {
                form.style.display = "none";
                blurBackground.classList.remove("blur-background"); // Remove blur effect
            }
        }

        function redirectToUpdatedAttendance() {
            // Replace ROOT with your actual root URL
            window.location.href = "<?= ROOT ?>clerk/updatedattendance";
        }

        function handleFileSelect(event) {
            event.preventDefault();
            var files = event.target.files;
            handleFiles(files);
        }

        function handleFiles(files) {
            for (var i = 0; i < files.length; i++) {
                var file = files[i];
                if (file.type === 'text/csv') {
                    // Process the CSV file
                    console.log('CSV file selected:', file.name);
                    // You can handle further processing here
                } else {
                    console.log('Invalid file type. Please select a CSV file.');
                }
            }
        }

    function downloadAttendanceSheet() {
    // Get the degree short name from PHP
    var degreeShortName = '<?= $degrees[0]->DegreeShortName ?>';

    // Construct the file URL dynamically based on the degree short name
    var fileUrl = '<?= ROOT ?>assets/csv/output/Student_Attendance_' + degreeShortName + '.csv';

    // Create an anchor element
    var a = document.createElement('a');
    a.href = fileUrl;

    // Set the download attribute with the desired file name
    a.download = 'Student_Attendance_' + degreeShortName + '.csv';

    // Append the anchor element to the document
    document.body.appendChild(a);

    // Trigger a click event on the anchor element
    a.click();

    // Remove the anchor element from the document
    document.body.removeChild(a);
}

        function validateForm() {
            var selectedDegree = document.getElementById("form-element-dropdown").value;
            if (selectedDegree === "") {
                document.getElementById("degreeError").style.display = "inline";
                return false; // Prevent form submission
            }
            return true;
            // Allow form submission
        }
    </script>
</body>

</html>