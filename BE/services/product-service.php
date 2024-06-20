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
    
        $insert = "INSERT INTO products (id, marke, modell, description, price, image, watt, kategorie) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    
        $stmt = $connection->prepare($insert);
        $stmt->bind_param("isssisis", $pid, $pmarke, $pmodell, $pdescription, $pprice, $pimage, $pwatt, $pkategorie);
    
        $pid = $prod->id;
        $pmarke = $prod->marke;
        $pmodell = $prod->modell;
        $pdescription = $prod->description;
        $pprice = $prod->price;
        $pimage = $prod->image;
        $pwatt = $prod->watt;
        $pkategorie = $prod->kategorie;
    
        if ($stmt->execute()) {
            return true;
        }
        
        return false;
    }
/*
    public function updateProduct(Product $product) {
        $dbUsername = "shirtadmin";
        $dbPassword = "admin";
        $dbHost = "localhost";
        $dbName = "shirtshopdev";
        $connection = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
    
        $update = "UPDATE products SET name=?, price=?, currency=?, quantity=?, size=?, color=? WHERE id=?";
    
        $stmt = $connection->prepare($update);
        $stmt->bind_param("sisiisi", $pname, $pprice, $pcurrency, $pquantity, $psize, $pcolor, $pid);
    
        $pname = $product->name;
        $pprice = $product->price;
        $pcurrency = $product->currency;
        $pquantity = $product->quantity;
        $psize = $product->size;
        $pcolor = $product->color;
        $pid = $product->id;
    
        if ($stmt->execute()) {
            return true;
        }
        
        return false;
    }
    */

    public function updateProduct(Product $product) {
        $dbUsername = "shirtadmin";
        $dbPassword = "admin";
        $dbHost = "localhost";
        $dbName = "shirtshopdev";
        $connection = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
    
        $update = "UPDATE products SET 
                   marke=?, 
                   modell=?, 
                   description=?, 
                   price=?, 
                   image=?, 
                   watt=?, 
                   kategorie=? 
                   WHERE id=?";
    
        $stmt = $connection->prepare($update);
        $stmt->bind_param(
            "sssisssi", 
            $product->marke, 
            $product->modell, 
            $product->description, 
            $product->price, 
            $product->image, 
            $product->watt, 
            $product->kategorie, 
            $product->id
        );
    
        if ($stmt->execute()) {
            return true;
        }
    
        return false;
    }    

    public function deleteProduct($productId) {
        $dbUsername = "shirtadmin";
        $dbPassword = "admin";
        $dbHost = "localhost";
        $dbName = "shirtshopdev";
        $connection = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
    
        $delete = "DELETE FROM products WHERE id=?";
    
        $stmt = $connection->prepare($delete);
        $stmt->bind_param("i", $pid);
    
        $pid = $productId;
    
        if ($stmt->execute()) {
            return true;
        }
    
        return false;
    }
}
