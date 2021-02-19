<?php

require_once ('Users.php');


$user_login = new Users();

$email = trim($_POST['email']);
$password = trim($_POST['password']);

$user_login->loginApp($email,$password);
