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
?>
