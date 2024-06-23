<?php
$role = "director";
$data['role'] = $role;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>css/create-degree.css">
    <title>Degree programs</title>
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
        min-height: 40vh;
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
        display: flex;
        margin-bottom: 4px;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
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

    .degree-msg {
        font-size: 20px;
        text-align: center;
    }
</style>

<body>
    <div class="main" id="body">
        <?php $this->view('components/navside-bar/header', $data) ?>
        <?php $this->view('components/navside-bar/sidebar', $data) ?>
        <?php $this->view('components/navside-bar/footer', $data) ?>
        <div class="dr-home">
            <div class="dr-title">Diploma Program</div>
            <div class="dr-subsection-1">

                <div class="dr-sub-title">Ongoing Diploma Programs</div>
                <div class="dr-degree-bar">

                    <div class="dr-card1">
                        <?php if (!empty($degrees)): ?>
                            <?php foreach ($degrees as $degree): ?>
                                <?php if (!empty($degree->Status == "ongoing")): ?>

                                    <div>
                                        <?php $this->view('components/degree-card/degree-card', ["degree" => $degree]) ?>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="degree-msg"> No ongoing Diploma programs</div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="dr-subsection-1">
                <div class="dr-sub-title">Completed Diploma Programs</div>
                <div class="dr-degree-bar">
                    <div class="dr-card1">
                        <?php $degreeStatus = False; ?>
                        <?php if (!empty($degrees)): ?>
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
                        <?php endif; ?>
                    </div>
                </div>
                <?php if ($degreeStatus == False): ?>
                    <div class="degree-msg">No completed Diploma programs</div>
                <?php endif; ?>
            </div>
            <div class="dr-footer">
                <?php $this->view('components/footer/index', $data) ?>
            </div>
        </div>
</body>

</html>