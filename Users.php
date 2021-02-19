<?php

session_start();
require_once('Database.php');
require_once('User.php');

class Users {


    public $data = [
      'name' => '',
      'email' => '',
      'password' => '',
      'confirm_password' => '',
      'register_number' => '',
      'name_err' => '',
      'email_err' => '',
      'password_err' => '',
      'confirm_password_err' => '',
      'register_number_err' => '',

    ];


    public function register($name,$email,$password,$confirm_password,$register_number,$register_number1,$register_number2){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $this->data['name'] = $name;
            $this->data['email'] = $email;
            $this->data['password'] = $password;
            $this->data['confirm_password'] = $confirm_password;
            $this->data['register_number'] = $register_number;
            $this->data['register_number1'] = $register_number1;
            $this->data['register_number2'] = $register_number2;

            if(empty($name)){

                $this->data['name_err'] = "Please enter name";

            }

            if(empty($email)){

                $this->data['email_err']  = "Please enter email";

            }else{

              global $user;

              if($user->findUserByEmail($email)){

                $this->data['email_err'] = "Email is already taken";

              }

            }


            if(empty($password)){

                $this->data['password_err'] = 'Please enter password';

              } elseif(strlen($password) < 6){

                $this->data['password_err'] = 'Password must be at least 6 characters';

              }


              if(empty($confirm_password)){

                $this->data['confirm_password_err'] = 'Please confirm password';

              } else {

                if($password != $confirm_password){

                  $this->data['confirm_password_err'] = 'Passwords do not match';

                }

              }


              if(empty($register_number)){

                $this->data['register_number_err'] = "Please enter register number of your car";

              }
              
             
              
              if(empty($this->data['name_err']) && empty($this->data['email_err']) &&   empty($this->data['password_err'])  && empty($this->data['confirm_password_err']) && empty($this->data['register_number_err']) ){

                  global $user;

                  $password = password_hash($password,PASSWORD_DEFAULT);

                  if($register_number1 == ""){

                    $register_number1 = "";

                  }elseif($register_number2 == ""){

                    $register_number2 = "";

                  }

                  $user->register_values($name,$email,$password,$register_number,$register_number1,$register_number2);
                  
              }else{

                $_SESSION['data'] = $this->data;
                header('Location: register_view.php');

              }
        

        }else{

          header('Location: register_view.php');

        }


    }//! end of register



    public function login($email,$password){

      if($_SERVER['REQUEST_METHOD'] == 'POST'){

        global $user;

        $this->data['email'] = $email;
        $this->data['password'] = $password;


        if(empty($email)){

          $this->data['email_err']  = "Please enter email";

        }


        if(empty($password)){

          $this->data['password_err'] = "Please enter password";

        }


        if($user->findUserByEmail($email)){


        }else{

          $this->data['email_err'] = "No user found";

        }


        if(empty($this->data['email_err']) && empty($this->data['password_err'])){

          $loggedInUser = $user->login($email,$password);

          if($loggedInUser){

            $getUser = $user->findUserByEmail($email);
            
      

            if($getUser->admin == 1){
              

              $this->createAdminSession($loggedInUser);


            }else{

              $this->createUserSession($loggedInUser);


            }

            
            

          }else{

            $this->data['password_err'] = "Password incorrect";
            $_SESSION['data'] = $this->data;
            header('Location: login_view.php');

          }

        }else{

          $_SESSION['data'] = $this->data;
          header('Location: login_view.php');

        }


      }else{

        header('Location: login_view.php');

      }


    }//! end of login


    public function loginApp($email,$password){

      if($_SERVER['REQUEST_METHOD'] == 'POST'){


        global $user;
  
        if(empty($email)){

          echo $this->data['email_err'] = "Molim Vas unesite email";

        }elseif(empty($password)){

         echo  $this->data['password_err'] = "Molim vas unesite lozinku";

        }
        
        
        if($user->findUserByEmail($email)){



        }else{

          echo $this->data['email_err'] = "Pogresna email adresa";
          
        }


        if(empty($this->data['email_err']) && empty($this->data['password_err'])){

          
 
          $loggedInUser = $user->login($email,$password);

          if($loggedInUser){

            echo "Prijavljeni";

          }else{

            echo "Pogresna Lozinka";

          }

        }else{

          

        }
        


      }else{

        

      }


    }//! end of login app


    public function updateRegisterNumber($email,$register_number,$register_number1,$register_number2){

      if($_SERVER['REQUEST_METHOD'] == 'POST'){

        global $user;
        
        if(empty($register_number) && empty($register_number1) && empty($register_number2) ){

            echo "Unesite nesto u polje";
        

        }else{
            
            if(!empty($register_number)){
                
                $register_number_col = 'register_number';
                $user->updateRegisterNumber($email,$register_number_col,$register_number);
                
                echo "Uspesno promenjene";
                
            }elseif(!empty($register_number1)){
                
                $register_number_col = 'register_number1';
                $user->updateRegisterNumber($email,$register_number_col,$register_number1);
                
                echo "Uspesno promenjene";
                
            }elseif(!empty($register_number2)){
                
                $register_number_col = 'register_number2';
                
                $user->updateRegisterNumber($email,$register_number_col,$register_number2);
                
                echo "Uspesno promenjene";
                
                
            }else{
                
                echo "Doslo je do griske";
                
            }
            
            
            
           
        
        }


      }


    }//! end of update register number


    public function createUserSession($user){

      $_SESSION['user_id'] = $user->id_user;
      $_SESSION['user_email'] = $user->email;
      $_SESSION['user_name'] = $user->name;
      
      header('Location: index.php');

    }//! end of create user session



    public function createAdminSession($user){

      $_SESSION['admin_id'] = $user->id_user;
      $_SESSION['admin_email'] = $user->email;
      $_SESSION['admin_name'] = $user->name;
      
      header('Location: index.php');

    }//! end of create user session
    

    public function logout(){

      unset($_SESSION['user_id']);
      unset($_SESSION['user_name']);
      unset($_SESSION['user_email']);
      header('Location: index.php');

    }

    public function logoutA(){

      unset($_SESSION['admin_id']);
      unset($_SESSION['admin_name']);
      unset($_SESSION['admin_email']);
      header('Location: index.php');

    }


}//? end of class