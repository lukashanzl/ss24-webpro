<?php
include_once("./includes/header.php");
include_once("../../BE/classes/product.php");
include_once("../../BE/database/dbaccess.php");
include_once("../../BE/services/product-service.php");

if (!isset($_SESSION['admin'])) {
    echo <<<EOT
        <script>
            window.location.replace("http://localhost/ss24-webpro/FE/pages/index.php");
        </script>
    EOT;
    exit();
}

$productService = new ProductService();

if (isset($_GET['action'])) {
    $action = $_GET['action'];

    if ($action === 'create' || $action === 'edit') {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productId = isset($_POST['product_id']) ? (int)$_POST['product_id'] : null;
            $marke = $_POST['marke'];
            $modell = $_POST['modell'];
            $description = $_POST['description'];
            $price = (int)$_POST['price'];
            $image = isset($_FILES['image']) && $_FILES['image']['error'] == 0 ? basename($_FILES['image']['name']) : '';
            $watt = (int)$_POST['watt'];
            $kategorie = $_POST['kategorie'];

            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $imagePath = '../../BE/productpictures/' . $image;
                if (!move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {
                    echo "Failed to upload image.";
                    exit;
                }
            }

            $product = new Product($productId, $marke, $modell, $description, $price, $image, $watt, $kategorie);

            if ($productId) {
                $product->setId($productId);
                $updateSuccess = $productService->updateProduct($product);

                if ($updateSuccess) {
                    echo "Product updated successfully!";
                } else {
                    echo "Failed to update product.";
                }
            } else {
                $createSuccess = $productService->addProduct($product);

                if ($createSuccess) {
                    echo "Product created successfully!";
                } else {
                    echo "Failed to create product.";
                }
            }
        } else {
            $product = null;
            if ($action === 'edit' && isset($_GET['product_id'])) {
                $productId = (int)$_GET['product_id'];
                $product = $productService->getProductById($productId)[0];
            }

            if ($product || $action === 'create') {
                $formAction = 'edit_products.php?action=' . $action;
                $buttonText = $action === 'create' ? 'Create Product' : 'Update Product';
                ?>
                <form method="POST" action="<?php echo $formAction; ?>" enctype="multipart/form-data">
                    <label for="product_id">ID:</label>
                    <input type="text" name="product_id" id="product_id" value="<?php echo $product ? $product->getId() : ''; ?>" required>
                    <br>
                    <label for="marke">Marke:</label>
                    <input type="text" name="marke" id="marke" value="<?php echo $product ? $product->getMarke() : ''; ?>" required>
                    <br>
                    <label for="modell">Modell:</label>
                    <input type="text" name="modell" id="modell" value="<?php echo $product ? $product->getModell() : ''; ?>" required>
                    <br>
                    <label for="description">Description:</label>
                    <textarea name="description" id="description" required><?php echo $product ? $product->getDescription() : ''; ?></textarea>
                    <br>
                    <label for="price">Price:</label>
                    <input type="text" name="price" id="price" value="<?php echo $product ? $product->getPrice() : ''; ?>" required>
                    <br>
                    <label for="image">Image:</label>
                    <input type="file" name="image" id="image">
                    <br>
                    <label for="watt">Watt:</label>
                    <input type="text" name="watt" id="watt" value="<?php echo $product ? $product->getWatt() : ''; ?>" required>
                    <br>
                    <label for="kategorie">Kategorie:</label>
                    <input type="text" name="kategorie" id="kategorie" value="<?php echo $product ? $product->getKategorie() : ''; ?>" required>
                    <br>
                    <button type="submit"><?php echo $buttonText; ?></button>
                </form>
                <?php
            } else {
                echo "Product not found.";
            }
        }
    } elseif ($action === 'delete') {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productId = $_POST['product_id'];
            $deleteSuccess = $productService->deleteProduct($productId);

            if ($deleteSuccess) {
                echo "Product deleted successfully!";
            } else {
                echo "Failed to delete product.";
            }
        } else {
            ?>
            <form method="POST" action="edit_products.php?action=delete">
                <label for="product_id">Product ID:</label>
                <input type="text" name="product_id" id="product_id" required>
                <br>
                <button type="submit">Delete Product</button>
            </form>
            <?php
        }
    }
} else {
    ?>
    <h1>Product Management</h1>
    <form action="edit_products.php" method="get">
        <button type="submit" name="action" value="create">Create Product</button>
        <button type="submit" name="action" value="edit">Edit Product</button>
        <button type="submit" name="action" value="delete">Delete Product</button>
    </form>
    <?php
}
?>

<?php
include_once("./includes/footer.php");
?>
