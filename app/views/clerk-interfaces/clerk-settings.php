<?php
$role = "Clerk";
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

    .flex {
        display: flex;
        flex-direction: row;
        padding-top: 0.4vw;
        padding-right: 11vw;

    }

    .name {


        flex-direction: column;
        align-items: baseline;
        row-gap: 10px;
        padding-left: 5vw;
        padding-bottom: 2vw;


    }

    .name img {
        padding-left: 2vw;
        width: 15vw;
        height: 12vw;

    }

    .student-name {
        /* padding-right: 30vw; */
        flex: 60%;

        font-size: 1.2vw;
        font-weight: 600;
    }

    .admission-button {

        background-color: #ffffff;
        border: 1px solid #17376E;
        color: #17376E;
        text-decoration: none;
        padding-top: 0.2vw;
        text-align: center;

        border-radius: 5px;
        cursor: pointer;

        font-size: 0.8vw;
        margin-right: 2vw;
        /* width: 12vw; */
        flex: 10%;

    }

    .admission-button2 {
        /* padding: 0.5% 0.5% 0.5% 1%; */
        background-color: #17376E;
        color: #fff;
        text-decoration: none;
        padding-top: 0.2vw;
        text-align: center;

        border: none;
        border-radius: 5px;
        cursor: pointer;

        font-size: 0.8vw;
        /* width: 12vw; */
        flex: 10%;
    }

    input[type=text],
    select {
        width: 100%;
        padding: 12px 20px;
        margin: 4px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        height: 2vw;
        font-size: 0.8vw;

    }

    .user-data {
        display: flex;
        gap: 30px;
        flex-direction: row;
        padding-right: 11vw;
        padding-left: 5vw;


    }

    .column-01 {
        display: flex;
        flex-direction: column;
        width: 37vw;
    }

    .column-02 {
        display: flex;
        flex-direction: column;
        width: 37vw;
    }

    .form-element1 {
        width: 100%;
    }

    .form-element2 {
        width: 100%;
    }

    .form-element3 {

        padding-right: 11vw;
        padding-left: 5vw;
    }

    .form-element4 {

        padding-right: 11vw;
        padding-left: 5vw;
    }

    .temp2-footer {
        margin-top: auto;
    }

    .label-name {
        color: #17376E;
        font-weight: 500;
        font-size: 0.9vw;
    }
</style>

<body>
    <div class="temp3-home">
        <div class="temp3-title">Settings</div>
        <div class="temp3-subsection-1">
            <div class="temp3-sub-title">
                Account Settings

            </div>


            <div class=name>
                <img src="<?= ROOT ?>assets/dr/imgano.png">
                <!-- <p><h2><?= $student->name ?></h2></p> -->
                <div class="flex">
                    <div class="student-name">
                        <p>
                            Senudi Disakya Muthugala
                        </p>
                    </div>
                    <a href="your_file_path_here.pdf" class="admission-button" download>Cancel</a>
                    <a href="your_file_path_here.pdf" class="admission-button2" download>Save</a>
                </div>

            </div>
            <div class="user-data">
                <div class="column-01">
                    <div class="form-element1">
                        <label for="fname">
                            <div class="label-name">First Name</div>
                        </label>
                        <input type="text" placeholder="Enter" id="fname">
                    </div>
                </div>
                <div class="column-02">
                    <div class="form-element2">
                        <label for="lname">
                            <div class="label-name">Last Name</div>
                        </label>
                        <input type="text" placeholder="Enter" id="fname">
                    </div>
                </div>
            </div>
            <div class="form-element3">
                <label for="email">
                    <div class="label-name">Email</div>
                </label>
                <input type="text" placeholder="Enter" id="email">
            </div>
            <div class="form-element4">
                <label for="role">
                    <div class="label-name">Role</div>
                </label>
                <input type="text" placeholder="Enter" id="role">

            </div>


        </div>

    </div>

    <div class="temp3-footer">
        <?php $this->view('components/footer/index', $data) ?>
    </div>

</body>

</html>