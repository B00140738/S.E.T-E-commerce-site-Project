<?php
session_start();
include "db_conn.php";
require "header.php";
require "logout.php";



// Remove product from cart if "Remove" button is pressed
if (isset($_POST['remove'])) {
    $cart_id = $_POST['cart_id'];
    $stmt = $pdo->prepare('DELETE FROM Cart WHERE cartID = :cart_id');
    $stmt->bindValue(':cart_id', $cart_id);
    $stmt->execute();
    header('Location: cart.php');
}

// Update product quantity in cart
if (isset($_POST['quantity'])) {
    $cart_id = $_POST['cart_id'];
    $new_quantity = $_POST['quantity'];
    $stmt = $pdo->prepare('UPDATE Cart SET quantity = :new_quantity WHERE cartID = :cart_id');
    $stmt->bindValue(':new_quantity', $new_quantity);
    $stmt->bindValue(':cart_id', $cart_id);
    $stmt->execute();
    header('Location: cart.php');
}

// Get the products in the user's cart
$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare('SELECT * FROM Cart INNER JOIN Product ON Cart.productID = Product.id WHERE userID = :user_id');
$stmt->bindValue(':user_id', $user_id);
$stmt->execute();
$cart_items = $stmt->fetchAll(PDO::FETCH_ASSOC);

$total_price = 0;
?>