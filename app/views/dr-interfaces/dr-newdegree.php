<?php
$role = "DR";
$data['role'] = $role;
?>
<?php $this->view('components/navside-bar/degreeprogramsidebar', $data) ?>
<?php $this->view('components/navside-bar/footer', $data) ?>

<head>
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>css/dr/dr-styles.css">
</head>
<style>
    input[type="file"] {
        margin: 10px 0;
        margin-left: 150px;
    }

    input[type="file"] {
        display: none;
    }

    input[type=event] {
        width: 50%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical;
    }
</style>

<body>
    <header>
    </header>
    <div class="dr-newdegree-white-container1">
        <div class="dr-newdegree-white-container1-1">
            <div class="dr-newdegree-white-container2">
                <p class="dr-newdegree-left-top-text">Add Student Details</p>
                <a href="<?= ROOT ?>assets/csv/output/student-data-input.csv" class=" dr-newdegree-download-button"
                    download>Download File</a><br><br>
                <form method="post" enctype="multipart/form-data" action="<?= ROOT ?>dr/newdegree/file">
                    <div class="dr-newdegree-dashed-container"> <!-- File input field -->
                        <input type="file" id="student-data" name="student-data"> <!-- Label for browsing files -->
                        <label for="student-data" class="dr-newdegree-file-input-icon"></label> <!-- Text and button -->
                        <p class="dr-newdegree-text1">Drag and drop or <label for="student-data"
                                class="dr-newdegree-browse-label">browse</label> your files</p>
                        <button type="submit" class="dr-newdegree-download-button" name="submit"
                            value="upload-csv">Upload</button>
                    </div>
                </form>
            </div>
            <form class="dr-newdegree-box_4" method="post" action="<?= ROOT ?>dr/newdegree/add" id="dr-newdegree-form1">
                <p>Define Degree Time Table</p>
                <div class="dr-newdegree-box_4_1">
                    <table class="dr-newdegree-Time_table" id="dr-newdegree-Time_table">
                        <tr>
                            <th align="left">Event</th>
                            <th colspan="2">Duration</th>
                        </tr>
                        <tr>
                            <td width="76%"><input type="text" value="First Semester" name="event_1"
                                    class="dr-newdegree-event" id="dr-newdegree-event_1" readonly></td>
                            <td width="14%"><input name="type_1" class="dr-newdegree-duration" id="dr-newdegree-type_1"
                                    style="padding: 0px 2px 0px 2px;" value="Examination" readonly></td>
                            <td width="12%"><input type="date" value="" name="start_1" class="dr-newdegree-duration"
                                    id="dr-newdegree-start_1" placeholder=""></td>
                            <td width="12%"><input type="date" value="" name="end_1" class="dr-newdegree-duration"
                                    id="dr-newdegree-end_1" placeholder=""></td>
                        </tr>
                        <tr>
                            <td width="76%"><input type="text" value="Second Semester" name="event_2"
                                    class="dr-newdegree-event" id="dr-newdegree-event_2" readonly></td>
                            <td width="14%"><input name="type_2" class="dr-newdegree-duration" id="dr-newdegree-type_2"
                                    style="padding: 0px 2px 0px 2px;" value="Examination" readonly></td>
                            <td width="12%"><input type="date" value="" name="start_2" class="dr-newdegree-duration"
                                    id="dr-newdegree-start_2" placeholder=""></td>
                            <td width="12%"><input type="date" value="" name="end_2" class="dr-newdegree-duration"
                                    id="dr-newdegree-end_2" placeholder=""></td>
                        </tr>
                        <?php $id = 3; ?>
                        <?php if ($degrees[0]->Duration == 2): ?>
                            <tr>
                                <td width="76%"><input type="text" value="Third Semester" name="event_3"
                                        class="dr-newdegree-event" id="dr-newdegree-event_3" readonly></td>
                                <td width="14%"><input name="type_3" class="dr-newdegree-duration" id="dr-newdegree-type_3"
                                        style="padding: 0px 2px 0px 2px;" value="Examination" readonly></td>
                                <td width="12%"><input type="date" value="" name="start_3" class="dr-newdegree-duration"
                                        id="dr-newdegree-start_3" placeholder=""></td>
                                <td width="12%"><input type="date" value="" name="end_3" class="dr-newdegree-duration"
                                        id="dr-newdegree-end_3" placeholder=""></td>
                            </tr>
                            <tr>
                                <td width="76%"><input type="text" value="Fourth Semester" name="event_4"
                                        class="dr-newdegree-event" id="dr-newdegree-event_4" readonly></td>
                                <td width="14%"><input name="type_4" class="dr-newdegree-duration" id="dr-newdegree-type_4"
                                        style="padding: 0px 2px 0px 2px;" value="Examination" readonly></td>
                                <td width="12%"><input type="date" value="" name="start_4" class="dr-newdegree-duration"
                                        id="dr-newdegree-start_4" placeholder=""></td>
                                <td width="12%"><input type="date" value="" name="end_4" class="dr-newdegree-duration"
                                        id="dr-newdegree-end_4" placeholder=""></td>
                            </tr>
                            <?php $id = 5; ?>
                        <?php endif; ?>
                    </table>
                </div>
                <div class="dr-newdegree-box_4_2">
                    <table class="dr-newdegree-create_time_table_raw">
                        <tr>
                            <th colspan="3"><button type="button" class="dr-newdegree-add-new-event"
                                    id="dr-newdegree-add_new_event" disabled>&#128198 Add New Event</button></th>
                        </tr>
                        <tr>
                            <td></td>
                            <td width="12%"><button class="dr-newdegree-pin" type="button" id="dr-newdegree-save"
                                    disabled>Save</button></td>
                        </tr>
                    </table>
                </div>
            </form>
        </div>
        <div class="dr-footer">
            <?php $this->view('components/footer/index', $data) ?>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        let add = document.querySelector("#dr-newdegree-add_new_event");
        let table = document.querySelector(".dr-newdegree-Time_table");
        let i = <?= $id ?>;
        const lock = <?= $id ?>;
        console.log(i);
        // Define a function to handle the change event
        function handleChange(eventIndex) {
            return function (e) {
                var eventValue = $('#dr-newdegree-event_' + eventIndex).val();
                var typeValue = $('#dr-newdegree-type_' + eventIndex).val();
                var startValue = $('#dr-newdegree-start_' + eventIndex).val();
                var endValue = $('#dr-newdegree-end_' + eventIndex).val();
                // console.log(eventValue ,typeValue ,startValue ,endValue);
                if (startValue < new Date().toISOString().split('T')[0]) {
                    alert('Start date cannot be earlier than today\'s date.');
                    $('#dr-newdegree-start_' + eventIndex).val(new Date().toISOString().split('T')[0]);
                    startValue = (new Date().toISOString().split('T')[0]);
                }
                if (startValue > endValue) {
                    alert('End date cannot be earlier than start date.');
                    $('#dr-newdegree-end_' + eventIndex).val(startValue);
                    endValue = startValue;
                }
                if (eventValue !== "" && typeValue !== "" && startValue !== "" && endValue !== "") {
                    $('#dr-newdegree-event_' + (eventIndex + 1)).prop('readonly', false);
                    $('#dr-newdegree-type_' + (eventIndex + 1)).prop('disabled', false);
                    $('#dr-newdegree-start_' + (eventIndex + 1)).prop('readonly', false);
                    $('#dr-newdegree-end_' + (eventIndex + 1)).prop('readonly', false);
                    validateEvents()
                }
                if (lock == 3 || lock == 5) {
                    $('#dr-newdegree-event_1').prop('readonly', true);
                    $('#dr-newdegree-type_1').prop('readonly', true);
                    $('#dr-newdegree-event_2').prop('readonly', true);
                    $('#dr-newdegree-type_2').prop('readonly', true);
                }
                if (lock == 5) {
                    $('#dr-newdegree-event_3').prop('readonly', true);
                    $('#dr-newdegree-type_3').prop('readonly', true);
                    $('#dr-newdegree-event_4').prop('readonly', true);
                    $('#dr-newdegree-type_4').prop('readonly', true);
                }
            };
        }
        // Attach change event handlers to all four sets of fields
        for (var k = 1; k < i; k++) {
            $('#dr-newdegree-event_' + k + ', #dr-newdegree-type_' + k + ', #dr-newdegree-start_' + k + ', #dr-newdegree-end_' + k).on("change", handleChange(k));
        }

        //Add new event
        add.addEventListener("click", (event) => {
            let template = `
                <tr>
                    <td><input type="text" value="" name="event_${i}" class="dr-newdegree-event" id="dr-newdegree-event_${i}" placeholder="New Event"></td>
                    <td width="12%" padding-right="3px"><select name="type_${i}"  class="dr-newdegree-duration" id="dr-newdegree-type_${i}">
                                <option value="" default hidden>Event Type</option>
                                <option value="Study Leave" <?= (set_value('type_${i}') === 'Study Leave') ? 'selected' : '' ?>>Study Leave</option>
                                <option value="Vacation" <?= (set_value('type_${i}') === 'Vacation') ? 'selected' : '' ?>>Vacation</option>
                                <option value="Other" <?= (set_value('type_${i}') === 'Other') ? 'selected' : '' ?>>Other</option>
                            </select></td>
                    <td><input type="date" value="" name="start_${i}" class="dr-newdegree-duration" id="dr-newdegree-start_${i}" placeholder=""></td>
                    <td><input type="date" value="" name="end_${i}" class="dr-newdegree-duration" id="dr-newdegree-end_${i}" placeholder=""></td>
                </tr>
            `;
            let newRow = document.createElement("tr");
            newRow.innerHTML = template;
            table.appendChild(newRow);
            alert("Please fill out all fields in new event");
            add.setAttribute("disabled", "true");
            save.setAttribute("disabled", "true");
            $('#dr-newdegree-event_' + i + ', #dr-newdegree-type_' + i + ', #dr-newdegree-start_' + i + ', #dr-newdegree-end_' + i).on("change", handleChange(i));
            i++;
        });
        function validateEvents() {
            for (var k = 1; k < i; k++) {
                var eventValue = $('#dr-newdegree-event_' + k).val();
                var typeValue = $('#dr-newdegree-type_' + k).val();
                var startValue = $('#dr-newdegree-start_' + k).val();
                var endValue = $('#dr-newdegree-end_' + k).val();
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
        var save = document.getElementById("dr-newdegree-save");
        save.onclick = function (event) {
            event.preventDefault();
            var timetableData = [];
            var timeTable = document.getElementById(`dr-newdegree-Time_table`);
            for (var k = 1; k < i; k++) { // loop through all rows except the header
                var eventID = k;
                var eventName = document.getElementById(`dr-newdegree-event_${k}`).value.trim();
                var eventType = document.getElementById(`dr-newdegree-type_${k}`).value.trim();
                var eventStart = document.getElementById(`dr-newdegree-start_${k}`).value.trim();
                var eventEnd = document.getElementById(`dr-newdegree-end_${k}`).value.trim();
                // Push data to timetableData array
                timetableData.push({
                    eventID: eventID,
                    eventName: eventName,
                    eventType: eventType,
                    eventStart: eventStart,
                    eventEnd: eventEnd
                });
                // console.log(timetableData);
                var timetableDataInput = document.createElement('input');
                timetableDataInput.setAttribute('type', 'hidden');
                timetableDataInput.setAttribute('name', `timetableData`);
                timetableDataInput.setAttribute('value', JSON.stringify(timetableData));
                document.getElementById('dr-newdegree-form1').appendChild(timetableDataInput);
            }
            save.setAttribute("disabled", "true");
            document.getElementById("dr-newdegree-form1").submit();
        }
        window.onload = function () {
            const urlParams = new URLSearchParams(window.location.search);
            const error = urlParams.get('error');
            if (error) {
                alert(error);
            }
        };
    </script>
</body>

</html>
<!-- <option value="Examination" <?= (set_value('type_${i}') === 'Examination') ? 'selected' : '' ?>>Examination</option> -->