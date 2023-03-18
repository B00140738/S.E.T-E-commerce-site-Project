<?php

class Transaction {
    private $id;
    private $buyerId;
    private $buyerName;
    private $sellerId;
    private $sellerName;
    private $productId;
    private $productName;
    private $price;
    private $date;

    public function __construct($id, $buyerId, $buyerName, $sellerId, $sellerName, $productId, $productName, $price, $date) {
        $this->id = $id;
        $this->buyerId = $buyerId;
        $this->buyerName = $buyerName;
        $this->sellerId = $sellerId;
        $this->sellerName = $sellerName;
        $this->productId = $productId;
        $this->productName = $productName;
        $this->price = $price;
        $this->date = $date;
    }

    public function getId() {
        return $this->id;
    }

    public function getBuyerId() {
        return $this->buyerId;
    }

    public function getBuyerName() {
        return $this->buyerName;
    }

    public function getSellerId() {
        return $this->sellerId;
    }

    public function getSellerName() {
        return $this->sellerName;
    }

    public function getProductId() {
        return $this->productId;
    }

    public function getProductName() {
        return $this->productName;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getDate() {
        return $this->date;
    }
}
