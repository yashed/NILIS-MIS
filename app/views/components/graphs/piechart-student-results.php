<?php

//define ranges
$ranges = array(
    '100-75' => 0,
    '75-65' => 0,
    '65-55' => 0,
    '55-45' => 0,
    '45-35' => 0,
    '35-0' => 0
);

//count values
if (!empty($examResults)) {
    foreach ($examResults as $mark) {
        $finalMarks = $mark->finalMarks;
        if ($finalMarks >= 75) {
            $ranges['100-75']++;
        } elseif ($finalMarks >= 65) {
            $ranges['75-65']++;
        } elseif ($finalMarks >= 55) {
            $ranges['65-55']++;
        } elseif ($finalMarks >= 45) {
            $ranges['55-45']++;
        } elseif ($finalMarks >= 35) {
            $ranges['45-35']++;
        } else {
            $ranges['35-0']++;
        }
    }
}

$result = array_values($ranges);

?>

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
            }
        },
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
                data: [<?= $result[0] ?>, <?= $result[1] ?>, <?= $result[2] ?>, <?= $result[3] ?>, <?= $result[4] ?>, <?= $result[5] ?>],
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