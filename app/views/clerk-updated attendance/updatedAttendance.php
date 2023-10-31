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
       Attendance
    </div>
    

    <div class="white-container2 close">
    <table>
  <thead>
    <tr>
      <th>Name</th>
      <th>Role</th>
      <th>Index Number</th>
      <th>Registration Number</th>
      <th>Attendance</th>
    </tr>
  </thead>
  <tbody>
    <tr class>
      <td><img src="anonymous.png" width="30px" height="30px"><span>Senudi</span></td>
      <td>Student</td>
      <td>DLIM/001</td>
      <td>DLIM/23/001</td>
      <td>23/45</td>
    </tr>
    <tr>
      <td>Yashed</td>
      <td>Student</td>
      <td>DLIM/002</td>
      <td>DLIM/23/002</td>
      <td>23/45</td>
    </tr>
    <tr>
      <td>Bimsara</td>
      <td>Student</td>
      <td>DLIM/003</td>
      <td>DLIM/23/003</td>
      <td>23/45</td>
    </tr>
    <tr>
      <td>Disakya</td>
      <td>Student</td>
      <td>DLIM/004</td>
      <td>DLIM/23/004</td>
      <td>23/45</td>
    </tr>
    <tr>
      <td>Thisara</td>
      <td>Student</td>
      <td>DLIM/005</td>
      <td>DLIM/23/005</td>
      <td>23/45</td>
    </tr>
    <tr>
      <td>Anjana</td>
      <td>Student</td>
      <td>DLIM/006</td>
      <td>DLIM/23/006</td>
      <td>23/45</td>
    </tr>
</tbody>
</table>

</div>
    
    <script>
        const body = document.querySelector("body"),
            sidebar = body.querySelector(".sidebar"),
            toggle = body.querySelector(".toggle");
            whitecontainer1 = body.querySelector(".white-container1");
            whitecontainer2 = body.querySelector(".white-container2");
          

        toggle.addEventListener("click", () => {
            sidebar.classList.toggle("close");
            whitecontainer1.classList.toggle("close");
            whitecontainer2.classList.toggle("close");
        });

        let subMenu = document.getElementById("subMenu");

        function toggleMenu() {
            subMenu.classList.toggle("open-menu");
    }
    </script>
</body>

</html>