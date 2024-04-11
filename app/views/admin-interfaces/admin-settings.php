<?php
$role = "Admin";
$data['role'] = $role;

?>

<?php $this->view('components/navside-bar/degreeprogramsidebar', $data) ?>
<?php $this->view('components/navside-bar/footer', $data) ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>temp3 Dashboard</title>

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

    .temp3-home {
        height: auto;
        left: 250px;
        position: relative;
        width: calc(100% - 250px);
        transition: var(--tran-05);
        background: var(--body-color);
    }

    .temp3-title {
        font-size: 1.8vw;
        font-weight: 500;
        color: black;
        padding: 10px 0px 10px 32px;
        background-color: var(--text-color);
        border-radius: 6px;
        margin: 7px 4px 7px 4px;
    }

    .sidebar.close~.temp3-home {
        left: 88px;
        width: calc(100% - 88px);
    }




    .temp3-subsection-1 {
        background-color: var(--text-color);
        padding: 10px 10px 30px 35px;
        border-radius: 6px;
        margin: 7px 4px 7px 4px;
        height: auto;
    }

    .temp3-sub-title {

        color: #17376E;
        font-family: Poppins;
        font-size: 1.5vw;
        font-style: normal;
        font-weight: 600;
        padding-top: 1vw;
        padding-bottom: 1vw;
        padding-left: 5vw;
    }

</style>

<body>
    <div class="temp3-home">
        <div class="temp3-title">Settings</div>
        <div class="temp3-subsection-1">
            <div class="temp3-sub-title">
                Account Settings
                </div>
                <?php $this->view('common/settings/settings', $data) ?>

           </div>

        <div class="temp3-footer">
            <?php $this->view('components/footer/index', $data) ?>
        </div>

</body>

</html>