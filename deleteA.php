<?php 

//if($_SESSION['']) setovati sesiju za admina


require_once('User.php');

$user = new User();

$id = $_GET['id'];

$user->deleteById($id);



?>