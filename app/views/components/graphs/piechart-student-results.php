<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>piechart</title>
</head>
<style>
.student-results {
    width: 60%;
    /* height: 500px; */
}
</style>
<div class="student-results">
    <canvas id="student-result-chart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const ctx4 = document.getElementById('student-result-chart');

new Chart(ctx4, {
    type: 'doughnut',
    options: {
            plugins: {
                title: {
                    display: true,
                    text: 'Student Performance'
                },
                legend: {
                    position: 'bottom',
                },
            }},
    data: {
        labels: [
            '100-75',
            '75-65',
            '65-55',
            '55-45',
            '45-35',
            '35-0'

        ],
        datasets: [{
            label: 'Student Performance',
            data: [20,20,22,44,10,8],
            backgroundColor: [
                'rgb(16, 52, 77)',
                'rgb(45, 84, 151)',
                'rgb(154, 214, 255)',
                'rgb(114, 158, 233)',
                'rgb(0, 148, 195)',
                'rgb(45, 156, 219)',

            ],
            hoverOffset: 4
        }]
    }
});
</script>

<body>

</body>

</html>