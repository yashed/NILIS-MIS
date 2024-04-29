<style>
    .bar-chart-student-attendance {
        width: 100%;
        /* height: 900px; */
        height: 100%;
    }
</style>

<body>
    <div class="bar-chart-student-attendance">
        <canvas id="student-attendance-chart"></canvas>
        <?php
        // Calculate total attendance and number of students for each degree program
        $dplAttendance = 0;
        $dplStudentCount = 0;
        $dlimAttendance = 0;
        $dlimStudentCount = 0;
        $dslAttendance = 0;
        $dslStudentCount = 0;
        $hdlimAttendance = 0;
        $hdlimStudentCount = 0;

        if (!empty($data['attendances'])) {
            foreach ($data['attendances'] as $attendance) {
                if ($attendance->degree_name === 'DPL') {
                    $dplAttendance += intval($attendance->attendance);
                    $dplStudentCount++;
                } elseif ($attendance->degree_name === 'DLIM') {
                    $dlimAttendance += intval($attendance->attendance);
                    $dlimStudentCount++;
                } elseif ($attendance->degree_name === 'DSL') {
                    $dslAttendance += intval($attendance->attendance);
                    $dslStudentCount++;
                } elseif ($attendance->degree_name === 'HDLIM') {
                    $hdlimAttendance += intval($attendance->attendance);
                    $hdlimStudentCount++;
                }
            }
        }

        // Calculate average attendance for each degree program
        $averageDPL = ($dplStudentCount > 0) ? round($dplAttendance / $dplStudentCount, 2) : 0;
        $averageDLIM = ($dlimStudentCount > 0) ? round($dlimAttendance / $dlimStudentCount, 2) : 0;
        $averageDSL = ($dslStudentCount > 0) ? round($dslAttendance / $dslStudentCount, 2) : 0;
        $averageHDLIM = ($hdlimStudentCount > 0) ? round($hdlimAttendance / $hdlimStudentCount, 2) : 0;
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('student-attendance-chart');
        const labels = ['DPL', 'DLIM', 'DSL', 'HDLIM'];
        const data = {
            labels: labels,
            datasets: [{
                label: 'Average Student Attendance',
                data: [<?= $averageDPL ?>, <?= $averageDLIM ?>, <?= $averageDSL ?>, <?= $averageHDLIM ?>],
                backgroundColor: [
                    'rgb(23, 55, 110)',
                    'rgb(23, 55, 110)',
                    'rgb(23, 55, 110)',
                    'rgb(23, 55, 110)'
                ],
                borderColor: [
                    'rgb(169, 169, 169)',
                    'rgb(169, 169, 169)',
                    'rgb(169, 169, 169)',
                    'rgb(169, 169, 169)'

                ],
                borderWidth: 1,
                maxBarThickness: 50
            }]
        };
        new Chart(ctx, {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    </script>

</body>