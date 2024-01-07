<?php
$role = "SAR";
$data['role'] = $role;

?>

<?php $this->view('components/navside-bar/header', $data) ?>
<?php $this->view('components/navside-bar/sidebar', $data) ?>
<?php $this->view('components/navside-bar/footer', $data) ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>temp2 Dashboard</title>
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

    body {
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }

    .temp2-home {
        height: 100vh;
        left: 250px;
        position: relative;
        width: calc(100% - 250px);
        transition: var(--tran-05);
        background: var(--body-color);
    }

    .temp2-title {
        font-size: 30px;
        font-weight: 600;
        color: black;
        padding: 10px 0px 10px 32px;
        background-color: var(--text-color);
        border-radius: 6px;
        margin: 7px 4px 7px 4px;
    }

    .sidebar.close~.temp2-home {
        left: 88px;
        width: calc(100% - 88px);
    }







    .temp2-subsection-1 {
        background-color: #ffffff;
        border-radius: 6px;
        height: 18vw;
        padding: 1vw 2vw 1vw 2vw;
        margin-left: 4px;
        padding-top: 1vw;
    }


    .temp2-sub-title1 {

        color: #17376E;
        font-family: Poppins;
        font-size: 22px;
        font-style: normal;
        font-weight: 600;
        font-size: 1.2vw;

    }




    .temp2-subsection-2 {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        margin-top: 10px;
        /* padding: 10px 10px 30px 35px; */
        /* border-radius: 6px; */
        /* margin: 7px 4px 7px 4px; */
    }



    .temp2-subsection-21 {
        display: flex;
        flex-direction: column;
        background-color: var(--text-color);
        padding: 1% 1% 1% 1%;
        border-radius: 6px;
        width: 100%;
        height: auto;
        padding: 1vw 2vw 1vw 2vw;
    }

    .flex-container-top {

        display: flex;
        flex-direction: row;
        margin-top: 2%;
        width: 81vw;
        padding-right: 1vw;
    }

    .admission-button0 {
        padding: 0.5% 0.5% 0.5% 1%;
        background-color: #17376E;
        color: #fff;
        text-decoration: none;
        align-items: center;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        width: 15vw;
        font-size: 0.9vw;
        margin-right: 2vw;
    }

    .admission-button1 {
        padding: 0.5% 0.5% 0.5% 1%;
        background-color: #ffffff;
        border: 1px solid #17376E;
        color: #17376E;
        text-decoration: none;
        align-items: center;

        border-radius: 5px;
        cursor: pointer;
        width: 13vw;
        font-size: 0.9vw;
        margin-right: 2vw;
    }

   

    .admission-button2 {
        padding: 0.5% 1.8%;
        background-color: #17376E;
        color: #fff;
        text-decoration: none;
        align-items: center;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        width: 14vw;
        font-size: 0.9vw;
    }
    

    .temp2-sub-title2 {
        color: #17376E;
        font-family: Poppins;
        font-size: 22px;
        font-style: normal;
        font-weight: 600;
        font-size: 1.2vw;
        flex: 10%;
    }



    .temp2-footer {
        margin-top: auto;
    }



    input[type="file"] {
        margin: 10px 0;
        /* margin-left: 150px; */
    }

    .file-input-icon {
        width: 40px;
        height: 40px;
        background-image: url('<?= ROOT ?>/assets/file-icon.png');
        background-size: cover;
        background-repeat: no-repeat;
        cursor: pointer;
    }

    input[type="file"] {
        display: none;
    }

    .text1 {
        font-size: 15px;
    }

    .browse-label {
        color: #9AD6FF;
        cursor: pointer;
    }

    .flex-container {
        gap: 10%;
        display: flex;
        flex-direction: row;
    }




    .sub-name {
        padding-left: 2%;
        font-size: 20px;
    }

    .subject {
        padding-top: 5%;
    }

    .row {
        display: flex;
        font-family: "Poppins", sans-serif;
    }



    .column1 {
        flex: 50%;
        padding: 2%;
        height: 15vw;
        padding-left: 10vw;
    }

    .column2 {
        flex: 50%;
        padding: 2%;
        height: 15vw;
        padding-left: 10vw;
    }

    .data1 {
        font-family: "Poppins", sans-serif;
        font-size: 1vw;
        padding-left: 10%;
        color: #17376E;
        font-weight: 500;
    }

    .data2 {
        font-family: "Poppins", sans-serif;
        font-size: 1vw;
        padding-left: 10%;
        color: #17376E;
        padding-top: 1vw;
        font-weight: 500;
    }

    .data3 {
        font-family: "Poppins", sans-serif;
        font-size: 1vw;
        padding-left: 10%;
        color: #17376E;
        font-weight: 500;
    }

    .data4 {
        font-family: "Poppins", sans-serif;
        font-size: 1vw;
        padding-left: 10%;
        color: #17376E;
        padding-top: 1vw;
        font-weight: 500;
    }

    #course,
    #exam,
    #count,
    #year {
        padding-top: 5px;
        font-size: 0.9vw;
        color: #000000;
        font-weight: 300;
    }

    .table__body {
        width: 95%;
        max-height: calc(89% - 1.6rem);
        /* background-color: var(--body-color); */
        margin: 1vw;
        border-radius: .6rem;
        /* overflow: auto;
        overflow: overlay;
        outline-style: groove; */
        outline-width: 2px;
        outline-color: #ffffff;
    }

    .table__body::-webkit-scrollbar {
        width: 0.5rem;
        height: 0.5rem;
    }

    .table__body::-webkit-scrollbar-thumb {
        border-radius: .5rem;
        background-color: #ffffff;
        visibility: visible;
    }

    .table__body:hover::-webkit-scrollbar-thumb {
        visibility: visible;
    }

    table {
        width: 100%;
    }

    .table__body-td-name {
        display: flex;
        align-items: center;
    }

    td img {
        width: 36px;
        height: 36px;
        margin: .5rem;
        border-radius: 50%;
        vertical-align: middle;
    }

    table,
    th,
    td {
        border-collapse: collapse;
        padding: 1rem;
        text-align: center;

    }

    thead th {
        position: sticky;
        top: 0;
        left: 0;
        background-color: #ffffff;
        cursor: pointer;
        text-transform: capitalize;
        color: #999999;
        font-size: 0.8vw;
        font-weight: 500;
    }

    tbody tr:nth-child(even) {
        background-color: #ffffff;
    }

    tbody tr:nth-child(odd) {
        background-color: #ffffff;
    }

    tbody tr {
        --delay: .1s;
        transition: .5s ease-in-out var(--delay), background-color 0s;
        font-size: 0.8vw;
    }

    /* tbody tr.hide {
        opacity: 0;
        transform: translateX(100%);
    }

    tbody tr:hover {
        background-color: #eeeeee !important;
    }

    tbody tr td,
    tbody tr td p,
    tbody tr td img {
        transition: .2s ease-in-out;
    }

    tbody tr.hide td,
    tbody tr.hide td p {
        padding: 0;
        font: 0 / 0 sans-serif;
        transition: .2s ease-in-out .5s;
    }

    tbody tr.hide td img {
        width: 0;
        height: 0;
        transition: .2s ease-in-out .5s;
    }


    @media (max-width: 1000px) {
        td:not(:first-of-type) {
            min-width: 12.1rem;
        }
    }

    thead th span.icon-arrow {
        display: inline-block;
        width: 1.3rem;
        height: 1.3rem;
        border-radius: 50%;
        border: 1.4px solid transparent;

        text-align: center;
        font-size: 1rem;

        margin-left: .5rem;
        transition: .2s ease-in-out;
    }

    thead th:hover span.icon-arrow {
        border: 1.4px solid;
    }

    thead th.active span.icon-arrow {
        color: #ffffff;
    }

    thead th.asc span.icon-arrow {
        transform: rotate(180deg);
    } */

    .input-main-group {
        display: flex;
        align-items: center;
        margin-left: 25%;
        background-color: #ffffff;
        gap: 1%;
        font-size: 1vw;
    }

    .custom-dropdown {
        position: relative;
        width: 45%;
        margin: 10px;
        border: #E2E2E2;
        font-size: 1vw;
    }

    .custom-dropdown .icon {
        position: absolute;
        top: 50%;
        left: 10px;
        transform: translateY(-50%);
        font-size: 25px;
        color: #000;
    }

    .custom-dropdown select {
        width: calc(100% - 40px);
        padding: 10px;
        border: 1px solid #E2E2E2;
        border-radius: 5px;
        background-color: #E2E2E2;
        text-align: center;
        cursor: pointer;
        font-size: 1vw;
        padding-left: 40px;
    }

    .custom-dropdown select:hover {
        background-color: #eeeeee;
    }

    .dr-degree-programs-button {
        height: 70%;
        border-radius: 7px;
        background-color: var(--sidebar-color);
        color: var(--text-color);
        width: 10%;
        min-width: 80px;
        font-size: 1vw;
    }

    .dr-degree-programs-button:hover {
        background-color: var(--text-color);
        color: var(--sidebar-color);
    }

    
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.4);
    }

    .modal-content {
        background-color: #fefefe;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }


</style>

<body>
    <div class="temp2-home">
        <div class="temp2-title">Examination</div>
        <div class="temp2-subsection-1">
            <div class="temp2-sub-title1">
                Overview
            </div>

            <div class="row">



                <div class="column1">
                    <div class="data1">Course Name<br>
                        <!-- <div class="email"><?= $student->Email ?></div> -->
                        <div class="course" id="course">Diploma in School Librarianship</div>
                    </div>
                    <br>
                    <div class="data2">Examination:<br>
                        <!-- <div class="regNum"> <?= $student->regNo ?></div> -->
                        <div class="exam" id="exam">2nd Semester Examination</div>
                    </div>
                </div>

                <div class="column2">
                    <div class="data3">Participation:<br>
                        <div class="count" id="count"> 216</div>
                    </div>
                    <br>
                    <div class="data4">Academic Year:<br>
                        <div class="year" id="year"> 2023/2024</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="temp2-subsection-2">
            <div class="temp2-subsection-21">


                <div class="flex-container-top">
                    <div class="temp2-sub-title2">Participants</div>
                    <button class="admission-button0">Download Attendance Sheet</button>
                    <button class="admission-button1" id="openModal">Exam Attendance Submit</button>
                    <button class="admission-button2">Send Admission Card</button>
                </div>
                <section class="table__body">
                    <table id="table_p">
                        <thead>
                            <tr>
                                <th> Name </th>
                                <th> Attempt </th>
                                <th> Index Number </th>
                                <th> Registration Number </th>
                                <th> Admission Card </th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td class="table__body-td-name"><img src="<?= ROOT ?>assets/MyOriginalPhoto.jpg" alt=""> Bimsara Anjana</td>
                                <td> 3 </td>
                                <td> DLIM/001</td>
                                <td> DLIM/01/01</td>
                                <td> tap to see Admission card </td>
                            </tr>
                            <tr>
                                <td class="table__body-td-name"><img src="<?= ROOT ?>assets/MyOriginalPhoto.jpg" alt=""> Yashed Thisara</td>
                                <td> 3 </td>
                                <td> DLIM/001</td>
                                <td> DLIM/01/01</td>
                                <td> tap to see Admission card </td>
                            </tr>


                        </tbody>
                    </table>
                </section>

                <br>


            </div>


        </div>
        <div class="temp2-footer">
            <?php $this->view('components/footer/index', $data) ?>
        </div>

        <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeModal">&times;</span>
            <?php $this->view('components/file-upload/exam-attendance-upload', $data) ?>
        </div>
    </div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        var modal = document.getElementById('myModal');
        var btn = document.getElementById('openModal');
        var span = document.getElementById('closeModal');
        var body = document.body;

        btn.onclick = function () {
            modal.style.display = "block";
            body.classList.add('modal-open'); 
        }

        span.onclick = function () {
            modal.style.display = "none";
            body.classList.remove('modal-open');
        }

        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
                body.classList.remove('modal-open');
            }
        }
    });
</script>


</body>

</html>