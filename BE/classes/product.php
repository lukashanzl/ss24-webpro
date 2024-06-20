<?php

class Product{
    public $id;
    public $marke;
    public $modell;
    public $description;
    public $price;
    public $image;
    public $watt;
    public $kategorie;

    public function __construct(int $id, string $marke, string $modell, string $description, int $price, string $image, int $watt, string $kategorie) {
        $this->id = $id;
        $this->marke = $marke;
        $this->modell = $modell;
        $this->description = $description;
        $this->price = $price;
        $this->image = $image;
        $this->watt = $watt;
        $this->kategorie = $kategorie;
    }

    public function getId() {
        return $this->id;
    }

    public function setId(int $id) {
        $this->id = $id;
    }

    public function getMarke() {
        return $this->marke;
    }

    public function setMarke(string $marke) {
        $this->marke = $marke;
    }

    public function getModell() {
        return $this->modell;
    }

    public function setModell(string $modell) {
        $this->modell = $modell;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription(string $description) {
        $this->description = $description;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice(int $price) {
        $this->price = $price;
    }

    public function getImage() {
        return $this->image;
    }

    public function setImage(string $image) {
        $this->image = $image;
    }

    public function getWatt() {
        return $this->watt;
    }

    public function setWatt(int $watt) {
        $this->watt = $watt;
    }

    public function getKategorie() {
        return $this->kategorie;
    }

    public function setKategorie(string $kategorie) {
        $this->kategorie = $kategorie;
    }
}

?>
