<?php
$role = "DR";
$data['role'] = $role;
?>
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
</style>

<body>
    <div class="main" id="body">
        <!-- <?php $this->view('components/navside-bar/header', $data) ?>
        <?php $this->view('components/navside-bar/sidebar', $data) ?>
        <?php $this->view('components/navside-bar/footer', $data) ?> -->
        <div class="dr-home">
            <div class="dr-title">Degree Program</div>
            <div class="dr-subsection-1">

                <div class="button-btn">
                    <button onclick="myFunction()" type="button" class="bt-name" style="float: right; margin-right: 40px;">Create Degree Program</button>
                </div>

                <div class="dr-sub-title">Ongoing Degree Programs</div>
                <div class="dr-degree-bar">
                    <?php $count = 0; ?>
                    <?php foreach ($degrees as $degree) : ?>
                        <div class="dr-card1">
                            <a href="<?= ROOT ?>dr/degreeprofile" style="text-decoration: none;">
                                <?php $this->view('components/degree-card/degree-card', ["degree" => $degree]) ?>
                            </a>
                        </div>
                        <?php $count++; ?>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="dr-subsection-1">
                <div class="dr-sub-title">Completed Degree Programs</div>
                <p>Completed Degree Programs are not yet.</p>
            </div>
            <div class="dr-footer">
                <?php $this->view('components/footer/index', $data) ?>
            </div>

            <div class="model-box" id="create-popup">

                <div class="container">
                    <h3>Create New Degree Program</h3>
                    <form id="Form1" method="post" action="">
                        <div class="input-fields" style="margin: 20px 0px 10px 0px;">

                            <label for="degree type" class="drop-down">Degree Type:</label><br>
                            <select name="degree type" id="degree_type" style="width: 400px; height: 30px; border-radius: 5px; margin-top: 9px;" onchange="handleDegreeTypeChange()">
                                <option value="" default hidden>Select</option>
                                <option value="1 Year" <?= (set_value('degree_type') === '1 Year') ? 'selected' : '' ?>>1 Year Degree</option>
                                <option value="2 Year" <?= (set_value('degree_type') === '2 Year') ? 'selected' : '' ?>>2 Year Degree</option>
                            </select><br><br><br>

                            <label for="select degree type" class="drop-down">Select Degree Program:</label><br>
                            <select name="select degree type" id="select_degree_type" style="width: 400px; height: 30px; border-radius: 5px; margin-top: 9px;">
                                <option value="" default hidden>Select</option>
                                <option value="DLMS" <?= (set_value('select_degree_type') === 'DLMS') ? 'selected' : '' ?>>DLMS</option>
                                <option value="ENCM" <?= (set_value('select_degree_type') === 'ENCM') ? 'selected' : '' ?>>ENCM</option>
                                <option value="DSL" <?= (set_value('select_degree_type') === 'DSL') ? 'selected' : '' ?>>DSL</option>

                            </select><br><br><br>
                        </div>

                        <div class="btn-box">
                            <div class="button-btn">

                                <button onclick="myFunction2()" type="button" class="bt-name-white" id="Cancel1">Cancel</button>
                                <button onclick="myFunction(), validateForm1()" type="button" class="bt-name" style="text-decoration: none; margin-right: -53px;" id="Next1">Continue</button>
                            </div>
                        </div>
                    </form>

                    <form id="Form2" method="post" action="">
                        <p id="form2_p">Define Subjects and Credits</p>

                        <div class="box_3">
                            <div class="box_3_1">
                                <p>Subject</p>
                            </div>
                            <div class="box_3_2" id="semester_subjects_credits">
                                <div id="semester_container"></div>
                            </div>
                        </div>
                        <div class="btn-box">
                            <div class="button-btn1">
                                <button type="button" class="bt-name-white" id="Back1" style="left: 0px;">Back</button>
                                <button onclick="myFunction(), validateForm2()" type="button" class="bt-name" style="text-decoration: none; margin-right: 80px;" id="Next2">Continue</button>
                            </div>
                        </div>
                    </form>
                    <form id="Form3" method="post" action="">
                        <h5 style="font-size: 16px; font-weight: 400; margin-bottom: -20px;">Define Scheme of Assignment</h5>
                        <div class="box_3">
                            <div class="box_3_1">
                                <p>Subject</p>
                            </div>
                            <div class="box_3_2">
                                <table class="Subject_table">
                                    <tr>
                                        <th style="width: 100px;">Grade</th>
                                        <th style="width: 100px;">Max Mark</th>
                                        <th style="width: 100px;">Min Mark</th>
                                        <th style="width: 100px;">GPV</th>
                                    </tr>
                                    <tr>
                                        <td><input style="width: 60px;" type="text" name="grade_1" class="grade" placeholder="A+"></td>
                                        <td><input style="width: 50px;" type="text" name="maxvalue_1" class="maxvalue" placeholder="100"></td>
                                        <td><input style="width: 50px;" type="text" name="minvalue_1" class="minvalue" placeholder="90"></td>
                                        <td><input style="width: 60px;" type="text" name="gpa_1" class="gpa" placeholder="4.00"></td>
                                    </tr>
                                    <tr>
                                        <td><input style="width: 60px;" type="text" name="grade_2" class="grade" placeholder="A"></td>
                                        <td><input style="width: 50px;" type="text" name="maxvalue_2" class="maxvalue" placeholder="89"></td>
                                        <td><input style="width: 50px;" type="text" name="minvalue_2" class="minvalue" placeholder="80"></td>
                                        <td><input style="width: 60px;" type="text" name="gpa_2" class="gpa" placeholder="4.00"></td>
                                    </tr>
                                    <tr>
                                        <td><input style="width: 60px;" type="text" name="grade_3" class="grade" placeholder="A-"></td>
                                        <td><input style="width: 50px;" type="text" name="maxvalue_3" class="maxvalue" placeholder="79"></td>
                                        <td><input style="width: 50px;" type="text" name="minvalue_3" class="minvalue" placeholder="75"></td>
                                        <td><input style="width: 60px;" type="text" name="gpa_3" class="gpa" placeholder="3.70"></td>
                                    </tr>
                                    <tr>
                                        <td><input style="width: 60px;" type="text" name="grade_4" class="grade" placeholder="B+"></td>
                                        <td><input style="width: 50px;" type="text" name="maxvalue_4" class="maxvalue" placeholder="74"></td>
                                        <td><input style="width: 50px;" type="text" name="minvalue_4" class="minvalue" placeholder="70"></td>
                                        <td><input style="width: 60px;" type="text" name="gpa_4" class="gpa" placeholder="3.40"></td>
                                    </tr>
                                    <tr>
                                        <td><input style="width: 60px;" type="text" name="grade_5" class="grade" placeholder="B"></td>
                                        <td><input style="width: 50px;" type="text" name="maxvalue_5" class="maxvalue" placeholder="69"></td>
                                        <td><input style="width: 50px;" type="text" name="minvalue_5" class="minvalue" placeholder="65"></td>
                                        <td><input style="width: 60px;" type="text" name="gpa_5" class="gpa" placeholder="3.00"></td>
                                    </tr>
                                    <tr>
                                        <td><input style="width: 60px;" type="text" name="grade_6" class="grade" placeholder="B-"></td>
                                        <td><input style="width: 50px;" type="text" name="maxvalue_6" class="maxvalue" placeholder="64"></td>
                                        <td><input style="width: 50px;" type="text" name="minvalue_6" class="minvalue" placeholder="60"></td>
                                        <td><input style="width: 60px;" type="text" name="gpa_6" class="gpa" placeholder="2.70"></td>
                                    </tr>
                                    <tr>
                                        <td><input style="width: 60px;" type="text" name="grade_7" class="grade" placeholder="C+"></td>
                                        <td><input style="width: 50px;" type="text" name="maxvalue_7" class="maxvalue" placeholder="59"></td>
                                        <td><input style="width: 50px;" type="text" name="minvalue_7" class="minvalue" placeholder="55"></td>
                                        <td><input style="width: 60px;" type="text" name="gpa_7" class="gpa" placeholder="2.40"></td>
                                    </tr>
                                    <tr>
                                        <td><input style="width: 60px;" type="text" name="grade_8" class="grade" placeholder="C"></td>
                                        <td><input style="width: 50px;" type="text" name="maxvalue_8" class="maxvalue" placeholder="54"></td>
                                        <td><input style="width: 50px;" type="text" name="minvalue_8" class="minvalue" placeholder="50"></td>
                                        <td><input style="width: 60px;" type="text" name="gpa_8" class="gpa" placeholder="2.00"></td>
                                    </tr>
                                    <tr>
                                        <td><input style="width: 60px;" type="text" name="grade_9" class="grade" placeholder="C-"></td>
                                        <td><input style="width: 50px;" type="text" name="maxvalue_9" class="maxvalue" placeholder="49"></td>
                                        <td><input style="width: 50px;" type="text" name="minvalue_9" class="minvalue" placeholder="45"></td>
                                        <td><input style="width: 60px;" type="text" name="gpa_9" class="gpa" placeholder="1.70"></td>
                                    </tr>
                                    <tr>
                                        <td><input style="width: 60px;" type="text" name="grade_10" class="grade" placeholder="F"></td>
                                        <td><input style="width: 50px;" type="text" name="maxvalue_10" class="maxvalue" placeholder="44"></td>
                                        <td><input style="width: 50px;" type="text" name="minvalue_10" class="minvalue" placeholder="0"></td>
                                        <td><input style="width: 60px;" type="text" name="gpa_10" class="gpa" placeholder="00"></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="btn-box">
                            <div class="button-btn">
                                <button type="button" class="bt-name-white" id="Back2">Back</button>
                                <button type="Submit" class="bt-name" style="text-decoration: none; margin-right: -53px;" href="<?= ROOT ?>dr/newDegree">Create</button>
                            </div>
                        </div>
                    </form>
                    <div class="step-row">
                        <div id="progress"></div>
                    </div>
                </div>
            </div>
        </div>
