<style>
.bar-chart-student-attendance {
    width: 60%;
    /* height: 900px; */
}
</style>

<body>
    <div class="bar-chart-student-attendance">
        <canvas id="student-attendance-chart"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
    const ctx5 = document.getElementById('student-attendance-chart');
    const labels = ['Subject 01', 'Subject 02', 'Subject 03', 'Subject 04'];
    const data = {
        labels: labels,
        datasets: [{
            label: 'Student Attendance',
            data: [65, 59, 80, 81],
            backgroundColor: [
                'rgb(23, 55, 110)',
                'rgb(23, 55, 110)',
                'rgb(23, 55, 110)',
                'rgb(23, 55, 110)',

            ],
            borderColor: [
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',

            ],
            borderWidth: 1,
            maxBarThickness: 50
        }]
    };
    new Chart(ctx5, {
        type: 'bar',
        data: data,
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    max: 100,
                    ticks: {
                        callback: function(value) {

                            //this indicate the percentage value
                            return value + '%';
                        }
                    }
                }
            },


            plugins: {
                title: {
                    display: true,
                    text: 'Student Attendance Chart'
                },
                legend: {
                    position: 'bottom',
                },
            },
            tooltips: {
                callbacks: {
                    label: function(tooltipItem) {
                        return tooltipItem.yLabel + '%';
                    }
                }
            }
        },
    });
    </script>

</body>