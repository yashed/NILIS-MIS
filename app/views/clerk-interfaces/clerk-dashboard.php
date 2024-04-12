<?php
$role = "Clerk";
$data['role'] = $role;
?>

<?php $this->view('components/navside-bar/header', $data) ?>
<?php $this->view('components/navside-bar/sidebar', $data) ?>
<?php $this->view('components/navside-bar/footer', $data) ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>css/create-degree.css">
    <title>DR Dashboard</title>
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

    .dr-home {
        height: 100vh;
        left: 250px;
        position: relative;
        width: calc(100% - 250px);
        transition: var(--tran-05);
        background: var(--body-color);
    }

    .dr-title {
        font-size: 30px;
        font-weight: 600;
        color: black;
        padding: 10px 0px 10px 32px;
        background-color: var(--text-color);
        border-radius: 6px;
        margin: 7px 4px 7px 4px;
    }

    .sidebar.close~.dr-home {
        left: 88px;
        width: calc(100% - 88px);
    }

    .dr-subsection-1 {
        background-color: var(--text-color);
        padding: 10px 10px 30px 35px;
        border-radius: 6px;
        margin: 7px 4px 7px 4px;
    }

    .dr-sub-title {
        color: #17376E;
        font-family: Poppins;
        font-size: 22px;
        font-style: normal;
        font-weight: 600;
        margin: 40px;
    }

    .dr-degree-bar {
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        flex-wrap: wrap;
        margin-bottom: 20px;
    }

    .dr-card1 {
        margin-bottom: 4px;
    }

    .dr-exam-bar {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        flex-wrap: nowrap;
        gap: 30px;
    }

    .dr-exam-card1 {
        margin-bottom: 5px;
    }

    .model-box {
        display: none;
        position: fixed;
        top: 1%;
        left: 35%;
        /* box-shadow: 17px 27px 400px rgba(0, 0, 0, 1.15);   */
        /* opacity: 0; */
        /* z-index: 100;  */
    }

    .model-box.active {
        opacity: 1;
        transition: top 0ms ease-in-out 200ms, opacity 200ms ease-in-out 0ms, transform 200ms ease-in-out 0ms;
    }

    .danger {
        border-color: red;
        border-width: 5px;
        border-style: groove;
        border-radius: 5px;
    }

    .user-error {
        color: red;
        font-size: 10px;
        font-weight: 400;
        margin-left: 5px;
    }

    .bt-name {
        color: #fff;
        padding: 8px 22px;
        border-radius: 6px;
        background: #17376E;
        box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.20);
        border: 0px;
        font-size: 14px;
        font-weight: 600;
    }

    .bt-name:hover {
        background: #fff;
        color: #17376E;
    }

    .bt-name-white {
        background: #fff;
        padding: 8px 22px;
        /* margin-left: -100px; */
        border-radius: 6px;
        color: #17376E;
        box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.20);
        border: 0px;
        font-size: 14px;
        font-weight: 600;
    }

    .bt-name-white:hover {
        color: #fff;
        background: #17376E;
    }

    .main.active {
        filter: blur(5px);
        pointer-events: none;
        user-select: none;
        overflow: hidden;

    }

    .addSubject {
        width: 80%;
        height: 35px;
        background: transparent;
        outline: none;
        border-radius: 5px;
        border: 1px solid gainsboro;
        color: gray;
        align-items: center;
        cursor: pointer;
        margin-bottom: 15px;
    }

    .addSubject:hover {
        border: 3px solid gainsboro;
        font-weight: 600;
    }

    .button-btn1 {
        margin-top: 50px;
    }

    .admin-subsection-2 {
        display: flex;
        flex-direction: row;
        justify-content: space-between;

        /* padding: 10px 10px 30px 35px; */
        /* border-radius: 6px; */
        /* margin: 7px 4px 7px 4px; */
    }

    .admin-subsection-21 {
        display: flex;
        flex-direction: column;
        background-color: var(--text-color);
        padding: 10px 10px 30px 35px;
        border-radius: 6px;
        margin: 3px 4px 7px 4px;
        width: 50%;
    }

    .admin-subsection-22 {
        background-color: var(--text-color);
        padding: 10px 10px 31px 35px;
        border-radius: 6px;
        margin: 3px 4px 7px 4px;
        width: 50%;
    }

    .admin-calender {
        display: flex;
        align-items: center;
        justify-content: center;

    }

    .admin-degree-bar {
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        flex-wrap: wrap;
        margin-bottom: 20px;
    }

    .admin-card1 {
        display: flex;
        flex-direction: column;
    }

    .admin-card2 {
        display: flex;
        flex-direction: column;
    }

    .admin-exam-bar {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        flex-wrap: nowrap;
        gap: 30px;
    }

    .admin-exam-card1 {
        width: 80%;
        display: flex;
        flex-direction: column;
    }

    .admin-exam-card2 {
        width: 80%;
        display: flex;
        flex-direction: column;
    }
</style>

