
<?php if ($role == "DR") : ?>
    <div class="menu-bar">
        <hr>
        <div class="menu">
            <ul class="menu-links">
                <h6 class="topic1">MAIN</h6>
                <li class="nav-link">
                    <a href="<?= ROOT ?>dr">
                        <i class="bx bx-home icon"></i>
                        <span class="text nav-text">Dashboard</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="<?= ROOT ?>dr/notifications">
                        <i class="bx bx-bell icon"></i>
                        <span class="text nav-text">Notification</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="<?= ROOT ?>dr/degreeprograms">
                        <i class="bx bx-layer-plus icon"></i>
                        <span class="text nav-text">Degree Programs</span>
                    </a>
                </li>
                <hr class="horizontal-line">
                <h6 class="topic2">SETTINGS</h6>
                <li class="nav-link">
                    <a href="<?= ROOT ?>dr/settings">
                        <i class="bx bx-cog icon"></i>
                        <span class="text nav-text">Settings</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    </nav>

    <div class="hero">
        <nav>
        <ul class="hero-ul">
                <li class="hero-ul-li"><a href="<?= ROOT ?>dr/notifications"> <i class="bx bxs-bell icon"> <?php if(isset($notification_count_obj)): ?>
                        <span class="notification-badge"><?= $notification_count_obj->notification_count ?></span>
                    <?php endif; ?></a></i></li>
              
                <li class="hero-ul-li"><img src="http://localhost/NILIS-MIS/public/assets/user_img.jpg" class="user-pic"></li>
            </ul>


            <div class="sub-menu-wrap" id="subMenu">
                <div class="sub-menu">
                    <div class="user-info">
                        <img src="http://localhost/NILIS-MIS/public/assets/user_img.jpg">
                        <h3><?=$_SESSION['USER_DATA']->fname . " " . $_SESSION['USER_DATA']->lname?></h3>
                    </div>
                    <hr>
                    <a href="<?= ROOT ?>logout" class="sub-menu-link">
                        <i class="bx bx-log-out icon"></i>
                        <p>Logout</p>
                        <span>></span>
                    </a>
                </div>
            </div>
        </nav>
    </div>

<?php endif ?>


<?php if ($role == "SAR") : ?>
    <div class="menu-bar">
        <hr>
        <div class="menu">
            <ul class="menu-links">
                <h6 class="topic1">MAIN</h6>
                <li class="nav-link">
                    <a href="<?= ROOT ?>sar">
                        <i class="bx bx-home icon"></i>
                        <span class="text nav-text">Dashboard</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="<?= ROOT ?>sar/notifications">
                        <i class="bx bx-bell icon"></i>
                        <span class="text nav-text">Notification</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="<?= ROOT ?>sar/degreeprograms">
                        <i class="bx bx-home icon"></i>
                        <span class="text nav-text">Degree Programs</span>
                    </a>
                </li>
                <hr class="horizontal-line">
                <h6 class="topic2">SETTINGS</h6>
                <li class="nav-link">
                    <a href="<?= ROOT ?>sar/settings">
                        <i class="bx bx-cog icon"></i>
                        <span class="text nav-text">Settings</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    </nav>

    <div class="hero">
        <nav>
        <ul class="hero-ul">
                <li class="hero-ul-li"><a href="<?= ROOT ?>sar/notifications"> <i class="bx bxs-bell icon"> <?php if(isset($notification_count_obj)): ?>
                        <span class="notification-badge"><?= $notification_count_obj->notification_count ?></span>
                    <?php endif; ?></a></i></li>
              
                <li class="hero-ul-li"><img src="http://localhost/NILIS-MIS/public/assets/user_img.jpg" class="user-pic"></li>
            </ul>


            <div class="sub-menu-wrap" id="subMenu">
                <div class="sub-menu">
                    <div class="user-info">
                        <img src="http://localhost/NILIS-MIS/public/assets/user_img.jpg">
                        <h3><?=$_SESSION['USER_DATA']->fname . " " . $_SESSION['USER_DATA']->lname?></h3>
                    </div>
                    <hr>
                    <a href="http://localhost/NILIS-MIS/public/login" class="sub-menu-link">
                        <i class="bx bx-log-out icon"></i>
                        <p>Logout</p>
                        <span>></span>
                    </a>
                </div>
            </div>
        </nav>
    </div>
