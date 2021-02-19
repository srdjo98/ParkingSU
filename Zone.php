<?php 

require_once('Database.php');

class Zone {

    private $db;

    public function __construct(){

      $this->db = new Database;

    }


    public function addZone($id_user,$zona1,$zona2,$zona3,$zona4,$location){

        $this->db->query('INSERT INTO zones (id_user,zona1,zona2,zona3,zona4,location) VALUES(:id_user,:zona1,:zona2,:zona3,:zona4,:location)');
    
        
        $this->db->bind(':id_user',$id_user);
        $this->db->bind(':zona1',$zona1);
        $this->db->bind(':zona2',$zona2);
        $this->db->bind(':zona3',$zona3);
        $this->db->bind(':zona4',$zona4);
        $this->db->bind(':location',$location);
        
    
        if($this->db->execute()){
        
            return true;
    
        } else {
    
            return false;
          
        }

    }//! end of add zones


    public function getRegisterNumberByEmail($email){

        
        $this->db->query("SELECT register_number,register_number1,register_number2 FROM users WHERE email = :email");
        $this->db->bind(':email',$email);

      
        $row = $this->db->single();
        

        if($this->db->rowCount() > 0){
      
            return $regArray = [

                'register_number' => $row->register_number,
                'register_number1' => $row->register_number1,
                'register_number2' => $row->register_number2,

            ];
      
        }else{
      
            return false;
      
        }
      
        
    }//! end fo register number by email


    public function getZonabyId($zona,$zonaVal,$id){

        $this->db->query("SELECT * FROM zones WHERE $zona = :zona AND id_user = :id");

        $this->db->bind(':zona',$zonaVal);
        $this->db->bind(':id',$id);

        
        $rows = $this->db->resultSet();

        $count  =  $this->db->rowCount();


        return $count;

    }//! end of get zona1 by id


    public function getZonaByMonth($zona,$month = 0,$zonaVal,$id){

                        
        $this->db->query("SELECT * FROM zones WHERE MONTH(sent_at) = :month AND $zona = :zona AND id_user = :id");
        $this->db->bind(':month',$month);
        $this->db->bind(':zona',$zonaVal);
        $this->db->bind(':id',$id);


        $rows = $this->db->resultSet();

        $count  =  $this->db->rowCount();
        

        return $count;


    }//! end of get zona by month


    public function getAllById($id,$limit = 4){

        $this->db->query("SELECT * FROM zones WHERE id_user = :id LIMIT $limit");
        $this->db->bind(':id',$id);


        $rows = $this->db->resultSet();

        return $rows;


    }//! end of get all by id


    public function getLocationById($id){

        $this->db->query("SELECT location,longitude1,latitude1 FROM zones WHERE id_zone = :id");
        $this->db->bind(':id',$id);

        $row = $this->db->single();

        return $row;


    }//! end of get location bt id



    public function getZonabyRegisterNumber($zona,$zonaVal,$register_number){

        $this->db->query("SELECT * FROM zones WHERE $zona = :zona AND register_number = :register_number");

        $this->db->bind(':zona',$zonaVal);
        $this->db->bind(':register_number',$register_number);

        
        $rows = $this->db->resultSet();

        $count  =  $this->db->rowCount();


        return $count;

    }//! end of get zona1 by reg



    public function getZonaByMonthAndReg($zona,$month = 0,$zonaVal,$register_number){

                        
        $this->db->query("SELECT * FROM zones WHERE MONTH(sent_at) = :month AND $zona = :zona AND register_number = :register_number");
        $this->db->bind(':register_number',$register_number);
        $this->db->bind(':zona',$zonaVal);
        $this->db->bind(':month',$month);
        


        $rows = $this->db->resultSet();

        $count  =  $this->db->rowCount();
        

        return $count;


    }//! end of get zona by month
    

    public function getAllByRegisterNumber($register_number){

        $this->db->query("SELECT * FROM zones WHERE register_number =:register_number");
        $this->db->bind(':register_number',$register_number);

        $rows = $this->db->resultSet();

        return $rows;


    }
 
    
    public function getAllLocation(){

        $this->db->query("SELECT DISTINCT(location) FROM zones ORDER BY location DESC ");
        
        $rows = $this->db->resultSet();

        return $rows;

    }//! end of get all locations


    public function latitudeByLocation($location){

        $this->db->query("SELECT latitude1 FROM zones where location = :location ");
        $this->db->bind(":location",$location);
        
        $this->db->execute();

        return $this->db->single();


    }//! end of location exists

    public function longitudeByLocation($location){

        $this->db->query("SELECT longitude1 FROM zones where location = :location ");
        $this->db->bind(":location",$location);
        
        $this->db->execute();

        return $this->db->single();


    }//! end of location exists


    public function locationCount($location){

        $this->db->query("SELECT location FROM zones where location = :location  ");
        $this->db->bind(":location",$location);
        
        $this->db->execute();

        return $this->db->rowCount();


    }//! end of location Count


    public function getZona($zona,$month = 0,$zonaVal){

                        
        $this->db->query("SELECT * FROM zones WHERE MONTH(sent_at) = :month AND $zona = :zona");
        $this->db->bind(':month',$month);
        $this->db->bind(':zona',$zonaVal);
        


        $rows = $this->db->resultSet();

        $count  =  $this->db->rowCount();
        

        return $count;


    }//! end of get zona by month


    public function getZonaByHour($location,$hour = 0){

                        
        $this->db->query("SELECT * FROM zones WHERE HOUR(sent_at) = :hour AND  location = :location");
        $this->db->bind(':hour',$hour);
        $this->db->bind(':location',$location);
       
        


        $rows = $this->db->resultSet();

        $count  =  $this->db->rowCount();
        

        return $count;


    }//! end of get zona by hour


    
   


}//? end of class

$zone = new Zone;