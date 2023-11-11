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
    <title>sar-dash Dashboard</title>
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

.sar-dash-home {
    height: 100vh;
    left: 250px;
    position: relative;
    width: calc(100% - 250px);
    transition: var(--tran-05);
    background: var(--body-color);
}

.sar-dash-title {
    font-size: 30px;
    font-weight: 600;
    color: black;
    padding: 10px 0px 10px 32px;
    background-color: var(--text-color);
    border-radius: 6px;
    margin: 7px 4px 7px 4px;
}

.sidebar.close~.sar-dash-home {
    left: 88px;
    width: calc(100% - 88px);
}

.sar-dash-subsection-0 {
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

.sar-dash-subsection-01 {
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

.sar-dash-subcard-data {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
}

.sar-dash-subcard-data-value {
    font-size: 38px;
    font-weight: 600;
    color: #17376E;
}

.sar-dash-subcard-data-title {
    font-size: 18px;
    font-weight: 600;
    color: #17376E;
}

.sar-dash-subsection-1-1 {
    display: flex;
    flex-direction: column;
    width: 67%;
}

.sar-dash-subsection-1-1-1 {
    display: flex;
    flex-direction: row;

    /* background-color: var(--text-color);
    padding: 10px 10px 30px 35px;
    border-radius: 6px;
    margin: 7px 4px 7px 4px; */

}

.sar-dash-subsection-1-1-1-1 {
    background-color: var(--text-color);
    padding: 10px 10px 30px 35px;
    border-radius: 6px;
    margin: 7px 4px 7px 4px;
    width: 50%
}

.sar-dash-subsection-1-1-1-2 {
    background-color: var(--text-color);
    padding: 10px 10px 30px 35px;
    border-radius: 6px;
    margin: 4px 4px 4px 4px;
    width: 50%
}

.sar-dash-subsection-1-1-1-3 {
    background-color: var(--text-color);
    padding: 10px 10px 30px 35px;
    border-radius: 6px;
    margin: 4px 4px 4px 4px;
    width: 100%
}

.sar-dash-subsection-1-1-1-4 {
    background-color: var(--text-color);
    padding: 10px 10px 30px 35px;
    border-radius: 6px;
    margin: 4px 4px 4px 4px;
    width: 50%
}

.sar-dash-subsection-1-1-1-5 {
    background-color: var(--text-color);
    padding: 10px 10px 30px 35px;
    border-radius: 6px;
    margin: 4px 4px 4px 4px;
    width: 50%
}

.sar-dash-subsection-1-2 {
    /* background-color: var(--text-color);
    padding: 10px 10px 30px 35px;
    border-radius: 6px;
    margin: 7px 4px 7px 4px; */
    width: 33%;
}

.sar-dash-subsection-1-2-1 {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    width: 100%;
    height: 100%;
}

.sar-dash-subsection-1-1-2-1 {
    background-color: var(--text-color);
    padding: 10px 10px 30px 35px;
    border-radius: 6px;
    margin: 4px 4px 4px 4px;
    height: 70%;
}

.sar-dash-subsection-1-1-2-2 {
    background-color: var(--text-color);
    padding: 10px 10px 30px 35px;
    border-radius: 6px;
    margin: 4px 4px 4px 4px;
    height: 50%;
}

.sar-dash-sub-title {

    color: #17376E;
    font-family: Poppins;
    font-size: 22px;
    font-style: normal;
    font-weight: 600;
    margin: 40px;

}

.sar-dash-subsection-2 {
    display: flex;
    flex-direction: row;
    justify-content: space-between;

    /* padding: 10px 10px 30px 35px; */
    /* border-radius: 6px; */
    /* margin: 7px 4px 7px 4px; */
}

.sar-dash-subsection-21 {
    display: flex;
    flex-direction: column;
    background-color: var(--text-color);
    padding: 10px 10px 30px 35px;
    border-radius: 6px;
    margin: 3px 4px 7px 4px;
    width: 50%;
}

.sar-dash-subsection-22 {
    background-color: var(--text-color);
    padding: 10px 10px 31px 35px;
    border-radius: 6px;
    margin: 3px 4px 7px 4px;
    width: 100%;
}


.sar-dash-main {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    /* align-items: center; */

}

.sar-dash-card-subsection-0 {
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    align-items: center;
    /* background-color: var(--text-color); */
    padding: 15px 10px 15px 35px;
    border-radius: 6px;
    margin: 7px 4px 7px 4px;
    flex-wrap: wrap;
    gap: 10px;

}

.sar-dash-card-subsection-01 {
    display: flex;
    /* padding: 15px 30px 14px 30px; */
    justify-content: center;
    align-items: center;
    border-radius: 10px;
    border: 1px solid rgba(0, 0, 0, 0.12);
    background-color: var(--text-color);
    box-shadow: 0px 10px 25px 0px rgba(0, 0, 0, 0.12);
    min-width: 22%;
    height: 120px;
    flex-direction: row;
    gap: 60px;
}

.sar-dash-card-subcard-data {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
}

.sar-dash-card-subcard-data-value {
    font-size: 38px;
    font-weight: 600;
    color: #17376E;
}

.sar-dash-card-subcard-data-title {
    display: flex;
    font-size: 16px;
    font-weight: 600;
    color: #17376E;
    align-items: center;
    min-width: 120px;
    justify-content: center;
    text-align: center;
}

.sar-dash-card-subcard-img1 img {
    max-width: 70px;
    min-width: 50px;
    max-height: 80px;
    min-height: 50px;
}

.sar-dash-sucard-out {
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    align-items: center;
    margin: 10px;
    gap: 10px;
}
</style>

<body>
    <div class="sar-dash-home">
        <div class="sar-dash-title">Dashboard</div>
        <div class="sar-dash-card-subsection-0">

            <div class="sar-dash-card-subsection-01">
                <div class="sar-dash-sucard-out">
                    <div class="sar-dash-card-subcard-img1">
                        <img src="<?=ROOT?>assets/admin/degree.png" alt="degree.icon" />
                    </div>
                    <div class="sar-dash-card-subcard-data">
                        <div class="sar-dash-card-subcard-data-title">Ongoing Degree</div>
                        <div class="sar-dash-card-subcard-data-value">04</div>
                    </div>
                </div>
            </div>

            <div class="sar-dash-card-subsection-01">
                <div class="sar-dash-sucard-out">
                    <div class="sar-dash-card-subcard-img1">
                        <img src="<?=ROOT?>assets/admin/examination.png" alt="exam.icon" />
                    </div>
                    <div class="sar-dash-card-subcard-data">
                        <div class="sar-dash-card-subcard-data-title">Ongoing</br>Examination</div>
                        <div class="sar-dash-card-subcard-data-value">04</div>
                    </div>
                </div>
            </div>
            <div class="sar-dash-card-subsection-01">
                <div class="sar-dash-sucard-out">
                    <div class="sar-dash-card-subcard-img1">
                        <img src="<?=ROOT?>assets/admin/examination.png" alt="exam.icon" />
                    </div>
                    <div class="sar-dash-card-subcard-data">
                        <div class="sar-dash-card-subcard-data-title">Ongoing</br>Examination</div>
                        <div class="sar-dash-card-subcard-data-value">04</div>
                    </div>
                </div>
            </div>
            <div class="sar-dash-card-subsection-01">
                <div class="sar-dash-sucard-out">
                    <div class="sar-dash-card-subcard-img1">
                        <img src="<?=ROOT?>assets/admin/user.png" alt="user.icon" />
                    </div>
                    <div class="sar-dash-card-subcard-data">
                        <div class="sar-dash-card-subcard-data-title">Users</div>
                        <div class="sar-dash-card-subcard-data-value">04</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sar-dash-main">
            <div class="sar-dash-subsection-1-1">
                <div class="sar-dash-subsection-1-1-1">
                    <div class="sar-dash-subsection-1-1-1-1">
                        <div class="sar-dash-sub-title">
                            Sub Title 1.1
                        </div>
                    </div>
                    <div class="sar-dash-subsection-1-1-1-2">
                        <div class="sar-dash-sub-title">
                            Sub Title 1.2
                        </div>
                    </div>
                </div>
                <div class="sar-dash-subsection-1-1-1">
                    <div class="sar-dash-subsection-1-1-1-3">
                        <div class="sar-dash-sub-title">
                            Sub Title 1.3
                        </div>
                    </div>
                </div>
                <div class="sar-dash-subsection-1-1-1">
                    <div class="sar-dash-subsection-1-1-1-4">
                        <div class="sar-dash-sub-title">
                            Sub Title 1.4
                        </div>
                    </div>
                    <div class="sar-dash-subsection-1-1-1-5">
                        <div class="sar-dash-sub-title">
                            Sub Title 1.5
                        </div>
                    </div>
                </div>
            </div>
            <div class="sar-dash-subsection-1-2">
                <div class="sar-dash-subsection-1-2-1">
                    <div class="sar-dash-subsection-1-1-2-1">
                        <div class="sar-dash-sub-title">
                            Sub Title 1.3
                        </div>
                    </div>
                    <div class="sar-dash-subsection-1-1-2-2">
                        <div class="sar-dash-sub-title">
                            Sub Title 1.3
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="sar-dash-subsection-2">
                <div class="sar-dash-subsection-21">
                    <div class="sar-dash-sub-title">
                        Sub title 2 </br>


                    </div>

                </div>
                <div class="sar-dash-subsection-22">
                    <div class="sar-dash-sub-title">
                        Sub title 3</br>

                    </div>

                </div>
            </div> -->
        </div>
        <div class="sar-dash-footer">
            <?php $this->view('components/footer/index',$data) ?>
        </div>
    </div>


</body>

</html>