<?php

class Product{
    public $id;
    public $name;
    public $price;
    public $currency;
    public $quantity;
    public $size;
    public $color;

    public function __construct(int $id, string $name, int $price, string $currency, int $quantity, string $size, string $color) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->currency = $currency;
        $this->quantity = $quantity;
        $this->size = $size;
        $this->color = $color;
    }
}