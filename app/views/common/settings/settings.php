<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        Settings
    </div>

    <div class="white-container2 close">
        <p class="left-top-text">Account Settings</p>
        <br>
        <div class="white-container2-1 close">
            <div class="abc">
                <div textname="n"><h3>senudi muthugala</h3></div>
                <button class="button">Cancel</button>
                <button class="button">Save</button>
            </div>
        </div>
        <body>
  <div class="form-container">
    <form>
      <div class="form-row">
        <div class="form-group">
          <label for="first-name">First Name:</label>
          <input type="text" id="first-name" name="first-name">
        </div>
        <div class="form-group">
          <label for="last-name">Last Name:</label>
          <input type="text" id="last-name" name="last-name">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" id="email" name="email">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group">
          <label for="role">Role:</label>
          <input type="text" id="role" name="role">
        </div>
      </div>
    </form>
  </div>

    
    </div>

    
   
    <script>
        const body = document.querySelector("body"),
            sidebar = body.querySelector(".sidebar"),
            toggle = body.querySelector(".toggle");
            whitecontainer1 = body.querySelector(".white-container1");
            whitecontainer2 = body.querySelector(".white-container2");
            whitecontainer21 = body.querySelector(".white-container2-1");

        toggle.addEventListener("click", () => {
            sidebar.classList.toggle("close");
            whitecontainer1.classList.toggle("close");
            whitecontainer2.classList.toggle("close");
            whitecontainer21.classList.toggle("close");
        });

        let subMenu = document.getElementById("subMenu");

        function toggleMenu() {
            subMenu.classList.toggle("open-menu");
    }
    </script>
</body>

</html>