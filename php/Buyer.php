<?php
//Class extends user due to class being a special type of user
class Buyer extends User {

    //Cart variable as array due to ability to purchase multiple products
    protected $cart = array();

    //Function to add
    public function addToCart($product) {
        $this->cart[] = $product;
    }

    public function getCart() {
        return $this->cart;
    }
}