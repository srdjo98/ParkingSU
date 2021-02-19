<?php

require_once('inc/header.php');
require_once('Zone.php');

$location = new Zone();

if(!isset($_SESSION['user_id'])){


	header('Location: index.php');


}



if(isset($_POST['id'])){

	$id = trim($_POST['id']);

}else{

	$id = $_GET['id'];

}



$location = $location->getLocationById($id);


$latitude = $location->latitude1;
$longitude = $location->longitude1;


if(empty($latitude) && empty($longitude)){

	header('Location: chart.php');

}

?>


<div id="map" class="z-depth-1-half map-container" style="height: 600px; border: 1px solid black"></div>
 
<script>



var map = L.map('map').setView([46.099997879462755, 19.66472568911079], 14);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

L.marker([<?php echo $latitude  ?>,<?php echo $longitude ?>]).addTo(map)
    .bindPopup('Mesto uplate!')
    .openPopup();

</script>
 



<?php

require_once ('inc/footer.php');

?>