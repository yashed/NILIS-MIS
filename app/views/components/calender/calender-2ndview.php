<?php
$role = $_SESSION['USER_DATA']->role;
$data['role'] = $role;

?>
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600;700;800&display=swap");

    * {
        margin: 0;
        padding: 0;
        font-family: "Poppins", sans-serif;
    }

    body {
        width: 100vw;
        height: 100vh;
        background-color: #E2E2E2;
        display: flex;
        place-items: center;
        flex-direction: column;
    }

    .container {
        width: 95%;
        height: 90%;
        background-color: #fff;
        border-radius: 12px;
        padding: 10px;
    }

    .header {
        padding: 10px;
        display: flex;
        justify-content: space-between;
    }

    .header #month {
        color: #17376E;
        font-size: 30px;
        font-weight: 600;
    }

    button {
        width: 35px;
        height: 35px;
        cursor: pointer;
        border: none;
        outline: none;
        padding: 5px;
        border-radius: 3px;
        color: white;
    }

    .header button {
        background-color: #17376E;
    }

    .weekdays {
        width: 100%;
        display: flex;
        background-color: #17376E;
        font-size: 17px;
        color: #fff;
        font-weight: 500;
        border-radius: 8px;
        gap: 5%;
        align-items: center;
        height: 30px;
    }

    .weekdays div {
        width: 100px;
        padding: 10px;
        font-size: 1.2vw;
        text-align: center;
        text-transform: uppercase;
    }

    #calendar {
        width: 100%;
        margin: auto;
        display: flex;
        flex-wrap: wrap;
        /* justify-content: center; */
    }

    .calender-wrap {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .day {
        width: 12.5vw;
        height: 8vw;
        padding: 10px;
        cursor: pointer;
        margin: 5px;
        box-sizing: border-box;
        box-shadow: 0px 0px 3px #cbd4c2;
        color: #7f8fa6;
        font-weight: 500;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .day:hover {
        background-color: rgba(112, 111, 211, 0.1);
        color: #706fd3;
    }

    #currentDay {
        background-color: #706fd3;
        color: #fff;
    }

    .event {
        font-size: 10px;
        padding: 3px;
        background-color: #3d3d3d;
        color: #fff;
        border-radius: 5px;
        max-height: 55px;
        overflow: hidden;
    }

    .event.holiday {
        background-color: palegreen;
        color: #3d3d3d;
    }

    .plain {
        cursor: default;
        box-shadow: none;
    }

    #modal {
        display: none;
        position: absolute;
        top: 0px;
        left: 0px;
        width: 100vw;
        height: 100vh;
        z-index: 10;
        background-color: rgba(0, 0, 0, 0.8);
    }

    #addEvent,
    #viewEvent {
        display: none;
        width: 350px;
        background-color: #fff;
        padding: 25px;
        position: absolute;
        z-index: 20;
        margin-top: 225px;
        border-radius: 8px;
    }

    #addEvent h2,
    #viewEvent h2 {
        font-weight: 500;
        margin-bottom: 10px;
    }

    #txtTitle {
        padding: 10px;
        width: 100%;
        box-sizing: border-box;
        margin-bottom: 25px;
        border-radius: 3px;
        outline: none;
        border: 1px solid #cbd4c2;
        font-size: 16px;
    }

    #btnSave {
        background-color: #2ed573;
        width: 65px;
        margin: 0px 25px 0px 80px;
    }

    .btnClose {
        background-color: #2f3542;
        width: 65px;   
    }

    #viewEvent p {
        margin-bottom: 20px;
    }

    #btnDelete {
        background-color: #17376E;
        width: 65px; 
        margin: 0px 25px 0px 80px;
    }

    .error {
        border-color: #17376E !important;
    }

    .title-bar {
        font-size: 30px;
        width: 95%;
        font-weight: 600;
        color: black;
        padding: 10px 0px 10px 10px;
        background-color: #fff;
        border-radius: 6px;
        margin: 7px 4px 7px 4px;
        display: flex;
        flex-direction: row;
        gap: 40px
    }

    .back-button-btn {
        display: flex;
        border-radius: 40px;
        background: #F3F3F3;
        width: 40px;
        height: 40px;
        align-items: center;
        justify-content: center;
    }

    .back-button-btn:hover {
        box-shadow: 0px 2px 8.6px 0px rgba(0, 0, 0, 0.17);
        background: #FEFBFB;
    }
    #btnBack .icon,
    #btnNext .icon {
        font-size: 25px;
        justify-content: center;
        display: flex;
        align-items: center;
        color: var(--text-color);
        transition: var(--tran-03);
    }
</style>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css" />
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" /> -->
</head>

