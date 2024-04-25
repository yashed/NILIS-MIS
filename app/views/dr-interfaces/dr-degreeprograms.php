<?php
$role = "DR";
$data['role'] = $role;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>css/dr/dr-styles.css">
    <title>DR Dashboard</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

    .dr-degreeprograms-main.active {
        filter: blur(5px);
        pointer-events: none;
        user-select: none;
        overflow: hidden;
    }
    h3 {
        margin: 30px 30px;
        color: #000000;
    }

    form input {
        width: 100%;
        padding: 10px 5px;
        margin: 5px 0;
        border: 0;
        border-bottom: 1px solid #999;
        outline: none;
        background: transparent;
    }

    ::placeholder {
        color: #aca7a7;
    }

    form button {
        width: 110px;
        height: 35px;
        margin: 0 25px;
        background: var(--sidebar-color);
        border-radius: 30px;
        border: 0px;
        outline: none;
        color: var(--text-color);
        cursor: pointer;
    }
    .dr-degreeprograms-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
    backdrop-filter: blur(5px); /* Add blur effect */
    z-index: 998; /* Layer it above other content */
    display: none; /* Initially hidden */
}
</style>

<body>
    <div class="dr-degreeprograms-main" id="dr-degreeprograms-body">
        <div class="dr-degreeprograms-overlay" id="dr-degreeprograms-overlay"></div>
        <?php $this->view('components/navside-bar/header', $data) ?>
        <?php $this->view('components/navside-bar/sidebar', $data) ?>
        <?php $this->view('components/navside-bar/footer', $data) ?>
        <div class="dr-degreeprograms-home">
            <div class="dr-degreeprograms-title">Degree Program</div>
            <div class="dr-degreeprograms-subsection-1">

                <div class="dr-degreeprograms-button-btn">
                    <button onclick="myFunction()" type="button" class="dr-degreeprograms-bt-name" style="float: right; margin-right: 40px;">Create Degree Program</button>
                </div>
                <div class="dr-degreeprograms-sub-title">Ongoing Degree Programs</div>
                <div class="dr-degreeprograms-degree-bar">
                    <?php if (!empty($degrees)): ?>
                            <?php $ongoing_degrees_exist = false; ?>
                            <?php foreach ($degrees as $degree): ?>
                                    <?php if ($degree->Status == "ongoing"): ?>
                                            <?php $ongoing_degrees_exist = true; ?>
                                            <div class="dr-degreeprograms-card1">
                                                <a href="<?= ROOT ?>dr/degreeprofile?id=<?= $degree->DegreeID ?>" style="text-decoration: none;">
                                                    <?php $this->view('components/degree-card/degree-card', ["degree" => $degree]) ?>
                                                </a>
                                            </div>
                                    <?php endif; ?>
                            <?php endforeach; ?>
                            <?php if (!$ongoing_degrees_exist): ?>
                                    <p>No data found under the ongoing diploma program.</p>
                            <?php endif; ?>
                    <?php else: ?>
                            <p>No data found for the diploma program.</p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="dr-degreeprograms-subsection-1">
                <div class="dr-degreeprograms-sub-title">Completed Degree Programs</div>
                <div class="dr-degreeprograms-degree-bar">
                    <?php if (!empty($degrees)): ?>
                            <?php $completed_degrees_exist = false; ?>
                            <?php foreach ($degrees as $degree): ?>
                                    <?php if ($degree->Status == "completed"): ?>
                                            <?php $completed_degrees_exist = true; ?>
                                            <div class="dr-degreeprograms-card1">
                                                <a href="<?= ROOT ?>dr/degreeprofile?id=<?= $degree->DegreeID ?>" style="text-decoration: none;">
                                                    <?php $this->view('components/degree-card/degree-card', ["degree" => $degree]) ?>
                                                </a>
                                            </div>
                                    <?php endif; ?>
                            <?php endforeach; ?>
                            <?php if (!$completed_degrees_exist): ?>
                                    <p>No data found under the completed diploma program.</p>
                            <?php endif; ?>
                    <?php else: ?>
                            <p>No data found for the diploma program.</p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="dr-footer">
                <?php $this->view('components/footer/index', $data) ?>
            </div>

            <div class="dr-degreeprograms-model-box" id="dr-degreeprograms-create-popup">

                <div class="dr-degreeprograms-container">
                    <h3>Create New Degree Program</h3>
                    <form method="post" action="<?= ROOT ?>dr/degreeprograms/add">
                        <div id="dr-degreeprograms-Form1">
                            <br>
                            <div class="dr-degreeprograms-input-fields" style="margin: 20px 0px 10px 0px;">
                                <div class="dr-degreeprograms-step-row">
                                    <div id="dr-degreeprograms-progress1"></div>
                                </div>
                                <label for="degree type" class="dr-degreeprograms-drop-down">Degree Type:</label><br>
                                <select name="degree type" id="dr-degreeprograms-degree_type" style="width: 400px; height: 30px; border-radius: 5px; margin-top: 9px;" onchange="handleDegreeTypeChange()">
                                    <option value="" default hidden>Select</option>
                                    <option value="1 Year" <?= (set_value('degree_type') === '1 Year') ? 'selected' : '' ?>>1 Year Degree</option>
                                    <option value="2 Year" <?= (set_value('degree_type') === '2 Year') ? 'selected' : '' ?>>2 Year Degree</option>
                                </select><br><br><br>
                                <label for="select degree type" class="dr-degreeprograms-drop-down">Select Degree Program:</label><br>
                                <select name="select degree type" id="dr-degreeprograms-select_degree_type" style="width: 400px; height: 30px; border-radius: 5px; margin-top: 9px;">
                                    <option value="" default hidden>Select</option>
                                    <option value="DLIM" <?= (set_value('select_degree_type') === 'DLIM') ? 'selected' : '' ?>>DLIM</option>
                                    <option value="DPL" <?= (set_value('select_degree_type') === 'DPL') ? 'selected' : '' ?>>DPL</option>
                                    <option value="DSL" <?= (set_value('select_degree_type') === 'DSL') ? 'selected' : '' ?>>DSL</option>
                                    <option value="HDLIM" <?= (set_value('select_degree_type') === 'HDLIM') ? 'selected' : '' ?>>HDLIM</option>
                                </select><br><br><br>
                            </div>

                            <div class="dr-degreeprograms-btn-box">
                                <div class="dr-degreeprograms-button-btn">
                                    <button onclick="myFunction2()" type="button" class="dr-degreeprograms-bt-name-white" id="dr-degreeprograms-Cancel1">Cancel</button>
                                    <button type="button" class="dr-degreeprograms-bt-name" style="text-decoration: none; margin-right: -53px;" id="dr-degreeprograms-Next1">Continue</button>
                                </div>
                            </div>
                        </div>

                        <div id="dr-degreeprograms-Form2">
                            <p id="dr-degreeprograms-form2_p">Define Subjects and Credits</p>
                            <div class="dr-degreeprograms-step-row">
                                <div id="dr-degreeprograms-progress2"></div>
                            </div>
                            <div class="dr-degreeprograms-box_3">
                                <div class="dr-degreeprograms-box_3_2" id="dr-degreeprograms-semester_subjects_credits">
                                    <div id="dr-degreeprograms-semester_container"></div>
                                </div>
                            </div>
                            <div class="dr-degreeprograms-btn-box">
                                <div class="dr-degreeprograms-button-btn1">
                                    <button type="button" class="dr-degreeprograms-bt-name-white" id="dr-degreeprograms-Back1" style="left: 0px;">Back</button>
                                    <button type="button" class="dr-degreeprograms-bt-name" style="text-decoration: none; margin-right: 80px;" id="dr-degreeprograms-Next2">Continue</button>
                                </div>
                            </div>
                        </div>
                        <div id="dr-degreeprograms-Form3">
                            <p id="dr-degreeprograms-form2_p">Define Scheme of Assignment</p>
                            <div class="dr-degreeprograms-step-row">
                                <div id="dr-degreeprograms-progress3"></div>
                            </div>
                            <div class="dr-degreeprograms-box_3">
                                <div class="dr-degreeprograms-box_3_2">
                                    <div class="dr-degreeprograms-Grade_table" id="dr-degreeprograms-Grade_table"></div>
                                </div>
                            </div>
                            <div class="dr-degreeprograms-btn-box1">
                                <div class="dr-degreeprograms-button-btn">
                                    <button type="button" class="dr-degreeprograms-bt-name-white" id="dr-degreeprograms-Back2">Back</button>
                                    <button type="submit" class="dr-degreeprograms-bt-name" style="text-decoration: none; margin-right: -53px;" id="dr-degreeprograms-Next3">Create</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</body>
