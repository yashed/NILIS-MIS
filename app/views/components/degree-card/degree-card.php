<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Degree Card</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <style>
        .degree-body {
            border-radius: 8px;
            border: 3px solid rgba(0, 0, 0, 0.05);
            background: var(--colour-primary, #FFF);
            width: 390px;
            height: auto;
            flex-shrink: 0;
            box-shadow: 4px 7px 9px 0px rgba(0, 0, 0, 0.08);
            padding: 3px 3px 5px 3px;
        }
        .degree-img {
            width: 113px;
            height: 123px;
            flex-shrink: 0;
        }
        .degree-card {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }
        .degree-content {
            display: flex;
            flex-direction: column;
            justify-content: right;
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
        .degree-sub-name {
            color: #9AD6FF;
            font-size: 18px;
            font-weight: 700;
            text-align: right;
            /* float: right; */
        }
        .degree-name {
            color: #17376E;
            text-align: left;
        }
        .degree-info {
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
    <div class="degree-body">
        <div class="degree-card">
            <img src="<?=ROOT?>/assets/degree-card/icon.png" alt="icon.png" class="degree-img">
            <div class="degree-content">
                <div class="degree-name"><?=$degree->DegreeName?></div>
                <div class="degree-sub-name">Diploma in Library Management</div>
            </div>
        </div>
        <div class="degree-info">
            <div class="degree-year">Academic Year - <?=$degree->AcademicYear?></div>
            <div class="degree-type"><?=$degree->DegreeType?> Program</div>
        </div>
    </div>
</body>
</html>
