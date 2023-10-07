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
    // include_once '../../components/navside-bar/footer.php';
?>
    <header>
    </header>

    <div class="white-container1 close">
        Dashboard
    </div>

    <div class="white-container2 close">
    <p class="left-top-text">Ongoing Degree Programs</p>
        <div class="white-container2-1 close">
       
        <div class="degree-card-right">
            <?php include '../../components/degree-card/degree-card.php' ?>
        </div>
        <div class="degree-card-left">
        <?php include '../../components/degree-card/degree-card.php' ?>
        </div>
    </div>
    </div>

    <div class="white-container3 close">
    <p class="left-top-text">Completed Degree Programs</p>
        <div class="white-container3-1 close">
       
        <div class="degree-card-right">
        <?php include '../../components/degree-card/degree-card.php' ?>
        </div>
        <div class="degree-card-left">
        <?php include '../../components/degree-card/degree-card.php' ?>
        </div>
    </div>
    </div>

    <script>
        const body = document.querySelector("body"),
            sidebar = body.querySelector(".sidebar"),
            toggle = body.querySelector(".toggle");
        // navbar = body.querySelector(".navbar");
        whitecontainer1 = body.querySelector(".white-container1");
        whitecontainer2 = body.querySelector(".white-container2");
        whitecontainer3 = body.querySelector(".white-container3");
        whitecontainer21=body.querySelector("white-container2-1");
        whitecontainer31=body.querySelector("white-container3-1");

        toggle.addEventListener("click", () => {
            sidebar.classList.toggle("close");
            // navbar.classList.toggle("close");
            whitecontainer1.classList.toggle("close");
            whitecontainer2.classList.toggle("close");
            whitecontainer3.classList.toggle("close");
            whitecontainer21.classList.toggle("close");
            whitecontainer31.classList.toggle("close");
        });

        let subMenu = document.getElementById("subMenu");

        function toggleMenu() {
            subMenu.classList.toggle("open-menu");
        }
    </script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
</body>

</html>