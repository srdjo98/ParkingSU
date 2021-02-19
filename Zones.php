<?php

session_start();
require_once('User.php');
require_once('Zone.php');

class Zones {


    public function addZones($email,$zona1,$zona2,$zona3,$zona4,$location,$register_number,$latitude,$longitude){



        if($_SERVER['REQUEST_METHOD'] == 'POST'){

        global $user;
        global $zone;

        $id_user = $user->findIdByEmail($email);

        if($zone->addZone($id_user,$zona1,$zona2,$zona3,$zona4,$location,$register_number,$latitude,$longitude)){
            
            echo "Poruka Poslata!";
            
        };


        }


    }//! end of add zones


    public function getPlate($email){

        global $zone;
        $tablice = $zone->getRegisterNumberByEmail($email);
        echo  json_encode($tablice) ;

    }//! end of get plates


    



}//? end of class
