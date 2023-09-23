<head>

    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />

    <style>
    .body {

        border-radius: 8px;
        border: 3px solid rgba(0, 0, 0, 0.05);
        background: var(--colour-primary, #FFF);
        width: 440px;
        height: 187px;
        flex-shrink: 0;
        box-shadow: 4px 7px 9px 0px rgba(0, 0, 0, 0.08);
    }

    .img {
        width: 123px;
        height: 133px;
        flex-shrink: 0;
        margin-top: 10px;
    }

    .card {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
    }

    .content {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-content: space-around;
        flex-wrap: wrap;
        align-items: flex-end;
        font-family: "Poppins";
        margin-right: 20px;
        margin-left: 20px;
    }

    .degree-name {
        font-size: 55px;
        font-weight: 1000;
    }


    .sub-name {
        color: #9AD6FF;
        font-size: 18px;
        font-weight: 700;
        text-align: right;
    }

    .degree-name {
        color: #17376E;
        text-align: left;
    }

    .info {
        display: flex;
        flex-direction: row;
        color: var(--colour-secondary-1, #17376E);
        font-family: Poppins;
        font-size: 14px;
        font-style: normal;
        font-weight: 800;
        line-height: normal;
        gap: 30px;
        justify-content: center;
        margin-top: 10px;
    }
    </style>

</head>


<body>
    <div class="body">
        <div class="card">

            <img src="../../../public/assets/degree-card/icon.png" alt="icon.png" class="img">
            <div class="content">
                <div class="degree-name"> DLIM </div>
                <div class="sub-name">Diploma in Library and<br>Information Management
                </div>

            </div>

        </div>
        <div class="info">
            <div class="year">Academic Year - 2021</div>
            <div class="type">1 Year Degree Program</div>
        </div>



    </div>
</body>

</html>