<?php
$role = "SAR";
$data['role'] = $role;
$data['ExamSubjects'] = isset($ExamSubjects) ? $ExamSubjects : '';
$data['PopupStatus'] = isset($attendacePopupStatus) ? $attendacePopupStatus : '';
$data['ExamSetStudents'] = isset($setStudents) ? $setStudents : '';
$data['SelectedSubCode'] = isset($selectedSubject) ? $selectedSubject : '';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam Participants</title>
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
        font-size: 2vw;
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
        align-items: center;
    }

    .flex-container-top {

        display: flex;
        flex-direction: row;
        margin-top: 2%;
        width: 81vw;
        padding-right: 1vw;
    }

    .admission-button0 {
        padding: 0.5% 0.5% 0.5% 1%;
        background-color: #17376E;
        color: #fff;
        text-decoration: none;
        align-items: center;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        width: 15vw;
        font-size: 0.9vw;
        margin-right: 2vw;
        height: 100%;
    }

    .admission-button1 {
        width: 16vw;
        color: #fff;
        height: 2.8vw;
        padding: 5px 5px 5px 5px;
        border-radius: 0.6vw;
        background: #ffffff;
        box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.2);
        color: #17376e;
        margin-bottom: 10px;
        margin-top: 20px;
        border: 1px solid #17376e;
        font-size: 1vw;
    }



    .admission-button2 {
        width: 16vw;
        background: #17376e;
        color: #ffffff;
        height: 2.8vw;
        padding: 5px 5px 5px 5px;
        border-radius: 0.6vw;
        box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.2);
        border: 1px solid;
        margin-bottom: 10px;
        margin-top: 20px;
        font-size: 1vw;
    }

    .admission-button2:hover {
        background: #ffffff;
        color: #17376e;
    }

    .admission-button1:hover {
        color: black;
        background-color: #E2E2E2;
        border: 1px solid #17376e;
    }


    .temp2-sub-title2 {
        color: #17376E;
        font-family: Poppins;
        font-size: 22px;
        font-style: normal;
        font-weight: 600;
        font-size: 1.2vw;
        flex: 10%;
    }



    .temp2-footer {
        margin-top: auto;
    }



    input[type="file"] {
        margin: 10px 0;
        /* margin-left: 150px; */
    }

    .file-input-icon {
        width: 40px;
        height: 40px;
        background-image: url('<?= ROOT ?>/assets/file-icon.png');
        background-size: cover;
        background-repeat: no-repeat;
        cursor: pointer;
    }

    input[type="file"] {
        display: none;
    }

    .text1 {
        font-size: 15px;
    }

    .browse-label {
        color: #9AD6FF;
        cursor: pointer;
    }

    .flex-container {
        gap: 10%;
        display: flex;
        flex-direction: row;
    }




    .sub-name {
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
        padding: 2%;
        height: 15vw;
        padding-left: 10vw;
    }

    .column2 {
        flex: 50%;
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
        padding-top: 1vw;
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
        padding-top: 1vw;
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

    .table__body {
        width: 100%;
        max-height: calc(89% - 1.6rem);
        /* background-color: var(--body-color); */
        margin: 1vw;
        border-radius: .6rem;
        /* overflow: auto;
        overflow: overlay;
        outline-style: groove; */
        outline-width: 2px;
        outline-color: #ffffff;
    }

    .table__body::-webkit-scrollbar {
        width: 0.5rem;
        height: 0.5rem;
    }

    .table__body::-webkit-scrollbar-thumb {
        border-radius: .5rem;
        background-color: #ffffff;
        visibility: visible;
    }

    .table__body:hover::-webkit-scrollbar-thumb {
        visibility: visible;
    }

    table {
        width: 100%;
    }

    .table__body-td-name {
        display: flex;
        align-items: center;
    }

    td img {
        width: 40px;
        height: 40px;
        margin: .5rem;
        border-radius: 50%;
        vertical-align: middle;
    }

    table,
    th,
    td {
        border-collapse: collapse;
        padding: 1rem;
        text-align: center;

    }

    thead th {
        position: sticky;
        top: 0;
        left: 0;
        background-color: #ffffff;
        cursor: pointer;
        text-transform: capitalize;
        color: #999999;
        font-size: 0.8vw;
        font-weight: 500;
    }

    tbody tr:nth-child(even) {
        background-color: #ffffff;
    }

    tbody tr:nth-child(odd) {
        background-color: #ffffff;
    }

    tbody tr {
        --delay: .1s;
        transition: .5s ease-in-out var(--delay), background-color 0s;
        font-size: 0.8vw;
    }



    .input-main-group {
        display: flex;
        align-items: center;
        margin-left: 25%;
        background-color: #ffffff;
        gap: 1%;
        font-size: 1vw;
    }

    .custom-dropdown {
        position: relative;
        width: 45%;
        margin: 10px;
        border: #E2E2E2;
        font-size: 1vw;
    }

    .custom-dropdown .icon {
        position: absolute;
        top: 50%;
        left: 10px;
        transform: translateY(-50%);
        font-size: 25px;
        color: #000;
    }

    .custom-dropdown select {
        width: calc(100% - 40px);
        padding: 10px;
        border: 1px solid #E2E2E2;
        border-radius: 5px;
        background-color: #E2E2E2;
        text-align: center;
        cursor: pointer;
        font-size: 1vw;
        padding-left: 40px;
    }

    .custom-dropdown select:hover {
        background-color: #eeeeee;
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


    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.4);
    }

    .modal-content {
        background-color: #fefefe;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 70vw;
        border-radius: 10px;
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    .profile-message {
        color: #10344D;
        font-family: Poppins;
        font-size: 22px;
        border-radius: 10px;
        font-style: normal;
        font-weight: 600;
        margin: 40px;
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        background-color: #f8d7da;
        height: 5vh;
    }

    .error-message-profile {
        padding: 0px 70px 0px 70px;
        width: 100%;
        text-align: center;
        font-size: 1.5vw;
    }

    .loader-wraper {
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
        left: 0;
        background: rgba(0, 0, 0, 0.70);
        display: flex;
        justify-content: center;
        z-index: 1000;
        align-items: center;
    }

    .loader-css {
        width: 10%;
        height: 10%;
        display: flex;
        justify-content: center;
        position: absolute;

    }

    .participants-body {
        width: 100%;
    }

    .participants-body.active {
        filter: blur(5px);
        pointer-events: none;
        user-select: none;
        background: rgba(0, 0, 0, 0.30);
        overflow: hidden;


    }

    .mail-popup.active {

        top: 50%;
        opacity: 1;
        transform: translate(-50%, -50%) scale(1);
        transition: top 0ms ease-in-out 200ms, opacity 200ms ease-in-out 0ms, transform 200ms ease-in-out 0ms;
    }

    .mail-popup {
        position: fixed;
        top: -150%;
        left: 50%;
        transform: translate(-50%, -50%) scale(1.25);
        border: 1.5px solid rgba(00, 00, 00, 0.30);
        opacity: 0;
        background: #fff;
        width: 40%;
        /* height: 60vh; */
        padding: 40px;
        box-shadow: 9px 11px 60.9px 0px rgba(0, 0, 0, 0.60);
        border-radius: 10px;
        transition: top 0ms ease-in-out 200ms, opacity 200ms ease-in-out 0ms, transform 200ms ease-in-out 0ms;
        z-index: 2000;
    }

    .exam-popup {
        position: fixed;
        top: -150%;
        left: 50%;
        transform: translate(-50%, -50%) scale(1.25);
        border: 1.5px solid rgba(00, 00, 00, 0.30);
        opacity: 0;
        background: #fff;
        width: 70%;
        /* height: 60vh; */
        padding: 40px;
        box-shadow: 9px 11px 60.9px 0px rgba(0, 0, 0, 0.60);
        border-radius: 10px;
        transition: top 0ms ease-in-out 200ms, opacity 200ms ease-in-out 0ms, transform 200ms ease-in-out 0ms;
        z-index: 2000;
    }

    .exam-popup.active {
        top: 50%;
        opacity: 1;
        transform: translate(-50%, -50%) scale(1);
        transition: top 0ms ease-in-out 200ms, opacity 200ms ease-in-out 0ms, transform 200ms ease-in-out 0ms;
    }

    .close-btn {
        position: absolute;
        right: 10px;
        top: 10px;
        width: 15px;
        height: 15px;
        background: #17376e;
        color: #ffffff;
        text-align: center;
        line-height: 15px;
        border-radius: 15px;
        cursor: pointer;
    }

    .display-message {
        width: 70%;
    }

    .participants-form-header {
        display: flex;
        width: 100%;
        justify-content: space-between;
        margin-top: 10px;
        margin-bottom: 20px;

    }

    .participant-form-btns {
        display: flex;
        gap: 10px;
        align-items: flex-end;

    }
</style>
<?php

$perPage = 5;
if (!empty($examParticipants)) {

    $totalRecords = count($examParticipants);
}
$totalPages = ceil($totalRecords / $perPage);


$page = isset($_GET['page']) ? intval($_GET['page']) : 1;


$start = ($page - 1) * $perPage;
$end = $start + $perPage;

// Slice the array to get records for the current page
$currentRecords = array_slice($examParticipants, $start, $perPage);


?>

<body>
    <div class="loader-wraper">
        <div class="loader-css">
            <?php $this->view('components/loader/index') ?>
        </div>
    </div>
    <div class="participants-body" id="body">
        <?php $this->view('components/navside-bar/degreeprogramsidebar', $data) ?>
        <?php $this->view('components/navside-bar/footer', $data) ?>

        <div class="temp2-home">

            <div class="temp2-title">Examination</div>
            <div class="temp2-subsection-1">
                <div class="temp2-sub-title1">
                    <div class='sub-title-01'>Overview</div>
                    <div class="exam-detail-btn">gg</div>
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

                    <div class="participants-form-header">
                        <div class="temp2-sub-title2">Participants</div>
                        <div class="participant-form-btns">
                            <button class="admission-button1" id="openModal" onClick='showAttendancePopup()'>Exam
                                Attendance Submit</button>
                            <form method="post">

                                <!-- <button class="admission-button0">Download Attendance Sheet</button> -->
                                <button class="admission-button2" type="submit" name="admission" value="clicked"
                                    onClick="showMailPopup(event)">Send Admission Card</button>

                            </form>
                        </div>
                    </div>
                    <div class="display-message">
                        <?php
                        if (message()) {
                            echo '<div class="profile-message">';
                            if ($_SESSION['message_type'] == 'success') {
                                echo "<div class='error-message-profile' >" . message('', '', true) . "</div>";
                            } else {
                                echo "<div class='error-message-profile' style='color:red;'>" . message('', '', true) . "</div>";
                            }
                            echo '</div>';
                        }
                        ?>
                    </div>
                    <section class="table__body">
                        <table id="table_p">
                            <thead>
                                <tr>
                                    <th> Name </th>
                                    <th> Attempt </th>
                                    <th> Index Number </th>

                                    <th> Student Type </th>
                                    <th> Admission Card </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($currentRecords as $students):
                                    if (!empty($_SESSION['examDetails'])) {

                                        $examID = $_SESSION['examDetails'][0]->examID;
                                    }

                                    $degreeID = 4;
                                    if (!empty($_SESSION['degreeDetails'])) {

                                        $degreeID = $_SESSION['degreeDetails'][0]->degreeID;
                                    }

                                    ?>
                                    <?php foreach ($students as $student): ?>
                                        <?php $json = json_encode($student); ?>
                                        <tr>
                                            <td class="table__body-td-name"><img src="<?= ROOT ?>assets/student.png" alt="">
                                                Bimsara Anjana</td>
                                            <td>
                                                <?= $student->attempt ?>
                                            </td>
                                            <td>
                                                <?= $student->indexNo ?>
                                            </td>

                                            <td>
                                                <?= $student->studentType ?>
                                            </td>
                                            <td> <a href="http://localhost/NILIS-MIS/public/admission/login?degreeID=<?= $degreeID ?>&examID=<?= $examID ?>&indexNo=<?= $student->indexNo ?>"
                                                    target="_blank">tap
                                                    to see Admission card </a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </section>


                    <br>
                    <div class="pagination">
                        <?php if ($page > 1): ?>
                            <a href="?page=<?= $page - 1 ?>">Previous</a>
                        <?php endif; ?>
                        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                            <a href="?page=<?= $i ?>" <?= $page === $i ? 'class="active"' : '' ?>>
                                <?= $i ?>
                            </a>
                        <?php endfor; ?>
                        <?php if ($page < $totalPages): ?>
                            <a href="?page=<?= $page + 1 ?>">Next</a>
                        <?php endif; ?>
                    </div>


                </div>


            </div>


            <div class="user-create-footer">
                <?php $this->view('components/footer/index', $data) ?>
            </div>
        </div>

    </div>

    <div class="mail-popup" id="mail-popup">
        <?php $this->view('components/popup/sendMails', $data) ?>
    </div>
    <div id="exam-attendance" class="exam-popup">
        <?php $this->view('sar-interfaces/sar-exam-attendance-submit', $data) ?>
    </div>
</body>

<script>
    // document.addEventListener("DOMContentLoaded", function () {
    //     var modal = document.getElementById('myModal');
    //     var btn = document.getElementById('openModal');
    //     var span = document.getElementById('closeModal');
    //     var body = document.body;

    //     btn.onclick = function () {
    //         modal.style.display = "block";
    //         body.classList.add('modal-open');
    //     }

    //     span.onclick = function () {
    //         modal.style.display = "none";
    //         body.classList.remove('modal-open');
    //     }

    //     window.onclick = function (event) {
    //         if (event.target == modal) {
    //             modal.style.display = "none";
    //             body.classList.remove('modal-open');
    //         }
    //     }
    // });
</script>
<script>
    $(window).on("load", function () {
        $(".loader-wraper").fadeOut("slow");
    });

    function showMailPopup() {

        console.log('run');
        document.querySelector("#mail-popup").classList.add("active");
        document.querySelector("#body").classList.add("active");
        console.log('run again');
    }

    function showAttendancePopup() {
        console.log("Click attendance");
        document.querySelector("#exam-attendance").classList.add("active");
        document.querySelector("#body").classList.add("active");
    }


    //handel pop active according to clicked button
    var popupStatus = <?php echo $attendacePopupStatus ? 'true' : 'false'; ?>;
    if (popupStatus) {

        // Adding 'active' class to the popup and body elements
        document.querySelector("#exam-attendance").classList.add("active");
        document.querySelector("#body").classList.add("active");
        $(".loader-wraper").fadeOut("slow");
    }
</script>



</html>