<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <?php
    $role = "Clerk";

    include_once '../../components/navside-bar/header.php';
    include_once '../../components/navside-bar/sidebar.php';
    // include_once '../../components/navside-bar/footer.php';
    ?>
    <header>
    </header>

    <div class="white-container1 close">

    </div>

    <div class="white-container2 close">
        <p class="left-top-text">Add Student Details</p>
        <a href="your_file_path_here.pdf" class="download-button" download>Download File</a>
        <div class="dashed-container">
            <label for="fileInput" class="file-input-icon"></label>
            <input type="file" id="fileInput" name="fileInput">
            <p class="text1">Drag and drop or <label for="fileInput" class="browse-label">browse</label>
                <input type="file" id="fileInput" name="fileInput">your files.
            </p>
        </div>

    </div>


    <div class="white-container3 close">
    <p class="left-top-text">Define Degree Time Table</p>
        <div class="container">

            <form action="/action_page.php">
            <p class="text1">Event</p>
                <div class="x">
                <input type="event" id="event1" placeholder="Event Name...">
                <div class="y">
                <input type="date" id="start"/>
                <input type="date" id="end"/>
                </div>
                <br>
                </div>
                <div class="x">
                <input type="event" id="event2" placeholder="Event name..">
                <div class="y">
                <input type="date" id="start"/>
                <input type="date" id="end"/>
                </div>
                </div>
                
                <div class="x">
                <input type="event" id="event3" placeholder="Event name..">
                <div class="y">
                <input type="date" id="start"/>
                <input type="date" id="end"/>
                </div>
                </div>
                
                <div class="x">
                <input type="event" id="event4" placeholder="Event name..">
                <div class="y">
                <input type="date" id="start"/>
                <input type="date" id="end"/>
                </div>
                </div>
                

                <input type="submit" value="Submit">
            </form>
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
        </script>
</body>

</html>