<?php
$role = "director";
    $data['role'] = $role;

?>

<?php $this->view('components/navside-bar/header',$data) ?>
<?php $this->view('components/navside-bar/sidebar',$data) ?>
<?php $this->view('components/navside-bar/footer',$data) ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sar-dash Dashboard</title>
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

.sar-dash-home {
    height: 100vh;
    left: 250px;
    position: relative;
    width: calc(100% - 250px);
    transition: var(--tran-05);
    background: var(--body-color);
}

.sar-dash-title {
    font-size: 30px;
    font-weight: 600;
    color: black;
    padding: 10px 0px 10px 32px;
    background-color: var(--text-color);
    border-radius: 6px;
    margin: 7px 4px 7px 4px;
}

.sidebar.close~.sar-dash-home {
    left: 88px;
    width: calc(100% - 88px);
}

.sar-dash-subsection-0 {
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

.sar-dash-subsection-01 {
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

.sar-dash-subcard-data {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
}

.sar-dash-subcard-data-value {
    font-size: 38px;
    font-weight: 600;
    color: #17376E;
}

.sar-dash-subcard-data-title {
    font-size: 18px;
    font-weight: 600;
    color: #17376E;
}

.sar-dash-subsection-1-1 {
    display: flex;
    flex-direction: column;
    width: 67%;
}

.sar-dash-subsection-1-1-1 {
    display: flex;
    flex-direction: row;

    /* background-color: var(--text-color);
    padding: 10px 10px 30px 35px;
    border-radius: 6px;
    margin: 7px 4px 7px 4px; */

}

.sar-dash-subsection-1-1-1-1 {
    background-color: var(--text-color);
    padding: 10px 10px 30px 35px;
    border-radius: 6px;
    margin: 4px 4px 4px 4px;
    width: 50%;
    align-items: center;
    justify-content: center;

}

.sar-dash-subsection-1-1-1-2 {
    background-color: var(--text-color);
    padding: 10px 10px 30px 35px;
    border-radius: 6px;
    margin: 4px 4px 4px 4px;
    width: 50%
}

.sar-dash-subsection-1-1-1-3 {
    background-color: var(--text-color);
    padding: 10px 10px 30px 35px;
    border-radius: 6px;
    margin: 4px 4px 4px 4px;
    width: 100%
}

.sar-dash-subsection-1-1-1-4 {
    background-color: var(--text-color);
    padding: 10px 10px 30px 35px;
    border-radius: 6px;
    margin: 4px 4px 4px 4px;
    width: 50%
}

.sar-dash-subsection-1-1-1-5 {
    background-color: var(--text-color);
    padding: 10px 10px 30px 35px;
    border-radius: 6px;
    margin: 4px 4px 4px 4px;
    width: 50%
}

.sar-dash-subsection-1-2 {
    /* background-color: var(--text-color);
    padding: 10px 10px 30px 35px;
    border-radius: 6px;
    margin: 7px 4px 7px 4px; */
    width: 33%;
}

.sar-dash-subsection-1-2-1 {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    width: 100%;
    height: 100%;
}

.sar-dash-subsection-1-1-2-1 {
    background-color: var(--text-color);
    padding: 10px 10px 30px 35px;
    border-radius: 6px;
    margin: 4px 4px 4px 4px;
    height: 50%;
}

.sar-dash-subsection-1-1-2-2 {
    background-color: var(--text-color);
    padding: 10px 10px 30px 35px;
    border-radius: 6px;
    margin: 4px 4px 4px 4px;
    height: 50%;
}

.sar-dash-sub-title {

    color: #17376E;
    font-family: Poppins;
    font-size: 22px;
    font-style: normal;
    font-weight: 600;
    margin: 20px;

}

.sar-dash-subsection-2 {
    display: flex;
    flex-direction: row;
    justify-content: space-between;

    /* padding: 10px 10px 30px 35px; */
    /* border-radius: 6px; */
    /* margin: 7px 4px 7px 4px; */
}

.sar-dash-subsection-21 {
    display: flex;
    flex-direction: column;
    background-color: var(--text-color);
    padding: 10px 10px 30px 35px;
    border-radius: 6px;
    margin: 3px 4px 7px 4px;
    width: 50%;
}

.sar-dash-subsection-22 {
    background-color: var(--text-color);
    padding: 10px 10px 31px 35px;
    border-radius: 6px;
    margin: 3px 4px 7px 4px;
    width: 100%;
}


.sar-dash-main {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    /* align-items: center; */

}

.sar-dash-card-subsection-0 {
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

.sar-dash-card-subsection-01 {
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

.sar-dash-card-subcard-data {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
}

.sar-dash-card-subcard-data-value {
    font-size: 38px;
    font-weight: 600;
    color: #17376E;
}

.sar-dash-card-subcard-data-title {
    display: flex;
    font-size: 16px;
    font-weight: 600;
    color: #17376E;
    align-items: center;
    min-width: 120px;
    justify-content: center;
    text-align: center;
}

.sar-dash-card-subcard-img1 img {
    max-width: 70px;
    min-width: 50px;
    max-height: 80px;
    min-height: 50px;
}

.sar-dash-sucard-out {
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
    font-size: 22px;
    font-style: normal;
    font-weight: 600;
    margin: 20px;
}


.graph01-title,
.graph02-title,
.graph03-title {
    color: #17376E;
    font-family: Poppins;
    font-size: 22px;
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
    font-size: 22px;
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

.upcomming-exam-card {
    width: 50vh;
    height: 15vh;
    border-radius: 10px;
    border: 2px solid rgba(23, 55, 110, 0.10);
    box-shadow: 0px 5px 8px 0px rgba(0, 0, 0, 0.25);
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    gap: 1.5vh;
    cursor: pointer;
}

.up-exam-degree-name {
    color: var(--colour-secondary-2, #9AD6FF);
    font-family: Poppins;
    font-size: 22px;
    font-style: normal;
    font-weight: 600;
    line-height: normal;
}

.up-exam-semester {
    color: var(--colour-secondary-1, #17376E);
    font-family: Poppins;
    font-size: 14px;
    font-style: normal;
    font-weight: 600;
    line-height: normal;
    margin-bottom: 10px;
}

.up-exam-dates {
    font-family: Poppins;
    font-size: 12px;
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
</style>

<body>
    <div class="sar-dash-home">
        <div class="sar-dash-title">Dashboard</div>
        <div class="sar-dash-card-subsection-0">

            <div class="sar-dash-card-subsection-01">
                <div class="sar-dash-sucard-out">
                    <div class="sar-dash-card-subcard-img1">
                        <img src="<?=ROOT?>assets/dashboard-icons/student.png" alt="degree.icon" />
                    </div>
                    <div class="sar-dash-card-subcard-data">
                        <div class="sar-dash-card-subcard-data-title">Students</div>
                        <div class="sar-dash-card-subcard-data-value">200</div>
                    </div>
                </div>
            </div>

            <div class="sar-dash-card-subsection-01">
                <div class="sar-dash-sucard-out">
                    <div class="sar-dash-card-subcard-img1">
                        <img src="<?=ROOT?>assets/dashboard-icons/degree.png" alt="exam.icon" />
                    </div>
                    <div class="sar-dash-card-subcard-data">
                        <div class="sar-dash-card-subcard-data-title">Ongoing</br>Degrees</div>
                        <div class="sar-dash-card-subcard-data-value">04</div>
                    </div>
                </div>
            </div>
            <div class="sar-dash-card-subsection-01">
                <div class="sar-dash-sucard-out">
                    <div class="sar-dash-card-subcard-img1">
                        <img src="<?=ROOT?>assets/dashboard-icons/examination2.png" alt="exam.icon" />
                    </div>
                    <div class="sar-dash-card-subcard-data">
                        <div class="sar-dash-card-subcard-data-title">Ongoing</br>Examination</div>
                        <div class="sar-dash-card-subcard-data-value">04</div>
                    </div>
                </div>
            </div>
            <div class="sar-dash-card-subsection-01">
                <div class="sar-dash-sucard-out">
                    <div class="sar-dash-card-subcard-img1">
                        <img src="<?=ROOT?>assets/dashboard-icons/examination.png" alt="user.icon" />
                    </div>
                    <div class="sar-dash-card-subcard-data">
                        <div class="sar-dash-card-subcard-data-title">Results Published </br>Exminations</div>
                        <div class="sar-dash-card-subcard-data-value">04</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sar-dash-main">
            <div class="sar-dash-subsection-1-1">
                <div class="sar-dash-subsection-1-1-1">

                    <div class="sar-dash-subsection-1-1-1-1">
                        <div class="graph01-sub-title">
                            Statistics
                        </div>
                        <div class="graph01-title">
                            Course Participants
                        </div>

                        <div class="graph01">
                            <?php $this->view('components/graphs/bargraph-student-participation',$data) ?>
                        </div>
                    </div>
                    <div class="sar-dash-subsection-1-1-1-2">
                        <div class="graph02-title">
                            Participants
                        </div>
                        <div class="graph02-sub-title">
                            Gender
                        </div>
                        <div class="graph02">
                            <?php $this->view('components/graphs/piechart-gender',$data) ?>
                        </div>
                    </div>
                </div>
                <div class="sar-dash-subsection-1-1-1">
                    <div class="sar-dash-subsection-1-1-1-3">

                        <div class="graph03-title">
                            Students Performances
                        </div>
                        <div class="graph03">
                            <?php $this->view('components/graphs/bargraph-pass-students',$data) ?>
                        </div>
                    </div>
                </div>
                <div class="sar-dash-subsection-1-1-1">
                    <div class="sar-dash-subsection-1-1-1-4">
                        <div class="graph04-Exam-title">
                            Exam Name
                        </div>
                        <div class="graph04-title">
                            Student Performance
                        </div>
                        <div class="graph04-sub-title">
                            Degree Name
                        </div>
                        <div class="graph04">
                            <?php $this->view('components/graphs/piechart-student-results',$data) ?>
                        </div>
                    </div>
                    <div class="sar-dash-subsection-1-1-1-5">
                        <div class="sar-dash-sub-title">
                            Upcoming Examinations

                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="sar-dash-subsection-1-2">
                <div class="sar-dash-subsection-1-2-1">
                    <div class="sar-dash-subsection-1-1-2-1">
                        <div class="calender-title">
                            Academic Calender
                        </div>
                        <div class="calender-comp">
                            <?php $this->view('components/calender/calender',$data) ?>
                        </div>
                    </div>
                    <div class="sar-dash-subsection-1-1-2-2">
                        <div class="sar-dash-sub-title">
                            Recently Published Examination Results
                        </div>
                        <div class="exam-cards">
                            <?php $this->view('components/exam-card/exam-card',$data) ?>
                            <?php $this->view('components/exam-card/exam-card',$data) ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="sar-dash-subsection-2">
                <div class="sar-dash-subsection-21">
                    <div class="sar-dash-sub-title">
                        Sub title 2 </br>


                    </div>

                </div>
                <div class="sar-dash-subsection-22">
                    <div class="sar-dash-sub-title">
                        Sub title 3</br>

                    </div>

                </div>
            </div> -->
        </div>

        <div class="sar-dash-footer">
            <?php $this->view('components/footer/index',$data) ?>
        </div>
    </div>


</body>

</html>