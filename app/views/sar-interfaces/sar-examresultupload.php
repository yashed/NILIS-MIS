<?php
$role = "SAR";
$data['role'] = $role;
$validateError = isset($errors['marks']) ? $errors['marks'] : null;

?>

<?php $this->view('components/navside-bar/header', $data) ?>
<?php $this->view('components/navside-bar/sidebar', $data) ?>
<?php $this->view('components/navside-bar/footer', $data) ?>


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

    .dashed-container1 {
        border: 2px dashed #333;
        border-radius: 8px;
        padding: 10px;
        width: 18%;
        height: 270px;
        margin-top: 3%;

        display: flex;
        flex: 25%;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .dashed-container2 {
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

    .dashed-container3 {
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
        ustify-content: space-between;
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
        font-size: 20px;
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
        min-width: 25vh;
        color: #fff;
        height: 5vh;
        padding: 5px 5px 5px 5px;
        border-radius: 12px;
        background: #17376e;
        box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.2);
        border: 0px;
        margin-bottom: 10px;
        /* margin-top: 25px; */
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
        min-width: 50%;
        color: #17376e;
        background: white;
        height: 4vh;
        padding: 5px 5px 5px 5px;
        border-radius: 8px;
        box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.2);
        border: 1px solid;
        margin-bottom: 10px;
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

    .uploaded-file-name {
        text-align: center;

    }

    .file-uploded-icon {
        width: 60px;
        height: 60px;
        background-image: url('<?= ROOT ?>/assets/result-upload/csv-upload.svg');
        background-size: cover;
        background-repeat: no-repeat;
        cursor: pointer;
    }

    .btn-secondary-cancel {
        min-width: 50%;
        color: #ff0000;
        background: white;
        height: 4vh;
        padding: 5px 5px 5px 5px;
        border-radius: 8px;
        box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.2);
        border: 1px solid;
        margin-bottom: 10px;
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

    }

    .csv-input-from {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .dashed-container {

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
        border: 2px dashed #3498db;
        cursor: pointer;
        gap: 30px;
    }

    .dashed-container.drag-over {
        border-color: #e74c3c;
        /* Change border color when dragging over */
        background-color: #f2f2f2;
        /* Change background color when dragging over */
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
</style>

<body>

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
                    <div class="data3">Participation<br>
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

                            <button class="btn-primary" name='download_marksheet'
                                onclick="downloadFile('<?= $subject->SubjectCode ?>')">Download
                                Marksheet</button>
                        </div>
                        <div class="flex-container">
                            <?php
                            $containerId = 'container' . ($subject->SubjectID) . '_1';
                            $fileInputId = 'fileInput' . ($subject->SubjectID) . '_1';
                            $formID = 'form' . ($subject->SubjectID) . '_1';
                            ?>

                            <div class="dashed-container" id="<?= $containerId ?>" ondragover="handleDragOver(event)"
                                ondragenter="handleDragEnter(event)" ondragleave="handleDragLeave(event)"
                                ondrop="handleDrop(event, '<?= $containerId ?>', '<?= $fileInputId ?>' , '<?= $formID ?>' , '<?= $subject->SubjectCode ?>','assestment')">
                                <div class='marks-type'>Assestment Marks </div>
                                <form method="POST" class='csv-input-from' enctype="multipart/form-data"
                                    id="<?= $formID ?>">
                                    <img src='<?= ROOT ?>/assets/file-icon.png' class="file-input-icon"
                                        for="<?= $fileInputId ?>" onclick="triggerFileInput('<?= $fileInputId ?>')">
                                    <br>
                                    <input type='text' value='<?= $formID ?>' name='formID' hidden>
                                    <input type='text' value='assestment' name='type' hidden>
                                    <input type='text' value='<?= $subject->SubjectCode ?>' name='subjectCode' hidden>
                                    <input type="file" id="<?= $fileInputId ?>" name="file" accept=".csv"
                                        onchange="showSubmitButton('<?= $containerId ?>', '<?= $fileInputId ?>' , '<?= $formID ?>' , '<?= $subject->SubjectCode ?>','assestment')">
                                    <p class="text1">Drag and drop or <label for="<?= $fileInputId ?>"
                                            class="browse-label">browse</label></br> assignment results.</p>
                                    <?php if (!empty($errors['marks'])): ?>
                                        <div class="user-error" for="marks">
                                            <?= $errors['marks'] ?>
                                        </div>
                                    <?php endif; ?>
                                </form>
                            </div>
                            </form>
                            <?php
                            $containerId = 'container' . ($subject->SubjectID) . '_2';
                            $fileInputId = 'fileInput' . ($subject->SubjectID) . '_2';
                            $formID = 'form' . ($subject->SubjectID) . '_2';
                            ?>

                            <div class="dashed-container" id="<?= $containerId ?>" ondragover="handleDragOver(event)"
                                ondragenter="handleDragEnter(event)" ondragleave="handleDragLeave(event)"
                                ondrop="handleDrop(event, '<?= $containerId ?>', '<?= $fileInputId ?>' , '<?= $formID ?>' , '<?= $subject->SubjectCode ?>', 'examiner1')">
                                <div class='marks-type'>Examiner 01 Marks </div>
                                <form method="POST" class='csv-input-from' enctype="multipart/form-data"
                                    id="<?= $formID ?>">
                                    <img src='<?= ROOT ?>/assets/file-icon.png' class="file-input-icon"
                                        for="<?= $fileInputId ?>" onclick="triggerFileInput('<?= $fileInputId ?>')">
                                    <br>
                                    <input type='text' value='<?= $formID ?>' name='formID' hidden>
                                    <input type='text' value='examiner1' name='type' hidden>
                                    <input type='text' value='<?= $subject->SubjectCode ?>' name='subjectCode' hidden>
                                    <input type="file" id="<?= $fileInputId ?>" name="file" accept=".csv"
                                        onchange="showSubmitButton('<?= $containerId ?>', '<?= $fileInputId ?>' , '<?= $formID ?>' , '<?= $subject->SubjectCode ?>', 'examiner1')">
                                    <p class="text1">Drag and drop or <label for="<?= $fileInputId ?>"
                                            class="browse-label">browse</label></br> Examiner 01 results.</p>
                                </form>
                            </div>
                            <?php
                            $containerId = 'container' . ($subject->SubjectID) . '_3';
                            $fileInputId = 'fileInput' . ($subject->SubjectID) . '_3';
                            $formID = 'form' . ($subject->SubjectID) . '_3';
                            ?>

                            <div class="dashed-container" id="<?= $containerId ?>" ondragover="handleDragOver(event)"
                                ondragenter="handleDragEnter(event)" ondragleave="handleDragLeave(event)"
                                ondrop="handleDrop(event, '<?= $containerId ?>', '<?= $fileInputId ?>' , '<?= $formID ?>' , '<?= $subject->SubjectCode ?>', 'examiner2')">
                                <div class='marks-type'>Examiner 02 Marks </div>
                                <form method="POST" class='csv-input-from' enctype="multipart/form-data"
                                    id="<?= $formID ?>">
                                    <img src='<?= ROOT ?>/assets/file-icon.png' class="file-input-icon"
                                        for="<?= $fileInputId ?>" onclick="triggerFileInput('<?= $fileInputId ?>')">
                                    <br>
                                    <input type='text' value='<?= $formID ?>' name='formID' hidden>
                                    <input type='text' value='examiner2' name='type' hidden>
                                    <input type='text' value='<?= $subject->SubjectCode ?>' name='subjectCode' hidden>
                                    <input type="file" id="<?= $fileInputId ?>" name="file" accept=".csv"
                                        onchange="showSubmitButton('<?= $containerId ?>', '<?= $fileInputId ?>' , '<?= $formID ?>' , '<?= $subject->SubjectCode ?>', 'examiner2')">
                                    <p class="text1">Drag and drop or <label for="<?= $fileInputId ?>"
                                            class="browse-label">browse</label></br> Examiner 02 results.</p>
                                </form>
                            </div>
                            <?php
                            $containerId = 'container' . ($subject->SubjectID) . '_4';
                            $fileInputId = 'fileInput' . ($subject->SubjectID) . '_4';
                            $formID = 'form' . ($subject->SubjectID) . '_4';
                            ?>

                            <div class="dashed-container" id="<?= $containerId ?>" ondragover="handleDragOver(event)"
                                ondragenter="handleDragEnter(event)" ondragleave="handleDragLeave(event)"
                                ondrop="handleDrop(event, '<?= $containerId ?>', '<?= $fileInputId ?>' , '<?= $formID ?>' , '<?= $subject->SubjectCode ?>','examiner3')">
                                <div class='marks-type'>Examiner 03 Marks </div>
                                <form method="POST" class='csv-input-from' enctype="multipart/form-data"
                                    id="<?= $formID ?>">
                                    <img src='<?= ROOT ?>/assets/file-icon.png' class="file-input-icon"
                                        for="<?= $fileInputId ?>" onclick="triggerFileInput('<?= $fileInputId ?>')">
                                    <br>
                                    <input type='text' value='<?= $formID ?>' name='formID' hidden>
                                    <input type='text' value='examiner3' name='type' hidden>
                                    <input type='text' value='<?= $subject->SubjectCode ?>' name='subjectCode' hidden>
                                    <input type="file" id="<?= $fileInputId ?>" name="file" accept=".csv"
                                        onchange="showSubmitButton('<?= $containerId ?>', '<?= $fileInputId ?>' , '<?= $formID ?>' , '<?= $subject->SubjectCode ?>' , 'examiner3')">
                                    <p class="text1">Drag and drop or <label for="<?= $fileInputId ?>"
                                            class="browse-label">browse</label></br> Examiner 03 results.</p>
                                </form>
                            </div>
                        </div>
                    </div>
                    <br>
                    </form>
                <?php endforeach; ?>

            </div>


        </div>
        <div class="temp2-footer">
            <?php $this->view('components/footer/index', $data) ?>
        </div>



</body>
<script>
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
                showSubmitButton(containerId, fileInputId, formId, subCode, type);
            } else {
                // not a CSV file, you can provide feedback to the user
                alert('Please drop a CSV file.');
            }
        }
    }



    function showSubmitButton(containerId, fileInputId, formId, subCode, type) {
        var container = document.getElementById(containerId);
        var fileInput = document.getElementById(fileInputId);
        var form = document.getElementById(formId);

        if (!container || !fileInput || !form) {
            console.error('Container, fileInput, or form not found.');
            return;
        }

        // Check if a file is selected
        if (fileInput.files.length > 0) {

            // Check if the submit button is already present
            var existingDeleteButton = container.querySelector('.btn-secondary-cancel');
            if (!existingDeleteButton) {
                // Create a delete button dynamically
                var deleteButton = document.createElement('button');
                deleteButton.textContent = 'Delete';
                deleteButton.className = 'btn-secondary-cancel';
                deleteButton.name = 'sub1_exam-res';
                deleteButton.type = 'button';
                deleteButton.addEventListener('click', function () {
                    deleteFile(container, fileInput);
                });
            }
            var existingSubmitButton = container.querySelector('.btn-secondary');
            if (!existingSubmitButton) {
                // Create a submit button dynamically
                var submitButton = document.createElement('button');
                submitButton.textContent = 'Submit';
                submitButton.className = 'btn-secondary';
                submitButton.name = 'sub1_exam-res';
                submitButton.type = 'button';
                submitButton.id = 'button_' + formId;
                submitButton.addEventListener('click', function () {
                    uploadFile(fileInputId, submitButton.id, formId, subCode, type);
                });
            }

            // Wrap the file icon and file name in a container
            var fileInfoContainer = document.createElement('div');
            fileInfoContainer.className = 'file-info-container';

            //create container for buttons
            var buttonContainer = document.createElement('div');
            buttonContainer.className = 'button-container';

            // Hide the file icon label
            container.querySelector('.file-input-icon').style.display = 'none';

            //hide type labe
            container.querySelector('.marks-type').style.display = 'none';

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

            // Append the buttonContainer to the form
            form.appendChild(buttonContainer);

            //add delete and submit button to container
            buttonContainer.appendChild(deleteButton);
            buttonContainer.appendChild(submitButton);
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

    function uploadFile(fileInputId, buttonId, formId, subCode, type) {

        var error = <?= json_encode($validateError) ?>;
        console.log('font end errrors =  ', error);

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

        console.log('Form ID - ' + formId);
        console.log('Sub ID - ' + subCode);
        var targetURL = '<?= ROOT ?>sar/examination/resultsupload';

        fetch(targetURL, {
            method: 'POST',
            body: formData,
        })
            .then(response => {
                if (!response.ok) {
                    console.log('Res = '.response);
                    throw new Error('Network response was not ok');
                }
                return response.text();
            })
            .then(data => {
                console.log(data);
                alert('File uploaded successfully!');
                removeSubmitButton(buttonId);
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
    function deleteFile(container, fileInput) {


        // Remove the delete and submit buttons
        container.querySelector('.btn-secondary-cancel').remove();


        // Remove the file info container
        container.querySelector('.file-info-container').remove();

        //Remove button container
        container.querySelector('.button-container').remove();

        // Display the file icon image and associated text
        container.querySelector('.file-input-icon').style.display = 'flex';

        //Display type label
        container.querySelector('.marks-type').style.display = 'block';


        // var fileIcon = document.createElement('img');
        // fileIcon.src = '<?= ROOT ?>/assets/file-icon.png';
        // fileIcon.className = 'file-input-icon';
        // fileIcon.setAttribute('for', fileInput.id);
        // fileIcon.addEventListener('click', function () {
        //     triggerFileInput(fileInput.id);
        // });
        // container.appendChild(fileIcon);

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

</html>