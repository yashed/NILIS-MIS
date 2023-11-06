<?php
    $role = "SAR";
    $data['role'] = $role;
?>

<?php $this->view('components/navside-bar/header',$data) ?>
<?php $this->view('components/navside-bar/sidebar',$data) ?>
<?php $this->view('components/navside-bar/footer',$data) ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SAR Notifications</title>
    </head>
    <style>
        *{
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        :root{
            --body-color: #E2E2E2;
            --sidebar-color: #17376E;
            --primary-color: #9AD6FF;
            --text-color: #ffffff;

            --tran-02: all 0.2s ease;
            --tran-03: all 0.3s ease; 
            --tran-04: all 0.4s ease;
            --tran-05: all 0.5s ease;
        }
        .dr-home{
            height: 100vh;
            left: 250px;
            position: relative;
            width: calc(100% - 250px);
            transition: var(--tran-05);
            background: var(--body-color);
        }
        .dr-title{
            font-size: 30px;
            font-weight: 500;
            color: black;
            padding: 4px 0px 4px 35px;
            background-color: var(--text-color);
            border-radius: 6px;
            margin: 7px 4px 7px 4px;
        }
        .sidebar.close ~ .dr-home{
            left: 88px;
            width: calc(100% - 88px);
        }
    </style>
    <body>
    <div class="dr-home">
            <div class="dr-title">Notifications</div> 
        </div>
    </body>
</html>