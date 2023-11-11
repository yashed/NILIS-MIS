<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>piechart</title>
</head>
<style>
.bar-chart {
    width: 20%;
    height: 500px;
}
</style>
<div class="bar-chart">
    <canvas id="myChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const ctx = document.getElementById('myChart');

new Chart(ctx, {
    type: 'doughnut',
    options: {
            plugins: {
                title: {
                    display: true,
                    text: 'Student Gender'
                },
                legend: {
                    position: 'bottom',
                },
            }},
    data: {
        labels: [
            'Male',
            'Female',

        ],
        datasets: [{
            label: 'Degree Participants',
            data: [40, 80],
            backgroundColor: [
                'rgb(23, 55, 110)',
                'rgb(154, 214, 255)',

            ],
            hoverOffset: 4
        }]
    }
});
</script>

<body>

</body>

</html>