<?php
  include_once("./includes/header.php");
?>

<?php
// Verbindungen und erforderliche Dateien einfügen
require_once '../../BE/database/dataHandler.php';
//require_once './user/orders.php';
//require_once './user/userdata.php';

// Admin-Überprüfung (hier Beispiel-Implementierung, anpassen je nach Login-System)

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

        <h2 id="order-title" style="display: none;">Bestelldetails</h2>
        <table id="order-details" class="table" style="display: none;">
            <tr>
                <th>Produkt ID</th>
                <th>Produktname</th>
                <th>Menge</th>
                <th>Aktionen</th>
            </tr>
            <!-- Bestelldetails werden hier dynamisch eingefügt -->
        </table>
    </div>
    <script src="script.js"></script>
</body>

<?php
  include_once("./includes/footer.php");
?>