</body>
<script>
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
    var Back1 = document.getElementById("Back1");
    var Back2 = document.getElementById("Back2");

    var progress = document.getElementById("progress");
    var numSemesters = 4;
    // Validate Form1 before proceeding
    Next1.onclick = function() {
        if (validateForm1()) {
            Form1.style.left = "-550px";
            Form2.style.left = "100px";
            progress.style.width = "150px";
        } else {
            alert(" Please fill out all the fields.");
        }
    }
    Back1.onclick = function() {
        Form1.style.left = "70px";
        Form2.style.left = "550px";
        progress.style.width = "10px";
    }
    // Validate Form2 before proceeding
    Next2.onclick = function() {
        if (validateForm2()) {
            Form2.style.left = "-550px";
            Form3.style.left = "100px";
            progress.style.width = "300px";
        } else {
            alert(" Please fill out all the fields.");
        }
    }
    Back2.onclick = function() {
        Form2.style.left = "100px";
        Form3.style.left = "550px";
        progress.style.width = "150px";
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

    function validateForm2() {
        for (var j = 1; j <= numSemesters; j++) { // semesters
            var subjectTable = document.getElementById(`Subject_table${j}`);
            var subjectRows = subjectTable.querySelectorAll('tr');
            for (var k = 1; k < subjectRows.length; k++) { // loop through all rows except the header
                var subject = subjectRows[k].querySelector(`#SubjectName${j}_${k}`).value.trim();
                var subCodes = subjectRows[k].querySelector(`#SubjectCode${j}_${k}`).value.trim();
                var credits = subjectRows[k].querySelector(`#NoCredits${j}_${k}`).value.trim();

                // Check if subject and credits are filled for each subject
                if (subject === "" || credits === "" || subCodes === "") {
                    alert("Please fill out all fields for Semester " + j + " Subject " + k);
                    return false;
                }
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
            showSemesters(2);
        } else if (degreeType === "2 Year") {
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
    // });
</script>

</html>
<!-- 
// document.addEventListener('DOMContentLoaded', function() {
    //for form blur-background
    // function onCreateDegreeClick() {
    //     document.querySelector("#create-popup").classList.add("active");
    //     document.querySelector("#body").classList.add("active");
    // }

// function validateForm2() {
//     for (var j = 1; j <= numSemesters; j++) {       //semesters
//         for (var k = 1; k <= 1; k++) {              //subjects
//             var subject = document.getElementById("subjectName").value;
//             var credits = document.getElementById("NoCredits").value;
//             var subCodes = document.getElementById("subjectCode").value;
//             // Check if subject and credits are filled for each semester
//             if (subject.trim() === "" || credits.trim() === "" || subCodes.trim() === "") {
//                 // alert("Please fill out all fields for Semester " + j);
//                 return false;
//             }
//         }
//     }
//     return true;
// }
//     function validateForm2() {
//     for (var j = 1; j <= numSemesters; j++) {
//         for (var k = 1; k <= 1; k++) { // Assuming you have one subject per semester
//             var semesterContainer = document.getElementById("semester_container");
//             var subjectElement = semesterContainer.querySelector(`.semester${j} .SubjectName`).value;
//             var creditsElement = semesterContainer.querySelector(`.semester${j} .NoCredits`).value;
//             var subCodesElement = semesterContainer.querySelector(`.semester${j} .SubjectCode`).value;

//             var subject = subjectElement ? subjectElement : "";
//             var credits = creditsElement ? creditsElement : "";
//             var subCodes = subCodesElement ? subCodesElement : "";

//             // Check if subject and credits are filled for each semester
//             if (subject.trim() === "" || credits.trim() === "" || subCodes.trim() === "") {
//                 return false;
//             }
//         }
//     }
//     return true;
// }
function validateForm2() {
        for (var j = 1; j <= numSemesters; j++) {
            for (var k = 1; k <= 1; k++) {
                var semesterContainer = document.getElementById("semester_container");
                var subjectElement = semesterContainer.querySelector('.SubjectName').value.trim();
                var creditsElement = semesterContainer.querySelector('.NoCredits').value.trim();
                var subCodesElement = semesterContainer.querySelector('.SubjectCode').value.trim();

                var subject = subjectElement ? subjectElement.value : "";
                var credits = creditsElement ? creditsElement.value : "";
                var subCodes = subCodesElement ? subCodesElement.value : "";

                console.log(`subjectElement for:`, subjectElement);
                console.log(`creditsElement for:`, creditsElement);
                console.log(`subCodesElement for:`, subCodesElement);

                // Check if subject and credits are filled for each semester
                if (subject === "" || credits === "" || subCodes === "") {
                    return false;
                }
            }
        }
        return true;
    } 
    // function validateForm2() {
    //     for (var j = 1; j <= numSemesters; j++) { //semesters
    //         for (var k = 1; k <= 2; k++) { //subjects
    //             var subject = document.getElementById("SubjectName${j}_${k}").value.trim();
    //             var subCodes = document.getElementById("SubjectCode${j}_${k}").value.trim();
    //             var credits = document.getElementById("NoCredits${j}_${k}").value.trim();
    //             // Check if subject and credits are filled for each semester
    //             if (subject === "" || credits === "" || subCodes === "") {
    //                 // alert("Please fill out all fields for Semester " + j);
    //                 return false;
    //             }
    //         }
    //     }
    //     return true;
    // }-->