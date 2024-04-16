<?php
$role = "SAR";
$data['role'] = $role;
$validateError = isset($errors['marks']) ? $errors['marks'] : null;
$examId = $_SESSION['examDetails'][0]->examID;
$degreeId = $_GET['degreeID'];
?>



<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result Upload</title>
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
        font-size: 30px;
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

    .temp2-subcard-data {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }

    .temp2-subcard-data-value {
        font-size: 38px;
        font-weight: 600;
        color: #17376E;
    }

    .temp2-subcard-data-title {
        font-size: 18px;
        font-weight: 600;
        color: #17376E;
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
        font-size: 1.8vw;

    }

    .temp2-sub-title2 {

        color: #17376E;
        font-family: Poppins;
        font-style: normal;
        font-weight: 600;
        font-size: 1.8vw;
    }

    .temp2-subsection-2 {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        margin-top: 10px;

        /* padding: 10px 10px 30px 35px; */
        /* border-radius: 6px; */
        /* margin: 7px 4px 7px 4px; */
    }

    .temp2-subsection-21 {
        display: flex;
        flex-direction: column;
        background-color: var(--text-color);
        padding: 1% 1% 1% 1%;
        border-radius: 6px;
        width: 100%;
        height: auto;
        padding: 1vw 2vw 1vw 2vw;
    }

    .temp2-footer {
        margin-top: auto;
    }



    .dashed-container4 {
        border: 2px dashed #333;
        border-radius: 8px;
        padding: 10px;
        width: 18%;
        height: 270px;
        margin-top: 3%;

        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        flex: 25%;
    }

    input[type="file"] {
        margin: 10px 0;
        /* margin-left: 150px; */
    }

    .file-input-icon {
        display: flex;
        width: 40px;
        height: 40px;
        cursor: pointer;

    }

    .file-input-icon:hover {
        color: #9AD6FF;
        width: 45px;
        height: 45px;

    }

    input[type="file"] {
        display: none;
    }

    .text1 {
        font-size: 0.9vw;
        font-weight: 300;
    }

    .browse-label {
        color: #9AD6FF;
        cursor: pointer;
    }

    .browse-label:hover {
        color: #17376E;
        font-weight: 600;

    }

    .flex-container {
        gap: 5%;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
    }

    .flex-container-top {

        display: flex;
        justify-content: space-between;
        flex-direction: row;
    }

    .download-button {
        padding: 1% 1% 1% 4%;
        background-color: #17376E;
        color: #fff;
        text-decoration: none;
        align-items: center;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        width: 18vw;
        font-size: 0.8vw;
    }

    .sub-name {
        font-weight: 600;
        padding-left: 2%;
        font-size: 1.5vw;
    }

    .subject {
        padding-top: 5%;
    }

    .row {
        display: flex;
        font-family: "Poppins", sans-serif;
    }



    .column1 {
        flex: 50%;
        /* background-color: #9AD6FF; */
        padding: 2%;
        height: 15vw;
        padding-left: 10vw;
    }

    .column2 {
        flex: 50%;
        /* background-color: #E2E2E2; */
        padding: 2%;
        height: 15vw;
        padding-left: 10vw;
    }

    .data1 {
        font-family: "Poppins", sans-serif;
        font-size: 1vw;
        padding-left: 10%;
        color: #17376E;
        font-weight: 500;
    }

    .data2 {
        font-family: "Poppins", sans-serif;
        font-size: 1vw;
        padding-left: 10%;
        color: #17376E;
        padding-top: 20px;
        font-weight: 500;
    }

    .data3 {
        font-family: "Poppins", sans-serif;
        font-size: 1vw;
        padding-left: 10%;
        color: #17376E;
        font-weight: 500;
    }

    .data4 {
        font-family: "Poppins", sans-serif;
        font-size: 1vw;
        padding-left: 10%;
        color: #17376E;
        padding-top: 20px;
        font-weight: 500;
    }

    #course,
    #exam,
    #count,
    #year {
        padding-top: 5px;
        font-size: 0.9vw;
        color: #000000;
        font-weight: 300;
    }

    .input-main-group {
        display: flex;
        align-items: center;
        margin-left: 25%;
        background-color: #ffffff;
        gap: 1%;
    }

    .custom-dropdown {
        position: relative;
        width: 45%;
        margin: 10px;
        border: #E2E2E2;
    }

    .custom-dropdown .icon {
        position: absolute;
        top: 50%;
        left: 10px;
        transform: translateY(-50%);
        font-size: 25px;
        color: #000;
        /* Set the color you prefer */
    }

    .custom-dropdown select {
        width: calc(100% - 40px);
        /* Adjusted width to leave space for the icon */
        padding: 10px;
        border: 1px solid #E2E2E2;
        border-radius: 5px;
        background-color: #E2E2E2;
        text-align: center;
        cursor: pointer;
        font-size: 16px;
        padding-left: 40px;
        /* Adjust this value to leave space for the icon */
    }

    .custom-dropdown select:hover {
        background-color: #eeeeee;
        /* Change the background color on hover */
    }

    .dr-degree-programs-button {
        height: 70%;
        border-radius: 7px;
        background-color: var(--sidebar-color);
        color: var(--text-color);
        width: 10%;
        min-width: 80px;
        font-size: 1vw;
    }

    .dr-degree-programs-button:hover {
        background-color: var(--text-color);
        color: var(--sidebar-color);
    }

    .btn-primary {
        min-width: 15vw;
        color: #fff;
        height: 5vh;
        padding: 5px 5px 5px 5px;
        border-radius: 10px;
        background: #17376e;
        box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.2);
        border: 0px;
        margin-bottom: 10px;
        font-size: 1vw;
    }

    .bt-name {
        font-size: 16px;
        font-weight: 500px;
    }

    .btn-primary:hover {
        color: #17376e;
        background-color: white;
        border: 1px solid
    }

    .btn-secondary {
        width: 40%;
        color: #fff;
        height: 4vh;
        padding: 5px 10px 5px 10px;
        border-radius: 8px;
        background: #ffffff;
        box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.2);
        color: #17376e;
        border: 0px;
        margin-bottom: 10px;
        border: 1px solid #17376e;
        text-align: center;
        font-size: 0.8vw;
    }

    .btn-secondary:hover {
        color: black;
        background-color: #ACCBFF;
        border: 1px solid #17376e;
    }

    .file-info-container {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        flex-direction: column;
        padding: 10px;
    }

    .file-info-container-temp {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        flex-direction: column;
        padding: 10px;
    }

    .uploaded-file-name {
        font-size: 1vw;
        text-align: center;

    }

    .file-uploded-icon {
        width: 4vw;
        height: 4vw;
        background-image: url('<?= ROOT ?>/assets/result-upload/csv-upload.svg');
        background-size: cover;
        background-repeat: no-repeat;
        cursor: pointer;
    }

    .btn-secondary-cancel {
        width: 40%;
        color: #ff0000;
        background: white;
        height: 4vh;
        padding: 5px 5px 5px 5px;
        border-radius: 8px;
        box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.2);
        border: 1px solid;
        margin-bottom: 10px;
        font-size: 0.8vw;
    }

    .btn-secondary-delete {
        width: 40%;
        color: #ff0000;
        background: white;
        height: 4vh;
        padding: 5px 5px 5px 5px;
        border-radius: 8px;
        box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.2);
        border: 1px solid;
        margin-bottom: 10px;
        font-size: 0.8vw;
    }

    .btn-secondary-delete:hover {
        color: #ff0000;
        background-color: #F9D2D2;
        border: 1px solid red;
    }

    .btn-secondary-cancel:hover {
        color: #ff0000;
        background-color: #F9D2D2;
        border: 1px solid red;
    }

    .button-container {
        display: flex;
        justify-content: center;
        gap: 1vw;
        width: 100%;
        margin-top: 1vw;
    }

    .button-container-temp {
        display: flex;
        justify-content: center;
        gap: 1vw;

    }

    .csv-input-from {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
    }

    .dashed-container-1 {

        border-radius: 8px;
        padding: 10px;
        width: 100%;
        height: 300px;
        margin-top: 3%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        flex: 25%;
        border: 2px dashed #3498db;
        cursor: pointer;
        gap: 30px;
    }

    .dashed-container-1.drag-over {
        border-color: #e74c3c;
        background-color: #f2f2f2;
        color: #e74c3c;
    }

    .dashed-container-1.hide {
        display: none;
    }

    .dashed-container-2 {

        border-radius: 8px;
        padding: 10px;
        width: 100%;
        height: 300px;
        margin-top: 3%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        flex: 25%;
        border: 2px dashed #3498db;
        cursor: pointer;
        gap: 30px;
    }

    .dashed-container-2.drag-over {
        border-color: #e74c3c;
        background-color: #f2f2f2;
        color: #e74c3c;
    }

    .dashed-container-3 {

        border-radius: 8px;
        padding: 10px;
        width: 100%;
        height: 300px;
        margin-top: 3%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        flex: 25%;
        border: 2px dashed #3498db;
        cursor: pointer;
        gap: 30px;
    }

    .dashed-container-3.drag-over {
        border-color: #e74c3c;
        background-color: #f2f2f2;
        color: #e74c3c;
    }


    .user-error {
        color: red;
        font-size: 10px;
        font-weight: 400;
        margin-left: 5px;
    }

    .marks-type {
        font-size: 1.5vw;
        text-align: center;
        color: #939393;
    }

    .button-bar {
        display: flex;
        gap: 20px;

    }

    .btn-secondary-2 {
        width: 20vw;
        color: #fff;
        height: 5vh;
        padding: 5px 15px 5px 15px;
        border-radius: 10px;
        background: #ffffff;
        box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.2);
        color: #17376e;
        border: 0px;
        margin-bottom: 10px;
        border: 1px solid #17376e;
        font-size: 1vw;
    }

    .btn-secondary-download {
        width: 40%;
        color: #fff;
        height: 4vh;
        padding: 5px 10px 5px 10px;
        border-radius: 8px;
        background: #ffffff;
        box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.2);
        color: #17376e;
        border: 0px;
        margin-bottom: 10px;
        border: 1px solid #17376e;
        text-align: center;
        font-size: 0.8vw;

    }

    .btn-secondary-download:hover {
        color: black;
        background-color: #E2E2E2;
        border: 1px solid #17376e;
    }

    .btn-secondary-2:hover {
        color: black;
        background-color: #E2E2E2;
        border: 1px solid #17376e;
    }

    .btn-secondary-2-examiner3 {
        width: 20vw;
        color: #fff;
        height: 5vh;
        padding: 5px 15px 5px 15px;
        border-radius: 10px;
        background: #ffffff;
        box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.2);
        color: #17376e;
        border: 0px;
        margin-bottom: 10px;
        border: 1px solid #17376e;
        font-size: 1vw;
        display: none;
        align-items: center;
        justify-content: center;
    }

    .btn-secondary-2-examiner3[data-active="true"] {
        display: flex;
    }

    .btn-secondary-2-examiner3[data-active="false"] {
        display: none;
    }

    .btn-secondary-2-examiner3:hover {
        color: black;
        background-color: #E2E2E2;
        border: 1px solid #17376e;
    }


    .dashed-container-4 {
        border-radius: 8px;
        padding: 10px;
        width: 100%;
        height: 300px;
        margin-top: 3%;
        display: none;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        flex: 25%;
        border: 2px dashed #3498db;
        cursor: pointer;
        gap: 30px;
    }

    .dashed-container-4[data-active="true"] {
        display: flex;
    }

    .dashed-container-4[data-active="false"] {
        display: none;
    }

    .dashed-container-4.drag-over {
        border-color: #e74c3c;
        /* Change border color when dragging over */
        background-color: #f2f2f2;
        /* Change background color when dragging over */
        color: #e74c3c;
    }

    .file-input-wraper {
        width: 25%;
    }

    .file-submission-view {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }

    .file-uploaded-view {
        display: flex;
        justify-content: center;
        flex-direction: column;
        width: 90%;
    }

    .file-uploaded-view.remove {
        display: none;
        justify-content: center;
        flex-direction: column;
    }

    .file-submission-view.remove {
        display: none;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        pointer-events: none;
    }

    .file-submission-view.remove .file-input-icon {
        display: none;
    }

    .file-submission-view.remove .text1 {
        display: none;
    }

    .resultupload-body.active {
        filter: blur(5px);
        pointer-events: none;
        user-select: none;
        overflow: hidden;

    }

    .results-sheet-delet-popup {
        position: fixed;
        top: -150%;
        left: 50%;
        transform: translate(-50%, -50%) scale(1.25);
        border: 1.5px solid rgba(00, 00, 00, 0.30);
        opacity: 0;
        background: #fff;
        width: 40%;
        padding: 40px;
        box-shadow: 9px 11px 60.9px 0px rgba(0, 0, 0, 0.60);
        border-radius: 10px;
        transition: top 0ms ease-in-out 200ms, opacity 200ms ease-in-out 0ms, transform 200ms ease-in-out 0ms;
        z-index: 2000;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .results-sheet-delet-popup.active {

        top: 50%;
        opacity: 1;
        transform: translate(-50%, -50%) scale(1);
        transition: top 0ms ease-in-out 200ms, opacity 200ms ease-in-out 0ms, transform 200ms ease-in-out 0ms;
    }

    .examresults-footer {
        position: relative;
        bottom: 0;
        width: 100%;
    }
</style>

<body>
    <div class="resultupload-body" id="rs-body">
        <?php $this->view('components/navside-bar/degreeprogramsidebar', $data) ?>
        <?php $this->view('components/navside-bar/footer', $data) ?>

        <div class="temp2-home">

            <div class="temp2-title">Examination</div>
            <div class="temp2-subsection-1">
                <div class="temp2-sub-title1">
                    Overview
                </div>

                <div class="row">



                    <div class="column1">
                        <div class="data1">Course Name<br>
                            <!-- <div class="email"><?= $student->Email ?></div> -->
                            <div class="course" id="course">Diploma in School Librarianship</div>
                        </div>
                        <br>
                        <div class="data2">Examination:<br>
                            <!-- <div class="regNum"> <?= $student->regNo ?></div> -->
                            <div class="exam" id="exam">2nd Semester Examination</div>
                        </div>
                    </div>

                    <div class="column2">
                        <div class="data3">Participation:<br>
                            <div class="count" id="count"> 216</div>
                        </div>
                        <br>
                        <div class="data4">Academic Year:<br>
                            <div class="year" id="year"> 2023/2024</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="temp2-subsection-2">
                <div class="temp2-subsection-21">

                    <div class="temp2-sub-title2">
                        Results Submission </br>
                    </div>
                    <?php foreach ($examSubjects as $subject): ?>
                        <?php $json = json_encode($subject); ?>

                        <div class="subject">
                            <div class="flex-container-top">
                                <div class="sub-name">
                                    <?= $subject->SubjectName ?>
                                </div>
                                <form method="POST">
                                    <div class="button-bar">
                                        <button class="btn-secondary-2-examiner3" name='cw-E3'
                                            value="<?= $subject->SubjectCode ?>" type='submit'
                                            id='Examiner3_btn_<?= $subject->SubjectCode ?>'>Continue without
                                            Examiner 03</button>
                                        <button class="btn-primary" name='download_marksheet'
                                            onclick="downloadFile('<?= $subject->SubjectCode ?>')">Download
                                            Marksheet</button>
                                    </div>
                                </form>
                            </div>
                            <div class="flex-container">
                                <?php
                                $containerId = 'container' . ($subject->SubjectCode) . '_1';
                                $fileInputId = 'fileInput' . ($subject->SubjectID) . '_1';
                                $formID = 'form' . ($subject->SubjectID) . '_1';
                                $submitViewIdAS = $subject->SubjectCode . "_S_assestment";
                                $uploadedViewIdAS = $subject->SubjectCode . "_R_assestment";

                                ?>

                                <div class="dashed-container-1" id="<?= $containerId ?>" ondragover="handleDragOver(event)"
                                    ondragenter="handleDragEnter(event)" ondragleave="handleDragLeave(event)"
                                    ondrop="handleDrop(event, '<?= $containerId ?>', '<?= $fileInputId ?>' , '<?= $formID ?>' , '<?= $subject->SubjectCode ?>','assestment')">
                                    <div class='marks-type'>Assestment Marks </div>
                                    <form method="POST" class='csv-input-from' enctype="multipart/form-data"
                                        id="<?= $formID ?>">
                                        <div class="file-submission-view" id="<?= $subject->SubjectCode ?>_S_assestment">
                                            <img src='<?= ROOT ?>/assets/file-icon.png' class="file-input-icon"
                                                for="<?= $fileInputId ?>" onclick="triggerFileInput('<?= $fileInputId ?>')">
                                            <br>
                                            <input type='text' value='<?= $formID ?>' name='formID' hidden>
                                            <input type='text' value='assestment' name='type' hidden>
                                            <input type='text' value='<?= $subject->SubjectCode ?>' name='subjectCode'
                                                hidden>
                                            <input type="file" id="<?= $fileInputId ?>" name="file" accept=".csv"
                                                onchange="showSubmitButton('<?= $containerId ?>', '<?= $fileInputId ?>' , '<?= $formID ?>' , '<?= $subject->SubjectCode ?>','assestment','<?= $submitViewIdAS ?>','<?= $uploadedViewIdAS ?>')">
                                            <p class="text1">Drag and drop or <label for="<?= $fileInputId ?>"
                                                    class="browse-label">browse</label></br> assignment results.</p>
                                            <?php if (!empty($errors['marks'])): ?>
                                                <div class="user-error" for="marks">
                                                    <?= $errors['marks'] ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="file-uploaded-view remove "
                                            id="<?= $subject->SubjectCode ?>_R_assestment">
                                            <div class="file-info-container">
                                                <div class="file-uploded-icon"></div>
                                                <span class="uploaded-file-name"
                                                    id="<?= $subject->SubjectCode ?>_assestment_FN">[File
                                                    Name]</span>
                                            </div>
                                            <div class="button-container">
                                                <button class="btn-secondary-download" name="sub1_exam-res" type="button"
                                                    onclick="downloadResultSheet('<?= $subject->SubjectCode ?>', '<?= $examId ?>' , 'assestment')">Download</button>
                                                <button class="btn-secondary-delete" name="sub1_exam-res" type="button"
                                                    onclick="deleteSubmitFile(event,'<?= $submitViewIdAS ?>','<?= $uploadedViewIdAS ?>','<?= $subject->SubjectCode ?>','<?= $formID ?>','assestment')">Delete</button>
                                            </div>
                                            <input id="fileInputId" type="file" style="display: none;">
                                            <label class="text1" style="display: none;"></label>
                                        </div>
                                    </form>
                                </div>



                                <?php
                                $containerId = 'container' . ($subject->SubjectCode) . '_2';
                                $fileInputId = 'fileInput' . ($subject->SubjectID) . '_2';
                                $formID = 'form' . ($subject->SubjectID) . '_2';
                                $submitViewId1 = $subject->SubjectCode . "_S_examiner1";
                                $uploadedViewId1 = $subject->SubjectCode . "_R_examiner1";
                                ?>

                                <div class="dashed-container-2" id="<?= $containerId ?>" ondragover="handleDragOver(event)"
                                    ondragenter="handleDragEnter(event)" ondragleave="handleDragLeave(event)"
                                    ondrop="handleDrop(event, '<?= $containerId ?>', '<?= $fileInputId ?>' , '<?= $formID ?>' , '<?= $subject->SubjectCode ?>', 'examiner1')">
                                    <div class='marks-type'>Examiner 01 Marks </div>
                                    <form method="POST" class='csv-input-from' enctype="multipart/form-data"
                                        id="<?= $formID ?>">
                                        <div class="file-submission-view" id="<?= $subject->SubjectCode ?>_S_examiner1">
                                            <img src='<?= ROOT ?>/assets/file-icon.png' class="file-input-icon"
                                                for="<?= $fileInputId ?>" onclick="triggerFileInput('<?= $fileInputId ?>')">
                                            <br>
                                            <input type='text' value='<?= $formID ?>' name='formID' hidden>
                                            <input type='text' value='examiner2' name='type' hidden>
                                            <input type='text' value='<?= $subject->SubjectCode ?>' name='subjectCode'
                                                hidden>
                                            <input type="file" id="<?= $fileInputId ?>" name="file" accept=".csv"
                                                onchange="showSubmitButton('<?= $containerId ?>', '<?= $fileInputId ?>' , '<?= $formID ?>' , '<?= $subject->SubjectCode ?>','examiner1','<?= $submitViewId1 ?>','<?= $uploadedViewId1 ?>')">
                                            <p class="text1">Drag and drop or <label for="<?= $fileInputId ?>"
                                                    class="browse-label">browse</label></br> Examiner 01 results.</p>
                                            <?php if (!empty($errors['marks'])): ?>
                                                <div class="user-error" for="marks">
                                                    <?= $errors['marks'] ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="file-uploaded-view remove "
                                            id="<?= $subject->SubjectCode ?>_R_examiner1">
                                            <div class="file-info-container">
                                                <div class="file-uploded-icon"></div>
                                                <span class="uploaded-file-name"
                                                    id="<?= $subject->SubjectCode ?>_examiner1_FN">[File
                                                    Name]</span>
                                            </div>
                                            <div class="button-container">
                                                <button class="btn-secondary-download" name="sub1_exam-res" type="button"
                                                    onclick="downloadResultSheet('<?= $subject->SubjectCode ?>', '<?= $examId ?>' , 'examiner1')">Download</button>
                                                <button class="btn-secondary-delete" name="sub1_exam-res" type="button"
                                                    onclick="deleteSubmitFile(event,'<?= $submitViewIdAS ?>','<?= $uploadedViewIdAS ?>','<?= $subject->SubjectCode ?>','<?= $formID ?>','examiner1')">Delete</button>
                                            </div>
                                            <input id="fileInputId" type="file" style="display: none;">
                                            <label class="text1" style="display: none;"></label>
                                        </div>
                                    </form>
                                </div>

                                <?php
                                $containerId = 'container' . ($subject->SubjectCode) . '_3';
                                $fileInputId = 'fileInput' . ($subject->SubjectID) . '_3';
                                $formID = 'form' . ($subject->SubjectID) . '_3';
                                $submitViewId2 = $subject->SubjectCode . "_S_examiner2";
                                $uploadedViewId2 = $subject->SubjectCode . "_R_examiner2";
                                ?>

                                <div class="dashed-container-3" id="<?= $containerId ?>" ondragover="handleDragOver(event)"
                                    ondragenter="handleDragEnter(event)" ondragleave="handleDragLeave(event)"
                                    ondrop="handleDrop(event, '<?= $containerId ?>', '<?= $fileInputId ?>' , '<?= $formID ?>' , '<?= $subject->SubjectCode ?>', 'examiner2')">
                                    <div class='marks-type'>Examiner 02 Marks </div>
                                    <form method="POST" class='csv-input-from' enctype="multipart/form-data"
                                        id="<?= $formID ?>">
                                        <div class="file-submission-view" id="<?= $subject->SubjectCode ?>_S_examiner2">
                                            <img src='<?= ROOT ?>/assets/file-icon.png' class="file-input-icon"
                                                for="<?= $fileInputId ?>" onclick="triggerFileInput('<?= $fileInputId ?>')">
                                            <br>
                                            <input type='text' value='<?= $formID ?>' name='formID' hidden>
                                            <input type='text' value='examiner2' name='type' hidden>
                                            <input type='text' value='<?= $subject->SubjectCode ?>' name='subjectCode'
                                                hidden>
                                            <input type="file" id="<?= $fileInputId ?>" name="file" accept=".csv"
                                                onchange="showSubmitButton('<?= $containerId ?>', '<?= $fileInputId ?>' , '<?= $formID ?>' , '<?= $subject->SubjectCode ?>','examiner2','<?= $submitViewId2 ?>','<?= $uploadedViewId2 ?>')">
                                            <p class="text1">Drag and drop or <label for="<?= $fileInputId ?>"
                                                    class="browse-label">browse</label></br> Examiner 02 results.</p>
                                            <?php if (!empty($errors['marks'])): ?>
                                                <div class="user-error" for="marks">
                                                    <?= $errors['marks'] ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="file-uploaded-view remove "
                                            id="<?= $subject->SubjectCode ?>_R_examiner2">
                                            <div class="file-info-container">
                                                <div class="file-uploded-icon"></div>
                                                <span class="uploaded-file-name"
                                                    id="<?= $subject->SubjectCode ?>_examiner2_FN">[File
                                                    Name]</span>
                                            </div>
                                            <div class="button-container">
                                                <button class="btn-secondary-download" name="sub1_exam-res" type="button"
                                                    onclick="downloadResultSheet('<?= $subject->SubjectCode ?>', '<?= $examId ?>' , 'examiner2')">Download</button>
                                                <button class="btn-secondary-delete" name="sub1_exam-res" type="button"
                                                    onclick="deleteSubmitFile(event,'<?= $submitViewIdAS ?>','<?= $uploadedViewIdAS ?>','<?= $subject->SubjectCode ?>','<?= $formID ?>','examiner2')">Delete</button>
                                            </div>
                                            <input id="fileInputId" type="file" style="display: none;">
                                            <label class="text1" style="display: none;"></label>
                                        </div>
                                    </form>
                                </div>

                                <?php
                                $containerId = 'container' . ($subject->SubjectCode) . '_4';
                                $fileInputId = 'fileInput' . ($subject->SubjectID) . '_4';
                                $formID = 'form' . ($subject->SubjectID) . '_4';
                                $submitViewId3 = $subject->SubjectCode . "_S_examiner3";
                                $uploadedViewId3 = $subject->SubjectCode . "_R_examiner3";

                                ?>

                                <div class="dashed-container-4" id="<?= $containerId ?>" ondragover="handleDragOver(event)"
                                    ondragenter="handleDragEnter(event)" ondragleave="handleDragLeave(event)"
                                    ondrop="handleDrop(event, '<?= $containerId ?>', '<?= $fileInputId ?>' , '<?= $formID ?>' , '<?= $subject->SubjectCode ?>','examiner3')">
                                    <div class='marks-type'>Examiner 03 Marks </div>
                                    <form method="POST" class='csv-input-from' enctype="multipart/form-data"
                                        id="<?= $formID ?>">
                                        <div class="file-submission-view" id="<?= $subject->SubjectCode ?>_S_examiner3">
                                            <img src='<?= ROOT ?>/assets/file-icon.png' class="file-input-icon"
                                                for="<?= $fileInputId ?>" onclick="triggerFileInput('<?= $fileInputId ?>')">
                                            <br>
                                            <input type='text' value='<?= $formID ?>' name='formID' hidden>
                                            <input type='text' value='examiner3' name='type' hidden>
                                            <input type='text' value='<?= $subject->SubjectCode ?>' name='subjectCode'
                                                hidden>
                                            <input type="file" id="<?= $fileInputId ?>" name="file" accept=".csv"
                                                onchange="showSubmitButton('<?= $containerId ?>', '<?= $fileInputId ?>' , '<?= $formID ?>' , '<?= $subject->SubjectCode ?>','examiner3','<?= $submitViewId3 ?>','<?= $uploadedViewId3 ?>')">
                                            <p class="text1">Drag and drop or <label for="<?= $fileInputId ?>"
                                                    class="browse-label">browse</label></br> Examiner 03 results.</p>
                                            <?php if (!empty($errors['marks'])): ?>
                                                <div class="user-error" for="marks">
                                                    <?= $errors['marks'] ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="file-uploaded-view remove "
                                            id="<?= $subject->SubjectCode ?>_R_examiner3">
                                            <div class="file-info-container">
                                                <div class="file-uploded-icon"></div>
                                                <span class="uploaded-file-name"
                                                    id="<?= $subject->SubjectCode ?>_examiner3_FN">[File
                                                    Name]</span>
                                            </div>
                                            <div class="button-container">
                                                <button class="btn-secondary-download" name="sub1_exam-res" type="button"
                                                    onclick="downloadResultSheet('<?= $subject->SubjectCode ?>', '<?= $examId ?>' , 'examiner3')">Download</button>
                                                <button class="btn-secondary-delete" name="sub1_exam-res" type="button"
                                                    onclick="deleteSubmitFile(event,'<?= $submitViewIdAS ?>','<?= $uploadedViewIdAS ?>','<?= $subject->SubjectCode ?>','<?= $formID ?>','examiner3')">Delete</button>
                                            </div>
                                            <input id="fileInputId" type="file" style="display: none;">
                                            <label class="text1" style="display: none;"></label>
                                        </div>

                                    </form>
                                </div>

                            </div>
                        </div>
                        <br>
                        </form>
                    <?php endforeach; ?>

                </div>

            </div>

            <div class="examresults-footer">
                <?php $this->view('components/footer/index', $data) ?>
            </div>
        </div>


    </div>

    </div>

    <div class="results-sheet-delet-popup" id="rs-popup">
        <?php $this->view('components/popup/results-sheet-delete-popup', $data) ?>
    </div>
</body>





<script>
    //delete the uploaded file
    function deleteSubmitFile(event, submitViewId, uploadedViewId, subCode, formId, type) {
        event.preventDefault();
        var submitView = document.querySelector('#' + submitViewId);
        var uploadedView = document.querySelector('#' + uploadedViewId);

        document.getElementById(submitViewId).classList.remove("remove");
        document.getElementById(uploadedViewId).classList.add("remove");

        //add input field inside the form
        //add subject id
        var inputField = document.createElement("input");
        inputField.type = "text";
        inputField.name = "subjectCode";
        inputField.value = subCode;
        inputField.style.display = "none";
        document.getElementById('delete-rs-form').appendChild(inputField);


        //add formId
        var inputField = document.createElement("input");
        inputField.type = "text";
        inputField.name = "formId";
        inputField.value = formId;
        inputField.style.display = "none";
        document.getElementById('delete-rs-form').appendChild(inputField);

        //add marksheet type
        var inputField = document.createElement("input");
        inputField.type = "text";
        inputField.name = "type";
        inputField.value = type;
        inputField.style.display = "none";
        document.getElementById('delete-rs-form').appendChild(inputField);


        //need to call popup instead of this


        document.getElementById('rs-popup').classList.add('active');
        document.getElementById('rs-body').classList.add('active');

        // console.log(submitViewId);
        // console.log(uploadedViewId);

    }

    function downloadResultSheet(subjectCode, examId, type) {

        var fileUrl = '<?= ROOT ?>assets/csv/examsheets/' + subjectCode + '_' + examId + '_' + type + '.csv';

        // Create an anchor element
        var a = document.createElement('a');
        a.href = fileUrl;

        // Set the download attribute with the desired file name
        a.download = 'ResultSheet_' + subjectCode + '_' + type + '.csv';

        // Append the anchor element to the document
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
    }


    //get php data
    var examSheets = <?php echo $subjectData; ?>;
    var examiner3Data = <?php echo $examiner3Data; ?>;



    for (var subjectCode in examSheets) {
        if (examSheets.hasOwnProperty(subjectCode)) {
            for (var i = 0; i < examSheets[subjectCode].length; i++) {
                var data = examSheets[subjectCode][i];
                // console.log("Data:", data);

                var submitViewId = data.subjectCode + "_" + "S" + "_" + data.type;
                var uploadedViewId = data.subjectCode + "_" + "R" + "_" + data.type;
                var fileNameId = data.subjectCode + "_" + data.type + "_" + "FN";



                document.getElementById(submitViewId).classList.add("remove");
                document.getElementById(uploadedViewId).classList.remove("remove");
                document.getElementById(fileNameId).textContent = data.uploadName;



            }
        }
    }


    for (var i = 0; i < examiner3Data.length; i++) {

        var Examiner3data = examiner3Data[i];
        // console.log('data = ', Examiner3data);
        var examiner3SubCode = Examiner3data.subCode

        var Examiner3containerId = 'container' + examiner3SubCode + '_4';
        var Examiner3Btn = 'Examiner3_btn_' + examiner3SubCode;

        //show examiner3 results upload container and continue without button
        document.getElementById(Examiner3containerId).style.display = 'flex';
        document.getElementById(Examiner3Btn).style.display = 'flex';

    }



    function handleDragOver(event) {
        event.preventDefault();
        var container = event.target;
        container.classList.add('drag-over');
    }

    function handleDragEnter(event) {
        event.preventDefault();
        var container = event.target;
        container.classList.add('drag-over');
    }

    function handleDragLeave(event) {
        var container = event.target;
        container.classList.remove('drag-over');
    }

    function handleDrop(event, containerId, fileInputId, formId, subCode, type) {
        event.preventDefault();

        // Remove the drag-over styles
        var container = document.getElementById(containerId);
        container.classList.remove('drag-over');

        // Handling the dropped files
        var fileInput = document.getElementById(fileInputId);
        var files = event.dataTransfer.files;

        // Validate each dropped file
        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            if (file.type === 'text/csv' || file.name.toLowerCase().endsWith('.csv')) {
                // update the file input with the dropped files
                fileInput.files = files;

                // Show submit button
                showSubmitButton(containerId, fileInputId, formId, subCode, type, submitViewId, uploadedViewId);
            } else {
                // not a CSV file, you can provide feedback to the user
                alert('Please drop a CSV file.');
            }
        }
    }



    function showSubmitButton(containerId, fileInputId, formId, subCode, type, submitViewId, uploadedViewId) {
        var container = document.getElementById(containerId);
        var fileInput = document.getElementById(fileInputId);
        var form = document.getElementById(formId);

        if (!container || !fileInput || !form) {

            return;
        }

        // Check if a file is selected
        if (fileInput.files.length > 0) {

            // Check if the submit button is already present
            var deleteButtonId = 'cancel' + formId;
            var existingDeleteButton = document.getElementById(deleteButtonId);
            if (!existingDeleteButton) {
                // Create a delete button dynamically
                var deleteButton = document.createElement('button');
                deleteButton.textContent = 'Cancel';
                deleteButton.className = 'btn-secondary-cancel';
                deleteButton.name = 'sub1_exam-res';
                deleteButton.type = 'button';
                deleteButton.id = 'cancel' + formId;
                deleteButton.addEventListener('click', function () {
                    deleteFile(container, fileInput, type, subCode);
                });


            } else {

                document.getElementById(deleteButtonId).style.display = 'flex';
            }

            var submitButtonId = 'button_' + formId;
            var existingSubmitButton = document.getElementById(submitButtonId);
            if (!existingSubmitButton) {
                // Create a submit button dynamically
                var submitButton = document.createElement('button');
                submitButton.textContent = 'Submit';
                submitButton.className = 'btn-secondary';
                submitButton.name = 'sub1_exam-res';
                submitButton.type = 'button';
                submitButton.id = 'button_' + formId;
                submitButton.addEventListener('click', function () {
                    uploadFile(fileInputId, submitButton.id, formId, subCode, type, submitViewId, uploadedViewId);
                });
            } else {

                document.getElementById(submitButtonId).style.display = 'flex';
            }

            // Wrap the file icon and file name in a container
            var fileContainerId = 'file-info-container-' + subCode + '-' + type;
            var exitingFileContainer = document.getElementById(fileContainerId);

            if (!exitingFileContainer) {
                var fileInfoContainer = document.createElement('div');
                fileInfoContainer.className = 'file-info-container';
                fileInfoContainer.id = fileContainerId;

                // Create the file icon
                var fileIcon = document.createElement('div');
                fileIcon.className = 'file-uploded-icon ';
                fileInfoContainer.appendChild(fileIcon);

                // Create the file name
                var fileName = document.createElement('span');
                fileName.textContent = fileInput.files[0].name;
                fileName.className = 'uploaded-file-name';
                fileInfoContainer.appendChild(fileName);

                // Append the container to the container
                form.appendChild(fileInfoContainer);

            } else {
                document.getElementById(fileContainerId).style.display = 'flex';

            }




            //create container for buttons
            var btnContainerId = 'button-container-' + subCode + '-' + type;
            var existingButtonContainer = document.getElementById(btnContainerId);

            if (!existingButtonContainer) {
                var buttonContainer = document.createElement('div');
                buttonContainer.className = 'button-container';
                buttonContainer.id = 'button-container-' + subCode + '-' + type;
                form.appendChild(buttonContainer);
                buttonContainer.appendChild(deleteButton);
                buttonContainer.appendChild(submitButton);


            } else {

                document.getElementById(btnContainerId).style.display = 'flex';
            }

            // Hide the file icon label
            container.querySelector('.file-input-icon').style.display = 'none';
            container.querySelector('.file-submission-view').style.display = 'none';




            // container.appendChild(buttonContainer);

            // Create the file icon image if not present
            var existingFileIcon = container.querySelector('.file-input-icon');
            if (!existingFileIcon) {
                var fileIcon = document.createElement('img');
                fileIcon.src = '<?= ROOT ?>/assets/file-icon.png';
                fileIcon.className = 'file-input-icon';
                fileIcon.setAttribute('for', fileInputId);
                fileIcon.addEventListener('click', function () {
                    triggerFileInput(fileInputId);
                });
                container.appendChild(fileIcon);
            }
            // Hide the file input and associated text
            fileInput.style.display = 'none';
            container.querySelector('.text1').style.display = 'none';
        }
    }

    //function to trigger file input
    function triggerFileInput(fileInputId) {
        var fileInput = document.getElementById(fileInputId);

        fileInput.click();
    }

    function uploadFile(fileInputId, buttonId, formId, subCode, type, submitViewId, uploadedViewId) {

        var error = <?= json_encode($validateError) ?>;


        if (error !== null && error !== '') {
            alert('Invalid Marks: ' + error);
            return;
        }

        var fileInput = document.getElementById(fileInputId);
        var formData = new FormData();
        console.log(fileInput.files[0])
        formData.append('file', fileInput.files[0]);
        formData.append('formId', formId);
        formData.append('subjectCode', subCode);
        formData.append('type', type);



        var examId = '<?= $examId ?>';
        var degreeId = '<?= $degreeId ?>';

        var targetURL = '<?= ROOT ?>sar/examination/resultsupload?degreeID=' + degreeId + '&examID=' + examId;
        console.log('targetURL = ', targetURL);
        console.log('formData = ', formData);

        fetch(targetURL, {
            method: 'POST',
            body: formData,
        })
            .then(response => {
                if (!response.ok) {
                    console.log('Res = '.response);
                    throw new Error('Network response was not ok');
                }
                return response.text(); // Change to response.text() to receive HTML
            })
            .then(data => {
                console.log('Returned HTML data =', data);
                alert('File uploaded successfully!');

                // Now you can manipulate the HTML content as needed
                var tempDiv = document.createElement('div');
                tempDiv.innerHTML = data;

                // var examiner3Status = tempDiv.querySelector('#examiner3-status').textContent;
                // var examiner3SubCode = tempDiv.querySelector('#examiner3SubCode').textContent;
                // var examiner3SubID = tempDiv.querySelector('#examiner3SubID').textContent;

                var examiner3StatusElements = tempDiv.querySelectorAll('.examiner3-status');
                var statusArray = [];

                examiner3StatusElements.forEach(function (element) {
                    statusArray.push(element.textContent);
                });
                console.log('Examiner 3 Status:', statusArray);

                var examiner3SubCodeElements = tempDiv.querySelectorAll('.examiner3subCode');
                var subCodeArray = [];

                examiner3SubCodeElements.forEach(function (element) {
                    subCodeArray.push(element.textContent);
                });
                console.log('Examiner 3 SubCode:', subCodeArray);

                var examiner3SubIDElements = tempDiv.querySelectorAll('.examiner3subID');
                var subIDArray = [];

                examiner3SubIDElements.forEach(function (element) {
                    subIDArray.push(element.textContent);
                });
                console.log('Examiner 3 SubID:', subIDArray);


                subCodeArray.forEach(function (subCode) {
                    var Examiner3containerId = 'container' + subCode + '_4';
                    var Examiner3Btn = 'Examiner3_btn_' + subCode;

                    var containerElement = document.getElementById(Examiner3containerId);
                    var btnElement = document.getElementById(Examiner3Btn);

                    if (containerElement && btnElement) {
                        containerElement.style.display = 'flex';
                        btnElement.style.display = 'flex';
                    } else {
                        console.error('Elements not found for SubCode:', subCode);
                    }
                });

                //show uploaded view
                // var Examiner3fileContainerId = 'file-info-container-' + subCode + '-' + type;
                // var Examiner3buttonContainerId = 'button-container-' + subCode + '-' + type;
                // var Examiner3containerId = 'container' + examiner3SubCode + '_4';
                // var Examiner3Btn = 'Examiner3_btn_' + examiner3SubCode;


                //henadel examiner 3 marks upload sesction
                // document.getElementById(Examiner3containerId).style.display = 'flex';
                // document.getElementById(Examiner3Btn).style.display = 'flex';

                // element.setAttribute('data-active', examiner3Status ? 'true' : 'false');

                // if (examiner3Status == '1') {
                //     document.getElementById(Examiner3containerId).style.display = 'flex';
                //     document.getElementById(Examiner3Btn).style.display = 'flex';
                // }

                //show uploaded view
                var fileContainerId = 'file-info-container-' + subCode + '-' + type;
                var buttonContainerId = 'button-container-' + subCode + '-' + type;

                // console.log(Examiner3containerId);
                // console.log(Examiner3Btn);

                document.getElementById(fileContainerId).style.display = 'none';
                document.getElementById(buttonContainerId).style.display = 'none';

                //show uploaded view of the file
                console.log(submitViewId);
                console.log(uploadedViewId);

                document.getElementById(submitViewId).classList.add("remove");
                document.getElementById(uploadedViewId).classList.remove("remove");

                //show marks type
                document.querySelector('.marks-type').style.display = 'flex';


            })
            .catch(error => {
                console.error('Error uploading file:', error);
                alert('Error uploading file. Please try again.');
            });
    }

    function removeSubmitButton(buttonID) {
        var button = document.getElementById(buttonID);
        if (button) {
            button.remove();
        }
    }

    //handle delete file
    function deleteFile(container, fileInput, type, subCode) {

        var fileContainerId = 'file-info-container-' + subCode + '-' + type;
        var buttonContainerId = 'button-container-' + subCode + '-' + type;
        var fileSubmitViewID = subCode + '_S_' + type;

        //show filde submission view
        container.querySelector('.file-submission-view').style.display = 'flex';

        //hide file container and button container
        document.getElementById(fileContainerId).style.display = 'none';
        document.getElementById(buttonContainerId).style.display = 'none';

        // Display the file icon image and associated text
        container.querySelector('.file-input-icon').style.display = 'flex';

        //Display type label
        container.querySelector('.marks-type').style.display = 'block';

        // Display the text
        container.querySelector('.text1').style.display = 'block';

        // Clear the selected file
        fileInput.value = '';
    }


    function downloadFile(subjectCode) {
        // Modify the file URL dynamically based on the subjectCode
        var fileUrl = '<?= ROOT ?>assets/csv/output/MarkSheet_' + subjectCode + '.csv';

        // Create an anchor element
        var a = document.createElement('a');
        a.href = fileUrl;

        // Set the download attribute with the desired file name
        a.download = 'MarkSheet_' + subjectCode + '.csv';

        // Append the anchor element to the document
        document.body.appendChild(a);

        // Trigger a click event on the anchor element
        a.click();

        // Remove the anchor element from the document
        document.body.removeChild(a);
    }
</script>
<script>
    // Extract values from the parsed HTML

    // var examiner3 = true;

    // console.log('examiner 3 = ', examiner3);
    // console.log('examiner3SubCode = ', examiner3SubCode);
    // elements.forEach(function (element) {
    //     element.dataset.active = examiner3;
    // });
</script>

</html>