<?php

require_once ('Users.php');


$user_login = new Users();

if(!empty($_SESSION['data'])){

    
     unset($_SESSION['data']);

}

$email = trim($_POST['email']);
$password = trim($_POST['password']);

$user_login->login($email,$password);
