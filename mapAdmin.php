<?php
// 7 do 8
require_once('inc/header.php');
require_once('Zone.php');

$location = new Zone();

$locationName = $_GET['location'];



?>

<div class="row">

<canvas id="barChart"></canvas>


    <script>

var ctx = document.getElementById("barChart").getContext('2d');
ctx.canvas.parentNode.style.height = '288px';
var barChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["8AM", "9AM", "10AM", "11AM", "12PM", "13PM", "14PM", "15PM", "16PM", "17PM", "18PM", "19PM", "20PM"],
    datasets: [{
      label: '<?php echo $locationName; ?>',
      data: [<?php echo $location->getZonaByHour($locationName,'8'); ?>,<?php echo $location->getZonaByHour($locationName,'9'); ?>,<?php echo $location->getZonaByHour($locationName,'10'); ?>,<?php echo $location->getZonaByHour($locationName,'11'); ?>,<?php echo $location->getZonaByHour($locationName,'12'); ?>,<?php echo $location->getZonaByHour($locationName,'13'); ?>,<?php echo $location->getZonaByHour($locationName,'14'); ?>,<?php echo $location->getZonaByHour($locationName,'15'); ?>,<?php echo $location->getZonaByHour($locationName,'16'); ?>,<?php echo $location->getZonaByHour($locationName,'17'); ?>,<?php echo $location->getZonaByHour($locationName,'18'); ?>,<?php echo $location->getZonaByHour($locationName,'19'); ?>,<?php echo $location->getZonaByHour($locationName,'20'); ?>],
      backgroundColor: "#FBEEC1",
      borderWidth:2,
      borderColor:'#111',
    }]
  },options:{
    responsive: true,
    maintainAspectRatio: false,
    scales: {
            xAxes: [{
                maxBarThickness:50 // number (pixels)
            }]
        }
  }
});
    </script>

</div>

<?php

require_once ('inc/footer.php');

?>