<body>
    <div class="main" id="body">
       
        <div class="dr-home">
            <div class="dr-title">Clerk Dashboard</div>
            <div class="dr-subsection-1">

              
                <div class="dr-sub-title">Ongoing Degree Programs</div>
                <div class="dr-degree-bar">
                    <?php if ($degrees) : ?>
                        <?php $count = 0; ?>
                        <?php foreach ($degrees as $degree) : ?>
                            <div class="dr-card1">
                                <a href="<?= ROOT ?>dr/degreeprofile" style="text-decoration: none;">
                                    <?php $this->view('components/degree-card/degree-card', ["degree" => $degree]) ?>
                                </a>
                            </div>
                            <?php $count++; ?>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <p>No data found for the diploma program.</p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="admin-subsection-2">
            <div class="admin-subsection-21">
                <div class="admin-sub-title">
                    Recently Published Examination Results
                </div>
                <div class="admin-exam-bar">
                    <div class="admin-exam-card1">

                        <?php $this->view('components/exam-card/exam-card', $data) ?>

                    </div>
                    <div class="admin-exam-card2">

                        <?php $this->view('components/exam-card/exam-card', $data) ?>

                    </div>
                </div>


            </div>
            <div class="admin-subsection-22">
                <div class="admin-sub-title">
                    Academic Calender
                </div>
                <div class="admin-calender">
                    <?php $this->view('components/calender/calender', $data) ?>

                </div>
            </div>
        </div>
            <div class="dr-footer">
                <?php $this->view('components/footer/index', $data) ?>
            </div>

        </div>
