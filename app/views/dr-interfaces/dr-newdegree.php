<?php
$role = "DR";
$data['role'] = $role;
?>
<?php $this->view('components/navside-bar/degreeprogramsidebar', $data) ?>
<?php $this->view('components/navside-bar/footer', $data) ?>

<head>
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

    body {
        background-color: #E2E2E2;
    }

    .white-container1 {
        height: 100vh;
        left: 250px;
        position: relative;
        width: calc(100% - 250px);
        transition: var(--tran-05);
        background: var(--body-color);
    }

    .sidebar.close~.white-container1 {
        left: 88px;
        width: calc(100% - 88px);
    }

    .white-container2 {
        background-color: white;
        padding: 20px;
        height: 530px;
        font-family: "Poppins", sans-serif;
        font-size: 22px;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        transition: all 0.5s ease;
        margin: 7px 4px 7px 4px;
    }

    .left-top-text {
        text-align: left;
        margin-top: 20px;
        color: #17376E;
        margin-bottom: 30px;
        font-family: "Poppins", sans-serif;
    }

    .download-button {
        /* display: inline-block; */
        padding: 10px 20px;
        background-color: #17376E;
        color: #fff;
        text-decoration: none;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        width: auto;
        font-size: 12px;
        float: right;
    }

    .dashed-container {
        border: 2px dashed #333;
        padding: 8px;
        width: auto;
        height: 300px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .file-input-icon {
        width: 74px;
        height: 81.5px;
        background-image: url('<?= ROOT ?>assets/dr/Icon03.png');
        background-size: cover;
        background-repeat: no-repeat;
        cursor: pointer;
        margin-bottom: 10px;
    }

    input[type="file"] {
        margin: 10px 0;
        margin-left: 150px;
    }

    input[type="file"] {
        display: none;
    }

    .text1 {
        font-size: 20px;
        margin-left: 15px;
        font-size: 20px;
        margin-bottom: 10px;
    }

    .browse-label {
        color: #9AD6FF;
        cursor: pointer;
    }

    .white-container3 {
        margin-top: 10px;
        background-color: white;
        padding: 20px;
        height: 500px;
        font-family: "Poppins", sans-serif;
        font-size: 22px;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        transition: all 0.5s ease;
        margin: 7px 4px 7px 4px;
    }

    input[type=event],
    select,
    textarea {
        width: 50%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical;
    }

    .container {
        border-radius: 5px;
        padding: 20px;
    }

    .x {
        display: flex;
        align-items: center;
    }

    .x input {
        margin: 5px;
    }

    .y {
        display: flex;
        align-items: center;
        margin-left: 100px;
        height: 35px;
    }

    .y input {
        width: 130px;
        height: 43px;
    }

    .container a {
        background-color: #17376E;
        color: #fff;
        text-decoration: none;
        font-size: medium;
        border-radius: 5px;
        padding: 4px 5px 4px 5px;
        margin-top: 10px;
        float: right;
        margin-right: 20px;
    }

    .addevent {
        height: 40px;
        width: auto;
        border-radius: 5px;
        padding: 0 4px 0 4px;
        cursor: pointer;
    }

    .addevent:hover {
        height: 41px;
        font-size: 14px;
    }

    .box_4 {
        border-radius: 5px;
        margin: 5px 5px 5px 5px;
        background-color: var(--text-color);
        grid-column: 1 / 3;
        grid-row: 3/ 3;
        padding: 5px 5px 2px 5px;
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
        width: 85%;
        padding-left: 10px;
    }

    .time_table .duration {
        text-align: center;
        width: 100%;
    }

    .box_4_1 {
        overflow-y: auto;
        max-height: 60%;
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

    #save {
        background-color: var(--sidebar-color);
        color: var(--text-color);
        border-radius: 7px;
        width: 100%;
        height: 35px;
        border-color: var(--text-color);
        font-weight: 500;
        margin: 10px 0px 0px 0px;
    }

    #save:hover {
        background-color: var(--text-color);
        color: var(--sidebar-color);
        border-radius: 7px;
        width: 100%;
        height: 35px;
        font-weight: 500;
        border-color: var(--sidebar-color);
        border-width: 2px;
    }

    .box_4 p {
        font-size: 20px;
        color: var(--sidebar-color);
        margin: 3% 0 0 5%;
        font-weight: 500;
        margin: 5px 5px 5px 10px;
    }
