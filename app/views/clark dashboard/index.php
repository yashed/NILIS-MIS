<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    </head>

<body>
<?php
    $role = "Clerk";

    include_once '../../components/navside-bar/header.php';
    include_once '../../components/navside-bar/sidebar.php';
    include_once '../../components/navside-bar/footer.php';
?>
    <header>
    </header>

    <div class="white-container1 close">
        Dashboard
    </div>

    <div class="white-container2 close">
        <p class="left-top-text">Ongoing Degree Programs</p>
        <div class="exam-card-left">
        <?php include '../../components/exam-card/exam-card.php' ?>
        </div>
        <div class="exam-card-right">
            <?php include '../../components/exam-card/exam-card.php' ?>
        </div>
    </div>

    <div class="flex-container">
        <div class="white-container3 close">
            <div class="text1">Recently Published Examination <br>Results</div>
            <div class="exam-card1">
                <?php include '../../components/exam-card/exam-card.php' ?>
            </div>
            <div class="exam-card2">
                <?php include '../../components/exam-card/exam-card.php' ?>
            </div>
        </div>


        <div class="white-container4">
            <div class="heading-calender">Academic Calendar</div>
            <?php include '../../components/calender/calender.php' ?>
            <!-- <script src="../../components/calender/script.js"></script> -->
            <!-- <link rel="stylesheet" type="text/css" href="../../components/calender/style.css">  -->
        </div>
    </div>
    
    <script>
        const body = document.querySelector("body"),
            sidebar = body.querySelector(".sidebar"),
            toggle = body.querySelector(".toggle");
            whitecontainer1 = body.querySelector(".white-container1");
            whitecontainer2 = body.querySelector(".white-container2");
            whitecontainer3 = body.querySelector(".white-container3");

        toggle.addEventListener("click", () => {
            sidebar.classList.toggle("close");
            whitecontainer1.classList.toggle("close");
            whitecontainer2.classList.toggle("close");
            whitecontainer3.classList.toggle("close");
        });

        let subMenu = document.getElementById("subMenu");

        function toggleMenu() {
            subMenu.classList.toggle("open-menu");
    }
    </script>
</body>

</html>