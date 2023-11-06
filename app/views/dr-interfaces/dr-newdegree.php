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
    body {
    background-color: #E2E2E2;
    margin: 0; 
    padding: 0; 
}

.white-container1 {
    background-color: white;
    padding: 20px;
    margin-left: 250px;
    color: #000000;
    font-size: 36px;
    font-family:"Poppins",sans-serif;
    margin-bottom: 10px;
    border-radius: 10px;
    transition: all 0.5s ease;
}

.white-container1.close{
    margin-left: 88px;
}

.left-top-text {
    text-align: left;
    margin-top: 20px; 
    margin-left: 30px; 
    color: #17376E;
    margin-bottom: 30px;
    font-family:"Poppins",sans-serif;
    font-size: 30px;
}

.white-container2 {
    margin-left: 250px;
    background-color: white;
    padding: 20px;
    height: 600px;
    font-family:"Poppins",sans-serif; 
    font-size: 24px;
    align-items: center;
    justify-content: center;
    border-radius: 10px;
    transition: all 0.5s ease;
}

.white-container2.close{
    margin-left: 88px;
    padding-right: 20%;
}

.white-container3{
    margin-top: 10px;
    margin-left: 250px;
    background-color: white;
    padding: 20px;
    height: 500px;
    font-family:"Poppins",sans-serif; 
    font-size: 24px;
    align-items: center;
    justify-content: center;
    border-radius: 10px;
    transition: all 0.5s ease;
}

.white-container3.close{
    margin-left: 88px;
}

.dashed-container {
    border: 2px dashed #333; 
    padding: 10px; 
    width: 1000px; 
    height: 300px; 
    margin-left: 250px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

input[type="file"] {
    margin: 10px 0;
    margin-left: 150px; 
}

.file-input-icon {
    width: 100px; 
    height: 100px;
    background-image: url('<?=ROOT?>assets/dr/Icon03.png'); 
    background-size: cover;
    background-repeat: no-repeat;
    cursor: pointer; 
}

input[type="file"] {
    display: none;
}

.text1{
    font-size: 20px;
    margin-left: 15px;
    font-size: 20px;
    margin-bottom:10px;
}

.browse-label {
    color: #9AD6FF; 
    cursor: pointer; 
}

/* .download_button {

    color: #000000; 
    padding: 10px 20px; 
    margin-left: 1150px;
    margin-top: 0px;
    border-radius: 8px;
    margin-bottom: 20px;
} */

.download-button {
    display: inline-block;
    padding: 10px 20px;
    background-color: #17376E;
    color: #fff;
    text-decoration: none;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-left: 1050px;
    margin-bottom: 20px;
    width: 200px;
}

   input[type=event], select, textarea {
    width: 50%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
  }
  
  input[type=submit] {
    background-color:#17376E;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin-left: 1430px;
  }
  
  input[type=submit]:hover {
    background-color: #45a049;
  }
  
  .container {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
  }

  .x {
    display: flex; 
    align-items: center;
}

 .x input {
    margin: 5px;
}


.y{
    display: flex; 
    align-items: center;
    margin-left: 300px;
    
}

.y input{
    width:300px;
    height: 40px;
}

.z {
    display: flex; 
    align-items: center;
    flex-direction: row;
}
</style>
<body>
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