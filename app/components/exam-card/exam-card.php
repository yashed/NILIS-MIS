<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<style>
.body {
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
.container{
    display: grid;
    grid-template-columns: auto 1fr;
    grid-gap: 8%;
}
.exam-img {
    width: 95px;
    height: 115px;  
    flex-shrink: 0;
    margin: 15% 0% 3% 1%; 
}
.card {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    margin: 1% 2% 0% 1%;
}
.content {
    font-family: "Poppins", sans-serif;
    margin-right: 0%;
    margin-left: 5%;
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
    margin-top: -3%;
}
.exam-info {
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
    margin-top: 2.3%;
}
</style>
<body>
    <div class="body">
        <div class="container">
            <div class="card">
                <div class="content">
                    <div class="degree-name"> DLIM </div>
                    <div class="sub-name">Diploma in Library and<br>Information Management</div>
                </div>
            </div>
            <img src="../../../public/assets/exam-card/icon.png" alt="icon.png" class="exam-img">
        </div>
        <div class="exam-info">
            <div class="exam-year">1st Semester Examination</div>
        </div>
    </div>
</body>

</html>