</style>

<body>
    <header>
    </header>
    <div class="white-container1">
        <div class="white-container1-1">
            <div class="white-container2">
                <p class="left-top-text">Add Student Details</p>
                <a href="<?= ROOT ?>assets/csv/output/student-data-input.csv"" class=" download-button" download>Download
                    File</a><br><br>
                <form method="post" enctype="multipart/form-data">
                    <div class="dashed-container">
                        <label for="student-data" class="file-input-icon"></label>
                        <input type="file" id="student-data" name="student-data">
                        <p class="text1">Drag and drop or <label for="student-data" class="browse-label">browse</label>

                        </p>
                        <button type="submit" class="download-button" name="student-data" value="upload-csv">Upload</button>
                    </div>
                </form>
            </div>
            <div class="box_4">
                <p>Define Degree Time Table</p>
                <div class="box_4_1">
                    <table class="Time_table">
                        <tr>
                            <th align="left">Event</th>
                            <th colspan="2">Duration</th>
                        </tr>
                        <tr>
                            <td width="76%"><input type="text" name="event_1" class="event" placeholder="Mid Semester Break"></td>
                            <td width="12%"><input type="date" name="start_1" class="duration" placeholder=""></td>
                            <td width="12%"><input type="date" name="end_1" class="duration" placeholder=""></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="event_2" class="event" placeholder="Study Leave"></td>
                            <td><input type="date" name="start_2" class="duration" placeholder=""></td>
                            <td><input type="date" name="end_2" class="duration" placeholder=""></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="event_3" class="event" placeholder="First Semester Examination"></td>
                            <td><input type="date" name="start_3" class="duration" placeholder=""></td>
                            <td><input type="date" name="end_3" class="duration" placeholder=""></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="event_4" class="event" placeholder="Second Semester Examination"></td>
                            <td><input type="date" name="start_4" class="duration" placeholder=""></td>
                            <td><input type="date" name="end_4" class="duration" placeholder=""></td>
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
                            <td width="12%"><button class="pin" id="save">Save</button></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="dr-footer">
            <?php $this->view('components/footer/index', $data) ?>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const body = document.querySelector("body");
            const sidebar = body.querySelector(".sidebar");
            const toggle = body.querySelector(".toggle");
            const whitecontainer1 = body.querySelector(".white-container1");
            const whitecontainer2 = body.querySelector(".white-container2");
            const whitecontainer3 = body.querySelector(".white-container3");

            toggle.addEventListener("click", () => {
                sidebar.classList.toggle("close");
                whitecontainer1.classList.toggle("close");
                whitecontainer2.classList.toggle("close");
                whitecontainer3.classList.toggle("close");
            });

            let subMenu = document.getElementById("subMenu");
            function toggleMenu() {
                subMenu.classList.toggle("open-menu");
            }
            //Add new event
            let add = document.querySelector("#add_new_event");
            let table = document.querySelector(".Time_table");

            add.addEventListener("click", () => {
                let template = `
                <tr>
                    <td><input type="text" name="event_3" class="event" placeholder="New Event"></td>
                    <td><input type="date" name="start_3" class="duration"  placeholder=""></td>
                    <td><input type="date" name="end_3" class="duration" placeholder=""></td>
                </tr>
            `;
                let newRow = document.createElement("tr");
                newRow.innerHTML = template;
                table.appendChild(newRow);
            });
        });
    </script>
</body>

</html>