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
    <title>exam-create</title>
</head>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

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
        margin: 30px 0px 10px 0px;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
    }

    .progress-bar {
        width: 100%;
        height: 10px;
        background-color: #CDEBFF;
        border-radius: 10px;
    }

    .progress-bar-active {
        width: 0.6%;
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
        font-size: 14px;
        font-weight: 600px;
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

    input {
        border: none;
        cursor: pointer;
        color: #17376E;
        font-weight: 500;
        background: none;
        width: 100%
    }

    .examination-details {
        display: flex;
        flex-direction: column;
        margin-top: 5vw;
        gap: 3vw;
        justify-content: center;
        align-items: center;

    }

    select {
        width: 80%;
        padding: 10px;
        border: 1px solid #E2E2E2;
        border-radius: 5px;
        background-color: #E2E2E2;
        text-align: center;
        cursor: pointer;
        font-size: 16px;
        font-size: 1vw;
        height: 3vw;
        margin-left: 10px;

    }

    select:hover {
        background-color: #eeeeee;

    }

    .semester-dropdown {
        display: flex;
        flex-direction: column;
        width: 100%;
        align-items: center;
        gap: 3vw;
    }

    .exam-type-dropdown {
        display: flex;
        flex-direction: column;
        width: 100%;
        align-items: center;
        gap: 3vw;
    }


    .semester-select-lable {
        width: 80%;
        font-size: 1.2vw;
        color: #000;
        font-weight: 500;
    }

    .exam-type-lable {
        width: 80%;
        font-size: 1.2vw;
        color: #000;
        font-weight: 500;
    }
</style>

<body>
    <div class="exam-create-home">
        <div class="exam-create-title">Create Examination</div>
        <div class="exam-create-subsection-1">
            <div class="exam-create-sub-title">
                Select Exam Category

                <div class="exam-create-steps">
                    <form method="post" id='normal-studnet-select'>
                        <div class="examination-details">
                            <div class="semester-dropdown">
                                <label class="semester-select-lable">Select the Semester</label>
                                <select name="semester" class='select-semester'>

                                    <option value="1">Semester 01</option>
                                    <option value="2">Semester 02 </option>

                                </select>
                            </div>
                            <div class="exam-type-dropdown">
                                <label class="exam-type-lable">Select Examination Type</label>
                                <select name="exam-type" class=select-exam-type>

                                    <option value="normal">Normal Examination</option>
                                    <option value="special">Special Examination</option>

                                </select>
                            </div>
                        </div>
                        <div class="exam-buttons">
                            <div class="cancel-button">
                                <button class="btn-secondary" type="button" onClick="
                                    location.href='<?= ROOT ?>sar/examination'" value='cancel'>Cancel</button>

                            </div>
                            <div class=" next-button">
                                <div class="next-button">
                                    <button class="btn-primary" type="submit" name='submit' value='next0'>Next</button>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>


            </div>

        </div>

        <div class="exam-create-footer">
            <?php $this->view('components/footer/index', $data) ?>
        </div>
        <script>
            $(document).ready(function () {
                $(".checkAll").on("click", function () {
                    $(this)
                        .closest("table")
                        .find("tbody .itemCheckbox")
                        .prop("checked", this.checked)
                        .closest("tr")
                        .toggleClass("selected", this.checked);
                    updateHiddenInputs(this);
                });

                $("tbody .itemCheckbox").on("click", function () {
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
                                .find("tbody .itemCheckbox:checked").length ==
                            $(this)
                                .closest("table")
                                .find("tbody .itemCheckbox").length
                        );
                });
            });

            function redirectToPage() {
                event.preventDefault();
                location.href = '<?= ROOT ?>sar/examination/create/2';
            }


            var endpointUrl = '<?= ROOT ?>sar/examination/create/1';
            console.log(endpointUrl);

            function sendSelectedRows() {
                var selectedRows = [];

                // Iterate through each checkbox in the table
                $('input[name="item[]"]:checked').each(function () {
                    var row = $(this).closest('tr'); // Get the parent row
                    var rowData = {
                        name: row.find('td:nth-child(2)').text(),
                        attempt: row.find('td:nth-child(3)').text(),
                        indexNumber: row.find('td:nth-child(4)').text(),
                        registrationNumber: row.find('td:nth-child(5)').text(),
                        mail: row.find('td:nth-child(6)').text()
                    };
                    selectedRows.push(rowData);
                });

                // Send the selected rows to the backend using an AJAX POST request
                $.ajax({
                    type: 'POST',
                    url: endpointUrl,
                    data: JSON.stringify({ items: selectedRows }), // Wrap the data in an object
                    contentType: 'application/json',
                    dataType: 'json',
                    success: function (response) {
                        console.log(response);
                    },
                    error: function (error) {
                        console.error(error);
                    }
                });
            }

            function updateCheckboxValues() {
                var formData = new FormData();
                var checkboxes = document.querySelectorAll('.itemCheckbox');

                checkboxes.forEach(function (cb, index) {
                    formData.append('item[]', cb.checked ? 1 : 0);
                    // console.log('form=', formData.getAll('item[]'));
                });


                fetch(endpointUrl, {
                    method: 'POST',
                    body: formData
                })
                    .then(response => response.json())
                    .then(data => console.log(data))
                    .catch(error => console.error('Error:', error));
            }


        </script>



</body>


</html>