<body>
    <div class="title-bar">
        <div class="back-button">
            <button class="back-button-btn" onclick="history.back()">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
                    <path d="M25.67 11.77L23.89 10L14 19.9L23.9 29.8L25.67 28.03L17.54 19.9L25.67 11.77Z"
                        fill="#17376E" />
                </svg>

            </button>
        </div>
        <div class="bar-title">Calendar</div>
    </div>
    <div class="container">
        <div class="header">
            <div id="month"></div>
            <div>
                <button id="btnBack"><i class='bx bx-chevron-left icon'></i></button>
                <button id="btnNext"><i class='bx bx-chevron-right icon'></i></button>
            </div>
        </div>
        <div class="weekdays">
            <div>Sun</div>
            <div>Mon</div>
            <div>Tue</div>
            <div>Wed</div>
            <div>Thu</div>
            <div>Fri</div>
            <div>Sat</div>
        </div>
        <div class="calender-wrap">
            <div id="calendar">

            </div>
        </div>
    </div>
    <div id="modal"></div>
    <div id="addEvent">
        <h2>Add Event</h2>
        <input type="text" id="txtTitle" placeholder="Event Title" />
        <button id="btnSave">Save</button>
        <button class="btnClose">Close</button>
    </div>

    <div id="viewEvent">
        <h2>Event name</h2>
        <p id="eventText">This is Sample Event</p>
        <button id="btnDelete">Delete</button>
        <button class="btnClose">Close</button>
    </div>

    <!-- <script src="js/script.js"></script> -->
</body>

