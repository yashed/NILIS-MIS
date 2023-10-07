<?php
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8" />
        <title>Dynamic Calendar</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" /> 
    </head>
    <style>
        /* @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap'); */
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        body{
            min-height: 100vh;
        }
        .wrapper{
            width: 365px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.12);
        }
        .wrapper header{
            display: flex;
            align-items: center;
            padding: 25px 30px 10px;
            justify-content: space-between;
        }
        header .icons{
            display: flex;
        }
        header .icons span{
            height: 38px;
            width: 38px;
            margin: 0 1px;
            cursor: pointer;
            color: #878787;
            text-align: center;
            line-height: 38px;
            font-size: 1.9rem;
            user-select: none;
            border-radius: 50%;
        }
        .icons span:last-child{
            margin-right: -10px;
        }
        header .icons span:hover{
            background: #f2f2f2;
        }
        header .current-date{
            font-size: 1.45rem;
            font-weight: 500;
        }
        .calendar{
            padding: 20px;
        }
        .calendar ul{
            display: flex;
            flex-wrap: wrap;
            list-style: none;
            text-align: center;
        }
        .calendar .days{
            margin-bottom: 20px;
        }
        .calendar li{
            color: #333;
            width: calc(100% / 7);
            font-size: 14px;
        }
        .calendar .weeks li{
            font-weight: 500;
            cursor: default;
        }
        .calendar .days li{
            z-index: 1;
            cursor: pointer;
            position: relative;
            margin-top: 30px;
        }
        .days li.inactive{
            color: #aaa;
        }
        .days li.active{
            color: #fff;
        }
        .days li::before{
            position: absolute;
            content: "";
            left: 50%;
            top: 50%;
            height: 40px;
            width: 40px;
            z-index: -1;
            border-radius: 50%;
            transform: translate(-50%, -50%);
        }
        .days li.active::before{
            background: #17376E;
        }
        .days li:not(.active):hover::before{
            background: #f2f2f2;
        }
    </style>
    <body>
        <div class="body2">
            <div class="wrapper">
                <header>
                    <p class="current-date"></p>
                    <div class="icons">
                        <span id="prev" class="material-symbols-rounded">chevron_left</span>
                        <span id="next" class="material-symbols-rounded">chevron_right</span>
                    </div>
                </header>
                <div class="calendar">
                    <ul class="weeks">
                        <li>Sun</li>
                        <li>Mon</li>
                        <li>Tue</li>
                        <li>Wed</li>
                        <li>Thu</li>
                        <li>Fri</li>
                        <li>Sat</li>
                    </ul>
                    <ul class="days">
                    </ul>
                </div>
            </div>
        </div>
        <script src="../../../public/js/calender-component.js" defer></script> 
    </body>
</html>