<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Chart 2 - Student Participation</title>
</head>

<style>
    .bar-chart-students {
        width: 100%; 
        /* height: 500px; */
    }
</style>

<body>
    <div class="bar-chart-students">
        <canvas id="student-participants"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        (function() {
            const ctx2 = document.getElementById('student-participants');
            const DATA_COUNT = 4;
            const NUMBER_CFG = {
                count: DATA_COUNT,
                min: 0,
                max: 100
            };

            const labels2 = ['DILIM', 'DSL', 'DPL', 'HDLIM'];
            const data2 = {
                labels: labels2,
                datasets: [{
                    label: 'No of Students',
                    data: [23, 45, 33, 67],
                    borderColor: 'rgb(154, 214, 255)',
                    backgroundColor: 'rgb(154, 214, 255)',
                }, ]
            };
            new Chart(ctx2, {
                type: 'bar',
                data: data2,
                options: {
                    indexAxis: 'y',
                    elements: {
                        bar: {
                            borderWidth: 2,
                        }
                    },
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'right',
                        },
                        title: {
                            display: true,
                            text: 'Chart.js Horizontal Bar Chart'
                        }
                    },
                    plugins: {
                        title: {
                            display: true,
                            text: 'Student Participation'
                        },
                        legend: {
                            position: 'bottom',
                        },
                    }
                },
            });
        })();
    </script>
</body>

</html>
