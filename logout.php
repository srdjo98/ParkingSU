<?php

require_once ('Users.php');

$logout = new Users();

if(isset($_SESSION['admin_id'])){

    $logout->logoutA();

}else{

    $logout->logout();

}

