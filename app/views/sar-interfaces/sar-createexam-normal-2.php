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
    <title>exam-create Dashboard</title>
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

    .exam-create-home {
        height: 100vh;
        left: 250px;
        position: relative;
        width: calc(100% - 250px);
        transition: var(--tran-05);
        background: var(--body-color);
    }

    .exam-create-title {
        font-size: 30px;
        font-weight: 600;
        color: black;
        padding: 10px 0px 10px 32px;
        background-color: var(--text-color);
        border-radius: 6px;
        margin: 7px 4px 7px 4px;
    }

    .sidebar.close~.exam-create-home {
        left: 88px;
        width: calc(100% - 88px);
    }

    .exam-create-subsection-0 {
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

    .exam-create-subsection-01 {
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

    .exam-create-subcard-data {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }

    .exam-create-subcard-data-value {
        font-size: 38px;
        font-weight: 600;
        color: #17376E;
    }

    .exam-create-subcard-data-title {
        font-size: 18px;
        font-weight: 600;
        color: #17376E;
    }

    .exam-create-subsection-1 {
        background-color: var(--text-color);
        padding: 10px 10px 30px 35px;
        border-radius: 6px;
        margin: 7px 4px 7px 4px;
    }

    .exam-create-sub-title {

        color: #17376E;
        font-family: Poppins;
        font-size: 22px;
        font-style: normal;
        font-weight: 600;
        margin: 40px;

    }

    .exam-create-subsection-2 {
        display: flex;
        flex-direction: row;
        justify-content: space-between;

        /* padding: 10px 10px 30px 35px; */
        /* border-radius: 6px; */
        /* margin: 7px 4px 7px 4px; */
    }

    .exam-create-subsection-21 {
        display: flex;
        flex-direction: column;
        background-color: var(--text-color);
        padding: 10px 10px 30px 35px;
        border-radius: 6px;
        margin: 3px 4px 7px 4px;
        width: 100%;
    }

    .exam-create-subsection-22 {
        background-color: var(--text-color);
        padding: 10px 10px 31px 35px;
        border-radius: 6px;
        margin: 3px 4px 7px 4px;
        width: 50%;
    }

    .exam-create-calender {
        display: flex;
        align-items: center;
        justify-content: center;

    }

    .exam-create-degree-bar {
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        flex-wrap: wrap;
        margin-bottom: 20px;
    }

    .exam-create-card1 {
        display: flex;
        flex-direction: column;
    }

    .exam-create-card2 {
        display: flex;
        flex-direction: column;
    }

    .exam-create-exam-bar {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        flex-wrap: nowrap;
        gap: 30px;
    }

    .exam-create-exam-card1 {
        display: flex;
        flex-direction: column;
    }

    .exam-create-exam-card2 {
        display: flex;
        flex-direction: column;
    }

    .form-subname {
        margin: 10px 0px 10px 0px;
        color: var(--black, #000);
        text-align: right;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        letter-spacing: 0.14px;
    }

    .progress {
        margin: 30px 0px 20px 0px;
    }

    .progress-bar {
        width: 100%;
        height: 10px;
        background-color: #CDEBFF;
        border-radius: 10px;
    }

    .progress-bar-active {
        width: 33%;
        height: 10px;
        background-color: #17376E;
        border-radius: 10px;

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

    .exam-buttons {
        margin-top: 100px;
        display: flex;
        flex-direction: row;
        justify-content: center;
        gap: 20px;
    }

    .btn-primary {
        min-width: 10vh;
        color: #fff;
        height: 5vh;
        padding: 5px 5px 5px 5px;
        border-radius: 12px;
        background: #17376e;
        box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.2);
        border: 0px;
        margin-bottom: 10px;
        /* margin-top: 25px; */
    }

    .bt-name {
        font-size: 16px;
        font-weight: 500px;
    }

    .btn-primary:hover {
        color: #17376e;
        background-color: white;
        border: 1px solid
    }

    .btn-secondary {
        min-width: 10vh;
        color: #17376e;
        background: white;
        height: 5vh;
        padding: 5px 5px 5px 5px;
        border-radius: 12px;
        box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.2);
        border: 1px solid;
        margin-bottom: 10px;
    }

    .btn-secondary:hover {
        color: black;
        background-color: #F9D2D2;
        border: 1px solid red;
    }
</style>

<body>
    <div class="exam-create-home">
        <div class="exam-create-title">Create Examination</div>
        <div class="exam-create-subsection-1">
            <div class="exam-create-sub-title">
                Add Participant

                <div class="exam-create-steps">
                    <div class="progress">
                        <lable class="form-subname">Select <span style="color:#17376E; font-weight:600">Repeated </span>
                            and <span style="color:#17376E; font-weight:600">Medical Approved </span> Students add to
                            the
                            examination</lable>

                    </div>
                    <div class="progress-bar">
                        <div class="progress-bar-active"></div>
                    </div>

                    <div class="degree-student-table">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        <input type="checkbox" class="checkAll" name="checkAll" />
                                    </th>
                                    <td><input type="checkbox" name="item[]" value="1"></td>
                                    <td><input type="text" name="name[]" value="H.A.Yashed Thisara"></td>
                                    <td><input type="text" name="attempt[]" value="01" readonly></td>
                                    <td><input type="text" name="index_number[]" value="DILIM01" readonly></td>
                                    <td><input type="text" name="registration_number[]" value="2023/DILIM/01" readonly></td>
                                    <td><input type="text" name="mail[]" value="yash@gmail.com" readonly></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="checkbox" name="item[]" value="1"></td>
                                    <td>H.A.Yashed Thisra</td>
                                    <td>01</td>
                                    <td>SCS001</td>
                                    <td>DSL001</td>
                                    <td>2021/DSL/001</td>
                                    <td>yash@gmail.com</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="item[]" value="1"></td>
                                    <td>H.A.Yashed Thisra</td>
                                    <td>01</td>
                                    <td>SCS001</td>
                                    <td>DSL001</td>
                                    <td>2021/DSL/001</td>
                                    <td>yash@gmail.com</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="item[]" value="1"></td>
                                    <td>H.A.Yashed Thisra</td>
                                    <td>01</td>
                                    <td>SCS001</td>
                                    <td>DSL001</td>
                                    <td>2021/DSL/001</td>
                                    <td>yash@gmail.com</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="item[]" value="1"></td>
                                    <td>H.A.Yashed Thisra</td>
                                    <td>01</td>
                                    <td>SCS001</td>
                                    <td>DSL001</td>
                                    <td>2021/DSL/001</td>
                                    <td>yash@gmail.com</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="item[]" value="1"></td>
                                    <td>H.A.Yashed Thisra</td>
                                    <td>01</td>
                                    <td>SCS001</td>
                                    <td>DSL001</td>
                                    <td>2021/DSL/001</td>
                                    <td>yash@gmail.com</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="item[]" value="1"></td>
                                    <td>H.A.Yashed Thisra</td>
                                    <td>01</td>
                                    <td>SCS001</td>
                                    <td>DSL001</td>
                                    <td>2021/DSL/001</td>
                                    <td>yash@gmail.com</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="item[]" value="1"></td>
                                    <td>H.A.Yashed Thisra</td>
                                    <td>01</td>
                                    <td>SCS001</td>
                                    <td>DSL001</td>
                                    <td>2021/DSL/001</td>
                                    <td>yash@gmail.com</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="item[]" value="1"></td>
                                    <td>H.A.Yashed Thisra</td>
                                    <td>01</td>
                                    <td>SCS001</td>
                                    <td>DSL001</td>
                                    <td>2021/DSL/001</td>
                                    <td>yash@gmail.com</td>
                                </tr>

                            </tbody>
                        </table>

                    </div>
                    <div class="exam-buttons">

                        <div class="cancel-button">
                            <button class="btn-secondary" type="submit" onClick="location.href='<?= ROOT ?>sar/examination/create/1'">Cancel</button>
                        </div>
                        <div class="next-button">
                            <button class="btn-primary" type="submit" onClick="location.href='<?= ROOT ?>sar/examination/create/3'">Next</button>
                        </div>
                    </div>
                </div>


            </div>

        </div>

        <div class="exam-create-footer">
            <?php $this->view('components/footer/index', $data) ?>
        </div>
        <script>
            $(document).ready(function() {
                $(".checkAll").on("click", function() {
                    $(this)
                        .closest("table")
                        .find("tbody :checkbox")
                        .prop("checked", this.checked)
                        .closest("tr")
                        .toggleClass("selected", this.checked);
                });

                $("tbody :checkbox").on("click", function() {
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
</body>


</html>