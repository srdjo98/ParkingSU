<?php

require_once('Database.php');

class User {


    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    // Regsiter user
    public function register_values($name,$email,$password,$register_number,$register_number1,$register_number2){
      $this->db->query('INSERT INTO users (name, email, password ,admin,register_number,register_number1,register_number2) VALUES(:name, :email, :password,:admin,:register_number,:register_number1,:register_number2)');
      // Bind values
      $this->db->bind(':name', $name);
      $this->db->bind(':email', $email);
      $this->db->bind(':password', $password);
      $this->db->bind(':admin',0);
      $this->db->bind(':register_number', $register_number);
      $this->db->bind(':register_number1', $register_number1);
      $this->db->bind(':register_number2', $register_number2);



      // Execute
      if($this->db->execute()){
        
        header('Location: login_view.php');

      } else {

        return false;
      
      }
    
    }//! end of register


    public function login($email,$password){

      $this->db->query('SELECT * FROM users WHERE email= :email');
      $this->db->bind(':email',$email);

      $row = $this->db->single();

      $hashed_password = $row->password;

      if(password_verify($password,$hashed_password)){

        return $row;

      }else{

        return false;

      }


    }//! end of login


    public function updateRegisterNumber($email,$register_number){

     
      $this->db->query('UPDATE users SET register_number = :register_number WHERE email = :email');
      $this->db->bind(':register_number',$register_number);
      $this->db->bind(':email',$email);


      if($this->db->execute()){
        
        return true;

      } else {

        return false;
      
      }




    }//! end of update register number


    public function findUserByEmail($email){

      $this->db->query("SELECT * FROM users WHERE email = :email");
      $this->db->bind(':email',$email);

      $row = $this->db->single();

      if($this->db->rowCount() > 0){

        return $row;

      }else{

        return false;

      }

    }//! end of finduserbyemail


    public function findIdByEmail($email){

      $this->db->query("SELECT id_user FROM users WHERE email = :email");
      $this->db->bind(':email',$email);

      $row = $this->db->single();

      if($this->db->rowCount() > 0){

        return $row->id_user;

      }else{

        return false;

      }

    }//! end of find id by email


    public function getAllUsers(){

      $this->db->query("SELECT * FROM users");

      $rows = $this->db->resultSet();

      return $rows;

  }//! end of get all users


  public function deleteById($id){

    $this->db->query("DELETE FROM users WHERE id_user = :id_user ");
    $this->db->bind(":id_user",$id);

    if($this->db->execute()){

      header('Location: admin.php');

    }


  }



}

$user = new User;