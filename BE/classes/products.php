<?php
header('Content-Type: application/json');

include_once '../database/dbaccess.php';
include_once 'product.class.php';
include_once '../database/datahandler.php';

try {
    if (isset($_GET['products']) && $_GET['products'] === 'all') {
        $dataHandler = new DataHandler();
        $stmt = $dataHandler->getProducts();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($products);
    } else {
        echo json_encode(['error' => 'Ungültige Anfrage']);
    }
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}




class Products {

    public function getAllProducts() {
        $dataHandler = new DataHandler();
        $stmt = $dataHandler->getProducts();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProduct($id) {
        $dataHandler = new DataHandler();
        $stmt = $dataHandler->prepare('SELECT * FROM products WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addProduct($name, $description, $rating, $price, $photo) {
        $dataHandler = new DataHandler();
        $stmt = $dataHandler->prepare('INSERT INTO products (name, description, rating, price, photo) VALUES (?, ?, ?, ?, ?)');
        return $stmt->execute([$name, $description, $rating, $price, $photo]);
    }

    public function updateProduct($id, $name, $description, $rating, $price, $photo) {
        $dataHandler = new DataHandler();
        $stmt = $dataHandler->prepare('UPDATE products SET name = ?, description = ?, rating = ?, price = ?, photo = ? WHERE id = ?');
        return $stmt->execute([$name, $description, $rating, $price, $photo, $id]);
    }

    public function deleteProduct($id) {
        $dataHandler = new DataHandler();
        $stmt = $dataHandler->prepare('DELETE FROM products WHERE id = ?');
        return $stmt->execute([$id]);
    }

    public function uploadPhoto($file) {
        $target_dir = "../productpictures/";
        $target_file = $target_dir . basename($file["name"]);
        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            return basename($file["name"]);
        } else {
            return null;
        }
    }
}

?>
