<?php

  session_start();
  require_once("./dbaccess.php");

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $enteredUsername = htmlspecialchars($_POST["floatingUsername"]);
    $enteredPassword = htmlspecialchars($_POST["floatingPassword"]);

    $connection = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    $select = "SELECT * from users WHERE username=?";

    $stmt = $connection->prepare($select);
    $stmt->bind_param("s", $uname);
    $uname = $enteredUsername;
    $stmt->execute();
    $stmt->bind_result($id, $username, $firstname, $lastname, $email, $password);
    $stmt->fetch();

    if(password_verify($enteredPassword, $password)){
      $_SESSION['user'] = array('id' => $id, 'username'=>$username,'firstname'=>$firstname, 'lastname'=>$lastname, 'email'=>$email);
      setcookie(session_name(), session_id()); //Start a user's session
      header('Location: http://localhost/ss24-webpro/FE/pages/index.php');
    }
  }else{
    header('Location: http://localhost/ss24-webpro/FE/pages/login.php?error=loginError');
  }
