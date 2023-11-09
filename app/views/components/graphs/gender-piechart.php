<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pie Chart</title>
</head>
<style>
.pie-chart {
    position: relative;
    width: 500px;
    height: 500px;
    margin: 20px auto;
    background: conic-gradient(from 0deg,
            var(--male-color, #4e79a7) 0%,
            var(--male-color, #4e79a7) calc(var(--male-value, 0) * 1%),
            var(--female-color, #edc949) 0%,
            var(--female-color, #edc949) calc(var(--female-value, 0) * 1%));
    border: 1px solid #ccc;
    border-radius: 50%;
    transition: background 2s;
}

.segment {
    position: absolute;
    width: 100%;
    height: 100%;
    clip-path: polygon(50% 50%, 100% 0, 100% 100%);
}

.custom-values {
    text-align: center;
    margin: 20px auto;
    max-width: 200px;
}

input[type="number"] {
    width: 50px;
    margin: 0 10px;
}

#update-chart {
    background-color: #4e79a7;
    color: white;
    border: none;
    padding: 5px 10px;
    cursor: pointer;
}
</style>

<body>
    <div class="pie-chart">
        <div class="segment" data-value="50" data-color="#4e79a7"></div>
        <div class="segment" data-value="30" data-color="#edc949"></div>
    </div>
    <div class="custom-values">
        <label for="male">Male:</label>
        <input type="number" id="male" value="50">
        <label for="female">Female:</label>
        <input type="number" id="female" value="30">
        <button id="update-chart">Update Chart</button>
    </div>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const maleInput = document.getElementById("male");
        const femaleInput = document.getElementById("female");
        const updateButton = document.getElementById("update-chart");
        const pieChart = document.querySelector(".pie-chart");

        updateButton.addEventListener("click", function() {
            const maleValue = maleInput.value;
            const femaleValue = femaleInput.value;

            pieChart.style.setProperty("--male-value", maleValue);
            pieChart.style.setProperty("--female-value", femaleValue);
        });
    });
    </script>
</body>

</html>