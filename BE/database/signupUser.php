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

  $enteredUsername = htmlspecialchars($receivedData["username"]);
  $enteredPassword = htmlspecialchars($receivedData["password"]);
  $enteredPasswordRepeat = htmlspecialchars($receivedData["passwordRepeated"]);
  $enteredFirstname = htmlspecialchars($receivedData["firstName"]);
  $enteredLastname = htmlspecialchars($receivedData["lastName"]);
  $enteredEmail = htmlspecialchars($receivedData["email"]);

  if($enteredPassword == $enteredPasswordRepeat){

    $connection = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    $insert = "INSERT INTO users (username,firstname,lastname,email,password) VALUES (?, ?, ?, ?, ?)";

    $stmt = $connection->prepare($insert);
    $stmt->bind_param("sssss", $uname, $uFirstname, $uLastname, $useremail, $passwd);

    $uname = $enteredUsername;
    $uFirstname = $enteredFirstname;
    $uLastname = $enteredLastname;
    $useremail = $enteredEmail;
    // Hash the password before storing it in the database
    $hashedPw = password_hash($enteredPassword, PASSWORD_DEFAULT);
    $passwd = $hashedPw;
    if ($stmt->execute()) {
      // setting Session
      $select = "SELECT * from users WHERE username=?";

      $stmt = $connection->prepare($select);
      $stmt->bind_param("s", $uname);
      $uname = $enteredUsername;
      $stmt->execute();
      $stmt->bind_result($id, $username, $firstname, $lastname, $email, $password);
      $stmt->fetch();

      $_SESSION['user'] = array('id' => $id, 'username'=>$username,'firstname'=>$firstname, 'lastname'=>$lastname);
      setcookie(session_name(), session_id()); //Start a user's session
      
      $response["Result"] = "OK";
      $response["Message"] = "Signup Successfull";
      $response["UserName"] = $enteredUsername;
      $response["UserFirstname"] = $enteredFirstname;
      $response["UserLastname"] = $enteredLastname;
      echo json_encode($response);
      $connection -> close();
    }else{
      $response["Result"] = "Error";
      $response["Message"] = "Database insert error";
      echo json_encode($response);
      $connection -> close();
    }
  }else{
    $response["Result"] = "Error";
    $response["Message"] = "Password does not match!";
    echo json_encode($response);
    $connection -> close();
  }
