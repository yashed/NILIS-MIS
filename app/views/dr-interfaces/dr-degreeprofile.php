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
        grid-template-rows: 9% 45% 46%;
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
        margin: 20px 5px 5px 25px;
        border-spacing: 16px;
    }

    .Overview_table input {
        width: 100%;
        height: 35px;
        background: transparent;
        border: 0px solid gainsboro;
        padding: 0px 20px 0px 13px;
        margin-right: 50px;
    }

    .Overview_table .name {
        width: 150%;
        height: 35px;
        background: transparent;
    }

    #complete_degree {
        color: var(--text-color);
        background-color: var(--sidebar-color);
        border-radius: 7px;
        width: 30%;
        height: 35px;
        border: 2px solid var(--sidebar-color);
        padding: 5px 3px 3px 5px;
        cursor: pointer;
        margin: 0px 25px;
    }

    #complete_degree:hover {
        color: var(--sidebar-color);
        background-color: var(--text-color);
    }

    #delete_degree {
        color: red;
        border-radius: 7px;
        width: 30%;
        height: 35px;
        border: 2px solid red;
        padding: 5px 3px 3px 5px;
        cursor: pointer;
        margin: 0px 25px;
    }

    #delete_degree:hover {
        color: white;
        background-color: red;
    }

    .Subject_table {
        margin: 10px 5px 5px 35px;
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
        max-height: 90%;
        margin: 25px 5px 10px 25px;
        display: flex;
        justify-content: center;
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
        padding-bottom: 100px;
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
        color: var(--sidebar-color);
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
            <form class="box_2" id="form2" method="post" action="<?= ROOT ?>dr/degreeprofile/delete?id=<?= $degrees[0]->$degreeID ?>" 
                <p>Overview</p>
                <?php if ($degrees) : ?>
                    <table class="Overview_table" colspan="2" style="display: flex; justify-content: center;">
                        <tr>
                            <td>
                                <b>Diploma Name</b><br>
                                <input type="text" name="name" id="name" class="name" value="<?= $degrees[0]->DegreeName ?>" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-right: 20px;">
                                <b>Diploma Short Name</b><br>
                                <input type="text" name="type" id="type" value="<?= $degrees[0]->DegreeShortName ?>" readonly>
                            </td>
                            <td>
                                <b>Academic Year</b><br>
                                <input type="text" name="year" id="year" value="<?= $degrees[0]->AcademicYear ?>" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-right: 20px;">
                                <b>Diploma Type</b><br>
                                <input type="text" name="type" id="type" value="<?= $degrees[0]->DegreeType ?>" readonly>
                            </td>
                            <td>
                                <b>Participants</b><br>
                                <input type="text" name="year" id="year" value="<?= $degrees[0]->AcademicYear ?>" readonly>
                            </td>
                        </tr>
                        <td colspan="2">
                            <button class="pin" type="button" id="complete_degree">Completed</button>
                            <button class="pin" type="submit" id="delete_degree"  value="delete">Delete Degree</button>
                        </td>
                    </table>
                <?php else : ?>
                    <p>No data found for the specified degree ID.</p>
                <?php endif; ?>
            </form>
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
                                            <td><input style="width: 140px; margin-right: 40px;" value="<?= $subject->SubjectName ?>" type="text" name="SubjectName" class="SubjectName" placeholder="Subject" id="SubjectName<?= $semesterNumber ?>_<?= $subject->SubjectID ?>" style="border: 1px solid #ccc;" readonly></td>
                                            <td><input style="width: 140px; margin-right: 40px;" value="<?= $subject->SubjectCode ?>" type="text" name="SubjectCode" class="SubjectCode" placeholder="Subject Code" id="SubjectCode<?= $semesterNumber ?>_<?= $subject->SubjectID ?>" style="border: 1px solid #ccc;" readonly></td>
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
            <form class="box_4" id="form1" method="post" action="<?= ROOT ?>dr/degreeprofile/update?id=<?= $degrees[0]->$degreeID ?>">
                <p>Define Degree Time Table</p>
                <div class="box_4_1">
                    <table class="Time_table" id="Time_table">
                        <?php $lastEventID = 0; ?>
                        <?php if ($degreeTimeTable) : ?>
                            <tr>
                                <th align="left">Event</th>
                                <th colspan="2">Duration</th><br>
                            </tr>
                            <?php foreach ($degreeTimeTable as $event) : ?>
                                <tr>
                                    <td width="76%"><input type="text" value="<?= $event->EventName ?>" class="event" id="event_<?= $event->EventID ?>" readonly></td>
                                    <td width="14%"><select class="duration" id="type_<?= $event->EventID ?>">
                                            <option value="" default hidden>Event Type</option>
                                            <option value="Examination" <?= ($event->EventType === 'Examination') ? 'selected' : '' ?> disabled>Examination</option>
                                            <option value="Study Leave" <?= ($event->EventType === 'Study Leave') ? 'selected' : '' ?> disabled>Study Leave</option>
                                            <option value="Vacation" <?= ($event->EventType === 'Vacation') ? 'selected' : '' ?> disabled>Vacation</option>
                                            <option value="Other" <?= ($event->EventType === 'Other') ? 'selected' : '' ?> disabled>Other</option>
                                        </select></td>
                                    <td width="12%"><input type="date" value="<?= $event->StartingDate ?>" class="duration" id="start_<?= $event->EventID ?>" readonly></td>
                                    <td width="12%"><input type="date" value="<?= $event->EndingDate ?>" class="duration" id="end_<?= $event->EventID ?>" readonly></td>
                                </tr>
                                <?php if ($event->EventID > $lastEventID) {
                                    $lastEventID = $event->EventID;
                                } ?>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <p>No data found for the specified degree ID.</p>
                        <?php endif; ?>
                    </table>
                </div>
                <div class="box_4_2">
                    <table class="create_time_table_raw">
                        <tr>
                            <th colspan="3"><button class="add-new-event" type="button" id="add_new_event">&#128198 Add New Event</button></th>
                        </tr>
                        <tr>
                            <td></td>
                            <td width="12%"><button class="pin" type="button" id="update">Update</button></td>
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
        let i = <?= $lastEventID ?> + 1;
        let count = 0;
        // Define a function to handle the change event
        function handleChange(eventIndex) {
            return function(e) {
                var eventValue = $('#event_' + eventIndex).val();
                var typeValue = $('#type_' + eventIndex).val();
                var startValue = $('#start_' + eventIndex).val();
                var endValue = $('#end_' + eventIndex).val();

                if (eventValue !== "" && typeValue !== "" && startValue !== "" && endValue !== "") {
                    $('#event_' + (eventIndex + 1)).prop('readonly', false);
                    $('#type_' + (eventIndex + 1)).prop('disabled', false);
                    $('#start_' + (eventIndex + 1)).prop('readonly', false);
                    $('#end_' + (eventIndex + 1)).prop('readonly', false);
                    count = eventIndex + 1;
                }
                if (count == i) {
                    add.removeAttribute("disabled");
                }
            };
        }

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
            let newRow = document.createElement("tr");
            newRow.innerHTML = template;
            table.appendChild(newRow);
            add.setAttribute("disabled", "true");
            $('#event_' + i + ', #type_' + i + ', #start_' + i + ', #end_' + i).on("change", handleChange(i));
            i++;
        });
        let updateButton = document.getElementById("update");
        let saveButton = document.getElementById("save");
        let deletebutton = document.getElementById("delete_degree");
        let eventFields = document.querySelectorAll('.event');
        let eventTypeFields = document.querySelectorAll('.duration');
        updateButton.addEventListener("click", (event) => {
            event.preventDefault();
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
            saveButton.removeAttribute('disabled');
            updateButton.setAttribute('disabled', 'true');

            // Attach change event handlers to all sets of fields
            for (var k = 1; k < i; k++) {
                $('#event_' + k + ', #type_' + k + ', #start_' + k + ', #end_' + k).on("change", handleChange(k));
            }
        });
        saveButton.onclick = function(event) {
            event.preventDefault();
            var timetableData = [];
            var timeTable = document.getElementById(`Time_table`);
            for (var k = 1; k < i; k++) { // loop through all rows except the header
                var eventID = k;
                var eventName = document.getElementById(`event_${k}`).value.trim();
                var eventType = document.getElementById(`type_${k}`).value.trim();
                var eventStart = document.getElementById(`start_${k}`).value.trim();
                var eventEnd = document.getElementById(`end_${k}`).value.trim();
                // Push data to timetableData array
                timetableData.push({
                    eventID: eventID,
                    eventName: eventName,
                    eventType: eventType,
                    eventStart: eventStart,
                    eventEnd: eventEnd
                });
                console.log(timetableData); 
                var timetableDataInput = document.createElement('input');
                timetableDataInput.setAttribute('type', 'hidden');
                timetableDataInput.setAttribute('name', `timetableData`);
                timetableDataInput.setAttribute('value', JSON.stringify(timetableData));
                document.getElementById('form1').appendChild(timetableDataInput);
            }
            document.getElementById("form1").submit();

            add.style.display = "none";

            eventFields.forEach((field) => {
                field.setAttribute('readonly', 'true');
            });
            eventTypeFields.forEach((field) => {
                field.setAttribute('readonly', 'true');
                let options = field.querySelectorAll('option');
                options.forEach(option => {
                    option.setAttribute('disabled', 'true');
                });
            });
            saveButton.setAttribute('disabled', 'true');
            updateButton.removeAttribute('disabled', 'true');
        }
        deletebutton.onclick = function(event) {
            event.preventDefault();
            var confirmDelete = confirm("Are you sure you want to delete this degree?");
            if (confirmDelete) {
                document.getElementById("form2").submit();
            }
        }
    });
</script>

</html>