</body>
<script>
    var numSemesters;
    //for form move within forms
    function myFunction() {
        const lb = document.querySelector(".model-box");
        lb.style.display = "block";
    }

    function myFunction2() {
        const lb = document.querySelector(".model-box");
        lb.style.display = "none";
    }
    var Form1 = document.getElementById("Form1");
    var Form2 = document.getElementById("Form2");
    var Form3 = document.getElementById("Form3");

    var Next1 = document.getElementById("Next1");
    var Next2 = document.getElementById("Next2");
    var Next3 = document.getElementById("Next3");
    var Back1 = document.getElementById("Back1");
    var Back2 = document.getElementById("Back2");

    var progress1 = document.getElementById("progress1");
    var progress2 = document.getElementById("progress2");
    var progress3 = document.getElementById("progress3");

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
                var semesterTable = document.getElementById(`Subject_table${i}`);
                var subjectRows = semesterTable.querySelectorAll('tr');
                for (var j = 1; j < subjectRows.length; j++) {
                    var subjectName = document.getElementById(`SubjectName${i}_${j}`).value.trim();
                    var subjectCode = document.getElementById(`SubjectCode${i}_${j}`).value.trim();
                    var credits = document.getElementById(`NoCredits${i}_${j}`).value.trim();
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
            var gradeTable = document.getElementById(`Grade_table`);
            var keys = Object.keys(grades);
            for (var k = 1; k <= 2; k++) { // loop through all rows except the header
                var maxmark = document.querySelector(`#maxvalue${k}`).value.trim();
                var minmark = document.querySelector(`#minvalue${k}`).value.trim();
                var gpa = document.querySelector(`#gpa${k}`).value.trim();
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
        var degreeType = document.getElementById("degree_type").value;
        var selectDegreeType = document.getElementById("select_degree_type").value;
        if (degreeType === "" || selectDegreeType === "") {
            return false;
        }
        return true;
    }

    function validateForm2(numSemesters) {
        for (var j = 1; j <= numSemesters; j++) { // semesters
            var subjectTable = document.getElementById(`Subject_table${j}`);
            var subjectRows = subjectTable.querySelectorAll('tr');
            for (var k = 1; k < subjectRows.length; k++) { // loop through all rows except the header
                var subject = subjectRows[k].querySelector(`#SubjectName${j}_${k}`).value.trim();
                var subCodes = subjectRows[k].querySelector(`#SubjectCode${j}_${k}`).value.trim();
                var credits = subjectRows[k].querySelector(`#NoCredits${j}_${k}`).value.trim();

                // Check if subject and credits are filled for each subject
                if (subject === "" || credits === "" || subCodes === "") {
                    alert("Please fill out all fields, Semester " + j + " Subject " + k);
                    return false;
                }
                if (!/^[a-zA-Z\s]+$/.test(subject.trim())) {
                    alert("SubjectName can only have letters and spaces. Semester " + j + " Subject " + k);
                    return false;
                }
                if (!/^[a-zA-Z0-9]+$/.test(subCodes)) {
                    alert("SubjectCode can only have letters and numbers. Semester " + j + " Subject " + k);
                    return false;
                }
                if (!/^[0-9]+$/.test(credits)) {
                    alert("NoCredits can only have numbers. Semester " + j + " Subject " + k);
                    return false;
                }
            }
        }
        return true;
    }

    function validateForm3(event) {
        var gradeTable = document.getElementById(`Grade_table`);
        for (var k = 1; k <= 2; k++) { // loop through all rows except the header
            var maxmark = document.querySelector(`#maxvalue${k}`).value.trim();
            var minmark = document.querySelector(`#minvalue${k}`).value.trim();
            var gpa = document.querySelector(`#gpa${k}`).value.trim();
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
        var degreeType = document.getElementById("degree_type").value;
        var semesterContainer = document.getElementById("semester_container");
        // You can customize this logic based on your degree types
        if (degreeType === "1 Year") {
            numSemesters = 2;
            showSemesters(2);
        } else if (degreeType === "2 Year") {
            numSemesters = 4;
            showSemesters(4);
        }
    }

    function showSemesters(numSemesters) {
        var semesterContainer = document.getElementById("semester_container");
        semesterContainer.innerHTML = ""; // Clear previous content
        for (var i = 1; i <= numSemesters; i++) {
            var semesterDiv = document.createElement("div");
            var tableId = `Subject_table${i}`;
            semesterDiv.innerHTML += `
            <table class="Subject_table" id="${tableId}">
                <p id="Semester" name="semester" class="semester${i}">Semester ${i}</p>
                <tr>
                    <th>Subject Name</th>
                    <th>Subject Code</th>
                    <th>Credits</th>
                </tr>
                <tr>
                    <td><input style="width: 130px; margin-right: 14px;" value="" type="text" name="SubjectName" class="SubjectName" placeholder="Subject 1" id="SubjectName${i}_1" style="border: 1px solid #ccc;"></td>
                    <td><input style="width: 130px; margin-right: 14px;" value="" type="text" name="SubjectCode" class="SubjectCode" placeholder="SubjectCode" id="SubjectCode${i}_1" style="border: 1px solid #ccc;"></td>
                    <td><input style="width: 60px;" value="" type="number" name="NoCredits" class="NoCredits" placeholder="2" id="NoCredits${i}_1" style="border: 1px solid #ccc;"></td>
                </tr>
            </table>
            <div>
                <button type="button" class="addSubject" style="left: 0px;" id="addSubject${i}">Add Subject</button>
            </div>
        `;
            semesterContainer.appendChild(semesterDiv); // Add event listener for dynamically adding subjects
            addSubjectButtonListener(i);
        }
    }
    // Function to add event listener for dynamically adding subjects
    function addSubjectButtonListener(semesterNumber) {
        document.querySelector(`#addSubject${semesterNumber}`).addEventListener("click", () => {
            let subjectCount = document.querySelectorAll(`#Subject_table${semesterNumber} tr`).length;
            let template = `
            <tr>
                <td><input style="width: 130px; margin-right: 14px;" value="" type="text" name="SubjectName" class="SubjectName" placeholder="Subject ${subjectCount}" id="SubjectName${semesterNumber}_${subjectCount}" style="border: 1px solid #ccc;"></td>
                <td><input style="width: 130px; margin-right: 14px;" value="" type="text" name="SubjectCode" class="SubjectCode" placeholder="SubjectCode" id="SubjectCode${semesterNumber}_${subjectCount}" style="border: 1px solid #ccc;"></td>
                <td><input style="width: 60px;" value="" type="number" name="NoCredits" class="NoCredits" placeholder="2" id="NoCredits${semesterNumber}_${subjectCount}" style="border: 1px solid #ccc;"></td>
            </tr>
        `;
            document.querySelector(`#Subject_table${semesterNumber}`).insertAdjacentHTML('beforeend', template);
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
        "D-": "0.70",
        "F": "0.30"
    };

    function generateGrades() {
        var gradecontainer = document.getElementById("Grade_table");

        gradecontainer.innerHTML = "";

        var headerRow = document.createElement("tr");
        headerRow.innerHTML = `
        <th style="width: 100px; margin: 20px 0px 10px 0px;">Grade</th>
        <th style="width: 100px; margin: 20px 0px 10px 0px;">Max Mark</th>
        <th style="width: 100px; margin: 20px 0px 10px 0px;">Min Mark</th>
        <th style="width: 100px; margin: 20px 0px 10px 0px;">GPV</th>
    `;
        gradecontainer.appendChild(headerRow);

        for (var i = 1; i <= 2; i++) {
            var gradeRow = document.createElement("tr");
            var currentGrade = grades[getGradeKey(i)];
            gradeRow.innerHTML = `
            <td><center><input style="width: 60px;" type="text" name="grade" class="grade" value="${getGradeKey(i)}" id="grade${i}" readonly></center></td>
            <td><center><input style="width: 50px;" type="text" name="maxvalue" class="maxvalue" placeholder="100" id="maxvalue${i}"></center></td>
            <td><center><input style="width: 50px;" type="text" name="minvalue" class="minvalue" placeholder="90" id="minvalue${i}"></center></td>
            <td><center><input style="width: 60px;" type="text" name="gpa" class="gpa" placeholder="${currentGrade}" id="gpa${i}"></center></td>
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