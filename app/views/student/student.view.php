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
    Diploma in Library and Information Management<br><h5>Participant</h5>
    </div>

    <div class="white-container2 close">
    <p class="left-top-text">User Details</p> 
    <div class="row">
    <div class="column">
    <div class=name><p>M.A.S.D.Muthugala</p></div>
    </div>

  <div class="column1">
  <div class="mail">Email:<br> <div class="email"> email@email.com</div></div>
  <br>
  <div class="registration">Registration number:<br> <div class="regNo"> DLIM/23/001</div></div>
  </div>

  <div class="column2">
  <div class="country">Country:<br> <div class="email"> Sri Lanka</div></div>
  <br>
  <div class="IndexNo">Index number:<br> <div class="regNo"> DLIM/001</div></div>
  </div>

  
</div>
    </div>

    <div class="flex-container">
        <div class="white-container3 close">
            
        </div>


        <div class="white-container4">
           
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
    </script>
</body>

</html>