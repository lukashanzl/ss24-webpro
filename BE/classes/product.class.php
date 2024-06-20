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

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getMarke() {
        return $this->marke;
    }

    public function setMarke($marke) {
        $this->marke = $marke;
    }

    public function getModell() {
        return $this->modell;
    }

    public function setModell($modell) {
        $this->modell = $modell;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function getImage() {
        return $this->image;
    }

    public function setImage($image) {
        $this->image = $image;
    }

    public function getWatt() {
        return $this->watt;
    }

    public function setWatt($watt) {
        $this->watt = $watt;
    }

    public function getKategorie() {
        return $this->kategorie;
    }

    public function setKategorie($kategorie) {
        $this->kategorie = $kategorie;
    }
}
?>
