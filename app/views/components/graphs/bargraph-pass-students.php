<style>
    .bar-chart-pass-students {
        width: 60%;
        /* height: 900px; */
    }

    /* #pass-students-chart {
    width: 50%;
    height: 30%;
} */
</style>

<body>
    <div class="bar-chart-pass-students">
        <canvas id="pass-students-chart"></canvas>
        <?php
        $rstudents = $repeateStudent;

        // Array to store the count of students per diploma degree
        $counts = array();

        // Array of diploma degree names
        $diplomaDegrees = ['DLIM', 'DSL', 'DPL', 'HDLIM'];

        // Initialize counts for each diploma degree
        foreach ($diplomaDegrees as $degree) {
            $counts[$degree] = array();
        }

        // Count the occurrences for each diploma degree
        foreach ($rstudents as $student) {
            $degree = $student->degreeShortName;
            $indexNo = $student->indexNo;

            if (!isset($counts[$degree][$indexNo])) {
                $counts[$degree][$indexNo] = 1;
            } else {
                $counts[$degree][$indexNo]++;
            }
        }

        // Calculate the total count of repeated students for each diploma degree
        $repeatedCounts = array();
        foreach ($diplomaDegrees as $degree) {
            $repeatedCounts[$degree] = 0;
            foreach ($counts[$degree] as $count) {
                if ($count > 1) {
                    $repeatedCounts[$degree] += $count - 1; // Subtract 1 as we only want to count the repetitions
                }
            }
        }

        $dlim = 0;
        $dsl = 0;
        $dpl = 0;
        $hdlim = 0;

        if (!empty($rstudents)) {
            foreach ($students as $student) {
                if (isset($student->indexNo)) {
                    // Split the index number at the '/' mark
                    $parts = explode('/', $student->indexNo);
                    $degreeShortName = $parts[0];
                    if ($degreeShortName == "DLIM") {
                        $dlim++;
                    } else if ($degreeShortName == "DSL") {
                        $dsl++;
                    } else if ($degreeShortName == "DPL") {
                        $dpl++;
                    } else if ($degreeShortName == "HDLIM") {
                        $hdlim++;
                    }
                }
            }
        }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        (function () {
            const ctx1 = document.getElementById('pass-students-chart');
            const DATA_COUNT = 3;

            const labels1 = ['DLIM', 'DSL', 'DPL', 'HDLIM'];
            const data1 = {
                labels: labels1,
                datasets: [{
                    label: 'Participants',
                    data: [<?= $dlim ?>, <?= $dsl ?>, <?= $dpl ?>, <?= $hdlim ?>],
                    backgroundColor: 'rgb(23, 55, 110)',
                    stack: 'Stack 0',
                    maxBarThickness: 50
                },

                {
                    label: 'Repeat Students',
                    data: [<?= $repeatedCounts['DLIM'] ?>, <?= $repeatedCounts['DSL'] ?>, <?= $repeatedCounts['DPL'] ?>, <?= $repeatedCounts['HDLIM'] ?>],
                    backgroundColor: 'rgb(154, 214, 255)',
                    stack: 'Stack 1',
                    maxBarThickness: 50
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