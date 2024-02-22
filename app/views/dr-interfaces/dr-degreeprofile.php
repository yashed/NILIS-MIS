<?php
$role = "DR";
$data['role'] = $role;
?>
<!-- <?php $this->view('components/navside-bar/degreeprogramsidebar', $data) ?>
<?php $this->view('components/navside-bar/footer', $data) ?> -->

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
        display: none;
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

    #save:hover:disabled,
    #update:hover:disabled {
        color: rgba(16, 16, 16, 0.3);
        border-radius: 7px;
        width: 100%;
        height: 35px;
        border-color: var(--text-color);
        font-weight: 500;
        margin-top: 7px;
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
                <?php if (!empty($degrees)) : ?>
                    <p><?= $degrees[0]->DegreeName ?></p>
                <?php else : ?>
                    <p>No data found for the specified degree ID.</p>
                <?php endif; ?>
            </div>
            <div class="box_2">
                <p>Overview</p>
                <?php if ($degrees) : ?>
                    <table class="Overview_table">
                        <tr>
                            <td>
                                <b>Diploma Name</b><br>
                                <input type="text" name="type" id="type" value="<?= $degrees[0]->DegreeShortName ?>" readonly>
                            </td>
                            <td>
                                <b>Academic Year</b><br>
                                <input type="text" name="year" id="year" value="<?= $degrees[0]->AcademicYear ?>" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Diploma Type</b><br>
                                <input type="text" name="type" id="type" value="<?= $degrees[0]->DegreeType ?>" readonly>
                            </td>
                            <td>
                                <b>Participants</b><br>
                                <input type="text" name="year" id="year" value="<?= $degrees[0]->AcademicYear ?>" readonly>
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
                    <?php if ($subjects) : ?>
                        <div id="semester_container">
                            <?php foreach ($subjects as $semesterNumber => $semesterSubjects) : ?>
                                <table class="Subject_table">
                                    <p id="Semester" name="semester" class="semester<?= $semesterNumber ?>">Semester <?= $semesterNumber ?></p>
                                    <tr>
                                        <th>Subject Name</th>
                                        <th>Subject Code</th>
                                        <th>Credits</th>
                                    </tr>
                                    <?php foreach ($semesterSubjects as $subject) : ?>
                                        <tr>
                                            <td><input style="width: 130px; margin-right: 14px;" value="<?= $subject->SubjectName ?>" type="text" name="SubjectName" class="SubjectName" placeholder="Subject" id="SubjectName<?= $semesterNumber ?>_<?= $subject->SubjectID ?>" style="border: 1px solid #ccc;" readonly></td>
                                            <td><input style="width: 130px; margin-right: 14px;" value="<?= $subject->SubjectCode ?>" type="text" name="SubjectCode" class="SubjectCode" placeholder="Subject Code" id="SubjectCode<?= $semesterNumber ?>_<?= $subject->SubjectID ?>" style="border: 1px solid #ccc;" readonly></td>
                                            <td><input style="width: 60px;" value="<?= $subject->NoCredits ?>" type="number" name="NoCredits" class="NoCredits" placeholder="Credits" id="NoCredits<?= $semesterNumber ?>_<?= $subject->SubjectID ?>" style="border: 1px solid #ccc;" readonly></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            <?php endforeach; ?>
                        </div>
                    <?php else : ?>
                        <p>No data found for the specified degree ID.</p>
                    <?php endif; ?>
                </div>
            </div>
            <form class="box_4" method="post" action="<?= ROOT ?>dr/degreeprofile/update?id=<?= $degrees[0]->$degreeID ?>">
                <p>Define Degree Time Table</p>
                <div class="box_4_1">
                    <table class="Time_table" id="Time_table">
                        <tr>
                            <th align="left">Event</th>
                            <th colspan="2">Duration</th>
                        </tr>
                        <?php foreach ($degreeTimeTable as $event) : ?>
                            <tr>
                                <td width="76%"><input type="text" value="<?= $event->EventName ?>" name="event_<?= $event->id ?>" class="event" id="event_<?= $event->id ?>" readonly></td>
                                <td width="14%"><select name="type_<?= $event->id ?>" class="duration" id="type_<?= $event->id ?>">
                                        <option value="" default hidden>Event Type</option>
                                        <option value="Examination" <?= ($event->EventType === 'Examination') ? 'selected' : '' ?> disabled>Examination</option>
                                        <option value="Study Leave" <?= ($event->EventType === 'Study Leave') ? 'selected' : '' ?> disabled>Study Leave</option>
                                        <option value="Vacation" <?= ($event->EventType === 'Vacation') ? 'selected' : '' ?> disabled>Vacation</option>
                                        <option value="Other" <?= ($event->EventType === 'Other') ? 'selected' : '' ?> disabled>Other</option>
                                    </select></td>
                                <td width="12%"><input type="date" value="<?= $event->StartingDate ?>" name="start_<?= $event->id ?>" class="duration" id="start_<?= $event->id ?>" readonly></td>
                                <td width="12%"><input type="date" value="<?= $event->EndingDate ?>" name="end_<?= $event->id ?>" class="duration" id="end_<?= $event->id ?>" readonly></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <div class="box_4_2">
                    <table class="create_time_table_raw">
                        <tr>
                            <th colspan="3"><button class="add-new-event" type="button" id="add_new_event">&#128198 Add New Event</button></th>
                        </tr>
                        <tr>
                            <td></td>
                            <td width="12%"><button class="pin" type="submit" id="update">Update</button></td>
                            <td width="12%"><button class="pin" type="submit" id="save" disabled>Save</button></td>
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
    document.addEventListener("DOMContentLoaded", function() {
        let add = document.querySelector("#add_new_event");
        let table = document.querySelector(".Time_table");
        let i = 5;
        add.addEventListener("click", () => {
            let template = `
        <tr>
                    <td><input type="text" value="" class="event" id="event_${i}" placeholder="New Event"></td>
                    <td width="12%" padding-right="3px"><select  class="duration" id="type_${i}">
                                <option value="" default hidden>Event Type</option>
                                <option value="Examination" <?= (set_value('type_${i}') === 'Examination') ? 'selected' : '' ?>>Examination</option>
                                <option value="Study Leave" <?= (set_value('type_${i}') === 'Study Leave') ? 'selected' : '' ?>>Study Leave</option>
                                <option value="Vacation" <?= (set_value('type_${i}') === 'Vacation') ? 'selected' : '' ?>>Vacation</option>
                                <option value="Other" <?= (set_value('type_${i}') === 'Other') ? 'selected' : '' ?>>Other</option>
                            </select></td>
                    <td><input type="date" value="" class="duration" id="start_${i}" placeholder=""></td>
                    <td><input type="date" value="" class="duration" id="end_${i}" placeholder=""></td>
                </tr>
            `;
            i++;
            let newRow = document.createElement("tr");
            newRow.innerHTML = template;
            table.appendChild(newRow);
        });
        let updateButton = document.getElementById("update");
        updateButton.addEventListener("click", (event) => {
            event.preventDefault();
            let eventFields = document.querySelectorAll('.event');
            let eventTypeFields = document.querySelectorAll('.duration');
            add.style.display = "block";

            eventFields.forEach((field) => {
                field.removeAttribute('readonly');
            });
            eventTypeFields.forEach((field) => {
                field.removeAttribute('readonly');
                let options = field.querySelectorAll('option');
                options.forEach(option => {
                    option.removeAttribute('disabled');
                });
            });
            let saveButton = document.getElementById("save");
            saveButton.removeAttribute('disabled');
            updateButton.setAttribute('disabled', 'true');
        });
    });
</script>

</html>