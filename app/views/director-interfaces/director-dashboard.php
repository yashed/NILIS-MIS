<?php
    $role = "Director";
    $data['role'] = $role;

?>
<?php $this->view('components/navside-bar/header',$data) ?>
<?php $this->view('components/navside-bar/sidebar',$data) ?>
<?php $this->view('components/navside-bar/footer',$data) ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>director Dashboard</title>
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
.director-home {
    height: 100vh;
    left: 250px;
    position: relative;
    width: calc(100% - 250px);
    transition: var(--tran-05);
    background: var(--body-color);
}
.director-title {
    font-size: 30px;
    font-weight: 600;
    color: black;
    padding: 10px 0px 10px 32px;
    background-color: var(--text-color);
    border-radius: 6px;
    margin: 7px 4px 7px 4px;
}
.sidebar.close~.director-home {
    left: 88px;
    width: calc(100% - 88px);
}
.director-subsection-1 {
    background-color: var(--text-color);
    padding: 8px 10px 30px 25px;
    border-radius: 6px;
    margin: 7px 4px 7px 4px;
}
.director-sub-title {
    color: #17376E;
    font-family: Poppins;
    font-size: 22px;
    font-style: normal;
    font-weight: 600;
    margin : 40px;
}
.director-subsection-2{
    display: flex;
    flex-direction: row;
    justify-content: space-between;
}
.director-subsection-21 {
    display: flex;
    flex-direction: column;
    background-color: var(--text-color);
    padding: 8px 10px 20px 15px;
    border-radius: 6px;
    margin: 3px 4px 7px 4px;
    width: 50%;
}
.director-subsection-22 {
    background-color: var(--text-color);
    padding: 8px 10px 20px 15px;
    border-radius: 6px;
    margin: 3px 4px 7px 4px;
    width: 50%;
}
.director-calender{
    display: flex;
    align-items: center;
    justify-content: center;
    
}
.director-degree-bar {
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    flex-wrap: wrap;
}
.director-card1 {
    margin-bottom: 5px; 
}
.director-exam-bar {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: nowrap;
    gap:30px;
}
.director-exam-card1{
    display: flex;
    flex-direction: column;
}
@media (max-width: 768px) {
    .director-home {
        left: 0;
        width: 100%;
    }
    .director-subsection-1, .director-subsection-2 {
        width: 100%;
        padding: 10px;
    }
    .director-subsection-21, .director-subsection-22 {
        width: 70%;
    }
    .director-degree-bar {
        grid-template-columns: 1fr;
    }
}
</style>
    <body>
        <div class="director-home">
            <div class="director-title">Dashboard</div>
            <div class="director-subsection-1">
                <div class="director-sub-title">
                   Ongoing Degree Programs
                </div>
                <div class="director-degree-bar">
                    <?php $count = 0; ?>
                    <?php foreach($degrees as $degree): ?>
                        <div class="director-card1">
                                <?php $this->view('components/degree-card/degree-card', ["degree" => $degree]) ?>
                        </div>
                        <?php $count++; ?>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="director-subsection-2">
               <div class="director-subsection-21">
                    <div class="director-sub-title">
                        Recently Published Examination Results
                    </div>
                    <div class="director-exam-bar">
                        <div class="director-exam-card1">
                            <?php $this->view('components/exam-card/exam-card',$data) ?>
                        </div>
                    </div>
               </div> 
               <div class="director-subsection-22">
               <div class="director-sub-title">
                    Academic Calender
                </div>
                <div class="director-calender">
                    <?php $this->view('components/calender/calender',$data) ?>
               </div>
                </div>
            </div>  
            <div class="director-footer">
                <?php $this->view('components/footer/index',$data) ?>
            </div>
        </div>
       
    </body>
</html>