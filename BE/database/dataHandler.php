<?php
include_once 'dbaccess.php';
//include_once("../classes/product.class.php");

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

    public function getAllCustomers() {
        $select = "SELECT id, firstname, lastname, email FROM users";
        $stmt = $this->conn->prepare($select);
        $stmt->execute();
        return $stmt;
    }

    public function deactivateCustomer($customerId) {
        $query = "UPDATE users SET active = 0 WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $customerId, PDO::PARAM_INT);
        return $stmt->execute();
    }
    
    public function removeProductFromOrder($orderId, $productId) {
        $query = "DELETE FROM order_items WHERE order_id = ? AND product_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam('ii', $orderId, $productId, PDO::PARAM_INT);
        return $stmt->execute();
    }
    
}
?>
