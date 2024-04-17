<?php
    $role = "DR";
    $data['role'] = $role;
?>
<?php $this->view('components/navside-bar/degreeprogramsidebar',$data) ?>
<?php $this->view('components/navside-bar/footer',$data) ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Attendance</title>
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
.dr-attendance-home {
    /* height: 100vh; */
    left: 250px;
    position: relative;
    width: calc(100% - 250px);
    transition: var(--tran-05);
    background: var(--body-color);
}
.dr-attendance-title {
    font-size: 30px;
    font-weight: 600;
    color: black;
    padding: 10px 0px 10px 32px;
    background-color: var(--text-color);
    border-radius: 6px;
    margin: 7px 4px 7px 4px;
}
.sidebar.close~.dr-attendance-home {
    left: 88px;
    width: calc(100% - 88px);
}
.dr-attendance-subsection-1 {
    background-color: var(--text-color);
    padding: 10px 10px 30px 35px;
    border-radius: 6px;
    margin: 7px 4px 7px 4px;
    min-height: 72vh;
}
</style>
<body>
    <div class="dr-attendance-home">
        <div class="dr-attendance-title">Attendance</div>
        <div class="dr-attendance-subsection-1"></div>

        <div class="dr-attendance-temp3-footer">
            <?php $this->view('components/footer/index',$data) ?>
        </div>
    </div>
</body>
</html>