<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    body {

        min-height: 100vh;

    }

    .wrapper {
        width: 80%;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
    }

    .wrapper header {
        display: flex;
        align-items: center;
        padding: 25px 30px 5px;
        justify-content: space-between;
    }

    header .icons {
        display: flex;
    }

    header .icons span {
        /* height: 38px; */
        width: 30px;
        margin: 0 1px;
        cursor: pointer;
        color: #878787;
        text-align: center;
        line-height: 38px;
        font-size: 1.2rem;
        user-select: none;
        border-radius: 20px;
    }

    .icons span:last-child {
        margin-right: -10px;
    }

    header .icons span:hover {
        background: #f2f2f2;
    }

    header .current-date {
        font-size: 1.2rem;
        font-weight: 500;
    }

    .calendar {
        padding: 20px;
    }

    .calendar ul {
        display: flex;
        flex-wrap: wrap;
        list-style: none;
        text-align: center;
    }

    .calendar .days {
        margin-bottom: 10px;
    }

    .calendar li {
        color: #333;
        width: calc(100% / 7);
        font-size: 10px;
    }

    .calendar .weeks li {
        font-weight: 500;
        cursor: default;
    }

    .calendar .days li {
        z-index: 1;
        cursor: pointer;
        position: relative;
        margin-top: 10%;
    }

    .days li.inactive {
        color: #aaa;
    }

    .days li.active {
        color: #fff;
    }

    .days li::before {
        position: absolute;
        content: "";
        left: 50%;
        top: 50%;
        height: 25px;
        width: 25px;
        z-index: -1;
        border-radius: 50%;
        transform: translate(-50%, -50%);
    }

    .days li.active::before {
        background: #17376E;
    }

    .days li:not(.active):hover::before {
        background: #f2f2f2;
    }

    @media (max-width: 1000px) {
        .wrapper {
            width: 80%;
        }

        .calendar li {
            font-size: 8px;
        }

        header .current-date {
            font-size: 0.8rem;
            font-weight: 500;
        }

        header .icons span {
            /* height: 38px; */
            width: 20px;
            margin: 0 1px;
            cursor: pointer;
            color: #878787;
            text-align: center;
            line-height: 38px;
            font-size: 0.6rem;
            user-select: none;
            border-radius: 20px;
        }

        .calendar .days li {
            z-index: 1;
            cursor: pointer;
            position: relative;
            margin-top: 8px;

        }

    }

    .calender-body2 {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0;
    }

    .days li.highlighted::before {
        background: #9AD6FF;
    }
</style>

<body>
    <div class="calender-body2">
        <div class="wrapper">
            <header>
                <p class="current-date"></p>
                <div class="icons">
                    <span id="prev" class="material-symbols-rounded">chevron_left</span>
                    <span id="next" class="material-symbols-rounded">chevron_right</span>
                </div>
            </header>
            <div class="calendar" onclick="loadNextView()">
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
    <script>
        const daysTag = document.querySelector(".days"),
            currentDate = document.querySelector(".current-date"),
            prevNextIcon = document.querySelectorAll(".icons span");
        let date = new Date(),
            currYear = date.getFullYear(),
            currMonth = date.getMonth();
        const months = [
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July",
            "August",
            "September",
            "October",
            "November",
            "December",
        ];

        // Define custom highlighted dates
        const customHighlightedDates = ["2024-2-25", "2024-2-27", "2024-2-24", "2025-3-23", "2024-2-22"];

        const renderCalendar = () => {
            let firstDayofMonth = new Date(currYear, currMonth, 1).getDay(),
                lastDateofMonth = new Date(currYear, currMonth + 1, 0).getDate(),
                lastDayofMonth = new Date(currYear, currMonth, lastDateofMonth).getDay(),
                lastDateofLastMonth = new Date(currYear, currMonth, 0).getDate();
            let liTag = "";
            for (let i = firstDayofMonth; i > 0; i--) {
                liTag += `<li class="inactive">${lastDateofLastMonth - i + 1}</li>`;
            }
            for (let i = 1; i <= lastDateofMonth; i++) {
                let isToday =
                    i === date.getDate() &&
                        currMonth === new Date().getMonth() &&
                        currYear === new Date().getFullYear()
                        ? "active"
                        : "";
                let isHighlighted = customHighlightedDates.includes(`${currYear}-${currMonth + 1}-${i}`);
                let className = isToday ? `${isToday}` : `${isHighlighted ? "highlighted" : ""}`;
                liTag += `<li class="${className}">${i}</li>`;
            }
            for (let i = lastDayofMonth; i < 6; i++) {
                liTag += `<li class="inactive">${i - lastDayofMonth + 1}</li>`;
            }
            currentDate.innerText = `${months[currMonth]} ${currYear}`;
            daysTag.innerHTML = liTag;
        };

        renderCalendar();

        prevNextIcon.forEach((icon) => {
            icon.addEventListener("click", () => {
                currMonth = icon.id === "prev" ? currMonth - 1 : currMonth + 1;
                if (currMonth < 0 || currMonth > 11) {
                    date = new Date(currYear, currMonth, new Date().getDate());
                    currYear = date.getFullYear();
                    currMonth = date.getMonth();
                } else {
                    date = new Date();
                }
                renderCalendar();
            });
        });

        //go to second view of the calendar
        function loadNextView() {
            console.log("click");
            window.location.href = 'http://localhost/NILIS-MIS/public/calendar';
        }
    </script>
</body>

</html>