<?php
$role = "DR";
$data['role'] = $role;

// Get the degree ID from the URL parameter
$degreeId = isset($_GET['id']) ? $_GET['id'] : null;

// Fetch the degree data based on the ID
$degreeData = fetchDegreeDataById($degreeId);

function fetchDegreeDataById($degreeId)
{
    // Replace these with your actual database connection details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "nilis_db";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Sanitize the input to prevent SQL injection
    $degreeId = $conn->real_escape_string($degreeId);

    // Build and execute the SQL query
    $sql = "SELECT * FROM degree WHERE DegreeID = '$degreeId'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        // Fetch the degree data as an associative array
        $degreeData = $result->fetch_assoc();

        // Close the database connection
        $conn->close();

        return $degreeData;
    } else {
        // Handle the case where the degree with the given ID is not found
        // You may want to display an error message or redirect the user
        // to a different page.
        $conn->close();
        return null;
    }
}
?>
<?php $this->view('components/navside-bar/degreeprogramsidebar', $data) ?>
<?php $this->view('components/navside-bar/footer', $data) ?>

<!DOCTYPE html>
<html>

<head>
    <title>Degree Profile</title>
</head>
<style>
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

    .large-box {
        display: grid;
        grid-template-columns: 50% 50%;
        grid-template-rows: 10% 40% 50%;
    }

    .dr-large-box {
        height: 100vh;
        left: 250px;
        position: relative;
        width: calc(100% - 250px);
        transition: var(--tran-05);
        background: var(--body-color);
    }

    .sidebar.close~.dr-large-box {
        left: 88px;
        width: calc(100% - 88px);
    }

    .box_1 {
        border-radius: 5px;
        margin: 5px;
        padding: 0 2px 2px 2px;
        background-color: var(--text-color);
        grid-column: 1 / 3;
        grid-row: 1 / 1;
    }

    .box_2 {
        border-radius: 5px;
        margin: 0 5px 5px 5px;
        background-color: var(--text-color);
        grid-column: 1 / 1;
        grid-row: 2 / 2;
    }

    .box_3 {
        border-radius: 5px;
        margin: 0 5px 5px 0;
        background-color: var(--text-color);
        grid-column: 2 / 2;
        grid-row: 2/ 2;
    }

    .box_4 {
        border-radius: 5px;
        margin: 0 5px 5px 5px;
        background-color: var(--text-color);
        grid-column: 1 / 3;
        grid-row: 3/ 3;
    }

    .Overview_table {
        margin: 3%;
        border-spacing: 10px;
    }

    .Overview_table input {
        width: 90%;
        height: 35px;
        background: transparent;
        outline: none;
        border-radius: 5px;
        border: 1px solid gainsboro;
        padding: 0px 20px 0px 13px;
        margin-right: 40px;
    }

    #delete_degree {
        color: red;
        border-radius: 7px;
        width: 30%;
        height: auto;
        border: 2px solid red;
        padding: 5px 3px 3px 5px;
        cursor: pointer;
        margin-top: 25px;
    }

    #delete_degree:hover {
        color: white;
        background-color: red;
    }

    .Subject_table {
        margin: 5%;
        border-spacing: 5px;
        text-align: left;
    }

    .Subject_table input {
        width: 80%;
        height: 35px;
        background: transparent;
        outline: none;
        border-radius: 5px;
        border: 1px solid gainsboro;
        padding-left: 8px;
    }

    .credits {
        text-align: center;
    }

    .box_3_2 {
        overflow-y: auto;
        max-height: 70%;
    }

    .time_table {
        margin: 2% 5% 3% 5%;
        border-spacing: 5px;
        height: 35px;
        width: 90%;
    }

    .create_time_table_raw {
        margin: 1% 5% 3% 5%;
        border-spacing: 5px;
        align-items: center;
        height: 35px;
        width: 90%;
    }

    .box_4 input {
        width: 100%;
        height: 35px;
        background: transparent;
        outline: none;
        border-radius: 5px;
        border: 1px solid gainsboro;
    }

    .box_4 .event {
        width: 90%;
        padding-left: 10px;
    }

    .time_table .duration {
        text-align: center;
        width: 100%;
        height: 35px;
        outline: none;
        border-radius: 5px;
        border: 1px solid gainsboro;
    }

    .box_4_1 {
        overflow-y: auto;
        max-height: 75%;
    }

    .box_4_2 {
        padding-bottom: 60px;
    }

    #add_new_event {
        width: 100%;
        height: 35px;
        background: transparent;
        outline: none;
        border-radius: 5px;
        border: 1px solid gainsboro;
        color: gray;
        align-items: center;
        cursor: pointer;
    }

    #save,
    #update {
        background-color: #A8A8A8;
        border-radius: 7px;
        width: 100%;
        height: 35px;
        border-color: var(--text-color);
        font-weight: 500;
        margin-top: 7px;
    }

    #save:hover,
    #update:hover {
        background-color: #A8A8A8;
        color: var(--sidebar-color);
        border-radius: 7px;
        width: 100%;
        height: 35px;
        font-weight: 500;
        border-color: var(--sidebar-color);
        border-width: 2px;
    }

    .box_2 p,
    .box_3 p,
    .box_4 p {
        font-size: 20px;
        color: var(--sidebar-color);
        margin: 3% 0 0 5%;
        font-weight: 500;
    }

    .box_1 p {
        font-size: 30px;
        color: black;
        margin: 1% 1% 1% 3%;
    }
