<?php
$role = "SAR";
$data['role'] = $role;

?>

<?php $this->view('components/navside-bar/degreeprogramsidebar', $data) ?>
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

    .temp2-sub-title2 {
        color: #17376E;
        font-family: Poppins;
        font-size: 22px;
        font-style: normal;
        font-weight: 600;
        font-size: 1.2vw;
    }


    .temp2-sub-title3 {

        color: #17376E;
        font-family: Poppins;
        font-size: 22px;
        font-style: normal;
        font-weight: 600;
        font-size: 1.2vw;
        padding-left: 40%;
        padding-top: 2%;
        padding-bottom: 1%;
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



    .temp2-footer {
        margin-top: auto;
    }

    .dashed-container1 {
        border: 2px dashed #333;
        border-radius: 8px;
        padding: 10px;
        width: 18%;
        height: 300px;
        margin-top: 3%;

        display: flex;
        flex: 25%;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .dashed-container2 {
        border: 2px dashed #333;
        border-radius: 8px;
        padding: 10px;
        width: 18%;
        height: 300px;
        margin-top: 3%;

        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        flex: 25%;
    }

    .dashed-container3 {
        border: 2px dashed #333;
        border-radius: 8px;
        padding: 10px;
        width: 18%;
        height: 300px;
        margin-top: 3%;

        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        flex: 25%;
    }

    .dashed-container4 {
        border: 2px dashed #333;
        border-radius: 8px;
        padding: 10px;
        width: 18%;
        height: 300px;
        margin-top: 3%;

        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        flex: 25%;
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

    .flex-container-top {
        gap: 70%;
        display: flex;
        flex-direction: row;
        margin-top: 2%;
    }

    .download-button {
        padding: 0.5% 1% 0.5% 2%;
        background-color: #17376E;
        color: #fff;
        text-decoration: none;
        align-items: center;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        width: 15%;
        font-size: 16px;
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
        /* background-color: #9AD6FF; */
        padding: 2%;
        height: 15vw;
        padding-left: 10vw;
    }

    .column2 {
        flex: 50%;
        /* background-color: #E2E2E2; */
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
        /* margin: 5px 5px 5px 20px; */
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

    tbody tr.hide {
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
    }

    */ .input-main-group {
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
        /* Set the color you prefer */
    }

    .custom-dropdown select {
        width: calc(100% - 40px);
        /* Adjusted width to leave space for the icon */
        padding: 10px;
        border: 1px solid #E2E2E2;
        border-radius: 5px;
        background-color: #E2E2E2;
        text-align: center;
        cursor: pointer;
        font-size: 1vw;
        padding-left: 40px;
        /* Adjust this value to leave space for the icon */
    }

    .custom-dropdown select:hover {
        background-color: #eeeeee;
        /* Change the background color on hover */
    }

    .search-button {
        height: 70%;
        border-radius: 7px;
        background-color: var(--sidebar-color);
        color: var(--text-color);
        width: 10%;
        min-width: 80px;
        font-size: 1vw;
    }

    .search-button:hover {
        background-color: var(--text-color);
        color: var(--sidebar-color);
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
                        <div class="course" id="course">
                            <?php if (!empty($_SESSION['degreeData'])): ?>
                                <?= $_SESSION['degreeData'][0]->DegreeName ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <br>
                    <div class="data2">Examination:<br>
                        <!-- <div class="regNum"> <?= $student->regNo ?></div> -->
                        <div class="exam" id="exam">
                            <?php if (!empty($_SESSION['examDetails'])): ?>
                                <?= $_SESSION['examDetails'][0]->semester ?> Semester Examination
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="column2">
                    <div class="data3">Participation<br>
                        <div class="count" id="count">
                            <?php if (!empty($examCount)) {
                                echo $examCount[0]->ExamParticipants;
                            }
                            ?>
                        </div>
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
                <div class="temp2-sub-title2">
                    Results</br>
                </div>
                <div class="temp2-sub-title3">
                    Select Subject</br>
                </div>
                <!-- ... (your existing code) ... -->

                <div class="input-main-group">
                    <div class="custom-dropdown">
                        <div class="icon">
                            <i class='bx bx-search'></i>
                        </div>
                        <select id="sub" name="sub">
                            <option value="Subject1">Subject1</option>
                            <option value="Subject2">Subject2</option>
                            <option value="Subject3">Subject3</option>
                            <option value="Subject4">Subject4</option>
                        </select>
                    </div>
                    <button class="search-button">Search</button>
                </div>

                <!-- ... (your existing code) ... -->




                <section class="table__body">
                    <table id="table_p">
                        <thead>
                            <tr>
                                <th> Index </th>
                                <th> Registration No </th>
                                <th> Assignment Marks </th>
                                <th> Examiner1 Marks </th>
                                <th> Examiner2 Marks </th>
                                <th> Examiner3 Marks </th>
                                <th> Final Marks </th>
                                <th> Grade </th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td class="table__body-td-name"><img src="<?= ROOT ?>assets/MyOriginalPhoto.jpg" alt="">
                                    Bimsara Anjana</td>
                                <td> DLIM/01/01 </td>
                                <td> 70</td>
                                <td> 80</td>
                                <td> 60</td>
                                <td> -</td>
                                <td> 70</td>
                                <td> B</td>
                            </tr>
                            <tr>
                                <td class="table__body-td-name"><img src="<?= ROOT ?>assets/MyOriginalPhoto.jpg" alt="">
                                    Yashed Thisara</td>
                                <td> DLIM/01/02 </td>
                                <td> 50</td>
                                <td> 60</td>
                                <td> 40</td>
                                <td> -</td>
                                <td> 50</td>
                                <td> c</td>
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
        <script>

        </script>
</body>

</html>