<script>
    var numSemesters;
    //for form move within forms
    function myFunction() {
        const lb = document.querySelector(".dr-degreeprograms-model-box");
        lb.style.display = "block";
        document.getElementById('dr-degreeprograms-overlay').style.display = 'block';
        document.body.classList.add('no-scroll');
    }

    function myFunction2() {
        const lb = document.querySelector(".dr-degreeprograms-model-box");
        lb.style.display = "none";
        document.getElementById('dr-degreeprograms-overlay').style.display = 'none';
        document.body.classList.remove('no-scroll');
    }
    var Form1 = document.getElementById("dr-degreeprograms-Form1");
    var Form2 = document.getElementById("dr-degreeprograms-Form2");
    var Form3 = document.getElementById("dr-degreeprograms-Form3");

    var Next1 = document.getElementById("dr-degreeprograms-Next1");
    var Next2 = document.getElementById("dr-degreeprograms-Next2");
    var Next3 = document.getElementById("dr-degreeprograms-Next3");
    var Back1 = document.getElementById("dr-degreeprograms-Back1");
    var Back2 = document.getElementById("dr-degreeprograms-Back2");

    var progress1 = document.getElementById("dr-degreeprograms-progress1");
    var progress2 = document.getElementById("dr-degreeprograms-progress2");
    var progress3 = document.getElementById("dr-degreeprograms-progress3");

    // Validate Form1 before proceeding
    Next1.onclick = function() {
        if (validateForm1()) {
            Form1.style.display = "none";
            Form2.style.display = "block";
            progress2.style.width = "15px";
            setTimeout(function() {
                progress2.style.width = "150px";
            }, 10);
            myFunction();
        } else {
            alert(" Please fill out all the fields.");
        }
    }
    Back1.onclick = function() {
        Form1.style.display = "block";
        Form2.style.display = "none";
        progress1.style.width = "150px";
        setTimeout(function() {
            progress1.style.width = "15px";
        }, 10);
    }
    // Validate Form2 before proceeding
    Next2.onclick = function() {
        if (validateForm2(numSemesters)) {
            Form2.style.display = "none";
            Form3.style.display = "block";
            progress3.style.width = "150px";
            setTimeout(function() {
                progress3.style.width = "300px";
            }, 10);
            myFunction();
            generateGrades();
        }
    }
    Back2.onclick = function() {
        Form2.style.display = "block";
        Form3.style.display = "none";
        progress2.style.width = "300px";
        setTimeout(function() {
            progress2.style.width = "150px";
        }, 10);
    }
    Next3.onclick = function(event) {
        event.preventDefault();
        if (validateForm3(event)) {
            var subjectsData = [];
            for (var i = 1; i <= numSemesters; i++) {
                var semesterTable = document.getElementById(`dr-degreeprograms-Subject_table${i}`);
                var subjectRows = semesterTable.querySelectorAll('tr');
                for (var j = 1; j < subjectRows.length; j++) {
                    var subjectName = document.getElementById(`dr-degreeprograms-SubjectName${i}_${j}`).value.trim();
                    var subjectCode = document.getElementById(`dr-degreeprograms-SubjectCode${i}_${j}`).value.trim();
                    var credits = document.getElementById(`dr-degreeprograms-NoCredits${i}_${j}`).value.trim();
                    var semesterNumber = i;
                    // Push data to subjectsData array
                    subjectsData.push({
                        subjectName: subjectName,
                        subjectCode: subjectCode,
                        credits: credits,
                        semester: semesterNumber
                    });
                }
            }
            // Convert subjectsData to a JSON string and add it to a hidden input field in the form
            var subjectsDataInput = document.createElement('input');
            subjectsDataInput.setAttribute('type', 'hidden');
            subjectsDataInput.setAttribute('name', 'subjectsData');
            subjectsDataInput.setAttribute('value', JSON.stringify(subjectsData));
            document.querySelector('form').appendChild(subjectsDataInput);

            var gradesData = [];
            var gradeTable = document.getElementById(`dr-degreeprograms-Grade_table`);
            var keys = Object.keys(grades);
            for (var k = 1; k <= 2; k++) { // loop through all rows except the header
                var maxmark = document.querySelector(`#dr-degreeprograms-maxvalue${k}`).value.trim();
                var minmark = document.querySelector(`#dr-degreeprograms-minvalue${k}`).value.trim();
                var gpa = document.querySelector(`#dr-degreeprograms-gpa${k}`).value.trim();
                // Push data to gradesData array
                gradesData.push({
                    grade: keys[k - 1],
                    maxMarks: maxmark,
                    minMarks: minmark,
                    gpv: grades[keys[k - 1]]
                });
                // Add hidden input fields for maxmark, minmark, and gpa
                var gradesDataInput = document.createElement('input');
                gradesDataInput.setAttribute('type', 'hidden');
                gradesDataInput.setAttribute('name', `gradesData`);
                gradesDataInput.setAttribute('value', JSON.stringify(gradesData));
                document.querySelector('form').appendChild(gradesDataInput);
            }

            progress3.style.width = "450px";
            document.querySelector("form").submit();
        }
    }
    // Function to validate Form1, Form2, Form3 fields
    function validateForm1() {
        var degreeType = document.getElementById("dr-degreeprograms-degree_type").value;
        var selectDegreeType = document.getElementById("dr-degreeprograms-select_degree_type").value;
        if (degreeType === "" || selectDegreeType === "") {
            return false;
        }
        return true;
    }

    function validateForm2(numSemesters) {
        for (var j = 1; j <= numSemesters; j++) { // semesters
            var subjectTable = document.getElementById(`dr-degreeprograms-Subject_table${j}`);
            var subjectRows = subjectTable.querySelectorAll('tr');
            for (var k = 1; k < subjectRows.length; k++) { // loop through all rows except the header
                var subject = subjectRows[k].querySelector(`#dr-degreeprograms-SubjectName${j}_${k}`).value.trim();
                var subCodes = subjectRows[k].querySelector(`#dr-degreeprograms-SubjectCode${j}_${k}`).value.trim();
                var credits = subjectRows[k].querySelector(`#dr-degreeprograms-NoCredits${j}_${k}`).value.trim();

                // Check if subject and credits are filled for each subject
                if (subject === "" || credits === "" || subCodes === "") {
                    alert("Please fill out all fields, Semester " + j + " Subject " + k);
                    return false;
                }
                if (!/^[a-zA-Z\s0-9-&]+$/.test(subject.trim())) {
                    alert("Subject Name can only have letters, numbers, dashes, and spaces.\n" +
                        "Example: Diploma in Public Librarianship-2\n" +
                        "Check Semester " + j + " Subject " + k);
                    return false;
                }
                if (!/^[a-zA-Z0-9]+$/.test(subCodes)) {
                    alert("Subject Code can only have letters and numbers.\n" + "Check Semester " + j + " Subject " + k);
                    return false;
                }
                if (!/^[0-9]+$/.test(credits)) {
                    alert("Credits can only have numbers.\nCheck Semester " + j + " Subject " + k);
                    return false;
                }
            }
        }
        return true;
    }

    function validateForm3(event) {
        var gradeTable = document.getElementById(`dr-degreeprograms-Grade_table`);
        for (var k = 1; k <= 2; k++) { // loop through all rows except the header
            var maxmark = document.querySelector(`#dr-degreeprograms-maxvalue${k}`).value.trim();
            var minmark = document.querySelector(`#dr-degreeprograms-minvalue${k}`).value.trim();
            var gpa = document.querySelector(`#dr-degreeprograms-gpa${k}`).value.trim();
            // Check if subject and credits are filled for each subject
            if (maxmark === "" || minmark === "" || gpa === "") {
                alert("Please fill out all fields in " + getGradeKey(k));
                event.preventDefault();
                return false;
            }
            if (!/^\d+(\.\d+)?$/.test(maxmark)) {
                alert("Max Mark for row " + k + " must be a numeric value.");
                event.preventDefault();
                return false;
            }
            if (!/^\d+(\.\d+)?$/.test(minmark)) {
                alert("Min Mark for row " + k + " must be a numeric value.");
                event.preventDefault();
                return false;
            }
            if (!/^\d+(\.\d+)?$/.test(gpa)) {
                alert("GPA for row " + k + " must be a numeric value.");
                event.preventDefault();
                return false;
            }
        }
        return true;
    }
    // Function to handle degree type change
    function handleDegreeTypeChange() {
        var degreeType = document.getElementById("dr-degreeprograms-degree_type").value;
        var semesterContainer = document.getElementById("dr-degreeprograms-semester_container");
        // You can customize this logic based on your degree types
        if (degreeType === "1 Year") {
            numSemesters = 2;
            showSemesters(2);
        } else if (degreeType === "2 Year") {
            numSemesters = 4;
            showSemesters(4);
        }
         // Get the second select element
        var selectDegreeType = document.getElementById('dr-degreeprograms-select_degree_type');
        // Remove all options from the second select element
        selectDegreeType.innerHTML = '<option value="" default hidden>Select</option>';
        // Add the "Select" option back
        var option = document.createElement('option');
        option.value = '';
        option.text = 'Select';
        option.hidden = true;
        option.defaultSelected = true;
        selectDegreeType.add(option);
        // Add options based on the selected degree type
        if (degreeType === '1 Year') {
            var options = [
                { value: 'DLIM', text: 'DLIM' },
                { value: 'DPL', text: 'DPL' },
                { value: 'DSL', text: 'DSL' }
            ];
        } else if (degreeType === '2 Year') {
            var options = [
                { value: 'HDLIM', text: 'HDLIM' }
            ];
        }
        // Add the options to the second select element
        options.forEach(function(optionData) {
            var option = document.createElement('option');
            option.value = optionData.value;
            option.text = optionData.text;
            selectDegreeType.add(option);
        });
    }

    function showSemesters(numSemesters) {
        var semesterContainer = document.getElementById("dr-degreeprograms-semester_container");
        semesterContainer.innerHTML = ""; // Clear previous content
        for (var i = 1; i <= numSemesters; i++) {
            var semesterDiv = document.createElement("div");
            var tableId = `dr-degreeprograms-Subject_table${i}`;
            semesterDiv.innerHTML += `
            <table class="dr-degreeprograms-Subject_table" id="${tableId}">
                <p id="dr-degreeprograms-Semester" name="semester" class="dr-degreeprograms-semester${i}">Semester ${i}</p>
                <tr>
                    <th>Subject Name</th>
                    <th>Subject Code</th>
                    <th>Credits</th>
                </tr>
                <tr>
                    <td><input style="width: 215px; margin-right: 14px;" value="" type="text" name="SubjectName" class="dr-degreeprograms-SubjectName" placeholder="Subject 1" id="dr-degreeprograms-SubjectName${i}_1" style="border: 1px solid #ccc;"></td>
                    <td><input style="width: 130px; margin-right: 14px;" value="" type="text" name="SubjectCode" class="dr-degreeprograms-SubjectCode" placeholder="SubjectCode" id="dr-degreeprograms-SubjectCode${i}_1" style="border: 1px solid #ccc;"></td>
                    <td><input style="width: 60px;" value="" type="number" name="NoCredits" class="dr-degreeprograms-NoCredits" placeholder="2" id="dr-degreeprograms-NoCredits${i}_1" style="border: 1px solid #ccc;"></td>
                </tr>
            </table>
            <div>
                <button type="button" class="dr-degreeprograms-addSubject" style="left: 0px;" id="dr-degreeprograms-addSubject${i}">Add Subject</button>
            </div>
        `;
            semesterContainer.appendChild(semesterDiv); // Add event listener for dynamically adding subjects
            addSubjectButtonListener(i);
        }
    }
    // Function to add event listener for dynamically adding subjects
    function addSubjectButtonListener(semesterNumber) {
        document.querySelector(`#dr-degreeprograms-addSubject${semesterNumber}`).addEventListener("click", () => {
            let subjectCount = document.querySelectorAll(`#dr-degreeprograms-Subject_table${semesterNumber} tr`).length;
            let template = `
            <tr>
                <td><input style="width: 215px; margin-right: 14px;" value="" type="text" name="SubjectName" class="dr-degreeprograms-SubjectName" placeholder="Subject ${subjectCount}" id="dr-degreeprograms-SubjectName${semesterNumber}_${subjectCount}" style="border: 1px solid #ccc;"></td>
                <td><input style="width: 130px; margin-right: 14px;" value="" type="text" name="SubjectCode" class="dr-degreeprograms-SubjectCode" placeholder="SubjectCode" id="dr-degreeprograms-SubjectCode${semesterNumber}_${subjectCount}" style="border: 1px solid #ccc;"></td>
                <td><input style="width: 60px;" value="" type="number" name="NoCredits" class="dr-degreeprograms-NoCredits" placeholder="2" id="dr-degreeprograms-NoCredits${semesterNumber}_${subjectCount}" style="border: 1px solid #ccc;"></td>
            </tr>
        `;
            document.querySelector(`#dr-degreeprograms-Subject_table${semesterNumber}`).insertAdjacentHTML('beforeend', template);
        });
    }
    var grades = {
        "A+": "4.00",
        "A": "4.00",
        "A-": "3.70",
        "B+": "3.30",
        "B": "3.00",
        "B-": "2.70",
        "C+": "2.30",
        "C": "2.00",
        "C-": "1.70",
        "D+": "1.30",
        "D": "1.00",
        "E": "0.00"
    };

    function generateGrades() {
        var gradecontainer = document.getElementById("dr-degreeprograms-Grade_table");

        gradecontainer.innerHTML = "";

        var headerRow = document.createElement("tr");
        headerRow.innerHTML = `
        <th style="width: 100px; margin: 20px 0px 10px 0px;">Grade</th>
        <th style="width: 100px; margin: 20px 0px 10px 0px;">Max Mark</th>
        <th style="width: 100px; margin: 20px 0px 10px 0px;">Min Mark</th>
        <th style="width: 100px; margin: 20px 0px 10px 0px;">GPV</th>
    `;
        gradecontainer.appendChild(headerRow);

        for (var i = 1; i <= 12; i++) {
            var gradeRow = document.createElement("tr");
            var currentGrade = grades[getGradeKey(i)];
            gradeRow.innerHTML = `
            <td><center><input style="width: 60px;" type="text" name="grade" class="dr-degreeprograms-grade" value="${getGradeKey(i)}" id="dr-degreeprograms-grade${i}" readonly></center></td>
            <td><center><input style="width: 50px;" type="text" name="maxvalue" class="dr-degreeprograms-maxvalue" placeholder="100" id="dr-degreeprograms-maxvalue${i}"></center></td>
            <td><center><input style="width: 50px;" type="text" name="minvalue" class="dr-degreeprograms-minvalue" placeholder="90" id="dr-degreeprograms-minvalue${i}"></center></td>
            <td><center><input style="width: 60px;" type="text" name="gpa" class="dr-degreeprograms-gpa" placeholder="${currentGrade}" id="dr-degreeprograms-gpa${i}"></center></td>
        `;
            gradecontainer.appendChild(gradeRow);
        }
    }
    // Function to get the grade key dynamically
    function getGradeKey(index) {
        var keys = Object.keys(grades);
        return keys[index - 1];
    }
    // });
</script>

</html>