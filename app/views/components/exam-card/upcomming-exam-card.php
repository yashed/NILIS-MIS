<!DOCTYPE html>
<html lang="en">

<head>
    <title>Examination</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<style>
    .updomming-exam-card-body {
        display: flex;
        flex-direction: column;
        border-radius: 8px;
        border: 3px solid rgba(0, 0, 0, 0.05);
        background: var(--colour-primary, #FFF);
        width: 90%;
        gap: 1.5vw;
        flex-shrink: 0;
        box-shadow: 4px 7px 9px 0px rgba(0, 0, 0, 0.08);
        margin-left: 10px;
        margin: 2px;
        cursor: pointer;
    }

    .updomming-exam-card-body:hover {
        background-color: #F1F1F1;
        box-shadow: 6px 9px 11px 0px rgba(0, 0, 0, 0.06);

    }

    .updomming-container {
        display: flex;
        justify-content: space-evenly;
        align-items: center;
        width: 100%;

    }

    .updomming-exam-img {
        width: 95px;
        height: 115px;
        flex-shrink: 0;
        margin: 5% 0% 3% 0%;
    }

    .updomming-card {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        margin: 1% 2% 0% 1%;
        width: 60%;
    }

    .updomming-content {
        font-family: "Poppins", sans-serif;
        margin-right: 0%;
        margin-left: 5%;
        display: flex;
        flex-direction: column;
        gap: 5px;
    }

    .updomming-degree-name {
        font-size: 4vw;
        font-weight: 1000;
        color: #17376E;
        text-align: left;
    }

    .updomming-sub-name {
        color: #9AD6FF;
        font-size: 1vw;
        font-weight: 600;
        text-align: left;
        margin-top: -3%;
    }

    .updomming-exam-info {
        display: flex;
        flex-direction: row;
        color: var(--colour-secondary-1, #17376E);
        font-family: Poppins;
        font-size: 12px;
        font-style: normal;
        font-weight: 700;
        line-height: normal;
        justify-content: center;
        font-family: "Poppins", sans-serif;
        margin-bottom: 2%;
    }

    @media (max-width:1100px) {
        .updomming-exam-img {
            width: 60px;
            height: 72px;
        }

        .updomming-degree-name {
            font-size: 1.5vw;
        }

        .updomming-sub-name {
            font-size: 12px;
        }

        .updomming-exam-info {
            font-size: 10px;
        }
    }

    .upcomming-exam-svg {
        height: 5.5vw;
        width: 5.5vw;
        margin: 5% 0% 3% 0%;
    }
</style>
<script>
    //root variable
    var rootUrl = "<?= ROOT ?>";
    var method = "participants";
    var degreeID = "<?= $exam->degreeID ?>";
    var examID = "<?= $exam->examID ?>";
    var role = "<?= $role ?>";

    function redirectToURL() {
        var desiredUrl = rootUrl + role.toLowerCase() + "/examination/" + method + "?degreeID=" + degreeID + "&examID=" + examID;
        console.log(desiredUrl);
        window.location.href = desiredUrl;
    }
</script>

<body>
    <div class="updomming-exam-card-body">

        <div class="updomming-container" onclick="redirectToURL()">
            <div class="updomming-card">
                <div class="updomming-content">
                    <div class="updomming-degree-name">
                        <?= $exam->DegreeShortName ?>
                    </div>
                    <div class="updomming-sub-name">
                        <?= $exam->DegreeName ?>
                    </div>
                </div>
            </div>
            <div class="upcomming-exam-svg">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 93 93" fill="none">
                    <path
                        d="M36.1582 23.2481C36.1582 22.563 36.4304 21.9059 36.9148 21.4214C37.3993 20.937 38.0564 20.6648 38.7415 20.6648H59.4082C60.0934 20.6648 60.7504 20.937 61.2349 21.4214C61.7194 21.9059 61.9916 22.563 61.9916 23.2481C61.9916 23.9333 61.7194 24.5904 61.2349 25.0748C60.7504 25.5593 60.0934 25.8315 59.4082 25.8315H38.7415C38.0564 25.8315 37.3993 25.5593 36.9148 25.0748C36.4304 24.5904 36.1582 23.9333 36.1582 23.2481ZM38.7415 30.9981C38.0564 30.9981 37.3993 31.2703 36.9148 31.7548C36.4304 32.2392 36.1582 32.8963 36.1582 33.5815C36.1582 34.2666 36.4304 34.9237 36.9148 35.4082C37.3993 35.8926 38.0564 36.1648 38.7415 36.1648H59.4082C60.0934 36.1648 60.7504 35.8926 61.2349 35.4082C61.7194 34.9237 61.9916 34.2666 61.9916 33.5815C61.9916 32.8963 61.7194 32.2392 61.2349 31.7548C60.7504 31.2703 60.0934 30.9981 59.4082 30.9981H38.7415ZM36.1582 56.8315C36.1582 56.1463 36.4304 55.4892 36.9148 55.0048C37.3993 54.5203 38.0564 54.2481 38.7415 54.2481H59.4082C60.0934 54.2481 60.7504 54.5203 61.2349 55.0048C61.7194 55.4892 61.9916 56.1463 61.9916 56.8315C61.9916 57.5166 61.7194 58.1737 61.2349 58.6582C60.7504 59.1426 60.0934 59.4148 59.4082 59.4148H38.7415C38.0564 59.4148 37.3993 59.1426 36.9148 58.6582C36.4304 58.1737 36.1582 57.5166 36.1582 56.8315ZM38.7415 64.5815C38.0564 64.5815 37.3993 64.8536 36.9148 65.3381C36.4304 65.8226 36.1582 66.4797 36.1582 67.1648C36.1582 67.85 36.4304 68.507 36.9148 68.9915C37.3993 69.476 38.0564 69.7481 38.7415 69.7481H59.4082C60.0934 69.7481 60.7504 69.476 61.2349 68.9915C61.7194 68.507 61.9916 67.85 61.9916 67.1648C61.9916 66.4797 61.7194 65.8226 61.2349 65.3381C60.7504 64.8536 60.0934 64.5815 59.4082 64.5815H38.7415Z"
                        fill="#17376E" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M10.3418 54.252C10.3418 53.5669 10.614 52.9098 11.0984 52.4253C11.5829 51.9409 12.24 51.6687 12.9251 51.6687H25.8418C26.5269 51.6687 27.184 51.9409 27.6685 52.4253C28.153 52.9098 28.4251 53.5669 28.4251 54.252V67.1687C28.4251 67.8538 28.153 68.5109 27.6685 68.9954C27.184 69.4799 26.5269 69.752 25.8418 69.752H12.9251C12.24 69.752 11.5829 69.4799 11.0984 68.9954C10.614 68.5109 10.3418 67.8538 10.3418 67.1687V54.252ZM15.5085 56.8354V64.5854H23.2585V56.8354H15.5085Z"
                        fill="#17376E" />
                    <path
                        d="M30.2354 25.0782C30.706 24.591 30.9664 23.9384 30.9605 23.2611C30.9546 22.5837 30.6829 21.9358 30.204 21.4568C29.725 20.9779 29.0771 20.7062 28.3997 20.7003C27.7224 20.6944 27.0698 20.9548 26.5826 21.4254L18.0757 29.9323L14.7354 26.592C14.2482 26.1215 13.5957 25.8611 12.9183 25.867C12.241 25.8728 11.593 26.1445 11.1141 26.6235C10.6351 27.1025 10.3634 27.7504 10.3575 28.4277C10.3516 29.1051 10.612 29.7576 11.0826 30.2449L18.0757 37.2379L30.2354 25.0782Z"
                        fill="#17376E" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M10.3333 0C7.59276 0 4.96444 1.08869 3.02656 3.02656C1.08869 4.96444 0 7.59276 0 10.3333V82.6667C0 85.4072 1.08869 88.0356 3.02656 89.9734C4.96444 91.9113 7.59276 93 10.3333 93H62C64.7406 93 67.3689 91.9113 69.3068 89.9734C71.2446 88.0356 72.3333 85.4072 72.3333 82.6667V10.3333C72.3333 7.59276 71.2446 4.96444 69.3068 3.02656C67.3689 1.08869 64.7406 0 62 0H10.3333ZM5.16667 10.3333C5.16667 8.96305 5.71101 7.64889 6.67995 6.67995C7.64889 5.71101 8.96305 5.16667 10.3333 5.16667H62C63.3703 5.16667 64.6844 5.71101 65.6534 6.67995C66.6223 7.64889 67.1667 8.96305 67.1667 10.3333V82.6667C67.1667 84.0369 66.6223 85.3511 65.6534 86.3201C64.6844 87.289 63.3703 87.8333 62 87.8333H10.3333C8.96305 87.8333 7.64889 87.289 6.67995 86.3201C5.71101 85.3511 5.16667 84.0369 5.16667 82.6667V10.3333ZM77.5 25.8333C77.5 23.7779 78.3165 21.8067 79.7699 20.3533C81.2233 18.8998 83.1946 18.0833 85.25 18.0833C87.3054 18.0833 89.2767 18.8998 90.7301 20.3533C92.1835 21.8067 93 23.7779 93 25.8333V78.2828L85.25 89.9078L77.5 78.2828V25.8333ZM85.25 23.25C84.5649 23.25 83.9078 23.5222 83.4233 24.0066C82.9388 24.4911 82.6667 25.1482 82.6667 25.8333V31H87.8333V25.8333C87.8333 25.1482 87.5612 24.4911 87.0767 24.0066C86.5922 23.5222 85.9351 23.25 85.25 23.25ZM85.25 80.5922L82.6667 76.7172V36.1667H87.8333V76.7172L85.25 80.5922Z"
                        fill="#17376E" />
                </svg>
            </div>
        </div>
        <div class="updomming-exam-info">
            <div class="updomming-exam-year">
                <?= $exam->semester ?> Semester Examination
            </div>
        </div>

    </div>
</body>

</html>