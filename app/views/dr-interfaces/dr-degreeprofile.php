<?php
$role = "DR";
$data['role'] = $role;
?>
<?php $this->view('components/navside-bar/degreeprogramsidebar', $data) ?>
<?php $this->view('components/navside-bar/footer', $data) ?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>css/dr/dr-styles.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Degree Profile</title>
</head>
<style>
    .degreeprofile-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        /* Semi-transparent background */
        backdrop-filter: blur(5px);
        /* Add blur effect */
        z-index: 998;
        /* Layer it above other content */
        display: none;
        /* Initially hidden */
    }
    .degreeprofile-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        /* Semi-transparent background */
        backdrop-filter: blur(5px);
        /* Add blur effect */
        z-index: 998;
        /* Layer it above other content */
        display: none;
        /* Initially hidden */
    }
</style>

<body>
    <div class="degreeprofile-dr-large-box">
        <div class="degreeprofile-overlay" id="degreeprofile-overlay"></div>
        <div class="degreeprofile-large-box">
            <div class="degreeprofile-box_1">
                <?php if (!empty($degrees)): ?>
                    <p><?= $degrees[0]->DegreeName ?></p>
                <?php else : ?>
                    <p>No data found for the specified diploma ID.</p>
                <?php endif; ?>
            </div>
            <form class="degreeprofile-box_2" id="degreeprofile-form2" method="" action="">
                <p>Overview</p>
                <?php if ($degrees) : ?>
                    <table class="degreeprofile-Overview_table" colspan="2" style="display: flex; justify-content: center;">
                        <tr>
                            <td>
                                <b>Diploma Name</b><br>
                                <input type="text" name="name" id="degreeprofile-name" class="degreeprofile-name"
                                    value="<?= $degrees[0]->DegreeName ?>" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-right: 20px;">
                                <b>Diploma Short Name</b><br>
                                <input type="text" name="type" id="degreeprofile-type"
                                    value="<?= $degrees[0]->DegreeShortName ?>" readonly>
                            </td>
                            <td>
                                <b>Academic Year</b><br>
                                <input type="text" name="year" id="degreeprofile-year"
                                    value="<?= $degrees[0]->AcademicYear ?>" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-right: 20px;">
                                <b>Diploma Type</b><br>
                                <input type="text" name="type" id="degreeprofile-type"
                                    value="<?= $degrees[0]->DegreeType ?>" readonly>
                            </td>
                            <td>
                                <b>Participants</b><br>
                                    <?php $NoStu = 0; ?>
                                    <?php if (!empty($students)) : ?>
                                        <?php foreach ($students as $student) : ?>
                                            <?php if ($student->status != "suspended" && $student->degreeID == $degrees[0]->DegreeID) : ?>
                                                <?php $NoStu++; ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <?php $NoStu = 0; ?>
                                    <?php endif; ?>
                                <input type="text" name="year" id="degreeprofile-year" value="<?= $NoStu ?>" readonly>
                            </td>
                        </tr>
                        <td colspan="2">
                            <?php if ($degrees[0]->Status == "ongoing"): ?>
                                <button class="degreeprofile-pin" type="button" id="degreeprofile-complete_degree"
                                    onclick="completedDegree()">Completed</button>
                            <?php endif; ?>
                            <button class="degreeprofile-pin" type="button" id="degreeprofile-delete_degree"
                                onclick="deleteDegree()">Delete Degree</button>
                        </td>
                    </table>
                <?php else: ?>
                    <p>No data found for the specified degree ID.</p>
                <?php endif; ?>
            </form>
            <div class="degreeprofile-box_3">
                <div class="degreeprofile-box_3_2" id="degreeprofile-semester_subjects_credits">
                    <?php if ($subjects): ?>
                        <div id="degreeprofile-semester_container">
                            <?php foreach ($subjects as $semesterNumber => $semesterSubjects): ?>
                                <table class="degreeprofile-Subject_table">
                                    <p id="degreeprofile-Semester" name="semester"
                                        class="degreeprofile-semester<?= $semesterNumber ?>">Semester <?= $semesterNumber ?></p>
                                    <tr>
                                        <th>Subject Name</th>
                                        <th>Subject Code</th>
                                        <th>Credits</th>
                                    </tr>
                                    <?php foreach ($semesterSubjects as $subject): ?>
                                        <tr>
                                            <td><input style="width: 300px; margin-right: 20px;"
                                                    value="<?= $subject->SubjectName ?>" type="text" name="SubjectName"
                                                    class="degreeprofile-SubjectName" placeholder="Subject"
                                                    id="degreeprofile-SubjectName<?= $semesterNumber ?>_<?= $subject->SubjectID ?>"
                                                    style="border: 1px solid #ccc;" readonly></td>
                                            <td><input style="width: 110px; margin-right: 20px;"
                                                    value="<?= $subject->SubjectCode ?>" type="text" name="SubjectCode"
                                                    class="degreeprofile-SubjectCode" placeholder="Subject Code"
                                                    id="degreeprofile-SubjectCode<?= $semesterNumber ?>_<?= $subject->SubjectID ?>"
                                                    style="border: 1px solid #ccc;" readonly></td>
                                            <td><input style="width: 60px;" value="<?= $subject->NoCredits ?>" type="number"
                                                    name="NoCredits" class="degreeprofile-NoCredits" placeholder="Credits"
                                                    id="degreeprofile-NoCredits<?= $semesterNumber ?>_<?= $subject->SubjectID ?>"
                                                    style="border: 1px solid #ccc;" readonly></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <p>No data found for the specified degree ID.</p>
                    <?php endif; ?>
                </div>
            </div>
            <form class="degreeprofile-box_4" id="degreeprofile-form1" method="post"
                action="<?= ROOT ?>dr/degreeprofile/update">
                <p>Define Diploma Time Table</p>
                <div class="degreeprofile-box_4_1">
                    <table class="degreeprofile-Time_table" id="degreeprofile-Time_table">
                        <?php $lastEventID = 0; ?>
                        <?php if ($degreeTimeTable): ?>
                            <tr>
                                <th align="left">Event</th>
                                <th colspan="2">Duration</th><br>
                            </tr>
                            <?php foreach ($degreeTimeTable as $event): ?>
                                <tr>
                                    <td width="76%"><input type="text" value="<?= $event->EventName ?>"
                                            class="degreeprofile-event" id="degreeprofile-event_<?= $event->EventID ?>"
                                            readonly></td>
                                    <td width="14%"><select class="degreeprofile-duration"
                                            id="degreeprofile-type_<?= $event->EventID ?>">
                                            <option value="" default hidden>Event Type</option>
                                            <option value="Examination" <?= ($event->EventType === 'Examination') ? 'selected' : '' ?> disabled>Examination</option>
                                            <option value="Study Leave" <?= ($event->EventType === 'Study Leave') ? 'selected' : '' ?> disabled>Study Leave</option>
                                            <option value="Vacation" <?= ($event->EventType === 'Vacation') ? 'selected' : '' ?>
                                                disabled>Vacation</option>
                                            <option value="Other" <?= ($event->EventType === 'Other') ? 'selected' : '' ?>
                                                disabled>Other</option>
                                        </select></td>
                                    <td width="12%"><input type="date" value="<?= $event->StartingDate ?>"
                                            class="degreeprofile-duration" id="degreeprofile-start_<?= $event->EventID ?>"
                                            readonly></td>
                                    <td width="12%"><input type="date" value="<?= $event->EndingDate ?>"
                                            class="degreeprofile-duration" id="degreeprofile-end_<?= $event->EventID ?>"
                                            readonly></td>
                                    <?php if ($event->EventType != "Examination"): ?>
                                        <td><i class='bx bx-minus' data-event-id="<?= $event->EventID ?>"></i></td>
                                    <?php endif; ?>
                                </tr>
                                <?php if ($event->EventID > $lastEventID) {
                                    $lastEventID = $event->EventID;
                                } ?>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>No data found for the specified degree ID.</p>
                        <?php endif; ?>
                    </table>
                    <span class="eventDelete" style="color: red; float: right; margin-right: 53px;"></span>
                </div>
                <div class="degreeprofile-box_4_2">
                    <?php if ($degrees[0]->Status == "ongoing"): ?>
                        <?php
                        if (message()) {
                            echo '<div class="profile-message">';
                            if ($_SESSION['message_type'] == 'successes') {
                                echo "<div class='error-message-profile' style='color: green; font-size: 14px; margin-bottom: 5px; text-align: center;'>" . message('', '', true) . "</div>";
                            } else if ($_SESSION['message_type'] == 'error') {
                                echo "<div class='error-message-profile' style='color:red; font-size: 14px; margin-bottom: 5px; text-align: center;'>" . message('', '', true) . "</div>";
                            }
                            echo '</div>';
                        }
                        ?>
                        <table class="degreeprofile-create_time_table_raw">
                            <tr>
                                <th colspan="3"><button class="degreeprofile-add-new-event" type="button"
                                        id="degreeprofile-add_new_event">&#128198 Add New Event</button></th>
                            </tr>
                            <tr>
                                <td></td>
                                <td width="12%"><button class="degreeprofile-pin" type="button"
                                        id="degreeprofile-update">Update</button></td>
                                <td width="12%"><button class="degreeprofile-pin" type="submit" id="degreeprofile-save"
                                        disabled>Save</button></td>
                            </tr>
                        </table>
                    <?php endif; ?>
                </div>
            </form>
        </div>
        <div class="dr-footer">
            <?php $this->view('components/footer/index', $data) ?>
        </div>
    </div>
    <form method="post" id="degreeprofile-form3" class="degreeprofile-form3"
        action="<?= ROOT ?>dr/degreeprofile/status">
        <div class="degreeprofile-popupForm">
            <center><svg id="degreeprofile-userDeletePopupImg" xmlns="http://www.w3.org/2000/svg" width="67" height="66"
                    viewBox="0 0 67 66" fill="none">
                    <path
                        d="M33.5 63C50.0685 63 63.5 49.5685 63.5 33C63.5 16.4315 50.0685 3 33.5 3C16.9315 3 3.5 16.4315 3.5 33C3.5 49.5685 16.9315 63 33.5 63Z"
                        stroke="#E02424" stroke-width="6" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M33.5 21V33" stroke="#E02424" stroke-width="6" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path d="M33.5 45H33.53" stroke="#E02424" stroke-width="6" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg></center>
            <input type="hidden" name="degreeStatus" value="completed">
            <h2 id="degreeprofile-userDeletePopupH2">
                <center>Are you want to complete this Diploma?</center>
            </h2>
            <div class="degreeprofile-yesorno">
                <button class="degreeprofile-close-button-2" type="submit" value="delete">Yes,I'm Sure</button>
                <button class="degreeprofile-close-button-3" type="button">No,Cancel</button>
            </div>
        </div>
    </form>
    <form method="post" id="degreeprofile-form4" class="degreeprofile-form4"
        action="<?= ROOT ?>dr/degreeprofile/delete">
        <div class="degreeprofile-popupForm">
            <center><svg id="degreeprofile-userDeletePopupImg" xmlns="http://www.w3.org/2000/svg" width="67" height="66"
                    viewBox="0 0 67 66" fill="none">
                    <path
                        d="M33.5 63C50.0685 63 63.5 49.5685 63.5 33C63.5 16.4315 50.0685 3 33.5 3C16.9315 3 3.5 16.4315 3.5 33C3.5 49.5685 16.9315 63 33.5 63Z"
                        stroke="#E02424" stroke-width="6" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M33.5 21V33" stroke="#E02424" stroke-width="6" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path d="M33.5 45H33.53" stroke="#E02424" stroke-width="6" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg></center>
            <h2 id="degreeprofile-userDeletePopupH2">
                <center>Are you want to delete this Diploma?</center>
            </h2>
            <div class="degreeprofile-yesorno">
                <button class="degreeprofile-close-button-2" type="submit" value="delete">Yes,I'm Sure</button>
                <button class="degreeprofile-close-button-3" type="button">No,Cancel</button>
            </div>
        </div>
    </form>
    <div id="degreeprofile-eventDelete">
        <center><svg id="degreeprofile-userDeletePopupImg" xmlns="http://www.w3.org/2000/svg" width="67" height="66" viewBox="0 0 67 66" fill="none">
                <path d="M33.5 63C50.0685 63 63.5 49.5685 63.5 33C63.5 16.4315 50.0685 3 33.5 3C16.9315 3 3.5 16.4315 3.5 33C3.5 49.5685 16.9315 63 33.5 63Z" stroke="#E02424" stroke-width="6" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M33.5 21V33" stroke="#E02424" stroke-width="6" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M33.5 45H33.53" stroke="#E02424" stroke-width="6" stroke-linecap="round" stroke-linejoin="round" />
            </svg></center>
        <h2 id="degreeprofile-userDeletePopupH2">
            <center>Are you want to delete this Event?</center>
        </h2>
        <div class="degreeprofile-yesorno">
            <button class="degreeprofile-close-button-5" type="button" value="delete">Yes,I'm Sure</button>
            <button class="degreeprofile-close-button-3" type="button">No,Cancel</button>
        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    let $deletedEvents = [];
    function completedDegree() {
        // Show the overlay and pop-up
        $('#degreeprofile-form3').css('display', 'block');
        document.getElementById('degreeprofile-overlay').style.display = 'block';
        document.body.classList.add('no-scroll');
        $('.degreeprofile-close-button-3').click(function (e) {
            // Hide the pop-up when the close button is clicked
            $('#degreeprofile-form3').css('display', 'none');
            document.getElementById('degreeprofile-overlay').style.display = 'none';
            document.body.classList.remove('no-scroll');
            e.stopPropagation();
        });
    }
    function deleteDegree() {
        // Show the overlay and pop-up
        $('#degreeprofile-form4').css('display', 'block');
        document.getElementById('degreeprofile-overlay').style.display = 'block';
        document.body.classList.add('no-scroll');
        $('.degreeprofile-close-button-3').click(function (e) {
            // Hide the pop-up when the close button is clicked
            $('#degreeprofile-form4').css('display', 'none');
            document.getElementById('degreeprofile-overlay').style.display = 'none';
            document.body.classList.remove('no-scroll');
            e.stopPropagation();
        }); 
    }
    let eventID = 0;
    $(document).ready(function() {
        $(".bx-minus").on("click", function(e) {
            e.preventDefault();
            var clickedElement = $(this);
            eventID = clickedElement.attr('data-event-id');
            console.log(eventID);
            document.getElementById('degreeprofile-eventDelete').style.display = "block";
            document.getElementById('degreeprofile-overlay').style.display = 'block';
            document.body.classList.add('no-scroll');
            $('.degreeprofile-close-button-3').click(function(e) {
                document.getElementById('degreeprofile-eventDelete').style.display = "none";
                document.getElementById('degreeprofile-overlay').style.display = 'none';
                document.body.classList.remove('no-scroll');
                e.stopPropagation();
            });
        });
    });
    $(document).ready(function() {
        $(".degreeprofile-close-button-5").on("click", function(e) {
            e.preventDefault();
            document.getElementById('degreeprofile-eventDelete').style.display = "none";
            document.getElementById('degreeprofile-overlay').style.display = 'none';
            document.body.classList.remove('no-scroll');
            $deletedEvents.push(eventID);
            console.log($deletedEvents);
            var eventId = eventID;
            document.getElementById('degreeprofile-event_' + eventId).closest('tr').remove();
            $.ajax({
                type: "POST",
                url: "<?= ROOT ?>dr/degreeprofile/eventDelete",
                data: {
                    eventId: eventId
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status === "success") {
                        console.log(response.message);
                        $(".eventDelete").text("Event deleted successfully.");
                    } else {
                        $(".eventDelete").text("Event not deleted.");
                    }
                },
                // error: function(jqXHR, textStatus, errorThrown) {
                //     console.error("Error:", textStatus, errorThrown);
                //     $(".eventDelete").text("An error occurred while deleting the event.");
                // }
            });
        });
    });
    document.addEventListener("DOMContentLoaded", function() {
        let add = document.querySelector("#degreeprofile-add_new_event");
        let table = document.querySelector(".degreeprofile-Time_table");
        let i = <?= $lastEventID ?> + 1;
        console.log(i);
        let count = 0;
        const duration = <?= json_encode($degrees[0]->Duration) ?>;
        const lock = duration * 2;
        console.log(duration);
        // Define a function to handle the change event
        function handleChange(eventIndex) {
            return function (e) {
                var eventValue = $('#degreeprofile-event_' + eventIndex).val();
                var typeValue = $('#degreeprofile-type_' + eventIndex).val();
                var startValue = $('#degreeprofile-start_' + eventIndex).val();
                var endValue = $('#degreeprofile-end_' + eventIndex).val();
                // console.log(eventValue ,typeValue ,startValue ,endValue);
                // console.log(eventValue ,typeValue ,startValue ,endValue);
                if (startValue < new Date().toISOString().split('T')[0]) {
                    alert('Start date cannot be earlier than today\'s date.');
                    $('#degreeprofile-start_' + eventIndex).val(new Date().toISOString().split('T')[0]);
                    startValue = (new Date().toISOString().split('T')[0]);
                }
                if (startValue > endValue) {
                    alert('End date cannot be earlier than start date.');
                    $('#degreeprofile-end_' + eventIndex).val(startValue);
                    endValue = startValue;
                }
                if (eventValue !== "" && typeValue !== "" && startValue !== "" && endValue !== "") {
                    $('#degreeprofile-event_' + (eventIndex + 1)).prop('readonly', false);
                    $('#degreeprofile-type_' + (eventIndex + 1)).prop('disabled', false);
                    $('#degreeprofile-start_' + (eventIndex + 1)).prop('readonly', false);
                    $('#degreeprofile-end_' + (eventIndex + 1)).prop('readonly', false);
                    count = eventIndex + 1;
                    validateEvents();
                }
                if (count == i) {
                    add.removeAttribute("disabled");
                }
                if (lock == 2 || lock == 4) {
                    $('#degreeprofile-event_1').prop('readonly', true);
                    $('#degreeprofile-type_1').prop('disabled', true);
                    $('#degreeprofile-event_2').prop('readonly', true);
                    $('#degreeprofile-type_2').prop('disabled', true);
                }
                if (lock == 4) {
                    $('#degreeprofile-event_3').prop('readonly', true);
                    $('#degreeprofile-type_3').prop('disabled', true);
                    $('#degreeprofile-event_4').prop('readonly', true);
                    $('#degreeprofile-type_4').prop('disabled', true);
                }
            };
        }
        add.addEventListener("click", () => {
            let template = `
                <tr>
                    <td><input type="text" value="" class="degreeprofile-event" id="degreeprofile-event_${i}" placeholder="New Event"></td>
                    <td width="12%" padding-right="3px"><select  class="degreeprofile-duration" id="degreeprofile-type_${i}">
                                <option value="" default hidden>Event Type</option>
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
            alert("Please fill out all fields in new event");
            add.setAttribute("disabled", "true");
            save.setAttribute("disabled", "true");
            $('#degreeprofile-event_' + i + ', #degreeprofile-type_' + i + ', #degreeprofile-start_' + i + ', #degreeprofile-end_' + i).on("change", handleChange(i));
            i++;
        });
        let updateButton = document.getElementById("degreeprofile-update");
        let save = document.getElementById("degreeprofile-save");
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
            let m = 2;
            if (duration == 2) {
                m = 4;
            }
            for (var j = 1; j < m + 1; j++) {
                document.getElementById('degreeprofile-event_' + j).setAttribute('readonly', 'true');
                document.getElementById('degreeprofile-type_' + j).setAttribute('disabled', 'true');
            }
            save.removeAttribute('disabled');
            updateButton.setAttribute('disabled', 'true');
            // Attach change event handlers to all sets of fields
            for (var k = 1; k < i; k++) {
                $('#degreeprofile-event_' + k + ', #degreeprofile-type_' + k + ', #degreeprofile-start_' + k + ', #degreeprofile-end_' + k).on("change", handleChange(k));
            }
        });
        function validateEvents() {
            for (var k = 1; k < i; k++) {
                var eventValue = $('#degreeprofile-event_' + k).val();
                var typeValue = $('#degreeprofile-type_' + k).val();
                var startValue = $('#degreeprofile-start_' + k).val();
                var endValue = $('#degreeprofile-end_' + k).val();
                // Check if events and dates are filled for each evnt
                if (eventValue === "" || typeValue === "" || startValue === "" || endValue === "") {
                    return;
                }
                if (!/^[a-zA-Z0-9\s]+$/.test(eventValue)) {
                    alert("Event Name for row " + k + " must be a sentence and number.");
                    return;
                }
            }
            save.removeAttribute("disabled");
            add.removeAttribute("disabled");
        }
        for (k=1; k < i; k++) {
            if ($deletedEvents.includes(k.toString()) < i - 1) {
                console.log(`$deletedEvents: `, $deletedEvents);
                console.log("eventids are higher than deletedEvents, so cant dlete elements in array.");
            } else {
                $deletedEvents = [];
            }
        }
        save.onclick = function(event) {
            event.preventDefault();
            var timetableData = [];
            console.log(i);
            
            var timeTable = document.getElementById(`degreeprofile-Time_table`);
            for (var k = 1; k < i; k++) { // loop through all rows except the header
                // console.log(`Type of k: ${typeof k}`);
                // console.log(`Type of deletedEvent element: ${typeof $deletedEvents[0]}`);
                // console.log(`$deletedEvents: `, $deletedEvents);
                // console.log(`Checking if ${k} is in $deletedEvents: ${$deletedEvents.includes(k)}`);
                if ($deletedEvents.includes(k.toString())) {
                    console.log(`Skipping row ${k} because it is in deletedEvents`);
                    continue; // Skip processing this row
                }
                var eventID = k;
                var eventName = $('#degreeprofile-event_' + k).val();
                var eventType = $('#degreeprofile-type_' + k).val();
                var eventStart = $('#degreeprofile-start_' + k).val();
                var eventEnd = $('#degreeprofile-end_' + k).val();
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
            save.setAttribute('disabled', 'true');
            updateButton.removeAttribute('disabled', 'true');
        }        
    });
</script>

</html>