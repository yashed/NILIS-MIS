<?php
$role = "DR";
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
    <title>dr-dash Dashboard</title>
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


        --fs-xl: 5rem;
        --fs-600: 1.5rem;
        --fs-500: 1.25rem;
        --fs-400: 1rem;
        --fs-300: 0.875rem;

    }

    @media (min-width: 40em) {
        :root {
            --fs--500: 0.2rem;
        }
    }

    .dr-dash-home {
        height: 100vh;
        left: 250px;
        position: relative;
        width: calc(100% - 250px);
        transition: var(--tran-05);
        background: var(--body-color);
    }

    .dr-dash-title {
        font-size: 30px;
        font-weight: 600;
        color: black;
        padding: 10px 0px 10px 32px;
        background-color: var(--text-color);
        border-radius: 6px;
        margin: 7px 4px 7px 4px;
    }

    .sidebar.close~.dr-dash-home {
        left: 88px;
        width: calc(100% - 88px);
    }

    .dr-dash-subsection-0 {
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        align-items: center;
        /* background-color: var(--text-color); */
        padding: 15px 10px 15px 35px;
        border-radius: 6px;
        margin: 7px 4px 7px 4px;
        flex-wrap: wrap;

    }

    .dr-dash-subsection-01 {
        display: flex;
        padding: 15px 30px 14px 30px;
        justify-content: center;
        align-items: center;
        border-radius: 10px;
        border: 1px solid rgba(0, 0, 0, 0.12);
        background-color: var(--text-color);
        box-shadow: 0px 10px 25px 0px rgba(0, 0, 0, 0.12);
        width: 25%;
        height: 150px;
        flex-direction: row;
        gap: 60px;
    }

    .dr-dash-subcard-data {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }

    .dr-dash-subcard-data-value {
        font-size: 38px;
        font-weight: 600;
        color: #17376E;
    }

    .dr-dash-subcard-data-title {
        font-size: 18px;
        font-weight: 600;
        color: #17376E;
    }

    .dr-dash-subsection-1-1 {
        display: flex;
        flex-direction: column;
        width: 67%;
    }

    .dr-dash-subsection-1-1-1 {
        display: flex;
        flex-direction: row;

        /* background-color: var(--text-color);
    padding: 10px 10px 30px 35px;
    border-radius: 6px;
    margin: 7px 4px 7px 4px; */

    }

    .dr-dash-subsection-1-1-1-1 {
        background-color: var(--text-color);
        padding: 10px 10px 30px 35px;
        border-radius: 6px;
        margin: 4px 4px 4px 4px;
        width: 50%;
        align-items: center;
        justify-content: center;

    }

    .dr-dash-subsection-1-1-1-2 {
        background-color: var(--text-color);
        padding: 10px 10px 30px 35px;
        border-radius: 6px;
        margin: 4px 4px 4px 4px;
        width: 50%
    }

    .dr-dash-subsection-1-1-1-3 {
        background-color: var(--text-color);
        padding: 10px 10px 30px 35px;
        border-radius: 6px;
        margin: 4px 4px 4px 4px;
        width: 100%
    }

    .dr-dash-subsection-1-1-1-4 {
        background-color: var(--text-color);
        padding: 10px 10px 30px 35px;
        border-radius: 6px;
        margin: 4px 4px 4px 4px;
        width: 100%;
        min-height: 300px;
    }

    .dr-dash-subsection-1-1-1-5 {
        background-color: var(--text-color);
        padding: 10px 10px 10px 10px;
        border-radius: 6px;
        margin: 4px 4px 4px 4px;
        width: 50%
    }

    .dr-dash-subsection-1-2 {
        /* background-color: var(--text-color);
    padding: 10px 10px 30px 35px;
    border-radius: 6px;
    margin: 7px 4px 7px 4px; */
        width: 33%;
    }

    .dr-dash-subsection-1-2-1 {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        width: 100%;
        height: 100%;
    }

    .dr-dash-subsection-1-1-2-1 {
        background-color: var(--text-color);
        padding: 10px 10px 30px 35px;
        border-radius: 6px;
        margin: 4px 4px 4px 4px;
        height: 50%;
    }

    .dr-dash-subsection-1-1-2-2 {
        background-color: var(--text-color);
        padding: 10px 10px 30px 35px;
        border-radius: 6px;
        margin: 4px 4px 4px 4px;
        height: 50%;
    }

    .dr-dash-sub-title {

        color: #17376E;
        font-family: Poppins;
        font-size: var(--fs-500);
        font-style: normal;
        font-weight: 600;
        margin: 20px;

    }

    .dr-dash-subsection-2 {
        display: flex;
        flex-direction: row;
        justify-content: space-between;

        /* padding: 10px 10px 30px 35px; */
        /* border-radius: 6px; */
        /* margin: 7px 4px 7px 4px; */
    }

    .dr-dash-subsection-21 {
        display: flex;
        flex-direction: column;
        background-color: var(--text-color);
        padding: 10px 10px 30px 35px;
        border-radius: 6px;
        margin: 3px 4px 7px 4px;
        width: 50%;
    }

    .dr-dash-subsection-22 {
        background-color: var(--text-color);
        padding: 10px 10px 31px 35px;
        border-radius: 6px;
        margin: 3px 4px 7px 4px;
        width: 100%;
    }


    .dr-dash-main {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        /* align-items: center; */

    }

    .dr-dash-card-subsection-0 {
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        align-items: center;
        /* background-color: var(--text-color); */
        padding: 15px 10px 15px 35px;
        border-radius: 6px;
        margin: 7px 4px 7px 4px;
        flex-wrap: wrap;
        gap: 10px;

    }

    .dr-dash-card-subsection-01 {
        display: flex;
        /* padding: 15px 30px 14px 30px; */
        justify-content: center;
        align-items: center;
        border-radius: 10px;
        border: 1px solid rgba(0, 0, 0, 0.12);
        background-color: var(--text-color);
        box-shadow: 0px 10px 25px 0px rgba(0, 0, 0, 0.12);
        min-width: 22%;
        height: 120px;
        flex-direction: row;
        gap: 60px;
        cursor: pointer;
    }

    .dr-dash-card-subcard-data {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }

    .dr-dash-card-subcard-data-value {
        font-size: 38px;
        font-weight: 600;
        color: #17376E;
    }

    .dr-dash-card-subcard-data-title {
        display: flex;
        font-size: 16px;
        font-weight: 600;
        color: #17376E;
        align-items: center;
        min-width: 120px;
        justify-content: center;
        text-align: center;
    }

    .dr-dash-card-subcard-img1 img {
        max-width: 70px;
        min-width: 50px;
        max-height: 80px;
        min-height: 50px;
    }

    .dr-dash-sucard-out {
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        align-items: center;
        margin: 10px;
        gap: 10px;
    }

    .graph04,
    .graph01,
    .graph02,
    .graph03,
    .calender-comp {
        display: flex;
        justify-content: center;
        align-items: center;
    }



    .calender-title {
        color: #17376E;
        font-family: Poppins;
        font-size: var(--fs-500);
        font-style: normal;
        font-weight: 600;
        margin: 20px 20px 50px 20px;
    }


    .graph01-title,
    .graph02-title,
    .graph03-title {
        color: #17376E;
        font-family: Poppins;
        font-size: var(--fs-500);
        font-style: normal;
        font-weight: 600;
        margin: 20px;
    }

    .graph01-sub-title {
        color: var(--neutral-colors-400, #9291A5);
        margin: 20px 0px 0px 20px;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        line-height: 20px;
    }

    .graph02-sub-title {
        color: var(--neutral-colors-400, #9291A5);
        margin: 20px 0px 0px 20px;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        line-height: 20px;

    }

    .graph04-title {
        color: #17376E;
        font-family: Poppins;
        font-size: var(--fs-500);
        font-style: normal;
        font-weight: 600;
        margin: 20px 0px 0px 20px;
    }

    .graph04-Exam-title {
        font-size: 20px;
        font-style: normal;
        font-weight: 500;
        margin: 20px 0px 0px 20px;
    }

    .graph04-sub-title {
        font-size: 12px;
        font-style: normal;
        font-weight: 400;
        color: var(--Gray, #4F4F4F);
        margin: 10px 0px 10px 20px;
    }

    .exam-cards {
        display: flex;
        flex-direction: column;
        gap: 5vh;
        align-items: center;
        justify-content: center;
        height: 80%;
    }

    .degree-cards {
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        flex-wrap: wrap;
        gap: 5vh;
        align-items: center;
        justify-content: center;
        margin: 5px 2px 10px 2px;
        width: 100%;
        height: auto;
    }

    .upcomming-exam-card {
        width: 40vh;
        height: 15vh;
        border-radius: 10px;
        border: 2px solid rgba(23, 55, 110, 0.10);
        box-shadow: 0px 5px 8px 0px rgba(0, 0, 0, 0.25);
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 1vh;
        cursor: pointer;
    }

    .up-exam-degree-name {
        color: var(--colour-secondary-2, #9AD6FF);
        font-family: Poppins;
        font-size: var(--fs-400);
        font-style: normal;
        font-weight: 600;
        line-height: normal;
    }

    .up-exam-semester {
        color: var(--colour-secondary-1, #17376E);
        font-family: Poppins;
        font-size: 12px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
        margin-bottom: 10px;
    }

    .up-exam-dates {
        font-family: Poppins;
        font-size: 10px;
        font-style: normal;
        font-weight: 500;
        line-height: normal;
    }

    .up-exam-dates {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        gap: 5vh;
    }

    .up-exam-cards {
        display: flex;
        flex-direction: column;
        gap: 5vh;
        align-items: center;
        justify-content: center;
        height: 80%;

    }

    @media (max-width: 1100px) {
        .up-exam-cards {
            display: flex;
            flex-direction: column;
            gap: 1vh;
            align-items: center;
            justify-content: center;

        }

        .up-exam-dates {
            font-family: Poppins;
            font-size: 8px;
            font-style: normal;
            font-weight: 500;
            line-height: normal;
        }

        .up-exam-semester {
            color: var(--colour-secondary-1, #17376E);
            font-family: Poppins;
            font-size: 12px;
            font-style: normal;
            font-weight: 600;
            line-height: normal;
            margin-bottom: 5px;
        }

        .up-exam-degree-name {
            color: var(--colour-secondary-2, #9AD6FF);
            font-family: Poppins;
            font-size: var(--fs-300);
            font-style: normal;
            font-weight: 600;
            line-height: normal;
        }

        .upcomming-exam-card {
            width: 45vh;
            border-radius: 10px;
            border: 2px solid rgba(23, 55, 110, 0.10);
            box-shadow: 0px 5px 8px 0px rgba(0, 0, 0, 0.25);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 2px;
            cursor: pointer;
        }

    }
</style>

<body>
    <div class="dr-dash-home">
        <div class="dr-dash-title">Dashboard</div>
        <div class="dr-dash-card-subsection-0">

            <div class="dr-dash-card-subsection-01">
                <div class="dr-dash-sucard-out">
                    <div class="dr-dash-card-subcard-img1">
                        <img src="<?= ROOT ?>assets/dashboard-icons/student.png" alt="degree.icon" />
                    </div>
                    <div class="dr-dash-card-subcard-data">
                        <div class="dr-dash-card-subcard-data-title">Students</div>
                        <div class="dr-dash-card-subcard-data-value">200</div>
                    </div>
                </div>
            </div>

            <div class="dr-dash-card-subsection-01">
                <div class="dr-dash-sucard-out">
                    <div class="dr-dash-card-subcard-img1">
                        <img src="<?= ROOT ?>assets/dashboard-icons/degree.png" alt="exam.icon" />
                    </div>
                    <div class="dr-dash-card-subcard-data">
                        <div class="dr-dash-card-subcard-data-title">Ongoing</br>Degrees</div>
                        <div class="dr-dash-card-subcard-data-value">04</div>
                    </div>
                </div>
            </div>
            <div class="dr-dash-card-subsection-01">
                <div class="dr-dash-sucard-out">
                    <div class="dr-dash-card-subcard-img1">
                        <img src="<?= ROOT ?>assets/dashboard-icons/examination2.png" alt="exam.icon" />
                    </div>
                    <div class="dr-dash-card-subcard-data">
                        <div class="dr-dash-card-subcard-data-title">Ongoing</br>Examination</div>
                        <div class="dr-dash-card-subcard-data-value">04</div>
                    </div>
                </div>
            </div>
            <div class="dr-dash-card-subsection-01">
                <div class="dr-dash-sucard-out">
                    <div class="dr-dash-card-subcard-img1">
                        <img src="<?= ROOT ?>assets/dashboard-icons/examination.png" alt="user.icon" />
                    </div>
                    <div class="dr-dash-card-subcard-data">
                        <div class="dr-dash-card-subcard-data-title">Results Published </br>Exminations</div>
                        <div class="dr-dash-card-subcard-data-value">04</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="dr-dash-main">
            <div class="dr-dash-subsection-1-1">
                <div class="dr-dash-subsection-1-1-1">

                    <div class="dr-dash-subsection-1-1-1-1">
                        <div class="graph01-sub-title">
                            Statistics
                        </div>
                        <div class="graph01-title">
                            Course Participants
                        </div>

                        <div class="graph01">
                            <?php $this->view('components/graphs/bargraph-student-participation', $data) ?>
                        </div>
                    </div>
                    <div class="dr-dash-subsection-1-1-1-2">
                        <div class="graph02-title">
                            Participants
                        </div>
                        <div class="graph02-sub-title">
                            Gender
                        </div>
                        <div class="graph02">
                            <?php $this->view('components/graphs/piechart-gender', $data) ?>
                        </div>
                    </div>
                </div>
                <div class="dr-dash-subsection-1-1-1">
                    <div class="dr-dash-subsection-1-1-1-3">

                        <div class="graph03-title">
                            Students Performances
                        </div>
                        <div class="graph03">
                            <?php $this->view('components/graphs/bargraph-pass-students', $data) ?>
                        </div>
                    </div>
                </div>
                <div class="dr-dash-subsection-1-1-1">
                    <div class="dr-dash-subsection-1-1-1-4">
                        <div class="graph04-title">
                            Ongoing Degree Programs
                        </div>
                        <div class="degree-cards">
                            <?php if ($degrees) : ?>
                                <?php $count = 0; ?>
                                <?php foreach ($degrees as $degree) : ?>
                                    <div class="dr-card1">
                                        <a href="<?= ROOT ?>dr/degreeprofile?id=<?= $degree->DegreeID ?>" style="text-decoration: none;">
                                            <?php $this->view('components/degree-card/degree-card', ["degree" => $degree]) ?>
                                        </a>
                                    </div>
                                    <?php $count++; ?>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <p>No data found for the Ongoing diploma program.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dr-dash-subsection-1-2">
                <div class="dr-dash-subsection-1-2-1">
                    <div class="dr-dash-subsection-1-1-2-1">
                        <div class="calender-title">
                            Academic Calender
                        </div>
                        <div class="calender-comp">
                            <?php $this->view('components/calender/calender', $data) ?>
                        </div>
                    </div>
                    <div class="dr-dash-subsection-1-1-2-2">
                        <div class="dr-dash-sub-title">
                            Recently Published Examination Results
                        </div>
                        <div class="exam-cards">
                            <?php $this->view('components/exam-card/exam-card', $data) ?>
                            <?php $this->view('components/exam-card/exam-card', $data) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="dr-dash-footer">
            <?php $this->view('components/footer/index', $data) ?>
        </div>
    </div>


</body>

</html>