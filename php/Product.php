<?php

class Product {

    //Variables are private so that they can only be accessed inside of class
    private $id;
    private $productName;
    private $description;
    private $artist;
    private $price;

    //Constructor for new Product object
    public function __construct($id, $productName, $description, $artist, $price) {
        $this->id = $id;
        $this->productName = $productName;
        $this->description = $description;
        $this->artist = $artist;
        $this->price = $price;
    }

    //Get product attributes/variables
    public function getId() {
        return $this->id;
    }

    public function getProductName() {
        return $this->productName;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getArtist() {
        return $this->artist;
    }

    public function getPrice() {
        return $this->price;
    }
}