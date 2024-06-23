<?php
$role = "Admin";
$data['role'] = $role;
$data['recentResults'] = $RecentResultExam;
?>

<?php $this->view('components/navside-bar/header', $data) ?>
<?php $this->view('components/navside-bar/sidebar', $data) ?>
<?php $this->view('components/navside-bar/footer', $data) ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="./admin-dashboard.css"> -->
    <title>Admin Dashboard</title>
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

    .admin-home {
        height: 100vh;
        left: 250px;
        position: relative;
        width: calc(100% - 250px);
        transition: var(--tran-05);
        background: var(--body-color);
    }

    .admin-title {
        font-size: 30px;
        font-weight: 600;
        color: black;
        padding: 10px 0px 10px 32px;
        background-color: var(--text-color);
        border-radius: 6px;
        margin: 7px 4px 7px 4px;
    }

    .sidebar.close~.admin-home {
        left: 88px;
        width: calc(100% - 88px);
    }

    .admin-subsection-0 {
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

    .admin-subsection-01 {
        display: flex;
        padding: 15px 30px 14px 30px;
        justify-content: center;
        align-items: center;
        border-radius: 10px;
        border: 1px solid rgba(0, 0, 0, 0.12);
        background-color: var(--text-color);
        box-shadow: 0px 10px 25px 0px rgba(0, 0, 0, 0.12);
        width: 20vw;
        height: 150px;
        flex-direction: row;
        gap: 40px;
    }

    .admin-subcard-data {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }

    .admin-subcard-data-value {
        font-size: 3vw;
        font-weight: 600;
        color: #17376E;
    }

    .admin-subcard-data-title {
        font-size: 1.5vw;
        font-weight: 600;
        color: #17376E;
        text-align: center;
    }

    .admin-subsection-1 {
        background-color: var(--text-color);
        padding: 10px 10px 30px 35px;
        border-radius: 6px;
        margin: 7px 4px 7px 4px;
    }

    .admin-sub-title {

        color: #17376E;
        font-family: Poppins;
        font-size: 22px;
        font-style: normal;
        font-weight: 600;
        margin: 40px;

    }

    .admin-subsection-2 {
        display: flex;
        flex-direction: row;
        justify-content: space-between;

        /* padding: 10px 10px 30px 35px; */
        /* border-radius: 6px; */
        /* margin: 7px 4px 7px 4px; */
    }

    .admin-subsection-21 {
        display: flex;
        flex-direction: column;
        background-color: var(--text-color);
        padding: 10px 10px 30px 35px;
        border-radius: 6px;
        margin: 3px 4px 7px 4px;
        width: 50%;
    }

    .admin-subsection-22 {
        background-color: var(--text-color);
        padding: 10px 10px 31px 35px;
        border-radius: 6px;
        margin: 3px 4px 7px 4px;
        width: 50%;
    }

    .admin-calender {
        display: flex;
        align-items: center;
        justify-content: center;

    }

    .admin-degree-bar {
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        flex-wrap: wrap;
        margin-bottom: 20px;
    }

    .admin-card1 {
        display: flex;
        flex-direction: row;
        gap: 90px;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        margin: 20px 0px 20px 0px;
    }

    .admin-card2 {
        display: flex;
        flex-direction: column;
    }

    .admin-exam-bar {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        flex-wrap: nowrap;
        gap: 30px;
    }

    .admin-exam-card1 {
        width: 80%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }

    .admin-exam-card2 {
        width: 80%;
        display: flex;
        flex-direction: column;
    }

    .admin-subcard-img1 {
        width: 15vw;
        height: 15vw;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .result-msg {
        font-size: 20px;
        font-weight: 600;
        color: #17376E;
        text-align: center;

    }
</style>

<body>
    <div class="admin-home">
        <div class="admin-title">Admin Dashboard</div>
        <div class="admin-subsection-0">
            <div class="admin-subsection-01">
                <div class="admin-subcard-img1">
                    <img src="<?= ROOT ?>assets/dashboard-icons/degree.png" alt="degree.icon" />
                </div>
                <div class="admin-subcard-data">
                    <div class="admin-subcard-data-title">Ongoing Diploma</div>
                    <div class="admin-subcard-data-value"> <?php if (!empty($ongoing_degrees)): ?>
                            <?php echo count($ongoing_degrees) ?>
                        <?php else: ?>
                            0
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="admin-subsection-01">
                <div class="admin-subcard-img1">
                    <img src="<?= ROOT ?>assets/dashboard-icons/examination.png" alt="exam.icon" />
                </div>
                <div class="admin-subcard-data">
                    <div class="admin-subcard-data-title">Ongoing Examination</div>
                    <div class="admin-subcard-data-value"><?php if (!empty($ongoing_exam)): ?>

                            <?php echo count($ongoing_degrees) ?>
                        <?php else: ?>
                            0
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="admin-subsection-01">
                <div class="admin-subcard-img1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="72" height="68" viewBox="0 0 72 68" fill="none">
                        <g clip-path="url(#clip0_1225_7712)">
                            <path
                                d="M22.2375 34.0001C18.1875 34.1251 14.875 35.7251 12.3 38.8001H7.275C5.225 38.8001 3.5 38.2938 2.1 37.2813C0.7 36.2688 0 34.7876 0 32.8376C0 24.0126 1.55 19.6001 4.65 19.6001C4.8 19.6001 5.34375 19.8626 6.28125 20.3876C7.21875 20.9126 8.4375 21.4439 9.9375 21.9814C11.4375 22.5189 12.925 22.7876 14.4 22.7876C16.075 22.7876 17.7375 22.5001 19.3875 21.9251C19.2625 22.8501 19.2 23.6751 19.2 24.4001C19.2 27.8751 20.2125 31.0751 22.2375 34.0001ZM62.4 57.8875C62.4 60.8875 61.4875 63.2563 59.6625 64.9938C57.8375 66.7313 55.4125 67.6 52.3875 67.6H19.6125C16.5875 67.6 14.1625 66.7313 12.3375 64.9938C10.5125 63.2563 9.6 60.8875 9.6 57.8875C9.6 56.5625 9.64375 55.2688 9.73125 54.0063C9.81875 52.7438 9.99375 51.3813 10.2563 49.9188C10.5188 48.4563 10.85 47.1001 11.25 45.8501C11.65 44.6001 12.1875 43.3813 12.8625 42.1938C13.5375 41.0063 14.3125 39.9938 15.1875 39.1563C16.0625 38.3188 17.1313 37.6501 18.3938 37.1501C19.6562 36.6501 21.05 36.4001 22.575 36.4001C22.825 36.4001 23.3625 36.6688 24.1875 37.2063C25.0125 37.7438 25.925 38.3438 26.925 39.0063C27.925 39.6688 29.2625 40.2688 30.9375 40.8063C32.6125 41.3438 34.3 41.6126 36 41.6126C37.7 41.6126 39.3875 41.3438 41.0625 40.8063C42.7375 40.2688 44.075 39.6688 45.075 39.0063C46.075 38.3438 46.9875 37.7438 47.8125 37.2063C48.6375 36.6688 49.175 36.4001 49.425 36.4001C50.95 36.4001 52.3438 36.6501 53.6063 37.1501C54.8688 37.6501 55.9375 38.3188 56.8125 39.1563C57.6875 39.9938 58.4625 41.0063 59.1375 42.1938C59.8125 43.3813 60.35 44.6001 60.75 45.8501C61.15 47.1001 61.4813 48.4563 61.7438 49.9188C62.0063 51.3813 62.1813 52.7438 62.2688 54.0063C62.3563 55.2688 62.4 56.5625 62.4 57.8875ZM24 10.0001C24 12.6501 23.0625 14.9126 21.1875 16.7876C19.3125 18.6626 17.05 19.6001 14.4 19.6001C11.75 19.6001 9.4875 18.6626 7.6125 16.7876C5.7375 14.9126 4.8 12.6501 4.8 10.0001C4.8 7.35013 5.7375 5.08764 7.6125 3.21264C9.4875 1.33764 11.75 0.400146 14.4 0.400146C17.05 0.400146 19.3125 1.33764 21.1875 3.21264C23.0625 5.08764 24 7.35013 24 10.0001ZM50.4 24.4001C50.4 28.3751 48.9938 31.7688 46.1813 34.5813C43.3688 37.3938 39.975 38.8001 36 38.8001C32.025 38.8001 28.6313 37.3938 25.8188 34.5813C23.0063 31.7688 21.6 28.3751 21.6 24.4001C21.6 20.4251 23.0063 17.0314 25.8188 14.2189C28.6313 11.4064 32.025 10.0001 36 10.0001C39.975 10.0001 43.3688 11.4064 46.1813 14.2189C48.9938 17.0314 50.4 20.4251 50.4 24.4001ZM72 32.8376C72 34.7876 71.3 36.2688 69.9 37.2813C68.5 38.2938 66.775 38.8001 64.725 38.8001H59.7C57.125 35.7251 53.8125 34.1251 49.7625 34.0001C51.7875 31.0751 52.8 27.8751 52.8 24.4001C52.8 23.6751 52.7375 22.8501 52.6125 21.9251C54.2625 22.5001 55.925 22.7876 57.6 22.7876C59.075 22.7876 60.5625 22.5189 62.0625 21.9814C63.5625 21.4439 64.7812 20.9126 65.7188 20.3876C66.6562 19.8626 67.2 19.6001 67.35 19.6001C70.45 19.6001 72 24.0126 72 32.8376ZM67.2 10.0001C67.2 12.6501 66.2625 14.9126 64.3875 16.7876C62.5125 18.6626 60.25 19.6001 57.6 19.6001C54.95 19.6001 52.6875 18.6626 50.8125 16.7876C48.9375 14.9126 48 12.6501 48 10.0001C48 7.35013 48.9375 5.08764 50.8125 3.21264C52.6875 1.33764 54.95 0.400146 57.6 0.400146C60.25 0.400146 62.5125 1.33764 64.3875 3.21264C66.2625 5.08764 67.2 7.35013 67.2 10.0001Z"
                                fill="#17376E" />
                        </g>
                        <defs>
                            <clipPath id="clip0_1225_7712">
                                <rect width="72" height="67.1999" fill="white" transform="translate(0 0.400146)" />
                            </clipPath>
                        </defs>
                    </svg>
                </div>
                <div class="admin-subcard-data">
                    <div class="admin-subcard-data-title">Users</div>
                    <div class="admin-subcard-data-value"><?php if (!empty($users)): ?>
                            <?php echo count($users) ?>
                        <?php else: ?>
                            0
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="admin-subsection-1">
            <div class="admin-sub-title">
                Ongoing Diploma Programs
            </div>
            <div class="admin-degree-bar">
                <div class="admin-card1">
                    <?php if (!empty($ongoing_degrees)): ?>
                        <?php foreach ($ongoing_degrees as $degree): ?>
                            <div>
                                <?php $this->view('components/degree-card/degree-card', ["degree" => $degree]) ?>
                            </div>


                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="admin-sub-title">No On Going Diploma Program Created Yet</div>
                    <?php endif; ?>

                    </a>




                </div>



            </div>

        </div>
        <div class="admin-subsection-2">
            <div class="admin-subsection-21">
                <div class="admin-sub-title">
                    Recently Published Examination Results
                </div>
                <div class="admin-exam-bar">
                    <div class="admin-exam-card1">

                        <?php if (!empty($RecentResultExam)): ?>
                            <?php foreach ($RecentResultExam as $exam): ?>
                                <?php

                                $data['exam'] = $exam;
                                $this->view('components/exam-card/exam-card', $data);

                                ?>
                            <?php endforeach; ?>
                        <?php else: ?>

                            <div class="result-msg">
                                No Results Published
                            </div>
                            < <?php endif; ?>
                    </div>
                </div>


            </div>
            <div class="admin-subsection-22">
                <div class="admin-sub-title">
                    Academic Calender
                </div>
                <div class="admin-calender">
                    <?php $this->view('components/calender/calender', $data) ?>

                </div>
            </div>
        </div>
        <div class="admin-footer">
            <?php $this->view('components/footer/index', $data) ?>

        </div>
    </div>

</body>

</html>