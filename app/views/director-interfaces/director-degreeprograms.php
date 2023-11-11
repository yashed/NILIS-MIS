<?php
    $role = "Director";
    $data['role'] = $role;
?>
<?php $this->view('components/navside-bar/header',$data) ?>
<?php $this->view('components/navside-bar/sidebar',$data) ?>
<?php $this->view('components/navside-bar/footer',$data) ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="<?=ROOT?>css/button.css">
        <link rel="stylesheet" href="<?=ROOT?>css/create-degree.css">
        <title>director Dashboard</title>
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
.director-home {
    height: 100vh;
    left: 250px;
    position: relative;
    width: calc(100% - 250px);
    transition: var(--tran-05);
    background: var(--body-color);
}
.director-title {
    font-size: 30px;
    font-weight: 600;
    color: black;
    padding: 10px 0px 10px 32px;
    background-color: var(--text-color);
    border-radius: 6px;
    margin: 7px 4px 7px 4px;
}
.sidebar.close~.director-home {
    left: 88px;
    width: calc(100% - 88px);
}
.director-subsection-1 {
    background-color: var(--text-color);
    padding: 10px 10px 30px 35px;
    border-radius: 6px;
    margin: 7px 4px 7px 4px;
}
.director-sub-title {
    color: #17376E;
    font-family: Poppins;
    font-size: 22px;
    font-style: normal;
    font-weight: 600;
    margin : 40px;
}
.director-degree-bar {
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    flex-wrap: wrap;
    margin-bottom: 20px;
}
.director-card1 {
    margin-bottom: 4px;
}
.director-exam-bar {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    flex-wrap: nowrap;
    gap:30px;
}
.director-exam-card1{
    margin-bottom: 5px;
}
.model-box{
    display: none;
    position: fixed;
    top:10%;
    left: 35%;
}
.danger{
    border-color: red;
    border-width: 5px;
    border-style: groove;
    border-radius: 5px;
}
    </style>
    <body>
    <div class="director-home">
        <div class="director-title">Degree Program</div>
        <div class="director-subsection-1">
            <div class="director-sub-title">Ongoing Degree Programs</div>
            <div class="director-degree-bar">
                <?php $count = 0; ?>
                <?php foreach($degrees as $degree): ?>
                    <div class="director-card1">
                        <a href="<?=ROOT?>director/degreeprofile" style="text-decoration: none;">
                            <?php $this->view('components/degree-card/degree-card', ["degree" => $degree]) ?>
                        </a>
                    </div>
                    <?php $count++; ?>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="director-subsection-1">
            <div class="director-sub-title">Completed Degree Programs</div>
                    <p>Completed Degree Programs are not yet.</p>
        </div>
        <div class="director-footer">
        <?php $this->view('components/footer/index',$data) ?>
        </div>
    </div>
    </body>
</html>