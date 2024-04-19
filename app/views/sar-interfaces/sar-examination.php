<?php
$role = "SAR";
$data['role'] = $role;

?>

<?php $this->view('components/navside-bar/degreeprogramsidebar', $data) ?>
<?php $this->view('components/navside-bar/footer', $data) ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examination</title>
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

    .exam-home {

        left: 250px;
        position: relative;
        width: calc(100% - 250px);
        transition: var(--tran-05);
        background: var(--body-color);
    }

    .exam-title {
        font-size: 30px;
        font-weight: 600;
        color: black;
        padding: 10px 0px 10px 32px;
        background-color: var(--text-color);
        border-radius: 6px;
        margin: 7px 4px 7px 4px;
    }

    .sidebar.close~.exam-home {
        left: 88px;
        width: calc(100% - 88px);
    }

    .exam-subsection-0 {
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

    .exam-subsection-01 {
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

    .exam-subcard-data {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }

    .exam-subcard-data-value {
        font-size: 38px;
        font-weight: 600;
        color: #17376E;
    }

    .exam-subcard-data-title {
        font-size: 18px;
        font-weight: 600;
        color: #17376E;
    }

    .exam-subsection-1 {
        background-color: var(--text-color);
        padding: 10px 50px 30px 35px;
        border-radius: 6px;
        margin: 7px 4px 7px 4px;
    }

    .exam-sub-title {

        color: #17376E;
        font-family: Poppins;
        font-size: 22px;
        font-style: normal;
        font-weight: 600;
        margin: 40px;

    }

    .exam-subsection-2 {
        display: flex;
        flex-direction: row;
        justify-content: space-between;

        /* padding: 10px 10px 30px 35px; */
        /* border-radius: 6px; */
        /* margin: 7px 4px 7px 4px; */
    }

    .exam-subsection-21 {
        display: flex;
        flex-direction: column;
        background-color: var(--text-color);
        padding: 10px 10px 30px 35px;
        border-radius: 6px;
        margin: 3px 4px 7px 4px;
        width: 50%;
    }

    .exam-subsection-22 {
        background-color: var(--text-color);
        padding: 10px 10px 31px 35px;
        border-radius: 6px;
        margin: 3px 4px 7px 4px;
        width: 50%;
    }

    .exam-calender {
        display: flex;
        align-items: center;
        justify-content: center;

    }

    .exam-degree-bar {
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        flex-wrap: wrap;
        margin-bottom: 20px;
    }

    .exam-card1 {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 35%;
    }

    .exam-card-content {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
    }

    .exam-card2 {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        width: 70%;
        gap: 10px;
    }

    .exam-card3 {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        width: 70%;
    }

    .exam-exam-bar {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        flex-wrap: nowrap;
        gap: 30px;
    }



    .exam-create-dropdown {
        width: 15vw;
    }

    .exam-create-dropdown-content {

        display: none;
        position: absolute;
        background-color: #fff;
        border: 1px solid rgba(23, 55, 110, 0.46);
        box-shadow: 0px 8px 11px 0px rgba(0, 0, 0, 0.15);
        border-radius: 12px;
        width: 15vw;
        z-index: 1;

    }

    .exam-create-dropdown-content a {

        font-size: 1vw;
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        font-weight: 400;
        text-align: center;
    }

    .exam-create-dropdown-content a:hover {
        background-color: #E0E0E0;
        border-radius: 12px;
    }

    .exam-create-dropdown:hover .exam-create-dropdown-content {
        display: block;
    }

    button {
        width: 100%;
        color: #fff;
        padding: 0.5em 1em 0.5em 1em;
        border-radius: 8px;
        background: #17376e;
        box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.2);
        border: 0px;
        margin-bottom: 10px;
        /* margin-top: 25px; */
        flex-wrap: wrap;
    }

    .bt-name {
        font-size: 1vw;
        font-weight: 500px;
    }

    button:hover {
        color: #17376e;
        background-color: white;
        border: 1px solid var(--colour-secondary-1, #17376e);
    }

    .exam-subsection-1-titlebar {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
    }

    .exam-msg {
        font-size: 1.5vw;
        font-weight: 600;
        color: #17376E;
        text-align: center;
        padding: 60px;


    }

    .btn-marksheet-name {
        font-size: 1vw;
        font-weight: 500px;
        height: 80px;
    }

    .exam-footer {
        position: relative;
        bottom: 0;
        width: 100%;
    }
</style>

<body>
    <div class="exam-home">
        <div class="exam-title">Examination</div>
        <div class="exam-subsection-1">
            <div class="exam-subsection-1-titlebar">
                <div class="exam-sub-title">
                    Upcoming Examination
                </div>
                <div class="exam-create-dropdown">
                    <a href="<?= ROOT ?>sar/examination/create/0">
                        <button class="dropbtn">
                            <div class="bt-name">Create Examination</div>
                        </button>
                    </a>
                    <!-- <div class="exam-create-dropdown-content">
                        <a href="<?= ROOT ?>sar/examination/create/1">Normal Examination</a>

                        <a href="#">Special Examination</a>
                    </div> -->
                </div>
            </div>
            <div class="exam-degree-bar">
                <div class="exam-card1">
                    <!--Need to change this login upcomming examinations -->
                    <div class="exam-msg">No upcomming Examination</div>

                </div>
            </div>
        </div>
        <div class="exam-subsection-2">
            <div class="exam-subsection-21">
                <div class="exam-sub-title">
                    Ongoing Examination

                </div>
                <div class="exam-card-content">
                    <div class="exam-card2">
                        <?php $ongoingExam = false ?>
                        <?php if (!empty($examDetails)): ?>
                            <?php foreach ($examDetails as $exam): ?>
                                <?php if ($exam->status == 'ongoing'): ?>
                                    <?php
                                    $data['exam'] = $exam;
                                    $ongoingExam = true;
                                    ?>
                                    <?php $this->view('components/exam-card/exam-card', $data) ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <?php if (!$ongoingExam): ?>
                            <div class='exam-msg'>No Ongoing examination</div>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
            <div class="exam-subsection-22">
                <div class="exam-sub-title">
                    Completed Examination
                </div>
                <div class="exam-card-content">
                    <div class="exam-card3">
                        <?php $completeExam = false; ?>
                        <?php if (!empty($examDetails)): ?>
                            <?php foreach ($examDetails as $exam): ?>
                                <?php if ($exam->status == 'completed'): ?>
                                    <?php
                                    $data['exam'] = $exam;
                                    $completeExam = true;
                                    ?>
                                    <?php $this->view('components/exam-card/exam-card', $data) ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <?php if (!$completeExam): ?>
                            <div class='exam-msg'>No Completed examination</div>
                        <?php endif; ?>
                    </div>
                </div>


            </div>
        </div>
        <div class="exam-footer">
            <?php $this->view('components/footer/index', $data) ?>
        </div>
    </div>


</body>

</html>