</html>
<script>
    const holidays = [
        { hdate: "01-01-2023", holiday: "New Year Day", },
        { hdate: "15-01-2023", holiday: "Pongal", },
        { hdate: "16-01-2023", holiday: "Thiruvalluvar Day", },
        { hdate: "17-01-2023", holiday: "Uzhavar Thirunal", },
        { hdate: "26-01-2023", holiday: "Republic Day",},
        { hdate: "05-02-2023", holiday: "Thai Poosam", },
        { hdate: "22-03-2023", holiday: "Telugu New Year Day", },
        { hdate: "01-04-2023", holiday: "Annual closing of Accounts for Commercial Banks and Co-operative Banks", },
        { hdate: "04-04-2023", holiday: "Mahaveer Jayanthi", },
        { hdate: "07-04-2023", holiday: "Good Friday", },
        { hdate: "14-04-2023", holiday: "Tamil New Years Day and Dr.B.R.Ambedkars Birthday", },
        { hdate: "22-04-2023", holiday: "Ramzan (Idul Fitr)", },
        { hdate: "01-05-2023", holiday: "May Day", },
        { hdate: "29-06-2023", holiday: "Bakrid(Idul Azha)", },
        { hdate: "29-07-2023", holiday: "Muharram", },
        { hdate: "15-08-2023", holiday: "Independence Day", },
        { hdate: "06-09-2023", holiday: "Krishna Jayanthi", },
        { hdate: "17-09-2023", holiday: "Vinayakar Chathurthi", },
        { hdate: "28-09-2023", holiday: "Milad-un-Nabi", },
        { hdate: "02-10-2023", holiday: "Gandhi Jayanthi", },
        { hdate: "23-10-2023", holiday: "Ayutha Pooja", },
        { hdate: "24-10-2023", holiday: "Vijaya Dasami", },
        { hdate: "12-11-2023", holiday: "Deepavali", },
        { hdate: "25-12-2023", holiday: "Christmas", },
        { hdate: "15-01-2024", holiday: "Tamil Thai Pongal Day", },
        { hdate: "25-01-2024", holiday: "Duruthu Full Moon Poya Day", },
        { hdate: "04-02-2024", holiday: "National Day", },
        { hdate: "14-02-2024", holiday: "valentines Day", },
        { hdate: "23-02-2024", holiday: "Navam Full Moon Poya Day", },
        { hdate: "08-03-2024", holiday: "Mahasivarathri Day", },
        { hdate: "11-03-2024", holiday: "Holi Ramadan Start", },
        { hdate: "24-03-2024", holiday: "Medin Full Moon Poya Day", },
        { hdate: "29-03-2024", holiday: "Good Friday", },
        { hdate: "31-03-2024", holiday: "Easter Sunday", },
        { hdate: "11-04-2024", holiday: "Eid al-Fitr", },
        { hdate: "12-04-2024", holiday: "Tamil New Years Day", },
        { hdate: "13-04-2024", holiday: "Tamil New Years Day", },
        { hdate: "23-04-2024", holiday: "Bakini Full Moon Poya Day", },
        { hdate: "01-05-2024", holiday: "May Day", },
        { hdate: "23-05-2024", holiday: "Vesak Full Moon Poya Day", },
        { hdate: "24-05-2024", holiday: "Day After Vesak Full Moon Poya Day", },
        { hdate: "17-06-2024", holiday: "Eid al-Fitr", },
        { hdate: "21-06-2024", holiday: "Poson Full Moon Poya Day", },
        { hdate: "20-07-2024", holiday: "Esala Full Moon Poya Day", },
        { hdate: "19-08-2024", holiday: "Nikini Full Moon Poya Day", },
        { hdate: "16-09-2024", holiday: "Milad-Un-Nabi", },
        { hdate: "17-09-2024", holiday: "Binara Full Moon Poya Day", },
        { hdate: "17-10-2024", holiday: "Vap Full Moon Poya Day", },
        { hdate: "31-10-2024", holiday: "Deepavali", },
        { hdate: "15-11-2024", holiday: "Ill Full Moon Poya Day", },
        { hdate: "14-12-2024", holiday: "Uduvap Full Moon Poya Day", },
        { hdate: "25-12-2024", holiday: "Christmas", },
    ];
    const calendar = document.querySelector("#calendar");
    const monthBanner = document.querySelector("#month");
    let navigation = 0;
    let clicked = null;
    let events = localStorage.getItem("events") ? JSON.parse(localStorage.getItem("events")) : [];
    const weekdays = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];

    function loadCalendar() {
        const dt = new Date();

        if (navigation != 0) {
            dt.setMonth(new Date().getMonth() + navigation);
        }
        const day = dt.getDate();
        const month = dt.getMonth();
        const year = dt.getFullYear();
        monthBanner.innerText = `${dt.toLocaleDateString("en-us", {
            month: "long",
        })} ${year}`;
        calendar.innerHTML = "";
        const dayInMonth = new Date(year, month + 1, 0).getDate();
        const firstDayofMonth = new Date(year, month, 1);
        const dateText = firstDayofMonth.toLocaleDateString("en-us", {
            weekday: "long",
            year: "numeric",
            month: "numeric",
            day: "numeric",
        });

        const dayString = dateText.split(", ")[0];
        const emptyDays = weekdays.indexOf(dayString);

        for (let i = 1; i <= dayInMonth + emptyDays; i++) {
            const dayBox = document.createElement("div");
            dayBox.classList.add("day");
            const monthVal = month + 1 < 10 ? "0" + (month + 1) : month + 1;
            const dateVal = i - emptyDays < 10 ? "0" + (i - emptyDays) : i - emptyDays;
            const dateText = `${dateVal}-${monthVal}-${year}`;
            if (i > emptyDays) {
                dayBox.innerText = i - emptyDays;
                //Event Day
                const eventOfTheDay = events.find((e) => e.date == dateText);
                //Holiday
                const holidayOfTheDay = holidays.find((e) => e.hdate == dateText);

                if (i - emptyDays === day && navigation == 0) {
                    dayBox.id = "currentDay";
                }

                if (eventOfTheDay) {
                    const eventDiv = document.createElement("div");
                    eventDiv.classList.add("event");
                    eventDiv.innerText = eventOfTheDay.title;
                    dayBox.appendChild(eventDiv);
                }
                if (holidayOfTheDay) {
                    const eventDiv = document.createElement("div");
                    eventDiv.classList.add("event");
                    eventDiv.classList.add("holiday");
                    eventDiv.innerText = holidayOfTheDay.holiday;
                    dayBox.appendChild(eventDiv);
                }

                dayBox.addEventListener("click", () => {
                    showModal(dateText);
                });
            } else {
                dayBox.classList.add("plain");
            }
            calendar.append(dayBox);
        }
    }
    function buttons() {
        const btnBack = document.querySelector("#btnBack");
        const btnNext = document.querySelector("#btnNext");
        const btnDelete = document.querySelector("#btnDelete");
        const btnSave = document.querySelector("#btnSave");
        const closeButtons = document.querySelectorAll(".btnClose");
        const txtTitle = document.querySelector("#txtTitle");

        btnBack.addEventListener("click", () => {
            navigation--;
            loadCalendar();
        });
        btnNext.addEventListener("click", () => {
            navigation++;
            loadCalendar();
        });
        modal.addEventListener("click", closeModal);
        closeButtons.forEach((btn) => {
            btn.addEventListener("click", closeModal);
        });
        btnDelete.addEventListener("click", function () {
            events = events.filter((e) => e.date !== clicked);
            localStorage.setItem("events", JSON.stringify(events));
            closeModal();
        });

        btnSave.addEventListener("click", function () {
            if (txtTitle.value) {
                txtTitle.classList.remove("error");
                events.push({
                    date: clicked,
                    title: txtTitle.value.trim(),
                });
                txtTitle.value = "";
                localStorage.setItem("events", JSON.stringify(events));
                closeModal();
            } else {
                txtTitle.classList.add("error");
            }
        });
    }

    const modal = document.querySelector("#modal");
    const viewEventForm = document.querySelector("#viewEvent");
    const addEventForm = document.querySelector("#addEvent");

    function showModal(dateText) {
        clicked = dateText;
        const eventOfTheDay = events.find((e) => e.date == dateText);
        if (eventOfTheDay) {
            //Event already Preset
            document.querySelector("#eventText").innerText = eventOfTheDay.title;
            viewEventForm.style.display = "block";
        } else {
            //Add new Event
            addEventForm.style.display = "block";
        }
        modal.style.display = "block";
    }

    //Close Modal
    function closeModal() {
        viewEventForm.style.display = "none";
        addEventForm.style.display = "none";
        modal.style.display = "none";
        clicked = null;
        loadCalendar();
    }

    buttons();
    loadCalendar();

    /*
    1. Add Event     
    3. Update Local Storage
    */
</script>