</style>

<body>
    <div class="dr-large-box">
        <div class="large-box">
            <div class="box_1">
                <p>Degree Name</p>
            </div>
            <div class="box_2">
                <p>Overview</p>
                <?php if ($degreeData) : ?>
                    <table class="Overview_table">
                        <tr>
                            <td>
                                <b>Diploma Name</b><br>
                                <input type="text" name="type" id="type" value="<?= $degreeData['DegreeShortName'] ?>" readonly>
                            </td>
                            <td>
                                <b>Academic Year</b><br>
                                <input type="text" name="year" id="year" value="<?= $degreeData['AcademicYear'] ?>" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Diploma Type</b><br>
                                <input type="text" name="type" id="type" value="<?= $degreeData['DegreeType'] ?>" readonly>
                            </td>
                            <td>
                                <b>Participants</b><br>
                                <input type="text" name="year" id="year" value="<?= $degreeData['AcademicYear'] ?>" readonly>
                            </td>
                        </tr>
                        <td colspan="2">
                            <center><button class="pin" id="delete_degree">Delete Degree</button></center>
                        </td>
                    </table>
                <?php else : ?>
                    <p>No data found for the specified degree ID.</p>
                <?php endif; ?>
            </div>
            <div class="box_3">
                <div class="box_3_2" id="semester_subjects_credits">
                    <div id="semester_container"></div>
                </div>
            </div>
            <form class="box_4" method="post">
                <p>Define Degree Time Table</p>
                <div class="box_4_1">
                    <table class="Time_table" id="Time_table">
                        <tr>
                            <th align="left">Event</th>
                            <th colspan="2">Duration</th>
                        </tr>
                        <tr>
                            <td width="76%"><input type="text" value="" name="event_1" class="event" id="event_1" placeholder="Mid Semester Break"></td>
                            <td width="14%"><select name="type_1" class="duration" id="type_1" style="padding: 0px 2px 0px 2px;">
                                    <option value="" default hidden>Event Type</option>
                                    <option value="Examination" <?= (set_value('type_1') === 'Examination') ? 'selected' : '' ?>>Examination</option>
                                    <option value="Study Leave" <?= (set_value('type_1') === 'Study Leave') ? 'selected' : '' ?>>Study Leave</option>
                                    <option value="Vacation" <?= (set_value('type_1') === 'Vacation') ? 'selected' : '' ?>>Vacation</option>
                                    <option value="Other" <?= (set_value('type_1') === 'Other') ? 'selected' : '' ?>>Other</option>
                                </select></td>
                            <td width="12%"><input type="date" value="" name="start_1" class="duration" id="start_1" placeholder=""></td>
                            <td width="12%"><input type="date" value="" name="end_1" class="duration" id="end_1" placeholder=""></td>
                        </tr>
                        <tr>
                            <td><input type="text" value="" name="event_2" class="event" id="event_2" placeholder="Study Leave"></td>
                            <td width="12%" padding-right="3px"><select name="type_1" class="duration" id="type_1">
                                    <option value="" default hidden>Event Type</option>
                                    <option value="Examination" <?= (set_value('type_2') === 'Examination') ? 'selected' : '' ?>>Examination</option>
                                    <option value="Study Leave" <?= (set_value('type_2') === 'Study Leave') ? 'selected' : '' ?>>Study Leave</option>
                                    <option value="Vacation" <?= (set_value('type_2') === 'Vacation') ? 'selected' : '' ?>>Vacation</option>
                                    <option value="Other" <?= (set_value('type_2') === 'Other') ? 'selected' : '' ?>>Other</option>
                                </select></td>
                            <td><input type="date" value="" name="start_2" class="duration" id="start_2" placeholder=""></td>
                            <td><input type="date" value="" name="end_2" class="duration" id="end_2" placeholder=""></td>
                        </tr>
                        <tr>
                            <td><input type="text" value="" name="event_3" class="event" id="event_3" placeholder="First Semester Examination"></td>
                            <td width="12%" padding-right="3px"><select name="type_1" class="duration" id="type_1">
                                    <option value="" default hidden>Event Type</option>
                                    <option value="Examination" <?= (set_value('type_3') === 'Examination') ? 'selected' : '' ?>>Examination</option>
                                    <option value="Study Leave" <?= (set_value('type_3') === 'Study Leave') ? 'selected' : '' ?>>Study Leave</option>
                                    <option value="Vacation" <?= (set_value('type_3') === 'Vacation') ? 'selected' : '' ?>>Vacation</option>
                                    <option value="Other" <?= (set_value('type_3') === 'Other') ? 'selected' : '' ?>>Other</option>
                                </select></td>
                            <td><input type="date" value="" name="start_3" class="duration" id="start_3" placeholder=""></td>
                            <td><input type="date" value="" name="end_3" class="duration" id="end_3" placeholder=""></td>
                        </tr>
                        <tr>
                            <td><input type="text" value="" name="event_4" class="event" id="event_4" placeholder="Second Semester Examination"></td>
                            <td width="12%" padding-right="3px"><select name="type_1" class="duration" id="type_1">
                                    <option value="" default hidden>Event Type</option>
                                    <option value="Examination" <?= (set_value('type_4') === 'Examination') ? 'selected' : '' ?>>Examination</option>
                                    <option value="Study Leave" <?= (set_value('type_4') === 'Study Leave') ? 'selected' : '' ?>>Study Leave</option>
                                    <option value="Vacation" <?= (set_value('type_4') === 'Vacation') ? 'selected' : '' ?>>Vacation</option>
                                    <option value="Other" <?= (set_value('type_4') === 'Other') ? 'selected' : '' ?>>Other</option>
                                </select></td>
                            <td><input type="date" value="" name="start_4" class="duration" id="start_4" placeholder=""></td>
                            <td><input type="date" value="" name="end_4" class="duration" id="end_4" placeholder=""></td>
                        </tr>
                    </table>
                </div>
                <div class="box_4_2">
                    <table class="create_time_table_raw">
                        <tr>
                            <th colspan="3"><button class="add-new-event" id="add_new_event">&#128198 Add New Event</button></th>
                        </tr>
                        <tr>
                            <td></td>
                            <td width="12%"><button class="pin" type="submit" id="save">Update</button></td>
                            <td width="12%"><button class="pin" type="submit" id="save">Save</button></td>
                        </tr>
                    </table>
                </div>
            </form>
        </div>
        <div class="dr-footer">
            <?php $this->view('components/footer/index', $data) ?>
        </div>
    </div>
