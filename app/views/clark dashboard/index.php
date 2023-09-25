<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    
    </head>

<body>
    <header>
        <nav class="navbar">
            <div class="navbar-container">
                <div class="navbar-icons">
                    <a href="page1.html"><img src="icon01.png" alt="Icon 1"></a>
                    <a href="page2.html"><img src="icon02.png" alt="Icon 2"></a>
                </div>
            </div>
        </nav>
    </header>

    <div class="white-container1">
        Dashboard
    </div>

    <div class="white-container2">
        <p class="left-top-text">Ongoing Degree Programs</p>
        <div class="blue-box1"></div>
        <div class="blue-box2"></div>
    </div>

    <div class="flex-container">
        <div class="white-container3">
            <div class="text1">Recently Published Examination <br>Results</div>
            <div class="exam-card1">
                <?php include '../../components/exam-card/index.php' ?>
            </div>
            <div class="exam-card2">
                <?php include '../../components/exam-card/index.php' ?>
            </div>
        </div>


        <div class="white-container4">
            <div class="heading-calender">Academic Calendar</div>
            <?php include '../../components/calender/index.php' ?>
            <script src="../../components/calender/script.js"></script>
            <link rel="stylesheet" type="text/css" href="../../components/calender/style.css">
        </div>
    </div>
    <script>
        
    </script>
</body>

</html>