<?php


require_once ('Zones.php');

$newZones = new Zones();

$email = trim($_POST['email']);
$zona1 = trim($_POST['zona1']);
$zona2 = trim($_POST['zona2']);
$zona3 = trim($_POST['zona3']);
$zona4 = trim($_POST['zona4']);
$location = trim($_POST['location']);



$newZones->addZones($email,$zona1,$zona2,$zona3,$zona4,$location);