<?php
$role = "SAR";
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
    <link rel="stylesheet" href="<?= ROOT ?>css/button.css">
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

    .dr-subsection-0 {
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

    .dr-subsection-01 {
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

    .dr-subcard-data {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }

    .dr-subcard-data-value {
        font-size: 38px;
        font-weight: 600;
        color: #17376E;
    }

    .dr-subcard-data-title {
        font-size: 18px;
        font-weight: 600;
        color: #17376E;
    }

    .dr-subsection-1 {
        background-color: var(--text-color);
        padding: 10px 10px 30px 35px;
        border-radius: 6px;
        margin: 7px 4px 7px 4px;
        min-height: 35vh;
    }

    .dr-sub-title {

        color: #17376E;
        font-family: Poppins;
        font-size: 22px;
        font-style: normal;
        font-weight: 600;
        margin: 40px;

    }

    .dr-subsection-2 {
        display: flex;
        flex-direction: row;
        justify-content: space-between;

        /* padding: 10px 10px 30px 35px; */
        /* border-radius: 6px; */
        /* margin: 7px 4px 7px 4px; */
    }

    .dr-subsection-21 {
        display: flex;
        flex-direction: column;
        background-color: var(--text-color);
        padding: 10px 10px 30px 35px;
        border-radius: 6px;
        margin: 3px 4px 7px 4px;
        width: 50%;
    }

    .dr-subsection-22 {
        background-color: var(--text-color);
        padding: 10px 10px 31px 35px;
        border-radius: 6px;
        margin: 3px 4px 7px 4px;
        width: 50%;
    }

    .dr-calender {
        display: flex;
        align-items: center;
        justify-content: center;

    }

    .dr-degree-bar {
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        flex-wrap: wrap;
        margin-bottom: 20px;
        justify-content: center;
    }

    .dr-card1 {
        display: flex;
        flex-direction: row;
        gap: 20px;
        flex-wrap: wrap;
        align-items: center;
        justify-content: center;
    }

    .dr-card2 {
        display: flex;
        flex-direction: column;
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
        display: flex;
        flex-direction: column;
    }

    .dr-exam-card2 {
        display: flex;
        flex-direction: column;
    }

    .dr-button {
        float: right;
        margin-right: 10vh;
    }

    .model-box {
        display: none;
        position: fixed;
        top: 10%;
        left: 35%;
    }

    .danger {
        border-color: red;
        border-width: 5px;
        border-style: groove;
        border-radius: 5px;
    }

    .degree-msg {
        font-size: 1.5vw;
        font-weight: 500;
        color: #17376E;
        margin: 20px;

    }
</style>

<body>
    <div class="dr-home">
        <div class="dr-title">Degree Program</div>
        <div class="dr-subsection-1">

            <div class="dr-sub-title">Ongoing Degree Programs</div>
            <div class="dr-degree-bar">

                <div class="dr-card1">
                    <?php foreach ($degrees as $degree): ?>
                        <?php if (!empty($degree->Status == "ongoing")): ?>

                            <div>
                                <?php $this->view('components/degree-card/degree-card', ["degree" => $degree]) ?>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="dr-subsection-1">
            <div class="dr-sub-title">Completed Degree Programs</div>
            <div class="dr-degree-bar">
                <div class="dr-card1">
                    <?php $degreeStatus = False; ?>
                    <?php foreach ($degrees as $degree): ?>
                        <div>
                            <?php if ((!empty($degree->Status == "completed"))): ?>
                                <?php
                                $this->view('components/degree-card/degree-card', ["degree" => $degree]);
                                $degreeStatus = True;
                                ?>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php if ($degreeStatus == False): ?>
                    <div class="degree-msg">No completed degree programs</div>
                <?php endif; ?>
            </div>
        </div>
        <div class="dr-footer">
            <?php $this->view('components/footer/index', $data) ?>
        </div>
    </div>
</body>

</html>