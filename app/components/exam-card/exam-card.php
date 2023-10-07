<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <style>
    .body2 {
        display: flex;
        flex-direction: column;
        border-radius: 8px;
        border: 3px solid rgba(0, 0, 0, 0.05);
        background: var(--colour-primary, #FFF);
        width: 363px;
        height: 187px;
        flex-shrink: 0;
        box-shadow: 4px 7px 9px 0px rgba(0, 0, 0, 0.08);
        margin-left: 10px;
    }
    .img {
        width: 87px;
        height: 95px;
        flex-shrink: 0;
        margin-top: 20px;
        margin-right: 5px;
    }
    .card {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        margin: 10px;
    }
    .content {
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-content: center;
        flex-wrap: wrap;
        font-family: "Poppins", sans-serif;
        margin-right: 20px;
        margin-left: 20px;
    }
    .degree-name {
        font-size: 55px;
        font-weight: 1000;
        color: #17376E;
        text-align: left;
    }
    .sub-name {
        color: #9AD6FF;
        font-size: 17px;
        font-weight: 600;
        text-align: left;
    }
    .info {
        display: flex;
        flex-direction: row;
        color: var(--colour-secondary-1, #17376E);
        font-family: Poppins;
        font-size: 14px;
        font-style: normal;
        font-weight: 700;
        line-height: normal;
        justify-content: center;
        font-family: "Poppins", sans-serif;
    }
    </style>
    <body>
        <div class="body2">
            <div class="card">
                <div class="content">
                    <div class="degree-name"> DLIM </div>
                    <div class="sub-name">Diploma in Library and<br>Information Management </div>
                </div>
                <img src="../../../public/assets/exam-card/icon.png" alt="icon.png" class="img">
            </div>
            <div class="info">
                <div class="year">1st Semester Examination</div>
            </div>
        </div>
    </body>
</html>