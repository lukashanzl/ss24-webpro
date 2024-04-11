<?php

  session_start();
  require_once("./dbaccess.php");

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $enteredUsername = htmlspecialchars($_POST["floatingUsername"]);
    $enteredPassword = htmlspecialchars($_POST["floatingPassword"]);

    $connection = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    $select = "SELECT * from users WHERE username=?";
  
  }