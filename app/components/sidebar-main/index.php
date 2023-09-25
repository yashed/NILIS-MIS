<?php
include '../../config/config.php';

echo ROOT_PATH , "app/components/sidebar-main/style.css";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="<?= ROOT_PATH ?>app/components/sidebar-main/style.css" />

    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <title></title>
</head>

<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="<?php echo ROOT_PATH; ?>app/components/sidebar-main/image4.png" alt="logo" />
                </span>
                <div class="text header-text">
                    <h4 class="name1">National Institute of</h4>
                    <h5 class="name2">Library and Information Sciences</h5>
                    <span class="profession">University of Colombo</span>
                </div>
            </div>
            <i class="bx bx-chevron-right toggle"></i>
        </header>
        <div class="menu-bar">
            <hr />
            <div class="menu">
                <ul class="menu-links">
                    <h6 class="topic1">MAIN</h6>
                    <li class="nav-link">
                        <a href="#">
                            <i class="bx bx-home icon"></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="#">
                            <i class="bx bx-bell icon"></i>
                            <span class="text nav-text">Notification</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="#">
                            <i class="bx bx-home icon"></i>
                            <span class="text nav-text">Degree Programs</span>
                        </a>
                    </li>
                    <hr class="horizontal-line" />
                    <h6 class="topic2">SETTINGS</h6>
                    <li class="nav-link">
                        <a href="#">
                            <i class="bx bx-cog icon"></i>
                            <span class="text nav-text">Settings</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- <div class="bottom-content">
                    <li class="">
                        <a href="#">
                            <i class='bx bx-log-out icon' ></i>
                            <span class="text nav-text">Logout</span>
                        </a>
                    </li>
                </div> -->
        </div>
    </nav>

    <!-- <div class="hero">
      <nav>
        <ul class="hero-ul">
          <li class="hero-ul-li"><i class="bx bxs-bell icon"></i></li>
          <li class="hero-ul-li">
            <img
              src="MyOriginalPhoto.jpg"
              class="user-pic"
              onclick="toggleMenu()"
            />
          </li>
        </ul>

        <div class="sub-menu-wrap" id="subMenu">
          <div class="sub-menu">
            <div class="user-info">
              <img src="MyOriginalPhoto.jpg" />
              <h3>Bimsara Anjana</h3>
            </div>
            <hr />
            <a href="#" class="sub-menu-link">
              <i class="bx bx-log-out icon"></i>
              <p>Logout</p>
              <span>></span>
            </a>
          </div>
        </div>
      </nav>
    </div> -->

    <script>
    const body = document.querySelector("body"),
        sidebar = body.querySelector(".sidebar"),
        toggle = body.querySelector(".toggle");

    toggle.addEventListener("click", () => {
        sidebar.classList.toggle("close");
    });

    let subMenu = document.getElementById("subMenu");

    function toggleMenu() {
        subMenu.classList.toggle("open-menu");
    }
    </script>
</body>

</html>