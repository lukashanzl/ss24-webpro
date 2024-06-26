<?php
  class User{
    public $username;
    private $password;
    protected $email;
    public $firstname;
    public $lastname;
    function __construct($u, $p, $e, $f, $l){
      $this->username = $u;
      $this->setPassword($p);
      $this->email = $e;
      $this->firstname = $f;
      $this->lastname = $l;
    }

    //getter for password
    public function getPassword(){ 
      return $this->password;
    }
    
    //setter for password (with hash)
    public function setPassword($pwd){ 
      $this->password=password_hash($pwd, PASSWORD_DEFAULT);
    }
    
    static function createUser($user, $pass, $mail, $first, $last){
        if(strlen($user)>2 && strlen($pass)>12 && filter_var($mail, FILTER_VALIDATE_EMAIL)){
          $newUser = new User($user, $pass, $mail, $first, $last);
          return $newUser;
        }else {
          return false;
        }
    }
  };
?>