<?php endif ?>

<?php if ($role == "Assistant-SAR") : ?>
    <div class="menu-bar">
        <hr>
        <div class="menu">
            <ul class="menu-links">
                <h6 class="topic1">MAIN</h6>
                <li class="nav-link">
                    <a href="<?= ROOT ?>assistant-sar">
                        <i class="bx bx-home icon"></i>
                        <span class="text nav-text">Dashboard</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="<?= ROOT ?>assistant-sar/notification">
                        <i class="bx bx-bell icon"></i>
                        <span class="text nav-text">Notification</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="<?= ROOT ?>assistant-sar/degreeprograms">
                        <i class="bx bx-home icon"></i>
                        <span class="text nav-text">Degree Programs</span>
                    </a>
                </li>
                <hr class="horizontal-line">
                <h6 class="topic2">SETTINGS</h6>
                <li class="nav-link">
                    <a href="<?= ROOT ?>assistant-sar/settings">
                        <i class="bx bx-cog icon"></i>
                        <span class="text nav-text">Settings</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    </nav>

    <div class="hero">
        <nav>
            <ul class="hero-ul">
            <li class="hero-ul-li"><a href="<?= ROOT ?>assistant-sar/notification"><i class="bx bxs-bell icon"></i></a></li>
                <li class="hero-ul-li"><img src="http://localhost/NILIS-MIS/public/assets/user_img.jpg" class="user-pic"></li>
            </ul>

            <div class="sub-menu-wrap" id="subMenu">
                <div class="sub-menu">
                    <div class="user-info">
                        <img src="http://localhost/NILIS-MIS/public/assets/user_img.jpg">
                        <h3><?=$_SESSION['USER_DATA']->fname . " " . $_SESSION['USER_DATA']->lname?></h3>
                    </div>
                    <hr>
                    <a href="http://localhost/NILIS-MIS/public/login" class="sub-menu-link">
                        <i class="bx bx-log-out icon"></i>
                        <p>Logout</p>
                        <span>></span>
                    </a>
                </div>
            </div>
        </nav>
    </div>
<?php endif ?>

<?php if ($role == "Admin") : ?>
    <div class="menu-bar">
        <hr>
        <div class="menu">
            <ul class="menu-links">
                <h6 class="topic1">MAIN</h6>
                <li class="nav-link">
                    <a href="<?= ROOT ?>admin">
                        <i class="bx bx-home icon"></i>
                        <span class="text nav-text">Dashboard</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="<?= ROOT ?>admin/users">
                        <i class="bx bx-user icon"></i>
                        <span class="text nav-text">Users</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="<?= ROOT ?>admin/userlogs">
                        <i class='bx bxs-user-account icon'></i>
                        <span class="text nav-text">User Logs</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="<?= ROOT ?>admin/notification">
                        <i class="bx bx-bell icon"></i>
                        <span class="text nav-text">Notification</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="<?= ROOT ?>admin/degreeprograms">
                        <i class="bx bx-home icon"></i>
                        <span class="text nav-text">Degree Programs</span>
                    </a>
                </li>
                <hr class="horizontal-line">
                <h6 class="topic2">SETTINGS</h6>
                <li class="nav-link">
                    <a href="<?= ROOT ?>admin/settings">
                        <i class="bx bx-cog icon"></i>
                        <span class="text nav-text">Settings</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    </nav>

    <div class="hero">
        <nav>
            <ul class="hero-ul">
            <li class="hero-ul-li"><a href="<?= ROOT ?>admin/notification"><i class="bx bxs-bell icon"></i></a></li>
                <li class="hero-ul-li"><img src="http://localhost/NILIS-MIS/public/assets/user_img.jpg" class="user-pic"></li>
            </ul>


            <div class="sub-menu-wrap" id="subMenu">
                <div class="sub-menu">
                    <div class="user-info">
                        <img src="http://localhost/NILIS-MIS/public/assets/user_img.jpg">
                        <h3><?=$_SESSION['USER_DATA']->fname . " " . $_SESSION['USER_DATA']->lname?></h3>
                    </div>
                    <hr>
                    <a href="http://localhost/NILIS-MIS/public/login" class="sub-menu-link">
                        <i class="bx bx-log-out icon"></i>
                        <p>Logout</p>
                        <span>></span>
                    </a>
                </div>
            </div>
        </nav>
    </div>
