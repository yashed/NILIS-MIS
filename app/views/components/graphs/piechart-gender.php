<style>
    .pie-chart-gender {
        width: 60%;
        /* height: 500px; */

    }
</style>
<div class="pie-chart-gender">
    <canvas id="gender-pie-chart"></canvas>
    <?php
    $male = 0;
    $female = 0;
    if (!empty($students)) {
        foreach ($students as $student) {
            if (isset($student->gender)) {
                if ($student->gender == "M") {
                    $male++;
                } else if ($student->gender == "F") {
                    $female++;
                }
            }
        }
    }
    ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx3 = document.getElementById('gender-pie-chart');
    new Chart(ctx3, {
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
            }
        },
        data: {
            labels: [
                'Male',
                'Female',

            ],
            datasets: [{
                label: 'Degree Participants',
                data: [<?= $male ?>, <?= $female ?>],
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