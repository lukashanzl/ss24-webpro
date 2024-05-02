<?php
    include_once("../classes/product.php");
    include_once("../database/dbaccess.php");
    

class ProductService {

    public function getAllProducts(){
        $dbUsername = "shirtadmin";
        $dbPassword = "admin";
        $dbHost = "localhost";
        $dbName = "shirtshopdev";
        $connection = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

        $select = "SELECT * FROM products";

        $stmt = $connection->prepare($select);

        $stmt->execute();
        $stmt->bind_result($id, $name, $price, $currency, $quantity, $size, $color);
        
        $products = [];
        while($stmt->fetch()){
            $products[] = new Product($id,$name,$price,$currency,$quantity,$size,$color);
        }
        return $products;
    }

    public function getProductById(int $param){
        $dbUsername = "shirtadmin";
        $dbPassword = "admin";
        $dbHost = "localhost";
        $dbName = "shirtshopdev";
        $connection = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

        $select = "SELECT * FROM products WHERE id=?";

        $stmt = $connection->prepare($select);
        $stmt->bind_param("i", $pId);
        $pId = htmlspecialchars($param);

        $stmt->execute();
        $stmt->bind_result($id, $name, $price, $currency, $quantity, $size, $color);
        
        $products = [];
        while($stmt->fetch()){
            $products[] = new Product($id,$name,$price,$currency,$quantity,$size,$color);
        }
        return $products;
    }

    public function addProduct(Product $prod){
        $dbUsername = "shirtadmin";
        $dbPassword = "admin";
        $dbHost = "localhost";
        $dbName = "shirtshopdev";
        $connection = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

        $insert = "INSERT INTO products (name, price, currency, quantity, size, color) VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $connection->prepare($insert);
        $stmt->bind_param("sisiis", $pname, $pprice, $pcurrency, $pquantity, $psize, $pcolor);

        $pname = $prod->name;
        $pprice = $prod->price;
        $pcurrency = $prod->currency;
        $pquantity = $prod->quantity;
        $psize = $prod->size;
        $pcolor = $prod->color;

        if ($stmt -> execute()) {
            return true;
        }
        
        return false;
    }
}