<?php endif ?>

<?php if ($role == "director") : ?>
    <div class="menu-bar">
        <hr>
        <div class="menu">
            <ul class="menu-links">
                <h6 class="topic1">MAIN</h6>
                <li class="nav-link">
                    <a href="<?= ROOT ?>director">
                        <i class="bx bx-home icon"></i>
                        <span class="text nav-text">Dashboard</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="<?= ROOT ?>director/notifications">
                        <i class="bx bx-bell icon"></i>
                        <span class="text nav-text">Notification</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="<?= ROOT ?>director/degreeprograms">
                        <i class="bx bx-layer-plus icon"></i>
                        <span class="text nav-text">Degree Programs</span>
                    </a>
                </li>
                <hr class="horizontal-line">
                <h6 class="topic2">SETTINGS</h6>
                <li class="nav-link">
                    <a href="<?= ROOT ?>director/settings">
                        <i class="bx bx-cog icon"></i>
                        <span class="text nav-text">Settings</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    </nav>

    <div class="hero">
        <nav>
            <ul class="hero-ul">
            <li class="hero-ul-li"><a href="<?= ROOT ?>director/notification"><i class="bx bxs-bell icon"></i></a></li>
                <li class="hero-ul-li"><img src="http://localhost/NILIS-MIS/public/assets/user_img.jpg" class="user-pic"></li>
            </ul>

            <div class="sub-menu-wrap" id="subMenu">
                <div class="sub-menu">
                    <div class="user-info">
                        <img src="http://localhost/NILIS-MIS/public/assets/user_img.jpg">
                        <h3><?=$_SESSION['USER_DATA']->fname . " " . $_SESSION['USER_DATA']->lname?></h3>
                    </div>
                    <hr>
                    <a href="<?= ROOT ?>logout" class="sub-menu-link">
                        <i class="bx bx-log-out icon"></i>
                        <p>Logout</p>
                        <span>></span>
                    </a>
                </div>
            </div>
        </nav>
    </div>

<?php endif ?>

<?php if ($role == "Clerk") : ?>
    <div class="menu-bar">
        <hr>
        <div class="menu">
            <ul class="menu-links">
                <h6 class="topic1">MAIN</h6>
                <li class="nav-link">
                    <a href="<?= ROOT ?>clerk">
                        <i class="bx bx-home icon"></i>
                        <span class="text nav-text">Dashboard</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="<?= ROOT ?>clerk/notifications">">
                        <i class="bx bx-bell icon"></i>
                        <span class="text nav-text">Notification</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="<?= ROOT ?>clerk/degreeprograms">
                        <i class="bx bx-layer-plus icon"></i>
                        <span class="text nav-text">Degree Programs</span>
                    </a>
                </li>
                <hr class="horizontal-line">
                <h6 class="topic2">SETTINGS</h6>
                <li class="nav-link">
                    <a href="<?= ROOT ?>clerk/settings">
                        <i class="bx bx-cog icon"></i>
                        <span class="text nav-text">Settings</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    </nav>

    <div class="hero">
        <nav>
            <ul class="hero-ul">
            <li class="hero-ul-li"><a href="<?= ROOT ?>clerk/notification"><i class="bx bxs-bell icon"></i></a></li>
                <li class="hero-ul-li"><img src="http://localhost/NILIS-MIS/public/assets/user_img.jpg" class="user-pic"></li>
            </ul>

            <div class="sub-menu-wrap" id="subMenu">
                <div class="sub-menu">
                    <div class="user-info">
                        <img src="http://localhost/NILIS-MIS/public/assets/user_img.jpg">
                        <h3><?=$_SESSION['USER_DATA']->fname . " " . $_SESSION['USER_DATA']->lname?></h3>
                    </div>
                    <hr>
                    <a href="<?= ROOT ?>logout" class="sub-menu-link">
                        <i class="bx bx-log-out icon"></i>
                        <p>Logout</p>
                        <span>></span>
                    </a>
                </div>
            </div>
        </nav>
    </div>

<?php endif ?>