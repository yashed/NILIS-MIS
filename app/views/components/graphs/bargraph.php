<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browser Market Share - June 2015</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
</head>
<style>
/* styles.css */
body {
    font-family: 'Poppins', sans-serif;
}

.dl {
    display: flex;
    background-color: white;
    flex-direction: column;
    width: 50%;
    max-width: 500px;
    position: relative;
    padding: 20px;
}

dt {
    align-self: flex-start;
    width: 50%;
    font-weight: 700;
    display: block;
    text-align: center;
    font-size: 1.2em;
    font-weight: 700;
    margin-bottom: 20px;
    margin-left: 130px;
}

.text {
    font-weight: 600;
    color: #17376E;
    font-weight: 700;
    display: flex;
    align-items: center;
    height: 40px;
    width: 130px;
    background-color: white;
    position: absolute;
    left: 0;
    justify-content: flex-end;
}

.percentage {
    font-size: 0.8em;
    line-height: 1;
    text-transform: uppercase;
    width: 100%;
    height: 40px;
    margin-left: 130px;
    background: repeating-linear-gradient(to right, #ddd, #ddd 1px, #fff 1px, #fff 5%);
}

.bar {
    content: "";
    display: block;
    background-color: #9AD6FF;
    border-radius: 0 5px 5px 0;
    width: 0;
    margin-bottom: 10px;
    height: 90%;
    position: relative;
    top: 50%;
    transform: translateY(-50%);
    transition: width 1s ease;
    /* Longer transition for animation */
    cursor: pointer;
}

.graph-value {
    transform: translateY(-50%);
    transition: width 1s ease;
    display: block;
    width: 0;
    position: relative;
    top: 50%;
}
</style>

<body>
    <div class="dl">
        <dt>Course Participants</dt>
        <div class="percentage percentage-80">
            <span class="text">DILIM</span>
            <div class="bar"><span class='graph-value'>45</sapan>
            </div>
        </div>
        <div class="percentage percentage-49">
            <span class="text">DSL</span>
            <div class="bar"><span class='graph-value'>45</sapan>
            </div>
        </div>
        <div class="percentage percentage-16">
            <span class="text">HDILIM</span>
            <div class="bar"><span class='graph-value'>45</sapan>
            </div>
        </div>
        <div class="percentage percentage-5">
            <span class="text">DPL</span>
            <div class="bar"><span class='graph-value'>45</sapan>
            </div>
        </div>
    </div>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const percentageBars = document.querySelectorAll(".bar");

        percentageBars.forEach(bar => {
            const width = bar.parentElement.classList[1].split('-')[1];
            setTimeout(function() {
                bar.style.width = width + "%";
            }, 200);
        });
    });
    </script>
</body>

</html>