<?php
    $role = "DR";
    $data['role'] = $role;
?>

<?php $this->view('components/navside-bar/header',$data) ?>
<?php $this->view('components/navside-bar/sidebar',$data) ?>
<?php $this->view('components/navside-bar/footer',$data) ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    background-image: url('<?=ROOT?>assets/dr/Icon03.png');
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

}
</style>

<body>
    <header>
    </header>
    <div class="white-container1">
        <div class="white-container2">
            <p class="left-top-text">Add Student Details</p>
            <a href="<?=ROOT?>assets/csv/output/student-data-input.csv"" class=" download-button" download>Download
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
        <div class="white-container3">
            <p class="left-top-text">Define Degree Time Table</p>
            <div class="container">
                <form action="/action_page.php">
                    <p class="text1">Event</p>
                    <div class="x">
                        <input type="event" id="event1" placeholder="Mid Semester Break">
                        <div class="y">
                            <input type="date" id="start" />
                            <input type="date" id="end" />
                        </div>
                        <br>
                    </div>

                    <div class="x">
                        <input type="event" id="event2" placeholder="Study Leave">
                        <div class="y">
                            <input type="date" id="start" />
                            <input type="date" id="end" />
                        </div>
                    </div>

                    <div class="x">
                        <input type="event" id="event3" placeholder="First Semester Examination">
                        <div class="y">
                            <input type="date" id="start" />
                            <input type="date" id="end" />
                        </div>
                    </div>

                    <div class="x">
                        <input type="event" id="event4" placeholder="Second Semester Examination">
                        <div class="y">
                            <input type="date" id="start" />
                            <input type="date" id="end" />
                        </div>
                    </div>

                    <button type="button" class="addevent" id="addEventAndDateButton">Add New Event</button>

                    <a href="<?=ROOT?>dr/degreeprofile" type="submit" value="Submit">Save</a>
                </form>
            </div>
        </div>
        <div class="dr-footer">
            <?php $this->view('components/footer/index',$data) ?>
        </div>
    </div>
    <script>
    const body = document.querySelector("body"),
        sidebar = body.querySelector(".sidebar"),
        toggle = body.querySelector(".toggle");
    whitecontainer1 = body.querySelector(".white-container1");
    whitecontainer2 = body.querySelector(".white-container2");
    whitecontainer3 = body.querySelector(".white-container3");

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


    const addEventAndDateButton = document.getElementById("addEventAndDateButton");
    const form = document.querySelector("form");

    addEventAndDateButton.addEventListener("click", () => {
        addEventAndDateInputs();
    });

    function addEventAndDateInputs() {
        const eventInput = document.createElement("input");
        eventInput.type = "text";
        eventInput.name = "event";
        eventInput.placeholder = "New Event";
        eventInput.className = "event-input";

        const dateInputStart = document.createElement("input");
        dateInputStart.type = "date";
        dateInputStart.name = "start_date";

        const dateInputEnd = document.createElement("input");
        dateInputEnd.type = "date";
        dateInputEnd.name = "end_date";

        const xDiv = document.createElement("div");
        xDiv.className = "x";

        const yDiv = document.createElement("div");
        yDiv.className = "y";

        xDiv.appendChild(eventInput);
        yDiv.appendChild(dateInputStart);
        yDiv.appendChild(dateInputEnd);

        xDiv.appendChild(yDiv);

        form.appendChild(xDiv);
    }
    </script>
</body>

</html>

<!-- <body>
    <header>
    </header>

    <div class="white-container1 close">

    </div>

    <div class="white-container2 close">
        <p class="left-top-text">Add Student Details</p>
        <a href="<?=ROOT?>assets/csv/output/student-data-input.csv" class="download-button" download>Download File</a>
        <form method="post" enctype="multipart/form-data">
            <div class="dashed-container">
                <label for="student-data" class="file-input-icon"></label>
                <input type="file" id="student-data" name="student-data">
                <p class="text1">Drag and drop or <label for="student-data" class="browse-label">browse</label>
                    your files.
                </p>
                <button type="submit" class="download-button" name="student-data" value="upload-csv">Upload</button>
            </div>
        </form>
    </div> -->