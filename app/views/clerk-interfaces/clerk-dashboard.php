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
        <link rel="stylesheet" type="text/css" href="<?= ROOT ?>css/clerk/clerk-dashboard.css">
        <title>Clerk Dashboard</title>
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
                    <?php foreach ($degrees as $degree) : ?>
                        <div class="clerk-card1">
                            <?php $this->view('components/degree-card/degree-card', ["degree" => $degree]) ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
        <div class="clerk-subsection-2">
            <div class="clerk-subsection-21">
                <div class="clerk-sub-title">
                    Recently Published Examination Results
                </div>
                <div class="clerk-exam-bar">
                    <?php if (!empty($RecentResultExam)) : ?>
                        <?php foreach ($RecentResultExam as $exam) : ?>
                            <?php

                            $data['exam'] = $exam;
                            $this->view('components/exam-card/exam-card', $data);

                            ?>
                        <?php endforeach; ?>
                    <?php else : ?>

                        <div class="result-msg">
                            No Results Published
                        </div>
                        < <?php endif; ?> </div>
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