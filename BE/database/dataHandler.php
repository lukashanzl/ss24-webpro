<?php
include_once 'dbaccess.php';
include_once '../classes/product.class.php';

class DataHandler {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getProducts() {
        $query = "SELECT * FROM products";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function createProduct($productData) {
        $product = new Product($this->conn);
        foreach ($productData as $key => $value) {
            $product->$key = $value;
        }
        return $product->create();
    }
}
?>
