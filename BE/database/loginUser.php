<?php

  session_start();
  require_once("./dbaccess.php");

  $response = array();

  if(json_decode(file_get_contents("php://input"))){
    $receivedData = json_decode(file_get_contents("php://input"), true);
  }else{
    $response["Result"] = "Error";
    $response["message"] = "Invalid JSON format";
    echo json_encode($response);
  }

  $enteredUsername = htmlspecialchars($receivedData["userName"]);
  $enteredPassword = htmlspecialchars($receivedData["password"]);

  $connection = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

  $select = "SELECT * from users WHERE username=?";

  $stmt = $connection->prepare($select);
  $stmt->bind_param("s", $uname);
  $uname = $enteredUsername;
  $stmt->execute();
  $stmt->bind_result($id, $username, $firstname, $lastname, $email, $password);
  $stmt->fetch();

  if(password_verify($enteredPassword, $password)){
    $_SESSION['user'] = array('id' => $id, 'username'=>$username,'firstname'=>$firstname, 'lastname'=>$lastname);
    setcookie(session_name(), session_id()); //Start a user's session
    $response["Result"] = "OK";
    $response["Message"] = "Login Successfull";
    $response["UserName"] = $username;
    $response["UserFirstname"] = $firstname;
    $response["UserLastname"] = $lastname;
    echo json_encode($response);
    $connection -> close();
  }else{
    $response["Result"] = "Error";
    $response["Message"] = "Wrong Username or Password!";
    echo json_encode($response);
    $connection -> close();
  }