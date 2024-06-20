<?php
  include_once("./includes/header.php");
?>

<?php
// Verbindungen und erforderliche Dateien einfügen
require_once '../../BE/database/dataHandler.php';
//require_once './user/orders.php';
//require_once './user/userdata.php';


if (!isset($_SESSION['admin'])) {
    echo <<< EOT
        <script>
            window.location.replace("http://localhost/ss24-webpro/FE/pages/index.php");
        </script>
    EOT;
    exit();
}

// Kundenliste abrufen
//$dataHandler = new DataHandler();
//$customers = $dataHandler->getAllCustomers();

$dataHandler = new DataHandler();


if (isset($_POST['action']) && $_POST['action'] == 'deactivateCustomer' && isset($_POST['customerId'])) {
    $customerId = intval($_POST['customerId']);
    $result = $dataHandler->deactivateCustomer($customerId);
    if ($result) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error']);
    }
    exit();
}



$stmt = $dataHandler->getAllCustomers();
$customers = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<body>
    <div class="container">
        <h1>Admin Panel</h1>
        <h2>Kundenliste</h2>
        <table class="table">
            <tr>
                <th>Kunden ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Aktionen</th>
            </tr>
            <?php foreach ($customers as $customer) : ?>
            <tr>
                <td><?= $customer['id'] ?></td>
                <td><?= $customer['firstname'] . ' ' . $customer['lastname'] ?></td>
                <td><?= $customer['email'] ?></td>
                <td>
                    <button class="btn btn-warning" onclick="deactivateCustomer(<?= $customer['id'] ?>)">Deaktivieren</button>
                    <button class="btn btn-info" onclick="viewOrders(<?= $customer['id'] ?>)">Bestellungen anzeigen</button>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
                
        <div id="cart">
            <h2>Warenkorb</h2>
            <div id="cartContent">
                <p>Warenkorb leer</p>
            </div>
            <p>Gesamtpreis: <span id="totalPrice">0.00€</span></p>
            <div class="btn btn-danger" id="orderButton">Bestellen</div>
            <div class="btn btn-info" id="scrollToTop">Back to top</div>
        </div>

    </div>
    <script src="script.js"></script>
    <script src="script_products.js"></script>
</body>

<?php
  include_once("./includes/footer.php");
?>