<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission-Login</title>
</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');

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

    .admission-login-card {
        display: flex;
        justify-content: center;
        align-items: center;
        fill: #FFF;
        stroke-width: 1px;
        stroke: rgba(0, 0, 0, 0.10);
        filter: drop-shadow(0px 4px 35px rgba(0, 0, 0, 0.08));
        width: 539px;
        height: 480px;
    }

    *,
    *:after,
    *:before {
        box-sizing: border-box;
    }

    body {
        font-family: 'Poppins', sans-serif;
        line-height: 1.5;
        width: 100%;
        color: #393232;
    }



    .card-list {
        display: flex;
        align-content: center;
        justify-content: center;
        width: 90%;
        max-width: 400px;
    }

    .card {
        display: flex;
        flex-direction: column;
        align-items: center;
        background-color: #FFF;
        border-radius: 15px;
        overflow: hidden;
        padding: 1.25rem;
        position: relative;
        transition: .15s ease-in;
        fill: #FFF;
        stroke-width: 1px;
        stroke: rgba(0, 0, 0, 0.10);
        filter: drop-shadow(0px 4px 35px rgba(0, 0, 0, 0.18));
        gap: 1rem;
        border: 1px solid var(--Grey, #DDE2E5);
    }



    .card-header {
        /* margin-top: 1.5rem; */
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;


        a {
            font-weight: 600;
            font-size: 1.375rem;
            line-height: 1.25;
            padding-right: 1rem;
            text-decoration: none;
            color: inherit;
            will-change: transform;

            &:after {
                content: "";
                position: absolute;
                left: 0;
                top: 0;
                right: 0;
                bottom: 0;
            }
        }


    }

    .nillis-log {
        display: flex;
        justify-content: center;
    }

    .admission-login-title {
        color: var(--black, #000);
        font-size: 18px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
    }

    .admission-login-subtitle {
        font-family: Poppins;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        margin-bottom: 30px;
    }

    .input-index {
        margin-top: 5px;
        width: 100%;
        padding: 0.5rem 0.75rem;
        /* height: 5vh; */
        border-radius: 8px;
        border: 1px solid #BEBEBE;
        background: #FFF;
        margin-bottom: 5px;
    }

    .login-input-title {

        font-size: 13px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        color: #000000;
        /* margin-left: 10px; */

    }

    .btn-primary {
        width: 100%;
        color: #fff;
        /* height: 4vh; */
        padding: 5px 5px 5px 5px;
        border-radius: 8px;
        background: #17376e;
        box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.2);
        border: 0px;
        margin-bottom: 10px;
        /* margin-top: 25px; */
    }

    .bt-name {
        font-size: 16px;
        font-weight: 500px;
    }

    .btn-primary:hover {
        color: #17376e;
        background-color: white;
        border: 1px solid
    }

    .login-btn {
        width: 100%;

    }

    .admisssion-card {
        display: flex;
        align-content: center;
        flex-direction: column;
        justify-content: center;
        /* Center horizontally */
        min-height: 70vh;
        /* This ensures the card is centered vertically */
        align-items: center;

    }

    .exam-create-footer {
        position: absolute;
        bottom: 0;
        width: 100%;

        background: #17376e;
        color: #fff;
        text-align: center;
        padding: 10px 0;
    }

    .error {
        color: red;
        font-size: 12px;
        font-weight: 400;
        line-height: normal;
    }

    .nilis-logo-login {
        width: 55px;
        height: 76.389px;
    }
</style>
<?php
$semester = $examDetails[0]->semester ?? null;
$degree = $degreeDetails[0]->DegreeShortName ?? null;



?>

<body>
    <div class="admisssion-card">
        <div class="card-list">
            <article class="card">

                <div class="card-header">
                    <div class="nillis-logo">
                        <img src="<?= ROOT ?>assets/NILIS-logo-2.png" alt="NILIS-logo" class="nilis-logo-login">
                    </div>

                </div>
                <div class="admission-login-title">
                    NILIS Examinations - Admission Card
                </div>
                <div class="admission-login-subtitle">
                    <span> Semester
                        <?= $semester ?>
                    </span> - <span>
                        <?= $degree ?>
                    </span>
                </div>
                <form method="POST">
                    <div class="admission-login-input">
                        <lable class="login-input-title">Enter your Index number</lable>
                        <input type="text" name="index" class="input-index" placeholder="Index Number"
                            value="<?php echo !empty($indexNo) ? $indexNo : ''; ?>">
                        <span class="error" hidden>Invalid Index Number</span>
                    </div>

                    <div class="login-btn">
                        <button class="btn-primary" type="submit" name='submit' value='submit'>Login</button>
                    </div>
                </form>
            </article>
        </div>
        <div class="exam-create-footer">
            <?php $this->view('components/footer/index', $data) ?>
        </div>
    </div>

</body>


</html>