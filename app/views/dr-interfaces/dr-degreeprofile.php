<?php
$role = "DR";
$data['role'] = $role;
?>
<!-- <?php $this->view('components/navside-bar/degreeprogramsidebar', $data) ?>
<?php $this->view('components/navside-bar/footer', $data) ?> -->

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>css/dr/dr-styles.css">
    <title>Degree Profile</title>
</head>

<body>
    <div class="degreeprofile-dr-large-box">
        <div class="degreeprofile-large-box">
            <div class="degreeprofile-box_1">
                <?php if (!empty($degrees)) : ?>
                    <p><?= $degrees[0]->DegreeName ?></p>
                <?php else : ?>
                    <p>No data found for the specified degree ID.</p>
                <?php endif; ?>
            </div>
            <form class="degreeprofile-box_2" id="degreeprofile-form2" method="post" action="<?= ROOT ?>dr/degreeprofile/delete" <p>Overview</p>
                <?php if ($degrees) : ?>
                    <table class="degreeprofile-Overview_table" colspan="2" style="display: flex; justify-content: center;">
                        <tr>
                            <td>
                                <b>Diploma Name</b><br>
                                <input type="text" name="name" id="degreeprofile-name" class="degreeprofile-name" value="<?= $degrees[0]->DegreeName ?>" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-right: 20px;">
                                <b>Diploma Short Name</b><br>
                                <input type="text" name="type" id="degreeprofile-type" value="<?= $degrees[0]->DegreeShortName ?>" readonly>
                            </td>
                            <td>
                                <b>Academic Year</b><br>
                                <input type="text" name="year" id="degreeprofile-year" value="<?= $degrees[0]->AcademicYear ?>" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-right: 20px;">
                                <b>Diploma Type</b><br>
                                <input type="text" name="type" id="degreeprofile-type" value="<?= $degrees[0]->DegreeType ?>" readonly>
                            </td>
                            <td>
                                <b>Participants</b><br>
                                <input type="text" name="year" id="degreeprofile-year" value="<?= $degrees[0]->AcademicYear ?>" readonly>
                            </td>
                        </tr>
                        <td colspan="2">
                            <button class="degreeprofile-pin" type="button" id="degreeprofile-complete_degree">Completed</button>
                            <button class="degreeprofile-pin" type="button" id="degreeprofile-delete_degree" value="delete">Delete Degree</button>
                        </td>
                    </table>
                <?php else : ?>
                    <p>No data found for the specified degree ID.</p>
                <?php endif; ?>
            </form>
            <div class="degreeprofile-box_3">
                <div class="degreeprofile-box_3_2" id="degreeprofile-semester_subjects_credits">
                    <?php if ($subjects) : ?>
                        <div id="degreeprofile-semester_container">
                            <?php foreach ($subjects as $semesterNumber => $semesterSubjects) : ?>
                                <table class="degreeprofile-Subject_table">
                                    <p id="degreeprofile-Semester" name="semester" class="degreeprofile-semester<?= $semesterNumber ?>">Semester <?= $semesterNumber ?></p>
                                    <tr>
                                        <th>Subject Name</th>
                                        <th>Subject Code</th>
                                        <th>Credits</th>
                                    </tr>
                                    <?php foreach ($semesterSubjects as $subject) : ?>
                                        <tr>
                                            <td><input style="width: 140px; margin-right: 40px;" value="<?= $subject->SubjectName ?>" type="text" name="SubjectName" class="degreeprofile-SubjectName" placeholder="Subject" id="degreeprofile-SubjectName<?= $semesterNumber ?>_<?= $subject->SubjectID ?>" style="border: 1px solid #ccc;" readonly></td>
                                            <td><input style="width: 140px; margin-right: 40px;" value="<?= $subject->SubjectCode ?>" type="text" name="SubjectCode" class="degreeprofile-SubjectCode" placeholder="Subject Code" id="degreeprofile-SubjectCode<?= $semesterNumber ?>_<?= $subject->SubjectID ?>" style="border: 1px solid #ccc;" readonly></td>
                                            <td><input style="width: 60px;" value="<?= $subject->NoCredits ?>" type="number" name="NoCredits" class="degreeprofile-NoCredits" placeholder="Credits" id="degreeprofile-NoCredits<?= $semesterNumber ?>_<?= $subject->SubjectID ?>" style="border: 1px solid #ccc;" readonly></td>
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
            <form class="degreeprofile-box_4" id="degreeprofile-form1" method="post" action="<?= ROOT ?>dr/degreeprofile/update">
                <p>Define Degree Time Table</p>
                <div class="degreeprofile-box_4_1">
                    <table class="degreeprofile-Time_table" id="degreeprofile-Time_table">
                        <?php $lastEventID = 0; ?>
                        <?php if ($degreeTimeTable) : ?>
                            <tr>
                                <th align="left">Event</th>
                                <th colspan="2">Duration</th><br>
                            </tr>
                            <?php foreach ($degreeTimeTable as $event) : ?>
                                <tr>
                                    <td width="76%"><input type="text" value="<?= $event->EventName ?>" class="degreeprofile-event" id="degreeprofile-event_<?= $event->EventID ?>" readonly></td>
                                    <td width="14%"><select class="degreeprofile-duration" id="degreeprofile-type_<?= $event->EventID ?>">
                                            <option value="" default hidden>Event Type</option>
                                            <option value="Examination" <?= ($event->EventType === 'Examination') ? 'selected' : '' ?> disabled>Examination</option>
                                            <option value="Study Leave" <?= ($event->EventType === 'Study Leave') ? 'selected' : '' ?> disabled>Study Leave</option>
                                            <option value="Vacation" <?= ($event->EventType === 'Vacation') ? 'selected' : '' ?> disabled>Vacation</option>
                                            <option value="Other" <?= ($event->EventType === 'Other') ? 'selected' : '' ?> disabled>Other</option>
                                        </select></td>
                                    <td width="12%"><input type="date" value="<?= $event->StartingDate ?>" class="degreeprofile-duration" id="degreeprofile-start_<?= $event->EventID ?>" readonly></td>
                                    <td width="12%"><input type="date" value="<?= $event->EndingDate ?>" class="degreeprofile-duration" id="degreeprofile-end_<?= $event->EventID ?>" readonly></td>
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
                <div class="degreeprofile-box_4_2">
                    <table class="degreeprofile-create_time_table_raw">
                        <tr>
                            <th colspan="3"><button class="degreeprofile-add-new-event" type="button" id="degreeprofile-add_new_event">&#128198 Add New Event</button></th>
                        </tr>
                        <tr>
                            <td></td>
                            <td width="12%"><button class="degreeprofile-pin" type="button" id="degreeprofile-update">Update</button></td>
                            <td width="12%"><button class="degreeprofile-pin" type="submit" id="degreeprofile-save" disabled>Save</button></td>
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
        let add = document.querySelector("#degreeprofile-add_new_event");
        let table = document.querySelector(".degreeprofile-Time_table");
        let i = <?= $lastEventID ?> + 1;
        let count = 0;
        // Define a function to handle the change event
        function handleChange(eventIndex) {
            return function(e) {
                var eventValue = $('#degreeprofile-event_' + eventIndex).val();
                var typeValue = $('#degreeprofile-type_' + eventIndex).val();
                var startValue = $('#degreeprofile-start_' + eventIndex).val();
                var endValue = $('#degreeprofile-end_' + eventIndex).val();

                if (eventValue !== "" && typeValue !== "" && startValue !== "" && endValue !== "") {
                    $('#degreeprofile-event_' + (eventIndex + 1)).prop('readonly', false);
                    $('#degreeprofile-type_' + (eventIndex + 1)).prop('disabled', false);
                    $('#degreeprofile-start_' + (eventIndex + 1)).prop('readonly', false);
                    $('#degreeprofile-end_' + (eventIndex + 1)).prop('readonly', false);
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
                    <td><input type="text" value="" class="degreeprofile-event" id="degreeprofile-event_${i}" placeholder="New Event"></td>
                    <td width="12%" padding-right="3px"><select  class="degreeprofile-duration" id="degreeprofile-type_${i}">
                                <option value="" default hidden>Event Type</option>
                                <option value="Examination" <?= (set_value('type_${i}') === 'Examination') ? 'selected' : '' ?>>Examination</option>
                                <option value="Study Leave" <?= (set_value('type_${i}') === 'Study Leave') ? 'selected' : '' ?>>Study Leave</option>
                                <option value="Vacation" <?= (set_value('type_${i}') === 'Vacation') ? 'selected' : '' ?>>Vacation</option>
                                <option value="Other" <?= (set_value('type_${i}') === 'Other') ? 'selected' : '' ?>>Other</option>
                            </select></td>
                    <td><input type="date" value="" class="degreeprofile-duration" id="degreeprofile-start_${i}" placeholder=""></td>
                    <td><input type="date" value="" class="degreeprofile-duration" id="degreeprofile-end_${i}" placeholder=""></td>
                </tr>
            `;
            let newRow = document.createElement("tr");
            newRow.innerHTML = template;
            table.appendChild(newRow);
            add.setAttribute("disabled", "true");
            $('#degreeprofile-event_' + i + ', #degreeprofile-type_' + i + ', #degreeprofile-start_' + i + ', #degreeprofile-end_' + i).on("change", handleChange(i));
            i++;
        });
        let updateButton = document.getElementById("degreeprofile-update");
        let saveButton = document.getElementById("degreeprofile-save");
        let deletebutton = document.getElementById("degreeprofile-delete_degree");
        let completeDegreeButton = document.getElementById("degreeprofile-complete_degree");
        let eventFields = document.querySelectorAll('.degreeprofile-event');
        let eventTypeFields = document.querySelectorAll('.degreeprofile-duration');
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
                $('#degreeprofile-event_' + k + ', #degreeprofile-type_' + k + ', #degreeprofile-start_' + k + ', #degreeprofile-end_' + k).on("change", handleChange(k));
            }
        });
        saveButton.onclick = function(event) {
            event.preventDefault();
            var timetableData = [];
            var timeTable = document.getElementById(`degreeprofile-Time_table`);
            for (var k = 1; k < i; k++) { // loop through all rows except the header
                var eventID = k;
                var eventName = document.getElementById(`degreeprofile-event_${k}`).value.trim();
                var eventType = document.getElementById(`degreeprofile-type_${k}`).value.trim();
                var eventStart = document.getElementById(`degreeprofile-start_${k}`).value.trim();
                var eventEnd = document.getElementById(`degreeprofile-end_${k}`).value.trim();
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
                document.getElementById('degreeprofile-form1').appendChild(timetableDataInput);
            }
            console.log(timetableDataInput);
            document.getElementById("degreeprofile-form1").submit();

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
        // deletebutton.onclick = function(event) {
        //     event.preventDefault();
        //     var confirmDelete = confirm("Are you sure you want to delete this degree?");
        //     if (confirmDelete) {
        //         document.getElementById("form2").submit();
        //     }
        // }
        // completeDegreeButton.onclick = function(event) {
        //     event.preventDefault();

        // }
    });
</script>

</html>