<?php

require_once ('Users.php');


$user_change_register = new Users();

$email = trim($_POST['email']);
$register_number = trim($_POST['register_number']);

$user_change_register->updateRegisterNumber($email,$register_number);