<!DOCTYPE html>
    <html lang="en">
        <head>
            <link rel="stylesheet" type="text/css" href="<?=ROOT?>css/sidebar-component.css">
            <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
            <title>Navsidebar</title>
            <style>
        span.notification-badge {
        position: absolute;
        top: 0px;
        right: 0px;
        background-color: red;
        color: white;
        border-radius: 50%;
        padding: 3px 6px;
        font-size: 12px;
        font-weight: bold;
    }
    </style>
</head>

<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="<?= ROOT ?>assets/NILIS-logo.png" alt="logo">
                </span>
                <div class="text header-text">
                    <h4 class="name1">National Institute of</h4>
                    <h5 class="name2">Library and Information Sciences</h5>
                    <span class="profession">University of Colombo</span>
                </div>
            </div>
            <i class='bx bx-chevron-right toggle'></i>
        </header>