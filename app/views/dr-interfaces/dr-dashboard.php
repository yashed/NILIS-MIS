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
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>css/dr/dr-styles.css">
    <title>dr-dash Dashboard</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');
    @media (min-width: 40em) {
        :root {
            --fs--500: 0.2rem;
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
                        <div class="dr-dash-card-subcard-data-value"></div>
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
                        <div class="dr-dash-graph01-sub-title">
                            Statistics
                        </div>
                        <div class="dr-dash-graph01-title">
                            Course Participants
                        </div>

                        <div class="dr-dash-graph01">
                            <?php $this->view('components/graphs/bargraph-student-participation', $data) ?>
                        </div>
                    </div>
                    <div class="dr-dash-subsection-1-1-1-2">
                        <div class="dr-dash-graph02-title">
                            Participants
                        </div>
                        <div class="dr-dash-graph02-sub-title">
                            Gender
                        </div>
                        <div class="dr-dash-graph02">
                            <?php $this->view('components/graphs/piechart-gender', $data) ?>
                        </div>
                    </div>
                </div>
                <div class="dr-dash-subsection-1-1-1">
                    <div class="dr-dash-subsection-1-1-1-3">

                        <div class="dr-dash-graph03-title">
                            Students Performances
                        </div>
                        <div class="dr-dash-graph03">
                            <?php $this->view('components/graphs/bargraph-pass-students', $data) ?>
                        </div>
                    </div>
                </div>
                <div class="dr-dash-subsection-1-1-1">
                    <div class="dr-dash-subsection-1-1-1-4">
                        <div class="dr-dash-graph04-title">
                            Ongoing Degree Programs
                        </div>
                        <div class="dr-dash-degree-cards">
                            <?php if (!empty($degrees)) : ?>
                                <?php $count = 0; ?>
                                <?php $ongoing_degrees_exist = false; ?>
                                <?php foreach ($degrees as $degree) : ?>
                                    <?php if ($degree->Status == "ongoing") : ?>
                                        <?php $ongoing_degrees_exist = true; ?>
                                        <div class="dr-dash-dr-card1">
                                            <a href="<?= ROOT ?>dr/degreeprofile?id=<?= $degree->DegreeID ?>" style="text-decoration: none;">
                                                <?php $this->view('components/degree-card/degree-card', ["degree" => $degree]) ?>
                                            </a>
                                        </div>
                                        <?php $count++; ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                <?php if (!$ongoing_degrees_exist) : ?>
                                    <p>No data found under the ongoing diploma program.</p>
                                <?php endif; ?>
                            <?php else : ?>
                                <p>No data found for the diploma program.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            </div>
            <div class="dr-dash-subsection-1-2">
                <div class="dr-dash-subsection-1-2-1">
                    <div class="dr-dash-subsection-1-1-2-1">
                        <div class="dr-dash-calender-title">
                            Academic Calender
                        </div>
                        <div class="dr-dash-calender-comp">
                            <?php $this->view('components/calender/calender', $data) ?>
                        </div>
                    </div>
                    <div class="dr-dash-subsection-1-1-2-2">
                        <div class="dr-dash-sub-title">
                            Recently Published Examination Results
                        </div>
                        <div class="dr-dash-exam-cards">
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