<?php
$role = "Clerk";
$data['role'] = $role;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>css/dr/dr-styles.css">
    <title>Degree Programs</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

    .dr-degreeprograms-main.active {
        filter: blur(5px);
        pointer-events: none;
        user-select: none;
        overflow: hidden;
    }
    h3 {
        margin: 30px 30px;
        color: #000000;
    }

    form input {
        width: 100%;
        padding: 10px 5px;
        margin: 5px 0;
        border: 0;
        border-bottom: 1px solid #999;
        outline: none;
        background: transparent;
    }

    ::placeholder {
        color: #aca7a7;
    }

    form button {
        width: 110px;
        height: 35px;
        margin: 0 25px;
        background: var(--sidebar-color);
        border-radius: 30px;
        border: 0px;
        outline: none;
        color: var(--text-color);
        cursor: pointer;
    }
</style>

<body>
    <div class="dr-degreeprograms-main" id="dr-degreeprograms-body">
        <?php $this->view('components/navside-bar/header', $data) ?>
        <?php $this->view('components/navside-bar/sidebar', $data) ?>
        <?php $this->view('components/navside-bar/footer', $data) ?>
        <div class="dr-degreeprograms-home">
            <div class="dr-degreeprograms-title">Degree Program</div>
            <div class="dr-degreeprograms-subsection-1">

             
                <div class="dr-degreeprograms-sub-title">Ongoing Degree Programs</div>
                <div class="dr-degreeprograms-degree-bar">
                    <?php if (!empty($degrees)) : ?>
                        <?php $ongoing_degrees_exist = false; ?>
                        <?php foreach ($degrees as $degree) : ?>
                            <?php if ($degree->Status == "ongoing") : ?>
                                <?php $ongoing_degrees_exist = true; ?>
                                <div class="dr-degreeprograms-card1">
                                    <a href="<?= ROOT ?>clerk/degreeprofile?id=<?= $degree->DegreeID ?>" style="text-decoration: none;">
                                        <?php $this->view('components/degree-card/degree-card', ["degree" => $degree]) ?>
                                    </a>
                                </div>
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
            <div class="dr-degreeprograms-subsection-1">
                <div class="dr-degreeprograms-sub-title">Completed Degree Programs</div>
                <div class="dr-degreeprograms-degree-bar">
                    <?php if (!empty($degrees)) : ?>
                        <?php $completed_degrees_exist = false; ?>
                        <?php foreach ($degrees as $degree) : ?>
                            <?php if ($degree->Status == "completed") : ?>
                                <?php $completed_degrees_exist = true; ?>
                                <div class="dr-degreeprograms-card1">
                                    <a href="<?= ROOT ?>clerk/degreeprofile?id=<?= $degree->DegreeID ?>" style="text-decoration: none;">
                                        <?php $this->view('components/degree-card/degree-card', ["degree" => $degree]) ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <?php if (!$completed_degrees_exist) : ?>
                            <p>No data found under the completed diploma program.</p>
                        <?php endif; ?>
                    <?php else : ?>
                        <p>No data found for the diploma program.</p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="dr-footer">
                <?php $this->view('components/footer/index', $data) ?>
            </div>
        </div>
</body>

</html>