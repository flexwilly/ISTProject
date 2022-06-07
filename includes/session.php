<?php
include('initialize.php');

class Session{
 //class instance variables
  private $logged_in = false;
  private $id;
  private $role;
  private $firstname;
  private $lastname;

  //class constructor 
 public  function __construct()
  {
      //start the session when a new instance of the class is created
      session_start();
      //after user inputs the erequired values
      //and the session variables are set by login method
      //we check if the values were set 
      //correctly using the function below
      $this->check_login();
  }


  //encapsulate the variables to limit
  // access from outside the class
  
  //function to get id
  public function getId(){
      return $this->id;
  }
  //function to get lastname
  public function getFName(){
      return $this->firstname;
  }
  //function to get lastname
  public function getLName(){
      return $this->lastname;
  }
  //function to get role
  public function getRole(){
      return $this->role;
  }
  //function to get the loggin status
  //checks whether the user is logged in or not
  public function is_logged_in() {
      return $this->logged_in;
    }    
  
    //function to set the session values
    public function login($user){
      // database should find user based on email && password
      //In this function we set the session variables
      if($user){
      //assign  properties to session variables
      // and comparing with value from db   
      $this->id = $_SESSION["id"] = $user["id"];
      $this->firstname = $_SESSION["firstname"] = $user["fname"];
      $this->lastname = $_SESSION["lastname"] = $user["lname"];
      $this->role = $_SESSION["role"] = $user["role"];       
      $this->logged_in = true;
      }else{
          //if check fails unset the session variables
          unset($_SESSION['id']);
          unset($_SESSION['fname']);
          unset($_SESSION['lname']);
          unset($_SESSION['role']);
      }
      
    }

    //function to logout
    //Log out the users
    public function logout(){
      /**unset all session variables**/
      session_unset();
      /***Completely destroy all session details***/
      session_destroy();
      /**Change the logged in status to false**/
      $this->logged_in = false;
    }

    //function to check the values set when the login
    public function check_login(){
      if(isset($_SESSION['id'])&& isset($_SESSION['firstname']) && isset($_SESSION['lastname']) && isset($_SESSION['role'])){
          //sets the
          $this->id = $_SESSION['id'];
          $this->firstname = $_SESSION['firstname'];
          $this->lastname = $_SESSION['lastname'];
          $this->role = $_SESSION['role'];
          $this->logged_in = true;
        }else{
         //if check fails unset the session variables
          unset($_SESSION['id']);
          unset($_SESSION['firstname']);
          unset($_SESSION['lastname']);
          unset($_SESSION['role']);
        }
    } 

    //function to redirect a user who is not logged in
    public function check_user_login($role,$module_role){
        if($this-> is_logged_in()){
            //check role
            if($role == $module_role){
               //if role matches return true
               return true;

            }else{
                //if role does not match redirect to login 
                header("location: ../login.php");
                return false;
            }             
        }else{
          header("location: ../login.php");
          return false;
        }
    }
    #Admin Classes Session Protection
    public function admin_session_protection($role,$module_role){
            if($this-> is_logged_in()){
                //check role
                if($role == $module_role){
                //if role matches return true
                return true;

                }else{
                    //if role does not match redirect to login 
                    header("location: ../../login.php");
                    return false;
                }             
            }else{
            header("location: ../../login.php");
            return false;
            }
    }


}

?>