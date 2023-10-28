
<?php
    $role = "Admin";

    include_once '../../components/navside-bar/header.php';
    include_once '../../components/navside-bar/sidebar.php';
    include_once '../../components/navside-bar/footer.php';
?>
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
    font-weight: 500;
    color: black;
    padding: 4px 0px 4px 35px;
    background-color: var(--text-color);
    border-radius: 6px;
    margin: 7px 4px 7px 4px;
}

.sidebar.close~.admin-home {
    left: 88px;
    width: calc(100% - 88px);
}

.admin-subsection-1 {
    background-color: var(--text-color);
    padding: 10px 10px 30px 35px;
    border-radius: 6px;
    margin: 7px 4px 7px 4px;
}
.admin-subsection-0 {
    background-color: var(--text-color);
    padding: 10px 10px 30px 35px;
    border-radius: 6px;
    margin: 7px 4px 7px 4px;
}

.title {
    margin: 10px 10px 10px 0px;
    color: #17376E;
    font-family: Poppins;
    font-size: 20px;
    font-style: normal;
    font-weight: 500;
    margin : 40px;
    
}
.admin-subsection-2{
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

.calender{
    align-items:center;
    
}

.degree-card {
    display: flex;
    flex-direction: row;
    justify-content: space-around;
}

.card1 {
    display: flex;
    flex-direction: column;
}

.card2 {
    display: flex;
    flex-direction: column;
}
.exam-card1{
    display: flex;
    flex-direction: column;
}
.exam-card2{
    display: flex;
    flex-direction: column;
}

    </style>
    <body>
    <div class="admin-home">
            <div class="admin-title">Admin Dashboard</div>
            <div class="admin-subsection-1">

            </div>
            <div class="admin-subsection-1">
                <div class="title">
                   Ongoing Degree Programs
                </div>
              <div class="degree-card">
               <div class="card1">
                <?php
                  include "../../components/degree-card/degree-card.php";
                ?>
               </div>
               <div class="card2">
               <?php
                  include "../../components/degree-card/degree-card.php";
                ?>
               </div>
              
              
              </div>
             
            </div>
            <div class="admin-subsection-2">
               <div class="admin-subsection-21">
                    <div class="title">
                        Recently Published Examination Results
                    </div>
                    <div class="exam-card1">
                        <?php
                            // include "../../components/exam-card/exam-card.php";
                        ?>
                    </div>
                    <div class="exam-card2">
                        <?php
                            // include "../../components/exam-card/exam-card.php";
                        ?>
                    </div>
                   
               </div> 
               <div class="admin-subsection-22">
               <div class="title">
                    Academic Calender
                </div>
                <div class="calender">
                   
                  <?php
                    include "../../components/calender/calender.php";
                  ?>
               </div>
                </div>
               
            
                
            </div>  
        </div>
    </body>
</html>