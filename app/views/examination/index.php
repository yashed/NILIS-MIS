<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">

    <style>
    body {
        background-color: #E2E2E2;
        margin: 0;
        padding: 0;
    }

    .navbar {
        background-color: white;
        display: flex;
        justify-content: space-between;
        align-items: center;
        height: 70px;
        padding: 10px 20px;
        margin-left: 328px;
        box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.1);
        margin-bottom: 10px;
        border-radius: 10px;
    }

    .navbar-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
    }

    .navbar-icons {
        display: flex;
        gap: 30px;
    }

    .navbar-icons a {
        text-decoration: none;
        color: #333;
    }

    .navbar-icons {
        margin-left: auto;
    }

    .white-container1 {
        background-color: white;
        padding: 20px;
        margin-left: 328px;
        color: #17376E;
        font-size: 36px;
        font-family: "Poppins", sans-serif;
        font-weight: 500;
        margin-bottom: 10px;
        border-radius: 10px;
    }

    .left-top-text {
        text-align: left;
        margin: 0;
        padding: 0;
        margin-bottom: 20px;
        color: #17376E;
    }

    .white-container2 {
        margin-left: 328px;
        background-color: white;
        padding: 20px;
        height: 100%;
        font-family: "Poppins", sans-serif;
        font-size: 24px;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
    }

    .flex-container {
        display: flex;
        justify-content: space-between;
        gap: 10px;
    }

    .blue-box1 {
        width: 300px;
        height: 200px;
        background-color: #17376E;
        display: inline-block;
        margin-top: 50px;
        margin-left: 100px;
    }

    .blue-box2 {
        width: 300px;
        height: 200px;
        background-color: #17376E;
        display: inline-block;
        margin-top: 50px;
        margin-left: 100px;
    }


    .white-container3 {
        flex: 1;
        margin-left: 328px;
        margin-top: 10px;
        margin-bottom: 10px;
        background-color: white;
        padding: 20px;
        height: 100%;
        width: 320px;
        /* font-family: "Poppins", sans-serif; */
        font-size: 24px;
        border-radius: 10px;
    }

    .title {
        display: flex;
        align-items: center;
        flex-direction: row;
        justify-content: space-between;
        flex-wrap: nowrap;
    }

    .text1 {
        font-family: "Poppins", sans-serif;
        text-align: left;
        margin-bottom: 20px;
        padding: 0;
        color: #17376E;
    }

    .exam-card1 {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }



    .ex-card {
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
    }

    .exam-card2 {
        display: flex;
        justify-content: center;
        align-items: center;
    }


    /*calender css*/
    .heading-calender {
        font-family: "Poppins", sans-serif;
        font-style: normal;
        font-weight: 500;
        font-size: 24px;
        line-height: 20px;
        /* identical to box height, or 71% */
        letter-spacing: -0.02em;
        margin-left: 80px;
        margin-top: 10px;
        color: #17376E;
    }

    .dropdown {
        width: 200px;
    }

    button {
        width: 100%;
        color: #fff;
        height: 5vh;
        padding: 8px 22px;
        border-radius: 12px;
        background: #17376e;
        box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.2);
        border: 0px;
        margin-bottom: 10px;
        /* margin-top: 25px; */
        flex-wrap: wrap;
    }

    .bt-name {
        font-size: 16px;
        font-weight: 500px;
    }

    button:hover {
        color: #17376e;
        background-color: white;
        border: 1px solid var(--colour-secondary-1, #17376e);
    }

    .dropdown-content {

        display: none;
        position: absolute;
        background-color: #fff;
        border: 1px solid rgba(23, 55, 110, 0.46);
        box-shadow: 0px 8px 11px 0px rgba(0, 0, 0, 0.15);
        border-radius: 12px;
        min-width: 200px;
        z-index: 1;

    }

    .dropdown-content a {

        font-size: 14px;
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        font-weight: 300;
        text-align: center;
    }

    .dropdown-content a:hover {
        background-color: #E0E0E0;
        border-radius: 12px;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }
    </style>
</head>

<body>
    <header>
        <nav class="navbar">
            <div class="navbar-container">
                <div class="navbar-icons">
                    <a href="page1.html"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                            viewBox="0 0 40 40" fill="none">
                            <circle cx="20" cy="20" r="20" fill="#F3F3F3" />
                            <path
                                d="M23.0208 27.8947C23.021 28.4259 22.8291 28.9374 22.4836 29.3269C22.1382 29.7163 21.6647 29.9549 21.158 29.9947L21.007 30H18.9932C18.4851 30.0002 17.9958 29.7996 17.6232 29.4384C17.2507 29.0773 17.0225 28.5823 16.9844 28.0526L16.9794 27.8947H23.0208ZM20.0001 10C21.8276 9.99997 23.5837 10.742 24.8979 12.0696C26.2121 13.3971 26.9818 15.2064 27.0444 17.1158L27.0484 17.3684V21.3305L28.883 25.1663C28.9631 25.3337 29.0032 25.5188 28.9998 25.7059C28.9964 25.893 28.9498 26.0765 28.8637 26.2406C28.7777 26.4047 28.655 26.5446 28.5059 26.6482C28.3569 26.7519 28.186 26.8163 28.008 26.8358L27.8922 26.8421H12.1079C11.9289 26.8422 11.7525 26.7968 11.5938 26.71C11.4352 26.6232 11.2991 26.4974 11.1971 26.3435C11.0951 26.1896 11.0304 26.0122 11.0084 25.8264C10.9864 25.6407 11.0078 25.4521 11.0708 25.2768L11.1171 25.1663L12.9517 21.3305V17.3684C12.9517 15.4142 13.6943 13.54 15.0161 12.1582C16.338 10.7763 18.1307 10 20.0001 10Z"
                                fill="#17376E" />
                        </svg></a>
                    <a href="page2.html"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="36"
                            viewBox="0 0 35 36" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M17.5 4C15.0513 3.99955 12.6454 4.64135 10.5223 5.86134C8.39915 7.08134 6.63315 8.83685 5.40054 10.9527C4.16793 13.0685 3.51181 15.4706 3.49768 17.9192C3.48355 20.3678 4.1119 22.7773 5.32001 24.9072C6.13658 23.846 7.18626 22.9868 8.38791 22.3959C9.58956 21.8051 10.911 21.4986 12.25 21.5H22.75C24.089 21.4986 25.4104 21.8051 26.6121 22.3959C27.8137 22.9868 28.8634 23.846 29.68 24.9072C30.8881 22.7773 31.5164 20.3678 31.5023 17.9192C31.4882 15.4706 30.8321 13.0685 29.5995 10.9527C28.3668 8.83685 26.6008 7.08134 24.4777 5.86134C22.3546 4.64135 19.9487 3.99955 17.5 4ZM31.4002 28.633C33.74 25.5827 35.0056 21.8443 35 18C35 8.33474 27.1652 0.5 17.5 0.5C7.83476 0.5 1.96932e-05 8.33474 1.96932e-05 18C-0.00575782 21.8443 1.25985 25.5827 3.59977 28.633L3.59102 28.6645L4.21227 29.3872C5.85356 31.3061 7.89143 32.8463 10.1854 33.9016C12.4794 34.9569 14.9749 35.5022 17.5 35.5C21.0478 35.5065 24.5129 34.4288 27.4312 32.4112C28.6754 31.5516 29.8035 30.5353 30.7877 29.3872L31.409 28.6645L31.4002 28.633ZM17.5 7.49999C16.1076 7.49999 14.7723 8.05312 13.7877 9.03768C12.8031 10.0222 12.25 11.3576 12.25 12.75C12.25 14.1424 12.8031 15.4777 13.7877 16.4623C14.7723 17.4469 16.1076 18 17.5 18C18.8924 18 20.2277 17.4469 21.2123 16.4623C22.1969 15.4777 22.75 14.1424 22.75 12.75C22.75 11.3576 22.1969 10.0222 21.2123 9.03768C20.2277 8.05312 18.8924 7.49999 17.5 7.49999Z"
                                fill="#17376E" />
                        </svg></a>
                </div>
            </div>
        </nav>
    </header>

    <div class="white-container1">
        Dashboard
    </div>

    <div class="white-container2">
        <div class="title">
            <p class="left-top-text">Upcoming Examinations</p>
            <div class="dropdown">
                <button class="dropbtn">
                    <div class="bt-name">Create Examination</div>
                </button>
                <div class="dropdown-content">
                    <a href="#">Normal Examination</a>

                    <a href="#">Special Examination</a>
                </div>
            </div>
        </div>

        <div class="ex-card">
            <div class="exam-card1">
                <?php include '../../components/exam-card/index.php' ?>
            </div>

        </div>
    </div>

    <div class="flex-container">
        <div class="white-container3">
            <div class="text1">Ongoing Examinations</div>
            <div class="exam-card2">
                <?php include '../../components/exam-card/index.php' ?>
            </div>

        </div>

    </div>
    <script>

    </script>
</body>

</html>