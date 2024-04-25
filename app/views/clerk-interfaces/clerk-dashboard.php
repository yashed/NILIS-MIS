<?php
$role = "Clerk";
$data['role'] = $role;
$data['recentResults'] = $RecentResultExam;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <head>
        <!-- <link rel="stylesheet" type="text/css" href="<?= ROOT ?>css/clerk/clerk-dashboard.css"> -->
        <title>Clerk Dashboard</title>
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

            .clerk-home {
                height: 100vh;
                left: 250px;
                position: relative;
                width: calc(100% - 250px);
                transition: var(--tran-05);
                background: var(--body-color);
            }

            .clerk-title {
                font-size: 30px;
                font-weight: 600;
                color: black;
                padding: 10px 0px 10px 32px;
                background-color: var(--text-color);
                border-radius: 6px;
                margin: 7px 4px 7px 4px;
            }

            .sidebar.close~.clerk-home {
                left: 88px;
                width: calc(100% - 88px);
            }

            .clerk-subsection-0 {
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

            .clerk-subsection-01 {
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

            .clerk-subcard-data {
                display: flex;
                align-items: center;
                justify-content: center;
                flex-direction: column;
            }

            .clerk-subcard-data-value {
                font-size: 38px;
                font-weight: 600;
                color: #17376E;
            }

            .clerk-subcard-data-title {
                font-size: 18px;
                font-weight: 600;
                color: #17376E;
            }

            .clerk-subsection-01 {
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

            .clerk-subcard-data {
                display: flex;
                align-items: center;
                justify-content: center;
                flex-direction: column;
            }

            .clerk-subcard-data-value {
                font-size: 38px;
                font-weight: 600;
                color: #17376E;
            }

            .clerk-subcard-data-title {
                font-size: 18px;
                font-weight: 600;
                color: #17376E;
            }

            .clerk-subsection-1 {
                background-color: var(--text-color);
                padding: 10px 10px 30px 80px;
                border-radius: 6px;
                margin: 7px 4px 7px 4px;
            }

            .clerk-sub-title {

                color: #17376E;
                font-family: Poppins;
                font-size: 22px;
                font-style: normal;
                font-weight: 600;
                margin: 40px;

            }

            .clerk-subsection-2 {
                display: flex;
                flex-direction: row;
                justify-content: space-between;

                /* padding: 10px 10px 30px 35px; */
                /* border-radius: 6px; */
                /* margin: 7px 4px 7px 4px; */
            }

            .clerk-subsection-21 {
                display: flex;
                flex-direction: column;
                background-color: var(--text-color);
                padding: 10px 10px 30px 35px;
                border-radius: 6px;
                margin: 3px 4px 7px 4px;
                width: 50%;
            }

            .clerk-sub-title {

                color: #17376E;
                font-family: Poppins;
                font-size: 22px;
                font-style: normal;
                font-weight: 600;
                margin: 40px;

            }

            .clerk-subsection-2 {
                display: flex;
                flex-direction: row;
                justify-content: space-between;

                /* padding: 10px 10px 30px 35px; */
                /* border-radius: 6px; */
                /* margin: 7px 4px 7px 4px; */
            }

            .clerk-subsection-21 {
                display: flex;
                flex-direction: column;
                background-color: var(--text-color);
                padding: 10px 10px 30px 35px;
                border-radius: 6px;
                margin: 3px 4px 7px 4px;
                width: 50%;
            }

            .clerk-subsection-22 {
                background-color: var(--text-color);
                padding: 10px 10px 31px 35px;
                border-radius: 6px;
                margin: 3px 4px 7px 4px;
                width: 50%;
            }

            .clerk-subsection-22 {
                background-color: var(--text-color);
                padding: 10px 10px 31px 35px;
                border-radius: 6px;
                margin: 3px 4px 7px 4px;
                width: 50%;
            }

            .clerk-calender {
                display: flex;
                align-items: center;
                justify-content: center;

            }

            .clerk-calender {
                display: flex;
                align-items: center;
                justify-content: center;

            }

            .clerk-degree-bar {
                display: flex;
                flex-direction: column;
                justify-content: space-around;
                flex-wrap: wrap;
                margin-bottom: 20px;
            }

            .clerk-card-container {
                display: flex;
                flex-wrap: wrap;
                /* justify-content: space-between; or any other desired value */
                gap: 3vw;
                /* Adjust the gap between cards as needed */

            }


            .clerk-card1 {
                display: flex;
                flex-direction: column;
            }

            .clerk-card1 {
                display: flex;
                flex-direction: column;
            }

            .clerk-card2 {
                display: flex;
                flex-direction: column;
            }

            .clerk-card2 {
                display: flex;
                flex-direction: column;
            }

            .clerk-exam-bar {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                flex-wrap: nowrap;
                gap: 30px;
            }

            .clerk-exam-card1 {
                display: flex;
                flex-direction: column;
            }

            .clerk-exam-card2 {
                display: flex;
                flex-direction: column;
            }
        </style>
    </head>


<body>

    <?php $this->view('components/navside-bar/header', $data) ?>
    <?php $this->view('components/navside-bar/sidebar', $data) ?>
    <?php $this->view('components/navside-bar/footer', $data) ?>

    <div class="clerk-home">
        <div class="clerk-title">Dashboard</div>
        <div class="clerk-subsection-1">
            <div class="clerk-sub-title">
                Ongoing Degree Programs
            </div>
            <div class="clerk-degree-bar">
                <div class="clerk-card-container">
                    <?php if (!empty($ongoingDegrees)): ?>
                        <?php foreach ($ongoingDegrees as $degree): ?>
                            <div class="clerk-card1">
                                <?php $this->view('components/degree-card/degree-card', ["degree" => $degree]) ?>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>

        </div>
        <div class="clerk-subsection-2">
            <div class="clerk-subsection-21">
                <div class="clerk-sub-title">
                    Recently Published Examination Results
                </div>
                <div class="clerk-exam-bar">
                    <?php if (!empty($RecentResultExam)): ?>
                        <?php foreach ($RecentResultExam as $exam): ?>
                            <?php

                            $data['exam'] = $exam;
                            $this->view('components/exam-card/exam-card', $data);

                            ?>
                        <?php endforeach; ?>
                    <?php else: ?>

                        <div class="result-msg">
                            No Results Published
                        </div>
                        < <?php endif; ?>
                </div>
            </div>
            <div class="clerk-subsection-22">
                <div class="clerk-sub-title">
                    Academic Calender
                </div>
                <div class="clerk-calender">
                    <?php $this->view('components/calender/calender', $data) ?>
                </div>
            </div>
        </div>
        <div class="clerk-footer">
            <?php $this->view('components/footer/index', $data) ?>
        </div>
    </div>

</body>

</html>