<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Degree Card</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <style>
        .degree-card-body {
            border-radius: 8px;
            border: 3px solid rgba(0, 0, 0, 0.05);
            background: var(--colour-primary, #FFF);
            width: 390px;
            height: auto;
            flex-shrink: 0;
            box-shadow: 4px 7px 9px 0px rgba(0, 0, 0, 0.08);
            padding: 3px 3px 5px 3px;
        }

        .degree-card-img {
            width: 98px;
            height: 123px;
            flex-shrink: 0;
        }

        .degree-card-card {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }

        .degree-card-content {
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

        .degree-card-name {
            font-size: 55px;
            font-weight: 1000;
        }

        .degree-card-sub-name {
            color: #9AD6FF;
            font-size: 12px;
            font-weight: 700;
            text-align: right;
            /* float: right; */
        }

        .degree-card-name {
            color: #17376E;
            text-align: left;
        }

        .degree-card-info {
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
    <a href="<?= ROOT ?><?= $_SESSION['USER_DATA']->role?>/degreeprofile?id=<?= $degree->DegreeID ?>" style="text-decoration: none;">
        <div class="degree-card-body">
            <div class="degree-card-card">
                <img src="<?= ROOT ?>/assets/degree-card/icon.png" alt="icon.png" class="degree-card-img">
                <div class="degree-card-content">
                    <div class="degree-card-name"><?= $degree->DegreeShortName ?></div>
                    <div class="degree-card-sub-name"><?= $degree->DegreeName ?></div>
                </div>
            </div>
            <div class="degree-card-info">
                <div class="degree-card-year">Academic Year - <?= $degree->AcademicYear ?></div>
                <div class="degree-card-type"><?= $degree->DegreeType ?> Program</div>
            </div>
        </div>
    </a>
</body>

</html>