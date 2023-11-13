<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Chart 1 - Student Pass Rates</title>
</head>

<style>
    .bar-chart-pass-students {
       width: 60%; 
        /* height: 900px; */
    }

    #pass-students-chart {
        /* width: 50%; */
        /* height: 30%; */
    }
</style>

<body>
    <div class="bar-chart-pass-students">
        <canvas id="pass-students-chart"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        (function() {
            const ctx1 = document.getElementById('pass-students-chart');
            const DATA_COUNT = 3;

            const labels1 = ['DILIM', 'DSL', 'HDILIM'];
            const data1 = {
                labels: labels1,
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
            new Chart(ctx1, {
                type: 'bar',
                data: data1,
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
                            borderWidth: 1,
                            borderRadius: 4,
                            barPercentage: 0.8,
                            categoryPercentage: 0.7
                        }
                    },
                }
            });
        })();
    </script>
</body>

</html>
