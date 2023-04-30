<?php
session_start();
require "db_conn.php";
require "header.php";
require "logout.php";

// Search for products if search form is submitted
if (isset($_GET['search'])) {
    $search_query = $_GET['search'];
    $stmt = $pdo->prepare('SELECT * FROM Product WHERE name LIKE :search_query');
    $stmt->bindValue(':search_query', '%' . $search_query . '%');
    $stmt->execute();
    $search_results = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Add product to cart if "Add to Cart" button is pressed
if (isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];
    $user_id = $_SESSION['user_id'];

    // Check if the product is already in the user's cart
    $stmt = $pdo->prepare('SELECT * FROM Cart WHERE userID = :user_id AND productID = :product_id');
    $stmt->bindValue(':user_id', $user_id);
    $stmt->bindValue(':product_id', $product_id);
    $stmt->execute();
    $existing_item = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($existing_item) {
        // Update the quantity of the existing cart item
        $new_quantity = $existing_item['quantity'] + 1;
        $stmt = $pdo->prepare('UPDATE Cart SET quantity = :new_quantity WHERE cartID = :cart_id');
        $stmt->bindValue(':new_quantity', $new_quantity);
        $stmt->bindValue(':cart_id', $existing_item['cartID']);
        $stmt->execute();
    } else {
        // Add a new item to the cart
        $stmt = $pdo->prepare('INSERT INTO Cart (userID, productID, quantity) VALUES (:user_id, :product_id, 1)');
        $stmt->bindValue(':user_id', $user_id);
        $stmt->bindValue(':product_id', $product_id);
        $stmt->execute();
    }

    // Display a confirmation message
    $stmt = $pdo->prepare('SELECT name FROM Product WHERE id = :product_id');
    $stmt->bindValue(':product_id', $product_id);
    $stmt->execute();
    $product_name = $stmt->fetchColumn();
    $message = $product_name . ' added to cart';
}

// Get the 4 most recently added products
$stmt = $pdo->prepare('SELECT * FROM Product ORDER BY RAND() LIMIT 4');
$stmt->execute();
$recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>