</body>
<script>
    let add = document.querySelector("#add_new_event");
    let table = document.querySelector(".Time_table");
    let i = 5;
    add.addEventListener("click", () => {
        let template = `
        <tr>
                    <td><input type="text" value="" name="event_${i}" class="event" id="event_${i}" placeholder="New Event"></td>
                    <td width="12%" padding-right="3px"><select name="type_${i}"  class="duration" id="type_${i}">
                                <option value="" default hidden>Event Type</option>
                                <option value="Examination" <?= (set_value('type_${i}') === 'Examination') ? 'selected' : '' ?>>Examination</option>
                                <option value="Study Leave" <?= (set_value('type_${i}') === 'Study Leave') ? 'selected' : '' ?>>Study Leave</option>
                                <option value="Vacation" <?= (set_value('type_${i}') === 'Vacation') ? 'selected' : '' ?>>Vacation</option>
                                <option value="Other" <?= (set_value('type_${i}') === 'Other') ? 'selected' : '' ?>>Other</option>
                            </select></td>
                    <td><input type="date" value="" name="start_${i}" class="duration" id="start_${i}" placeholder=""></td>
                    <td><input type="date" value="" name="end_${i}" class="duration" id="end_${i}" placeholder=""></td>
                </tr>
            `;
        i++;
        let newRow = document.createElement("tr");
        newRow.innerHTML = template;
        table.appendChild(newRow);
    });
</script>

</html>