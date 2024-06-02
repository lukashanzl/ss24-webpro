<?php

$dbUsername = "shirtadmin";
$dbPassword = "admin";
$dbHost = "localhost";
$dbName = "shirtshopdev";

class Database {

    // specify your own database credentials - getestet auf eigene Datenbank
    private $host = "localhost";
    private $db_name = "shirtshopdev";
    private $username = "shirtadmin";
    private $password = "admin";
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch(PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
?>
