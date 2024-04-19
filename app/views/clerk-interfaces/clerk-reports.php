<?php
    $role = "Clerk";
    $data['role'] = $role;
?>
<?php $this->view('components/navside-bar/degreeprogramsidebar',$data) ?>
<?php $this->view('components/navside-bar/footer',$data) ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reports</title>
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
.reports-home {
    height: 100vh;
    left: 250px;
    position: relative;
    width: calc(100% - 250px);
    transition: var(--tran-05);
    background: var(--body-color);
}
.reports-title {
    font-size: 30px;
    font-weight: 600;
    color: black;
    padding: 10px 0px 10px 32px;
    background-color: var(--text-color);
    border-radius: 6px;
    margin: 7px 4px 7px 4px;
}
.sidebar.close~.reports-home {
    left: 88px;
    width: calc(100% - 88px);
}
.reports-subsection-1 {
    background-color: var(--text-color);
    padding: 30px 10px 30px 35px;
    border-radius: 6px;
    margin: px 4px 7px 4px;
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    flex-wrap: wrap;
}
.report-card-1 {
    display: flex;
    flex-direction: column;
    width: 300px;
    height: 187px;
    flex-shrink: 0;
    justify-content: center;
    align-items: center;
    box-shadow: 4px 7px 9px 0px rgba(0, 0, 0, 0.08);
    border-radius: var(--border-radius-md, 8px);
    border: 3px solid rgba(0, 0, 0, 0.05);
    background: var(--colour-primary, #FFF);
    margin-bottom: 5px;
}
.report-card-1 img {
    margin: 0 auto;
}
.report-card-1 p {
    text-align: center;
    margin-top: 13px;
}
</style>
<body>
    <div class="reports-home">
        <div class="reports-title">Reports</div>
        <div class="reports-subsection-1">
            <div class="report-card-1">
                <img src="<?=ROOT?>assets/dr/Group.png">
                <p>1st semester examination results</p>
            </div>
            <div class="report-card-1">
                <img src="<?=ROOT?>assets/dr/Group.png">
                <p>2nd semester examination results</p>
            </div>
            <div class="report-card-1">
                <img src="<?=ROOT?>assets/dr/Group.png">
                <p>3rd semester examination results</p>
            </div>
            <div class="report-card-1">
                <img src="<?=ROOT?>assets/dr/Group.png">
                <p>4th semester examination results</p>
            </div>
        </div>
        <div class="reports-footer">
            <?php $this->view('components/footer/index',$data) ?>
        </div>
</body>
</html>