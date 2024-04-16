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
                <a href="<?= ROOT ?>assets/csv/output/student-data-input.csv" class=" dr-newdegree-download-button" download>Download File</a><br><br>
                <form method="post" enctype="multipart/form-data" action="<?=ROOT?>dr/newdegree/file">
                    <div class="dr-newdegree-dashed-container">  <!-- File input field -->
                        <input type="file" id="student-data" name="student-data"> <!-- Label for browsing files -->
                        <label for="student-data" class="dr-newdegree-file-input-icon"></label> <!-- Text and button -->
                        <p class="dr-newdegree-text1">Drag and drop or <label for="student-data" class="dr-newdegree-browse-label">browse</label> your files</p>
                        <button type="submit" class="dr-newdegree-download-button" name="submit" value="upload-csv">Upload</button>
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
                            <td width="76%"><input type="text" value="" name="event_1" class="dr-newdegree-event" id="dr-newdegree-event_1" placeholder="Mid Semester Break"></td>
                            <td width="14%"><select name="type_1" class="dr-newdegree-duration" id="dr-newdegree-type_1" style="padding: 0px 2px 0px 2px;">
                                    <option value="" default hidden>Event Type</option>
                                    <option value="Examination" <?= (set_value('type_1') === 'Examination') ? 'selected' : '' ?>>Examination</option>
                                    <option value="Study Leave" <?= (set_value('type_1') === 'Study Leave') ? 'selected' : '' ?>>Study Leave</option>
                                    <option value="Vacation" <?= (set_value('type_1') === 'Vacation') ? 'selected' : '' ?>>Vacation</option>
                                    <option value="Other" <?= (set_value('type_1') === 'Other') ? 'selected' : '' ?>>Other</option>
                                </select></td>
                            <td width="12%"><input type="date" value="" name="start_1" class="dr-newdegree-duration" id="dr-newdegree-start_1" placeholder=""></td>
                            <td width="12%"><input type="date" value="" name="end_1" class="dr-newdegree-duration" id="dr-newdegree-end_1" placeholder=""></td>
                        </tr>
                        <tr>
                            <td><input type="text" value="" name="event_2" class="dr-newdegree-event" id="dr-newdegree-event_2" placeholder="Study Leave" readonly></td>
                            <td width="12%" padding-right="3px"><select name="type_2" class="dr-newdegree-duration" id="dr-newdegree-type_2" disabled>
                                    <option value="" default hidden>Event Type</option>
                                    <option value="Examination" <?= (set_value('type_2') === 'Examination') ? 'selected' : '' ?>>Examination</option>
                                    <option value="Study Leave" <?= (set_value('type_2') === 'Study Leave') ? 'selected' : '' ?>>Study Leave</option>
                                    <option value="Vacation" <?= (set_value('type_2') === 'Vacation') ? 'selected' : '' ?>>Vacation</option>
                                    <option value="Other" <?= (set_value('type_2') === 'Other') ? 'selected' : '' ?>>Other</option>
                                </select></td>
                            <td><input type="date" value="" name="start_2" class="dr-newdegree-duration" id="dr-newdegree-start_2" placeholder="" readonly></td>
                            <td><input type="date" value="" name="end_2" class="dr-newdegree-duration" id="dr-newdegree-end_2" placeholder="" readonly></td>
                        </tr>
                        <tr>
                            <td><input type="text" value="" name="event_3" class="dr-newdegree-event" id="dr-newdegree-event_3" placeholder="First Semester Examination" readonly></td>
                            <td width="12%" padding-right="3px"><select name="type_3" class="dr-newdegree-duration" id="dr-newdegree-type_3" disabled>
                                    <option value="" default hidden>Event Type</option>
                                    <option value="Examination" <?= (set_value('type_3') === 'Examination') ? 'selected' : '' ?>>Examination</option>
                                    <option value="Study Leave" <?= (set_value('type_3') === 'Study Leave') ? 'selected' : '' ?>>Study Leave</option>
                                    <option value="Vacation" <?= (set_value('type_3') === 'Vacation') ? 'selected' : '' ?>>Vacation</option>
                                    <option value="Other" <?= (set_value('type_3') === 'Other') ? 'selected' : '' ?>>Other</option>
                                </select></td>
                            <td><input type="date" value="" name="start_3" class="dr-newdegree-duration" id="dr-newdegree-start_3" placeholder="" readonly></td>
                            <td><input type="date" value="" name="end_3" class="dr-newdegree-duration" id="dr-newdegree-end_3" placeholder="" readonly></td>
                        </tr>
                        <tr>
                            <td><input type="text" value="" name="event_4" class="dr-newdegree-event" id="dr-newdegree-event_4" placeholder="Second Semester Examination" readonly></td>
                            <td width="12%" padding-right="3px"><select name="type_4" class="dr-newdegree-duration" id="dr-newdegree-type_4" disabled>
                                    <option value="" default hidden>Event Type</option>
                                    <option value="Examination" <?= (set_value('type_4') === 'Examination') ? 'selected' : '' ?>>Examination</option>
                                    <option value="Study Leave" <?= (set_value('type_4') === 'Study Leave') ? 'selected' : '' ?>>Study Leave</option>
                                    <option value="Vacation" <?= (set_value('type_4') === 'Vacation') ? 'selected' : '' ?>>Vacation</option>
                                    <option value="Other" <?= (set_value('type_4') === 'Other') ? 'selected' : '' ?>>Other</option>
                                </select></td>
                            <td><input type="date" value="" name="start_4" class="dr-newdegree-duration" id="dr-newdegree-start_4" placeholder="" readonly></td>
                            <td><input type="date" value="" name="end_4" class="dr-newdegree-duration" id="dr-newdegree-end_4" placeholder="" readonly></td>
                        </tr>
                    </table>
                </div>
                <div class="dr-newdegree-box_4_2">
                    <table class="dr-newdegree-create_time_table_raw">
                        <tr>
                            <th colspan="3"><button type="button" class="dr-newdegree-add-new-event" id="dr-newdegree-add_new_event" disabled>&#128198 Add New Event</button></th>
                        </tr>
                        <tr>
                            <td></td>
                            <td width="12%"><button class="dr-newdegree-pin" type="" id="dr-newdegree-save">Save</button></td>
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
        let count = 0;
        let i = 5;
        // Define a function to handle the change event
        function handleChange(eventIndex) {
            return function(e) {
                var eventValue = $('#dr-newdegree-event_' + eventIndex).val();
                var typeValue = $('#dr-newdegree-type_' + eventIndex).val();
                var startValue = $('#dr-newdegree-start_' + eventIndex).val();
                var endValue = $('#dr-newdegree-end_' + eventIndex).val();

                if (eventValue !== "" && typeValue !== "" && startValue !== "" && endValue !== "") {
                    $('#dr-newdegree-event_' + (eventIndex + 1)).prop('readonly', false);
                    $('#dr-newdegree-type_' + (eventIndex + 1)).prop('disabled', false);
                    $('#dr-newdegree-start_' + (eventIndex + 1)).prop('readonly', false);
                    $('#dr-newdegree-end_' + (eventIndex + 1)).prop('readonly', false);
                    count = eventIndex + 1;
                }
                if (count == i) {
                    add.removeAttribute("disabled");
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
                                <option value="Examination" <?= (set_value('type_${i}') === 'Examination') ? 'selected' : '' ?>>Examination</option>
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
            add.setAttribute("disabled", "true");
            $('#dr-newdegree-event_' + i + ', #dr-newdegree-type_' + i + ', #dr-newdegree-start_' + i + ', #dr-newdegree-end_' + i).on("change", handleChange(i));
            i++;
        });


        var save = document.getElementById("dr-newdegree-save");
        save.onclick = function(event) {
            event.preventDefault();
            var timetableData = [];
            var timeTable = document.getElementById(`dr-newdegree-Time_table`);
            for (var k = 1; k < count; k++) { // loop through all rows except the header
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
            document.getElementById("dr-newdegree-form1").submit();
        }
    </script>
</body>

</html>