<?php

$role = "SAR";
$data['role'] = $role;

?>

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
    </style>
</head>

<body>
    <?php $this->view('components/navside-bar/header', $data) ?>
    <?php $this->view('components/navside-bar/sidebar', $data) ?>
    <?php $this->view('components/navside-bar/footer', $data) ?>

    <div class="temp3-home">
        <div class="temp3-title">Notifications</div>
        <div class="temp3-subsection-1">
            <?php if (!empty($notifications)): ?>
                <?php foreach ($notifications as $notification): ?>
                    <?php if ($notification->type == 'Examination' && $notification->msg_type == 'Exam-start-alert'): ?>
                        <?php
                        $data['role'] = "SAR";

                        $link = "sar";
                        $this->view('components/notification-bar/notification-box', [
                            "notification" => $notification,
                            "role" => $data['role'],
                            "link" => $link  // Pass the notify_id here
                        ]) ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>

<<<<<<< HEAD
            <?php if (!empty($notifications)) : ?>
                <?php foreach ($notifications as $notification) : ?>
                    <?php if ($notification->type == 'Examination' && $notification->msg_type == 'Exam-end-alert' && $data['usernames'] == $notification->usernames) : ?>
                        <?php 
                             $data['role'] = "SAR";
                             $this->view('components/notification-bar/notification-box', ["notification" => $notification, "role" => $data['role']]) ?>
=======
            <?php if (!empty($notifications)): ?>
                <?php foreach ($notifications as $notification): ?>
                    <?php if ($notification->type == 'Examination' && $notification->msg_type == 'Exam-end-alert' && $data['usernames'] == $notification->usernames): ?>
                        <?php
                        $data['role'] = "SAR";
                        $this->view('components/notification-bar/notification-box', ["notification" => $notification, "role" => $data['role']]) ?>
>>>>>>> 17c93949c080a9f432244a1fe74fa745048dee2c
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>

<<<<<<< HEAD
            <?php if (!empty($notifications)) : ?>
                <?php foreach ($notifications as $notification) : ?>
                    <?php if ($notification->type == 'Vacation' && $notification->msg_type == 'Vacation-start-alert' && $data['usernames'] == $notification->usernames) : ?>
                        <?php 
                             $data['role'] = "SAR";
                             $this->view('components/notification-bar/notification-box', ["notification" => $notification, "role" => $data['role']]) ?>
=======
            <?php if (!empty($notifications)): ?>
                <?php foreach ($notifications as $notification): ?>
                    <?php if ($notification->type == 'Vacation' && $notification->msg_type == 'Vacation-start-alert' && $data['usernames'] == $notification->usernames): ?>
                        <?php
                        $data['role'] = "SAR";
                        $this->view('components/notification-bar/notification-box', ["notification" => $notification, "role" => $data['role']]) ?>
>>>>>>> 17c93949c080a9f432244a1fe74fa745048dee2c
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>

<<<<<<< HEAD
            <?php if (!empty($notifications)) : ?>
                <?php foreach ($notifications as $notification) : ?>
                    <?php if ($notification->type == 'Vacation' && $notification->msg_type == 'Vacation-end-alert' && $data['usernames'] == $notification->usernames) : ?>
                        <?php 
                             $data['role'] = "SAR";
                             $this->view('components/notification-bar/notification-box', ["notification" => $notification, "role" => $data['role']]) ?>
=======
            <?php if (!empty($notifications)): ?>
                <?php foreach ($notifications as $notification): ?>
                    <?php if ($notification->type == 'Vacation' && $notification->msg_type == 'Vacation-end-alert' && $data['usernames'] == $notification->usernames): ?>
                        <?php
                        $data['role'] = "SAR";
                        $this->view('components/notification-bar/notification-box', ["notification" => $notification, "role" => $data['role']]) ?>
>>>>>>> 17c93949c080a9f432244a1fe74fa745048dee2c
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>

<<<<<<< HEAD
            <?php if (!empty($notifications)) : ?>
                <?php foreach ($notifications as $notification) : ?>
                    <?php if ($notification->type == 'Study Leave' && $notification->msg_type == 'Studyleave-start-alert' && $data['usernames'] == $notification->usernames) : ?>
                        <?php 
                             $data['role'] = "SAR";
                             $this->view('components/notification-bar/notification-box', ["notification" => $notification, "role" => $data['role']]) ?>
=======
            <?php if (!empty($notifications)): ?>
                <?php foreach ($notifications as $notification): ?>
                    <?php if ($notification->type == 'Study Leave' && $notification->msg_type == 'Studyleave-start-alert' && $data['usernames'] == $notification->usernames): ?>
                        <?php
                        $data['role'] = "SAR";
                        $this->view('components/notification-bar/notification-box', ["notification" => $notification, "role" => $data['role']]) ?>
>>>>>>> 17c93949c080a9f432244a1fe74fa745048dee2c
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>

<<<<<<< HEAD
            <?php if (!empty($notifications)) : ?>
                <?php foreach ($notifications as $notification) : ?>
                    <?php if ($notification->type == 'Study Leave' && $notification->msg_type == 'Studyleave-end-alert' && $data['usernames'] == $notification->usernames) : ?>
                        <?php 
                             $data['role'] = "SAR";
                             $this->view('components/notification-bar/notification-box', ["notification" => $notification, "role" => $data['role']]) ?>
=======
            <?php if (!empty($notifications)): ?>
                <?php foreach ($notifications as $notification): ?>
                    <?php if ($notification->type == 'Study Leave' && $notification->msg_type == 'Studyleave-end-alert' && $data['usernames'] == $notification->usernames): ?>
                        <?php
                        $data['role'] = "SAR";
                        $this->view('components/notification-bar/notification-box', ["notification" => $notification, "role" => $data['role']]) ?>
>>>>>>> 17c93949c080a9f432244a1fe74fa745048dee2c
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>

            <?php if (!empty($notifications)): ?>
                <?php foreach ($notifications as $notification): ?>
                    <?php if ($notification->type == 'Examination' && $notification->msg_type == 'Exam-attendance-alert'): ?>
                        <?php
                        $data['role'] = "SAR";

                        $link = "sar";
                        $this->view('components/notification-bar/notification-box', [
                            "notification" => $notification,
                            "role" => $data['role'],
                            "link" => $link  // Pass the notify_id here
                        ]) ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>

            <?php if (!empty($notifications)): ?>
                <?php foreach ($notifications as $notification): ?>
                    <?php if ($notification->type == 'Study Leave' && $notification->msg_type == 'Send-warnings-alert'): ?>
                        <?php
                        $data['role'] = "SAR";

                        $link = "sar";
                        $this->view('components/notification-bar/notification-box', [
                            "notification" => $notification,
                            "role" => $data['role'],
                            "link" => $link  // Pass the notify_id here
                        ]) ?>
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