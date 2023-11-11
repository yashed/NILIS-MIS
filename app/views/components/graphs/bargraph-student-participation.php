<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>piechart</title>
</head>
<style>
.bar-chart-students {
    width: 25%;
    height: 500px;
}
</style>
<div class="bar-chart-students">
    <canvas id="student-participants"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const ctx = document.getElementById('student-participants');
const DATA_COUNT = 4;
const NUMBER_CFG = {count: DATA_COUNT, min: 0, max: 100};

const labels = ['DILIM' , 'DSL' , 'DPL' , 'HDLIM'];
const data = {
  labels: labels,
  datasets: [
    {
      label: 'No of Students',
      data: [23,45,33,67],
      borderColor: 'rgb(154, 214, 255)' ,
      backgroundColor: 'rgb(154, 214, 255)',
    },
    
  ]
};
new Chart(ctx, {
  type: 'bar',
  data: data,
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
</script>

<body>

</body>

</html>