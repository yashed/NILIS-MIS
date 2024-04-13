<?php

$role = "Clerk";
$data['role'] = $role;

?>

<?php $this->view('components/navside-bar/header', $data) ?>
<?php $this->view('components/navside-bar/sidebar', $data) ?>
<?php $this->view('components/navside-bar/footer', $data) ?>

<!-- <?php 
$notificationCount = 0;
foreach ($notifications as $notification) {
    // Check if the notification is relevant to the clerk role
    if (($notification->type == 'Examination' && $notification->msg_type == 'Exam-start-alert') ||
        ($notification->type == 'Examination' && $notification->msg_type == 'Exam-end-alert') ||
        ($notification->type == 'Vacation' && $notification->msg_type == 'Vacation-start-alert') ||
        ($notification->type == 'Vacation' && $notification->msg_type == 'Vacation-end-alert') ||
        ($notification->type == 'Study leave' && $notification->msg_type == 'Studyleave-start-alert') ||
        ($notification->type == 'Study leave' && $notification->msg_type == 'Studyleave-end-alert')
    ) {
        $notificationCount++;
    }
}

// Pass the notification count to the degreeprogramsidebar component
$_SESSION['notificationCount'] = $notificationCount;

?> -->



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

            left: 250px;
            position: relative;
            width: calc(100% - 250px);
            transition: var(--tran-05);
            background: var(--body-color);
        }

        .temp3-title {
            font-size: 30px;
            font-weight: 600;
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

        .temp3-subsection-0 {
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

        .temp3-subsection-01 {
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

        .temp3-subcard-data {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .temp3-subcard-data-value {
            font-size: 38px;
            font-weight: 600;
            color: #17376E;
        }

        .temp3-subcard-data-title {
            font-size: 18px;
            font-weight: 600;
            color: #17376E;
        }

        .temp3-subsection-1 {
            background-color: var(--text-color);
            padding: 10px 10px 30px 35px;
            border-radius: 6px;
            margin: 7px 4px 7px 4px;

        }

        .temp3-sub-title {

            color: #17376E;
            font-family: Poppins;
            font-size: 22px;
            font-style: normal;
            font-weight: 600;
            margin: 40px;

        }



        /* .banner {
            margin-left: 1%;
            display: flex;
            width: 80%;
            height: 200px;
            background: #FFFFFF;
            border: 1px solid rgba(0, 0, 0, 0.1);
            box-shadow: 0px 7px 4px rgba(0, 0, 0, 0.02), 0px 3px 3px rgba(0, 0, 0, 0.03), 0px 1px 2px rgba(0, 0, 0, 0.03), 0px 0px 0px rgba(0, 0, 0, 0.03);
            border-radius: 8px;
        }

        .color-strip {
            width: 5px;
            height: 100%;
            background: #17376E;
            margin-right: 1%;
        }


        .content-container {
            display: flex;
            flex-direction: column;
            gap: 6px;
            width: 100%;
            height: 95%;
            padding-left: 1%;
            font-family: 'Poppins', sans-serif;
        }

        .note {
            width: 100%;
            height: 10px;
            font-style: normal;
            font-weight: 600;
            font-size: 25px;
            line-height: 24px;
            color: #17376E;
            padding-top: 35px;
            flex: 99%;

        }

        .development-message {
            width: 90%;
            height: 36px;
            font-family: 'Poppins', sans-serif;
            font-style: normal;
            font-weight: 400;
            font-size: 0.8vw;
            line-height: 18px;
            color: #292929;
            margin-left: 45px;
            margin-bottom: 0.3%;
            margin-top: 1%;
        }

        .buttons-container {
            display: flex;
            align-items: center;
            width: 100%;

        }

        .button1 {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0.5vw 1vw 0.5vw 1vw;
            width: 15%;
            height: 2vw;
            min-height: 20px;
            background: #FFFFFF;
            border: 1px solid #DCDEE4;
            border-radius: 8px;
            color: #333;
            font-size: 0.8vw;
            margin-left: 45px;
        }

        .button2 {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 8px 16px;
            gap: 12px;
            display: none;
            width: 113px;
            height: 40px;
            min-height: 40px;
            border-radius: 8px;
        }

        .flex {
            display: flex;
        }

        .image {
            margin-top: 30px;
            margin-right: 1%;
            flex: 1%;
        } */
    </style>
</head>

<body>
    <div class="temp3-home">
        <div class="temp3-title">Notifications</div>
        <div class="temp3-subsection-1">
            <?php if (!empty($notifications)) : ?>
                <?php foreach ($notifications as $notification) : ?>
                    <?php if ($notification->type == 'Examination' && $notification->msg_type == 'Exam-start-alert') : ?>
                        <?php
                        $data['role'] = "Clerk";
                        $this->view('components/notification-bar/notification-box', ["notification" => $notification, "role" => $data['role']]) ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>

            <?php if (!empty($notifications)) : ?>
                <?php foreach ($notifications as $notification) : ?>
                    <?php if ($notification->type == 'Examination' && $notification->msg_type == 'Exam-end-alert') : ?>
                        <?php
                        $data['role'] = "Clerk";
                        $this->view('components/notification-bar/notification-box', ["notification" => $notification, "role" => $data['role']]) ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>

            <?php if (!empty($notifications)) : ?>
                <?php foreach ($notifications as $notification) : ?>
                    <?php if ($notification->type == 'Vacation' && $notification->msg_type == 'Vacation-start-alert') : ?>
                        <?php
                        $data['role'] = "Clerk";
                        $this->view('components/notification-bar/notification-box', ["notification" => $notification, "role" => $data['role']]) ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>

            <?php if (!empty($notifications)) : ?>
                <?php foreach ($notifications as $notification) : ?>
                    <?php if ($notification->type == 'Vacation' && $notification->msg_type == 'Vacation-end-alert') : ?>
                        <?php
                        $data['role'] = "Clerk";
                        $this->view('components/notification-bar/notification-box', ["notification" => $notification, "role" => $data['role']]) ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>

            <?php if (!empty($notifications)) : ?>
                <?php foreach ($notifications as $notification) : ?>
                    <?php if ($notification->type == 'Study leave' && $notification->msg_type == 'Studyleave-start-alert') : ?>
                        <?php
                        $data['role'] = "Clerk";
                        $this->view('components/notification-bar/notification-box', ["notification" => $notification, "role" => $data['role']]) ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>

            <?php if (!empty($notifications)) : ?>
                <?php foreach ($notifications as $notification) : ?>
                    <?php if ($notification->type == 'Study leave' && $notification->msg_type == 'Studyleave-end-alert') : ?>
                        <?php
                        $data['role'] = "Clerk";
                        $this->view('components/notification-bar/notification-box', ["notification" => $notification, "role" => $data['role']]) ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>

            <?php if (!empty($notifications)) : ?>
                <?php foreach ($notifications as $notification) : ?>
                    <?php if ($notification->type == 'Study leave' && $notification->msg_type == 'Student_attendance_alert') : ?>
                        <?php
                        $data['role'] = "Clerk";
                        $this->view('components/notification-bar/notification-box', ["notification" => $notification, "role" => $data['role']]) ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>


        </div>
    </div>
    
    <div class="temp3-footer">
        <?php $this->view('components/footer/index', $data) ?>
    </div>
</body>

</html>