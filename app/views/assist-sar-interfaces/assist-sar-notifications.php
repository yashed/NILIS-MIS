<?php

$role = "Assistant-SAR";
$data['role'] = $role;

?>

<?php $this->view('components/navside-bar/degreeprogramsidebar', $data) ?>
<?php $this->view('components/navside-bar/footer', $data) ?>



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

        /* .temp3-subsection-0 {
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            align-items: center; */
            /* background-color: var(--text-color); */
            /* padding: 15px 10px 15px 35px;
            border-radius: 6px;
            margin: 7px 4px 7px 4px;
            flex-wrap: wrap;

        } */

        /* .temp3-subsection-01 {
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
        } */

        /* .temp3-subcard-data {
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
        } */

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
    <div class="temp3-home">
        <div class="temp3-title">Notifications</div>
        <div class="temp3-subsection-1">
        <?php if (!empty($notifications)) : ?>
                <?php foreach ($notifications as $notification) : ?>
                    <?php if ($notification->type == 'Examination' && $notification->msg_type == 'All') : ?>
                        <?php 
                             $data['role'] = "Assist-SAR";
                             $this->view('components/notification-bar/notification-box', ["notification" => $notification, "role" => $data['role']]) ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>

            <?php if (!empty($notifications)) : ?>
                <?php foreach ($notifications as $notification) : ?>
                    <?php if ($notification->type == 'Examination' && $notification->msg_type == 'Exam-end-alert') : ?>
                        <?php 
                             $data['role'] = "Assist-SAR";
                             $this->view('components/notification-bar/notification-box', ["notification" => $notification, "role" => $data['role']]) ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>

            <?php if (!empty($notifications)) : ?>
                <?php foreach ($notifications as $notification) : ?>
                    <?php if ($notification->type == 'Vacation' && $notification->msg_type == 'Vacation-start-alert') : ?>
                        <?php 
                             $data['role'] = "Assist-SAR";
                             $this->view('components/notification-bar/notification-box', ["notification" => $notification, "role" => $data['role']]) ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>

            <?php if (!empty($notifications)) : ?>
                <?php foreach ($notifications as $notification) : ?>
                    <?php if ($notification->type == 'Vacation' && $notification->msg_type == 'Vacation-end-alert') : ?>
                        <?php 
                             $data['role'] = "Assist-SAR";
                             $this->view('components/notification-bar/notification-box', ["notification" => $notification, "role" => $data['role']]) ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>

            <?php if (!empty($notifications)) : ?>
                <?php foreach ($notifications as $notification) : ?>
                    <?php if ($notification->type == 'Study leave' && $notification->msg_type == 'Studyleave-start-alert') : ?>
                        <?php 
                             $data['role'] = "Assist-SAR";
                             $this->view('components/notification-bar/notification-box', ["notification" => $notification, "role" => $data['role']]) ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>

            <?php if (!empty($notifications)) : ?>
                <?php foreach ($notifications as $notification) : ?>
                    <?php if ($notification->type == 'Study leave' && $notification->msg_type == 'Studyleave-end-alert') : ?>
                        <?php 
                             $data['role'] = "Assist-SAR";
                             $this->view('components/notification-bar/notification-box', ["notification" => $notification, "role" => $data['role']]) ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>

            
            <?php if (!empty($notifications)) : ?>
                <?php foreach ($notifications as $notification) : ?>
                    <?php if ($notification->type == 'Examination' && $notification->msg_type == 'Exam-attendance-alert') : ?>
                        <?php 
                             $data['role'] = "SAR";
                             $this->view('components/notification-bar/notification-box', ["notification" => $notification, "role" => $data['role']]) ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>

            <?php if (!empty($notifications)) : ?>
                <?php foreach ($notifications as $notification) : ?>
                    <?php if ($notification->type == 'Study leave' && $notification->msg_type == 'Send-warnings-alert') : ?>
                        <?php 
                             $data['role'] = "SAR";
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