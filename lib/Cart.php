<?php

class Cart {
    public $cartID;
    public $productID;
    public $quantity;

    public function __construct($cartID, $productID, $quantity)
    {
        $this->cartID = $cartID;
        $this->productID = $productID;
        $this->quantity = $quantity;
    }

    public function getCartID()
    {
        return $this->cartID;
    }

    public function getProductID()
    {
        return $this->productID;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

}
