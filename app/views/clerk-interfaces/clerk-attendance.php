<?php
$role = "clerk";
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

    .popup-form {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: white;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        z-index: 9999;
    }
    
    
    
</style>

<body>
<div class="temp2-home">
        <div class="temp2-title">Attendance</div>

        <div class="temp2-subsection-2">
            <div class="temp2-subsection-21">
                <div class="record-file">Add Attendance Record File</div>
                <div class="dashed-container1">
                    
                    <label for="fileInput" class="file-input-icon"></label>
                    <br>
                    <div class="col-md-12 head">
                        <div class="float-right">
                            <p class="text1">Drag and drop or
                                <a href="javascript:toggleForm('importFrm');" class="btn btn-success"><i class="plus"></i> browse </a>
                                attendance file.
                            </p>
                        </div>
                    </div>
                   
                </div>
                <button class="admission-button2" onclick="redirectToUpdatedAttendance()">Record Attendance</button>
            </div>
        </div>

        <div id="importFrm" class="popup-form" style="display: none;">
            <form action="" method="post" enctype="multipart/form-data">
                <label for="csvFile">Upload CSV File:</label>
                <input type="file" name="csvFile" id="csvFile" accept=".csv" required>
                <button type="submit" name="importSubmit">Import</button>
            </form>
            <button onclick="toggleForm('importFrm')">Close</button>
        </div>

        <div class="temp2-footer">
        <?php $this->view('components/footer/index', $data) ?>
        </div>

        <script>
           
            function toggleForm(formId) {
                var form = document.getElementById(formId);
                if (form.style.display === "none") {
                    form.style.display = "block";
                } else {
                    form.style.display = "none";
                }
            }

          
            function redirectToUpdatedAttendance() {
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

function handleDragOver(event) {
    event.preventDefault();
}

function handleDrop(event) {
    event.preventDefault();
    var files = event.dataTransfer.files;
    handleFiles(files);
}

        </script>
        
    </div>
</body>

</html>