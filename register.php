<?php

require_once ('Users.php');


$user_register = new Users();

if(!empty($_SESSION['data'])){

    
     unset($_SESSION['data']);

}

$name = trim($_POST['name']);
$email = trim($_POST['email']);
$password = trim($_POST['password']);
$confirm_password = trim($_POST['confirm_password']);
$register_number = trim(strtoupper($_POST['register_number']));
$register_number1 = trim(strtoupper($_POST['register_number1']));
$register_number2 = trim(strtoupper($_POST['register_number2']));

//! getting all the values

$user_register->register($name,$email,$password,$confirm_password,$register_number,$register_number1,$register_number2);


