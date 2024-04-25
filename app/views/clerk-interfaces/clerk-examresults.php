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
        font-size: 1.5vw;
        font-weight: 600;
        color: black;
        padding: 10px 0px 10px 2vw;
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

    .temp2-sub-title2 {

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
        display: flex;
        flex-direction: column;
        width: 100%;
        height: auto;
        background-color: #ffffff;
        border-radius: 6px;
        padding: 1vw 2vw 1vw 2vw;
        margin-left: 4px;
        padding-top: 1vw;
    }

    .temp2-footer {
        margin-top: auto;
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
        background-color: #ffffff;
        gap: 1%;
        justify-content: center;
    }

    .custom-dropdown {
        position: relative;
        width: 45%;
        margin: 10px;
        border: #E2E2E2;
        min-width: 200px;
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
        /* Adjusted width to leave space for the icon */
        padding: 10px;
        border: 1px solid #E2E2E2;
        border-radius: 5px;
        background-color: #E2E2E2;
        text-align: center;
        cursor: pointer;
        font-size: 16px;
        font-size: 1vw;

    }

    .custom-dropdown select:hover {
        background-color: #eeeeee;

    }

    .btn-primary {
        min-width: 10vh;
        color: #fff;
        height: 5vh;
        padding: 5px 5px 5px 5px;
        border-radius: 8px;
        background: #17376e;
        box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.2);
        border: 0px;
    }

    .bt-name {
        font-size: 16px;
        font-weight: 500px;
    }

    .btn-primary-name {
        font-size: 1vw;
        font-weight: 500px;
    }

    .btn-primary:hover {
        color: #17376e;
        background-color: white;
        border: 1px solid
    }

    .result-table {
        margin-top: 20px;
        margin: 20px
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        font-size: 0.8vw;

    }

    th {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: center;

    }

    td {
        border: 1px solid #ddd;
        padding: 5px;
        text-align: center;

    }

    th {
        background-color: #f2f2f2;
    }

    @media screen and (max-width: 600px) {

        /* Make the table responsive on smaller screens */
        table {
            overflow-x: auto;
        }
    }

    .result-message {
        text-align: center;
        font-size: 2vw;
        font-weight: 500px;
        color: #17376E;

        padding-top: 20px;
        height: 15vw;

    }

    .subject-details {
        display: flex;
        font-size: 1vw;
        flex-direction: column;
        padding-left: 20px;
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
                    Results</br>
                </div>
                <form method="POST" id="examination-results">
                    <div class="input-main-group">
                        <div class="custom-dropdown">
                            <div class="icon">
                                <i class='bx bx-search' style="width:20px ; height : 20px;"></i>
                            </div>

                            <select id="sub" name="subCode">
                                <?php foreach ($subNames as $subject): ?>
                                    <?php $json = json_encode($subject); ?>

                                    <option value=" <?= $subject->subjectCode ?>" name="subjectCode">
                                        <?= $subject->subjectName ?>
                                    </option>

                                <?php endforeach; ?>

                            </select>



                        </div>
                        <button class="btn-primary" type="submit" name="submit" value="selectSubject">
                            <div class="btn-primary-name">
                                Search
                            </div>
                        </button>
                    </div>

                </form>

                <div class="result-table">
                    <?php if (!empty($examResults)): ?>
                        <div class="subject-details">
                            <div class="subject-name">Subject : </div>
                            <div class="subject-credits">Credits :</div>
                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <th>Index No</th>
                                    <th>Subject Code</th>
                                    <th>Examiner 01 Marks</th>
                                    <th>Examiner 02 Marks</th>
                                    <th>Examiner 03 Marks</th>
                                    <th>Assestment Marks</th>
                                    <th>Final Mark</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($examResults as $result): ?>
                                    <tr>
                                        <td>
                                            <?= $result->studentIndexNo ?>
                                        </td>
                                        <td>
                                            <?= $result->subjectCode ?>
                                        </td>
                                        <td>
                                            <?= $result->examiner1Marks ?>
                                        </td>
                                        <td>
                                            <?= $result->examiner2Marks ?>
                                        </td>
                                        <td>
                                            <?= $result->examiner3Marks ?>
                                        </td>
                                        <td>
                                            <?= $result->assessmentMarks ?>
                                        </td>
                                        <td>
                                            <?= $result->finalMarks ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    <?php else: ?>
                        <div class="result-message">Results not uploaded yet.</div>
                    <?php endif; ?>

                </div>
            </div>


        </div>
        <div class="temp2-footer">
            <?php $this->view('components/footer/index', $data) ?>
        </div>

</body>

</html>