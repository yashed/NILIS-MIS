<?php

?>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

    * {
        font-family: 'Poppins', sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .table-body-container {
        margin: 50px 0px 20px 0px;
        max-height: 350px;
        overflow-y: auto;
    }

    /* 
    .table {
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
        font-size: 1vw;
        font-weight: 600px;
        text-align: center;

    }

    .table td {
        font-weight: 500px;

    } */

    /* table.table tbody tr.selected {
        background-color: #CDEBFF;

    } */

    .table tr:hover {
        /* background-color: #ddd !important; */
        border: 2px solid #17376E;
        border-radius: 10px;
    }

    /* .table th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        color: #7D7D7D;
        position: sticky;
        border: 1px solid #ddd;
    } */

    tbody {}

    #rm-th {
        font-family: Poppins, sans-serif;
        border: 0px solid #ddd;
        padding: 8px;
        font-size: 1vw;
        font-weight: 600px;
        text-align: center;
    }

    #rm-td {
        font-family: Poppins, sans-serif;
        border: 0px solid #ddd;
        padding: 8px;
        font-size: 1vw;
        font-weight: 500px;
        text-align: center;
    }

    #rm-td :hover {

        border: 2px solid #17376E;
        border-radius: 10px;
        background-color: #CDEBFF;

    }

    input {
        border: none;
        cursor: pointer;
        color: #17376E;
        font-weight: 500;
        background: none;
        width: 100%;
        border: none;
        font-size: 0.95vw;
        text-align: center;
    }

    input:focus {
        background-color: none;
        border: none;
    }

    .input-attendance {
        display: flex;
        align-items: center;
        background-color: #ffffff;
        gap: 20%;
        justify-content: space-between;
        width: 45vw;

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
        width: 35vw;
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
        height: 3vw;
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

    .close-btn {
        position: absolute;
        right: 10px;
        top: 10px;
        width: 15px;
        height: 15px;
        background: #17376e;
        color: #ffffff;
        text-align: center;
        line-height: 15px;
        border-radius: 15px;
        cursor: pointer;
    }

    .btn-secondary {
        width: 25%;
        background: #17376e;
        color: #ffffff;
        height: 4vh;
        padding: 5px 5px 5px 5px;
        border-radius: 8px;
        box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.2);
        border: 1px solid;
        margin-bottom: 10px;
        margin-top: 20px;
    }

    .btn-secondary:hover {
        color: #17376e;
        background-color: white;
        border: 1px solid #17376e;
    }

    .table-attendance-data {
        height: 10px;
        overflow: scroll;
    }

    .select-sub-msg {
        font-size: 1.5vw;
        font-weight: 500;
        color: #17376e;
        margin-top: 20px;
        width: 100%;
        height: 20vh;
        display: flex;
        justify-content: center;
        align-items: center;

    }

    .subject-dropdown {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .msg-error {
        font-size: 0.8vw;
        font-weight: 500;
        color: #ff3333;
        padding: 20px;
        margin-bottom: 10px;
        width: 100%;
        display: flex;
        justify-content: center;
        text-align: center;
        align-items: center;

    }
</style>

<body>
    <div class="element-wraper">
        <div class="close-btn" id="close-attendance-popup" onClick="closeAttendancePopup()">
            &times;
        </div>
        <form method="POST" id="examination-attendance">
            <button class="btn-primary" type="submit" name="absent-stu" value="absent">
                <div class="btn-primary-name">
                    Search
                </div>
            </button>
    </div>


    </div>
    <input type="text" name="option" value="<?= $option ?>" hidden>
    <?php if (!empty($rmStudents)): ?>
        <div class="table-body-container">
            <table class="table">
                <thead>
                    <tr>
                        <th id='rm-th'>Index Number</th>
                        <th id='rm-th'>Registration Number</th>
                        <th id='rm-th'>Attempt</th>
                        <th id='rm-th'>Subject Code</th>
                        <th id='rm-th'> Student Type</th>
                        <th>
                            <input type="checkbox" class="checkAll" name="checkAll" />
                        </th>
                    </tr>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($rmStudents as $rmstudent): ?>
                        <?php $json = json_encode($rmstudent); ?>
                        <tr>
                            <td id='rm-td'><input type="text" name="indexNo[]" value="<?= $rmstudent->indexNo ?>" readonly>
                                <input type="text" name="ids[]" value="<?= $rmstudent->id ?>" hidden>
                            </td>
                            <td><input type="text" name="regNo[]" value="<?= $rmstudent->regNo ?>" readonly></td>
                            <td><input type="text" name="attempt[]" value="<?= $rmstudent->attempt ?>" readonly>
                            </td>
                            <td><input type="text" name="subjectCode[]" value="<?= $rmstudent->subjectCode ?>" readonly>
                            </td>
                            <td><input type="text" name="studentType[]" value="<?php
                            if ($option == 'repete') {
                                echo 'Repeat';
                            } else if ($option == 'medical') {
                                echo 'Medical';
                            }
                            ?>" readonly>
                            </td>
                            <td>
                                <input type="checkbox" name="presentIds[]" value="<?= $rmstudent->id ?>">
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>
        </div>
        <div class='msg-error'>
            Please mark verified students and press submit button</br>
            *Note : This action cannot be undone
        </div>
        <div class="attendance-submit-button">
            <button class="btn-secondary" type="submit" name='submitStatus' value='status'>Submit Data</button>
        </div>
    <?php else: ?>
        <div class="select-sub-msg">Please Select a option</div>
    <?php endif; ?>
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

    function closeAttendancePopup() {
        document.querySelector("#absent-popup").classList.remove("active");
        document.querySelector("#body").classList.remove("active");
    }


</script>