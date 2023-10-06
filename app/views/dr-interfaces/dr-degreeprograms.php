<?php
    $role = "DR";

    include_once '../../components/navside-bar/header.php';
    include_once '../../components/navside-bar/sidebar.php';
    include_once '../../components/navside-bar/footer.php';

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./DR-Dashboard.css">
        <title>DR Degree Programs</title>
    </head>
    <body>
        <div class="dr-degree-programs-home">
            <div class="dr-degree-programs-title">DR Degree Programs</div>
            <div class="dr-degree-programs-subsection-1">
                <p>Ongoing Degree Programs</p>
                <?php
                    include "../../components/degree-card/degree-card.php";
                    include "../../components/degree-card/degree-card.php";
                ?>
            </div>
            <div class="dr-degree-programs-subsection-1">
                <p>Completed Degree Programs</p>
                <?php
                    include "../../components/degree-card/degree-card.php";
                    include "../../components/degree-card/degree-card.php";
                ?>
            </div>   
        </div>
    </body>
</html>