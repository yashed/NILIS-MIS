<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>piechart</title>
</head>
<style>
.bar-chart-pass-students {
    width: 30%;
    height: 900px;
}

#pass-students {
    width: 50%;
    height: 30%;
}
</style>

<body>
    <div class="bar-chart-pass-students">
        <canvas id="pass-students"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
    const ctx = document.getElementById('pass-students');
    const DATA_COUNT = 3;

    const labels = ['DILIM', 'DSL', 'HDILIM'];
    const data = {
        labels: labels,
        datasets: [{
                label: 'Participants',
                data: [80, 60, 74],
                backgroundColor: 'rgb(23, 55, 110)',
                stack: 'Stack 0',
            },

            {
                label: 'Pass Students',
                data: [55, 49, 55],
                backgroundColor: 'rgb(154, 214, 255)',
                stack: 'Stack 1',
            },
        ]
    };
    new Chart(ctx, {
        type: 'bar',
        data: data,
        options: {
            plugins: {
                title: {
                    display: true,
                    text: 'Student Pass Rates'
                },
                legend: {
                    position: 'bottom',
                },
            },
            responsive: true,
            interaction: {
                intersect: false,
            },
            scales: {
                x: {
                    stacked: true,
                },
                y: {
                    stacked: true
                }
            },
            layout: {
                padding: {
                    left: 10,
                    right: 10,
                    top: 10,
                    bottom: 10
                }
            },
            elements: {
                bar: {
                    borderWidth: 1, // Adjust the border width of the bars
                    borderRadius: 4, // Adjust the border radius of the bars
                    barPercentage: 0.8, // Adjust the width of the bars
                    categoryPercentage: 0.7 // Adjust the space between bars
                }
            },
        }
    });
    </script>
</body>

</html>