<?php
class Product {
    private $conn;
    private $table_name = "products";

    public $id;
    public $marke;
    public $modell;
    public $description;
    public $price;
    public $image;
    public $watt;
    public $kategorie;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET id:=id, marke=:marke, modell:=modell description=:description, price=:price, image=:image, watt:=watt, kategorie:=kategorie";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":marke", $this->marke);
        $stmt->bindParam(":modell", $this->modell);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":price", $this->price);
        $stmt->bindParam(":image", $this->image);
        $stmt->bindParam(":watt", $this->watt);
        $stmt->bindParam(":kategorie", $this->kategorie);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
