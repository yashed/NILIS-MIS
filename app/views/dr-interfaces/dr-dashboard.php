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
        <title>DR Dashboard</title>
    </head>
    <body>
        <div class="dr-home">
            <div class="dr-title">DR Dashboard</div>
            <div class="dr-subsection-1">
                <p>Online Degree Programs</p>
                <?php
                    include "../../components/degree-card/degree-card.php";
                    include "../../components/degree-card/degree-card.php";
                ?>
            </div>
            <div class="dr-subsection-2">
                <p>Recently Publish Examination Results</p>
                <?php
                    include "../../components/exam-card/exam-card.php";
                    include "../../components/exam-card/exam-card.php";
                ?>
            </div> 
            <div class="dr-subsection-3">
            <p>Academic Calender</p>
                <?php
                    include "../../components/calender/calender.php";
                ?>
            </div>  
        </div>
    </body>
</html>