<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

    * {
        font-family: 'Poppins', sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .table {
        margin: 50px 0px 20px 0px;
        font-family: Poppins, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    .table tr {
        border: 1px solid #ddd;
        border-radius: 10px;

    }

    .table td,
    .table th {

        font-family: Poppins, sans-serif;
        border: 1px solid #ddd;
        padding: 8px;
        font-size: 14px;
        font-weight: 600px;
        text-align: center;
        ;
    }

    .table td {
        font-weight: 500px;
    }

    table.table tbody tr.selected {
        background-color: #CDEBFF;

    }

    .table tr:hover {
        /* background-color: #ddd !important; */
        border: 2px solid #17376E;
        border-radius: 10px;
    }

    .table th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        color: #7D7D7D;
    }

    input {
        border: none;
        cursor: pointer;
        color: #17376E;
        font-weight: 500;
        background: none;
        width: 100%;
        border: none;
    }

    input:focus {
        background-color: none;
        border: none;
    }

    .input-attendance {
        display: flex;
        align-items: center;
        background-color: #ffffff;
        gap: 1%;
        justify-content: center;
    }

    .custom-dropdown-attendance {
        position: relative;
        width: 45%;
        margin: 10px;
        border: #E2E2E2;
        min-width: 200px;
        font-size: 1vw;
    }

    .custom-dropdown-attendance .icon {
        position: absolute;
        top: 50%;
        left: 10px;
        transform: translateY(-50%);
        font-size: 25px;
        color: #000;

    }

    .custom-dropdown-attendance select {
        width: calc(100% - 40px);
        /* Adjusted width to leave space for the icon */
        padding: 10px;
        border: 1px solid #E2E2E2;
        border-radius: 5px;
        background-color: #E2E2E2;
        text-align: center;
        cursor: pointer;
        font-size: 16px;
        font-size: 1vw;

    }

    .custom-dropdown-attendance select:hover {
        background-color: #eeeeee;

    }

    .btn-primary {
        min-width: 10vh;
        color: #fff;
        height: 5vh;
        padding: 5px 5px 5px 5px;
        border-radius: 8px;
        background: #17376e;
        box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.2);
        border: 0px;
    }

    .btn-primary-name {
        font-size: 0.9vw;
        font-weight: 500px;
    }

    .btn-primary:hover {
        color: #17376e;
        background-color: white;
        border: 1px solid
    }

    .element-wraper {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .attendance-submit-button {
        display: flex;
        justify-content: center;
    }
</style>

<body>
    <div class="element-wraper">
        <form method="POST" id="examination-attendance">
            <div class="subject-dropdown">
                <div class="input-attendance">
                    <div class="custom-dropdown-attendance">
                        <div class="icon">
                            <i class='bx bx-search' style="width:20px ; height : 20px;"></i>
                        </div>

                        <select id="sub" name="subCode">
                            <?php foreach ($subNames as $subject): ?>
                                <?php $json = json_encode($subject); ?>

                                <option value=" <?= $subject->subjectCode ?>" name="subjectCode">
                                    <?= $subject->subjectName ?>
                                </option>

                            <?php endforeach; ?>

                        </select>



                    </div>
                    <button class="btn-primary" type="submit" name="submit" value="selectSubject">
                        <div class="btn-primary-name">
                            Search
                        </div>
                    </button>
                </div>


            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Index Number</th>
                        <th>Registration Number</th>
                        <th>Attempt</th>
                        <th>Subject Code</th>
                        <th>Student Type</th>
                        <th>
                            <input type="checkbox" class="checkAll" name="checkAll" />
                        </th>
                    </tr>
                    </tr>
                </thead>
                <tbody>
                    <!-- <?php foreach ($repeatStudents as $rStudent): ?>
                <?php $json = json_encode($rStudent); ?> -->
                        <tr>
                            <td><input type="text" name="indexNo[]" value=" <?= $rStudent->indexNo ?>" readonly>
                            </td>
                            <td><input type="text" name="regNo[]" value="DSL/2023/02" readonly></td>
                            <td><input type="text" name="attempt[]" value="  <?= $rStudent->attempt ?>" readonly>
                            </td>
                            <td><input type="text" name="subjectCode[]" value=" <?= $rStudent->subjectCode ?>" readonly>
                            </td>
                            <td><input type="text" name="studentType[]" value="Repeat" readonly></td>
                            <td><input type="checkbox" name="item[]" value="<?= $rStudent->id ?>"
                                    <?= isset($_SESSION['checked_RM_students'][$rStudent->id]) ? 'checked' : '' ?>></td>
                        </tr>
                        <!-- <?php endforeach; ?> -->

                    <tr>
                        <td><input type="text" name="indexNo[]" value="Yashed" readonly>
                        </td>
                        <td><input type="text" name="regNo[]" value="DSL/2023/02" readonly></td>
                        <td><input type="text" name="attempt[]" value="  Repeat" readonly>
                        </td>
                        <td><input type="text" name="subjectCode[]" value="ISS" readonly>
                        </td>
                        <td><input type="text" name="studentType[]" value="Repeat" readonly></td>
                        <td><input type="checkbox" name="item[]" value="gg"></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="indexNo[]" value="Yashed" readonly>
                        </td>
                        <td><input type="text" name="regNo[]" value="DSL/2023/02" readonly></td>
                        <td><input type="text" name="attempt[]" value="  Repeat" readonly>
                        </td>
                        <td><input type="text" name="subjectCode[]" value="ISS" readonly>
                        </td>
                        <td><input type="text" name="studentType[]" value="Repeat" readonly></td>
                        <td><input type="checkbox" name="item[]" value="gg"></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="indexNo[]" value="Yashed" readonly>
                        </td>
                        <td><input type="text" name="regNo[]" value="DSL/2023/02" readonly></td>
                        <td><input type="text" name="attempt[]" value="  Repeat" readonly>
                        </td>
                        <td><input type="text" name="subjectCode[]" value="ISS" readonly>
                        </td>
                        <td><input type="text" name="studentType[]" value="Repeat" readonly></td>
                        <td><input type="checkbox" name="item[]" value="gg"></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="indexNo[]" value="Yashed" readonly>
                        </td>
                        <td><input type="text" name="regNo[]" value="DSL/2023/02" readonly></td>
                        <td><input type="text" name="attempt[]" value="  Repeat" readonly>
                        </td>
                        <td><input type="text" name="subjectCode[]" value="ISS" readonly>
                        </td>
                        <td><input type="text" name="studentType[]" value="Repeat" readonly></td>
                        <td><input type="checkbox" name="item[]" value="gg"></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="indexNo[]" value="Yashed" readonly>
                        </td>
                        <td><input type="text" name="regNo[]" value="DSL/2023/02" readonly></td>
                        <td><input type="text" name="attempt[]" value="  Repeat" readonly>
                        </td>
                        <td><input type="text" name="subjectCode[]" value="ISS" readonly>
                        </td>
                        <td><input type="text" name="studentType[]" value="Repeat" readonly></td>
                        <td><input type="checkbox" name="item[]" value="gg"></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="indexNo[]" value="Yashed" readonly>
                        </td>
                        <td><input type="text" name="regNo[]" value="DSL/2023/02" readonly></td>
                        <td><input type="text" name="attempt[]" value="  Repeat" readonly>
                        </td>
                        <td><input type="text" name="subjectCode[]" value="ISS" readonly>
                        </td>
                        <td><input type="text" name="studentType[]" value="Repeat" readonly></td>
                        <td><input type="checkbox" name="item[]" value="gg"></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="indexNo[]" value="Yashed" readonly>
                        </td>
                        <td><input type="text" name="regNo[]" value="DSL/2023/02" readonly></td>
                        <td><input type="text" name="attempt[]" value="  Repeat" readonly>
                        </td>
                        <td><input type="text" name="subjectCode[]" value="ISS" readonly>
                        </td>
                        <td><input type="text" name="studentType[]" value="Repeat" readonly></td>
                        <td><input type="checkbox" name="item[]" value="gg"></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="indexNo[]" value="Yashed" readonly>
                        </td>
                        <td><input type="text" name="regNo[]" value="DSL/2023/02" readonly></td>
                        <td><input type="text" name="attempt[]" value="  Repeat" readonly>
                        </td>
                        <td><input type="text" name="subjectCode[]" value="ISS" readonly>
                        </td>
                        <td><input type="text" name="studentType[]" value="Repeat" readonly></td>
                        <td><input type="checkbox" name="item[]" value="gg"></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="indexNo[]" value="Yashed" readonly>
                        </td>
                        <td><input type="text" name="regNo[]" value="DSL/2023/02" readonly></td>
                        <td><input type="text" name="attempt[]" value="  Repeat" readonly>
                        </td>
                        <td><input type="text" name="subjectCode[]" value="ISS" readonly>
                        </td>
                        <td><input type="text" name="studentType[]" value="Repeat" readonly></td>
                        <td><input type="checkbox" name="item[]" value="gg"></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="indexNo[]" value="Yashed" readonly>
                        </td>
                        <td><input type="text" name="regNo[]" value="DSL/2023/02" readonly></td>
                        <td><input type="text" name="attempt[]" value="  Repeat" readonly>
                        </td>
                        <td><input type="text" name="subjectCode[]" value="ISS" readonly>
                        </td>
                        <td><input type="text" name="studentType[]" value="Repeat" readonly></td>
                        <td><input type="checkbox" name="item[]" value="gg"></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="indexNo[]" value="Yashed" readonly>
                        </td>
                        <td><input type="text" name="regNo[]" value="DSL/2023/02" readonly></td>
                        <td><input type="text" name="attempt[]" value="  Repeat" readonly>
                        </td>
                        <td><input type="text" name="subjectCode[]" value="ISS" readonly>
                        </td>
                        <td><input type="text" name="studentType[]" value="Repeat" readonly></td>
                        <td><input type="checkbox" name="item[]" value="gg"></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="indexNo[]" value="Yashed" readonly>
                        </td>
                        <td><input type="text" name="regNo[]" value="DSL/2023/02" readonly></td>
                        <td><input type="text" name="attempt[]" value="  Repeat" readonly>
                        </td>
                        <td><input type="text" name="subjectCode[]" value="ISS" readonly>
                        </td>
                        <td><input type="text" name="studentType[]" value="Repeat" readonly></td>
                        <td><input type="checkbox" name="item[]" value="gg"></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="indexNo[]" value="Yashed" readonly>
                        </td>
                        <td><input type="text" name="regNo[]" value="DSL/2023/02" readonly></td>
                        <td><input type="text" name="attempt[]" value="  Repeat" readonly>
                        </td>
                        <td><input type="text" name="subjectCode[]" value="ISS" readonly>
                        </td>
                        <td><input type="text" name="studentType[]" value="Repeat" readonly></td>
                        <td><input type="checkbox" name="item[]" value="gg"></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="indexNo[]" value="Yashed" readonly>
                        </td>
                        <td><input type="text" name="regNo[]" value="DSL/2023/02" readonly></td>
                        <td><input type="text" name="attempt[]" value="  Repeat" readonly>
                        </td>
                        <td><input type="text" name="subjectCode[]" value="ISS" readonly>
                        </td>
                        <td><input type="text" name="studentType[]" value="Repeat" readonly></td>
                        <td><input type="checkbox" name="item[]" value="gg"></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="indexNo[]" value="Yashed" readonly>
                        </td>
                        <td><input type="text" name="regNo[]" value="DSL/2023/02" readonly></td>
                        <td><input type="text" name="attempt[]" value="  Repeat" readonly>
                        </td>
                        <td><input type="text" name="subjectCode[]" value="ISS" readonly>
                        </td>
                        <td><input type="text" name="studentType[]" value="Repeat" readonly></td>
                        <td><input type="checkbox" name="item[]" value="gg"></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="indexNo[]" value="Yashed" readonly>
                        </td>
                        <td><input type="text" name="regNo[]" value="DSL/2023/02" readonly></td>
                        <td><input type="text" name="attempt[]" value="  Repeat" readonly>
                        </td>
                        <td><input type="text" name="subjectCode[]" value="ISS" readonly>
                        </td>
                        <td><input type="text" name="studentType[]" value="Repeat" readonly></td>
                        <td><input type="checkbox" name="item[]" value="gg"></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="indexNo[]" value="Yashed" readonly>
                        </td>
                        <td><input type="text" name="regNo[]" value="DSL/2023/02" readonly></td>
                        <td><input type="text" name="attempt[]" value="  Repeat" readonly>
                        </td>
                        <td><input type="text" name="subjectCode[]" value="ISS" readonly>
                        </td>
                        <td><input type="text" name="studentType[]" value="Repeat" readonly></td>
                        <td><input type="checkbox" name="item[]" value="gg"></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="indexNo[]" value="Yashed" readonly>
                        </td>
                        <td><input type="text" name="regNo[]" value="DSL/2023/02" readonly></td>
                        <td><input type="text" name="attempt[]" value="  Repeat" readonly>
                        </td>
                        <td><input type="text" name="subjectCode[]" value="ISS" readonly>
                        </td>
                        <td><input type="text" name="studentType[]" value="Repeat" readonly></td>
                        <td><input type="checkbox" name="item[]" value="gg"></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="indexNo[]" value="Yashed" readonly>
                        </td>
                        <td><input type="text" name="regNo[]" value="DSL/2023/02" readonly></td>
                        <td><input type="text" name="attempt[]" value="  Repeat" readonly>
                        </td>
                        <td><input type="text" name="subjectCode[]" value="ISS" readonly>
                        </td>
                        <td><input type="text" name="studentType[]" value="Repeat" readonly></td>
                        <td><input type="checkbox" name="item[]" value="gg"></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="indexNo[]" value="Yashed" readonly>
                        </td>
                        <td><input type="text" name="regNo[]" value="DSL/2023/02" readonly></td>
                        <td><input type="text" name="attempt[]" value="  Repeat" readonly>
                        </td>
                        <td><input type="text" name="subjectCode[]" value="ISS" readonly>
                        </td>
                        <td><input type="text" name="studentType[]" value="Repeat" readonly></td>
                        <td><input type="checkbox" name="item[]" value="gg"></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="indexNo[]" value="Yashed" readonly>
                        </td>
                        <td><input type="text" name="regNo[]" value="DSL/2023/02" readonly></td>
                        <td><input type="text" name="attempt[]" value="  Repeat" readonly>
                        </td>
                        <td><input type="text" name="subjectCode[]" value="ISS" readonly>
                        </td>
                        <td><input type="text" name="studentType[]" value="Repeat" readonly></td>
                        <td><input type="checkbox" name="item[]" value="gg"></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="indexNo[]" value="Yashed" readonly>
                        </td>
                        <td><input type="text" name="regNo[]" value="DSL/2023/02" readonly></td>
                        <td><input type="text" name="attempt[]" value="  Repeat" readonly>
                        </td>
                        <td><input type="text" name="subjectCode[]" value="ISS" readonly>
                        </td>
                        <td><input type="text" name="studentType[]" value="Repeat" readonly></td>
                        <td><input type="checkbox" name="item[]" value="gg"></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="indexNo[]" value="Yashed" readonly>
                        </td>
                        <td><input type="text" name="regNo[]" value="DSL/2023/02" readonly></td>
                        <td><input type="text" name="attempt[]" value="  Repeat" readonly>
                        </td>
                        <td><input type="text" name="subjectCode[]" value="ISS" readonly>
                        </td>
                        <td><input type="text" name="studentType[]" value="Repeat" readonly></td>
                        <td><input type="checkbox" name="item[]" value="gg"></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="indexNo[]" value="Yashed" readonly>
                        </td>
                        <td><input type="text" name="regNo[]" value="DSL/2023/02" readonly></td>
                        <td><input type="text" name="attempt[]" value="  Repeat" readonly>
                        </td>
                        <td><input type="text" name="subjectCode[]" value="ISS" readonly>
                        </td>
                        <td><input type="text" name="studentType[]" value="Repeat" readonly></td>
                        <td><input type="checkbox" name="item[]" value="gg"></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="indexNo[]" value="Yashed" readonly>
                        </td>
                        <td><input type="text" name="regNo[]" value="DSL/2023/02" readonly></td>
                        <td><input type="text" name="attempt[]" value="  Repeat" readonly>
                        </td>
                        <td><input type="text" name="subjectCode[]" value="ISS" readonly>
                        </td>
                        <td><input type="text" name="studentType[]" value="Repeat" readonly></td>
                        <td><input type="checkbox" name="item[]" value="gg"></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="indexNo[]" value="Yashed" readonly>
                        </td>
                        <td><input type="text" name="regNo[]" value="DSL/2023/02" readonly></td>
                        <td><input type="text" name="attempt[]" value="  Repeat" readonly>
                        </td>
                        <td><input type="text" name="subjectCode[]" value="ISS" readonly>
                        </td>
                        <td><input type="text" name="studentType[]" value="Repeat" readonly></td>
                        <td><input type="checkbox" name="item[]" value="gg"></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="indexNo[]" value="Yashed" readonly>
                        </td>
                        <td><input type="text" name="regNo[]" value="DSL/2023/02" readonly></td>
                        <td><input type="text" name="attempt[]" value="  Repeat" readonly>
                        </td>
                        <td><input type="text" name="subjectCode[]" value="ISS" readonly>
                        </td>
                        <td><input type="text" name="studentType[]" value="Repeat" readonly></td>
                        <td><input type="checkbox" name="item[]" value="gg"></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="indexNo[]" value="Yashed" readonly>
                        </td>
                        <td><input type="text" name="regNo[]" value="DSL/2023/02" readonly></td>
                        <td><input type="text" name="attempt[]" value="  Repeat" readonly>
                        </td>
                        <td><input type="text" name="subjectCode[]" value="ISS" readonly>
                        </td>
                        <td><input type="text" name="studentType[]" value="Repeat" readonly></td>
                        <td><input type="checkbox" name="item[]" value="gg"></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="indexNo[]" value="Yashed" readonly>
                        </td>
                        <td><input type="text" name="regNo[]" value="DSL/2023/02" readonly></td>
                        <td><input type="text" name="attempt[]" value="  Repeat" readonly>
                        </td>
                        <td><input type="text" name="subjectCode[]" value="ISS" readonly>
                        </td>
                        <td><input type="text" name="studentType[]" value="Repeat" readonly></td>
                        <td><input type="checkbox" name="item[]" value="gg"></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="indexNo[]" value="Yashed" readonly>
                        </td>
                        <td><input type="text" name="regNo[]" value="DSL/2023/02" readonly></td>
                        <td><input type="text" name="attempt[]" value="  Repeat" readonly>
                        </td>
                        <td><input type="text" name="subjectCode[]" value="ISS" readonly>
                        </td>
                        <td><input type="text" name="studentType[]" value="Repeat" readonly></td>
                        <td><input type="checkbox" name="item[]" value="gg"></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="indexNo[]" value="Yashed" readonly>
                        </td>
                        <td><input type="text" name="regNo[]" value="DSL/2023/02" readonly></td>
                        <td><input type="text" name="attempt[]" value="  Repeat" readonly>
                        </td>
                        <td><input type="text" name="subjectCode[]" value="ISS" readonly>
                        </td>
                        <td><input type="text" name="studentType[]" value="Repeat" readonly></td>
                        <td><input type="checkbox" name="item[]" value="gg"></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="indexNo[]" value="Yashed" readonly>
                        </td>
                        <td><input type="text" name="regNo[]" value="DSL/2023/02" readonly></td>
                        <td><input type="text" name="attempt[]" value="  Repeat" readonly>
                        </td>
                        <td><input type="text" name="subjectCode[]" value="ISS" readonly>
                        </td>
                        <td><input type="text" name="studentType[]" value="Repeat" readonly></td>
                        <td><input type="checkbox" name="item[]" value="gg"></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="indexNo[]" value="Yashed" readonly>
                        </td>
                        <td><input type="text" name="regNo[]" value="DSL/2023/02" readonly></td>
                        <td><input type="text" name="attempt[]" value="  Repeat" readonly>
                        </td>
                        <td><input type="text" name="subjectCode[]" value="ISS" readonly>
                        </td>
                        <td><input type="text" name="studentType[]" value="Repeat" readonly></td>
                        <td><input type="checkbox" name="item[]" value="gg"></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="indexNo[]" value="Yashed" readonly>
                        </td>
                        <td><input type="text" name="regNo[]" value="DSL/2023/02" readonly></td>
                        <td><input type="text" name="attempt[]" value="  Repeat" readonly>
                        </td>
                        <td><input type="text" name="subjectCode[]" value="ISS" readonly>
                        </td>
                        <td><input type="text" name="studentType[]" value="Repeat" readonly></td>
                        <td><input type="checkbox" name="item[]" value="gg"></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="indexNo[]" value="Yashed" readonly>
                        </td>
                        <td><input type="text" name="regNo[]" value="DSL/2023/02" readonly></td>
                        <td><input type="text" name="attempt[]" value="  Repeat" readonly>
                        </td>
                        <td><input type="text" name="subjectCode[]" value="ISS" readonly>
                        </td>
                        <td><input type="text" name="studentType[]" value="Repeat" readonly></td>
                        <td><input type="checkbox" name="item[]" value="gg"></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="indexNo[]" value="Yashed" readonly>
                        </td>
                        <td><input type="text" name="regNo[]" value="DSL/2023/02" readonly></td>
                        <td><input type="text" name="attempt[]" value="  Repeat" readonly>
                        </td>
                        <td><input type="text" name="subjectCode[]" value="ISS" readonly>
                        </td>
                        <td><input type="text" name="studentType[]" value="Repeat" readonly></td>
                        <td><input type="checkbox" name="item[]" value="gg"></td>
                    </tr>


                </tbody>
            </table>
            <div class="attendance-submit-button">
                <button class="btn-primary" type="submit" name='attendance' value='attendance'>Next</button>
            </div>
        </form>
    </div>
</body>
<script>

    $(document).ready(function () {
        $(".checkAll").on("click", function () {
            $(this)
                .closest("table")
                .find("tbody :checkbox")
                .prop("checked", this.checked)
                .closest("tr")
                .toggleClass("selected", this.checked);
        });

        $("tbody :checkbox").on("click", function () {
            // toggle selected class to the checkbox in a row
            $(this)
                .closest("tr")
                .toggleClass("selected", this.checked);

            // add selected class on check all
            $(this).closest("table")
                .find(".checkAll")
                .prop("checked",
                    $(this)
                        .closest("table")
                        .find("tbody :checkbox:checked").length ==
                    $(this)
                        .closest("table")
                        .find("tbody :checkbox").length
                );
        });
    });
</script>