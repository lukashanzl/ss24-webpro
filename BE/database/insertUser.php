<?php

require_once("./dbaccess.php");

$connection = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);


$username = "admin";
$password = "admin";
$firstname = "Admin";
$lastname = "Shirtshop";
$email = "admin@test.com";


$insert = "INSERT INTO users (username, firstname, lastname, email, password) VALUES (?, ?, ?, ?, ?)";

$stmt = $connection->prepare($insert);
$stmt->bind_param("sssss", $uname, $fname, $lname, $useremail, $passwd);

$hashedPw = password_hash($password, PASSWORD_DEFAULT);

$uname = $username;
$fname = $firstname;
$lname = $lastname;
$useremail = $email;
$passwd = $hashedPw;

if ($stmt -> execute()) {
    echo"<h1>User created!</h1>";
} else {
    echo"<h1>Failed to create User!</h1>";
}