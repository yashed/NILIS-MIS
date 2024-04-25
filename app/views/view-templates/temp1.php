<?php
    $role = "DR";
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
    <title>temp1 Dashboard</title>
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

.temp1-home {
    height: 100vh;
    left: 250px;
    position: relative;
    width: calc(100% - 250px);
    transition: var(--tran-05);
    background: var(--body-color);
}

.temp1-title {
    font-size: 30px;
    font-weight: 600;
    color: black;
    padding: 10px 0px 10px 32px;
    background-color: var(--text-color);
    border-radius: 6px;
    margin: 7px 4px 7px 4px;
}

.sidebar.close~.temp1-home {
    left: 88px;
    width: calc(100% - 88px);
}

.temp1-subsection-0 {
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    align-items: center;
    /* background-color: var(--text-color); */
    padding: 15px 10px 15px 35px;
    border-radius: 6px;
    margin: 7px 4px 7px 4px;
    flex-wrap: wrap;
}

.temp1-subsection-01 {
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
}

.temp1-subcard-data {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
}

.temp1-subcard-data-value {
    font-size: 38px;
    font-weight: 600;
    color: #17376E;
}

.temp1-subcard-data-title {
    font-size: 18px;
    font-weight: 600;
    color: #17376E;
}

.temp1-subsection-1 {
    background-color: var(--text-color);
    padding: 10px 10px 30px 35px;
    border-radius: 6px;
    margin: 7px 4px 7px 4px;
}

.temp1-sub-title {

    color: #17376E;
    font-family: Poppins;
    font-size: 22px;
    font-style: normal;
    font-weight: 600;
    margin: 40px;

}

.temp1-subsection-2 {
    display: flex;
    flex-direction: row;
    justify-content: space-between;

    /* padding: 10px 10px 30px 35px; */
    /* border-radius: 6px; */
    /* margin: 7px 4px 7px 4px; */
}

.temp1-subsection-21 {
    display: flex;
    flex-direction: column;
    background-color: var(--text-color);
    padding: 10px 10px 30px 35px;
    border-radius: 6px;
    margin: 3px 4px 7px 4px;
    width: 50%;
}

.temp1-subsection-22 {
    background-color: var(--text-color);
    padding: 10px 10px 31px 35px;
    border-radius: 6px;
    margin: 3px 4px 7px 4px;
    width: 50%;
}

.temp1-calender {
    display: flex;
    align-items: center;
    justify-content: center;

}

.temp1-degree-bar {
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    flex-wrap: wrap;
    margin-bottom: 20px;
}

.temp1-card1 {
    display: flex;
    flex-direction: column;
}

.temp1-card2 {
    display: flex;
    flex-direction: column;
}

.temp1-exam-bar {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    flex-wrap: nowrap;
    gap: 30px;
}

.temp1-exam-card1 {
    display: flex;
    flex-direction: column;
}

.temp1-exam-card2 {
    display: flex;
    flex-direction: column;
}
</style>

<body>
    <div class="temp1-home">
        <div class="temp1-title">Title</div>
        <div class="temp1-subsection-1">
            <div class="temp1-sub-title">
                Sub Title
            </div>
            <div class="temp1-degree-bar">

                <div class="temp1-card1">


                    </a>
                </div>
            </div>
        </div>
        <div class="temp1-subsection-2">
            <div class="temp1-subsection-21">
                <div class="temp1-sub-title">
                    Sub title 2 </br>

                    <div style="color:red;"> Change the Role name according to the user role.</div>
                </div>

            </div>
            <div class="temp1-subsection-22">
                <div class="temp1-sub-title">
                    Sub title 3</br>

                    <div style="color:red;">before use this template make sure to change all class names to your own
                        class names. to reduce css inheritance.</div>
                </div>

            </div>
        </div>
        <div class="temp1-footer">
            <?php $this->view('components/footer/index',$data) ?>
        </div>
    </div>


</body>

</html>