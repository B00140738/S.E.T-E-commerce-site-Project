<?php

//Extends User class due to being special type of user
class Seller extends User {

    //Array to contain products up for sale
    protected $products = array();

    //List a product
    public function addProduct($product) {
        $this->products[] = $product;
    }

    //Get listed products in order to display
    public function getProducts() {
        return $this->products;
    }
}