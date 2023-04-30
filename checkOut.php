<?php
session_start();
include "lib/db_conn.php";
require "lib/header.php";

if (isset($_POST['complete_transaction'])) {

    // Fetch the items in the cart for the current user
    $cart_query = "SELECT c.cartID, c.quantity, p.id AS productID, p.name, p.description, p.price
                   FROM Cart c
                   INNER JOIN Product p ON c.productID = p.id
                   WHERE c.userID = :user_id";
    $stmt = $pdo->prepare($cart_query);
    $stmt->execute(array(":user_id" => $_SESSION['user_id']));
    $cart_items = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Prepare the insert query
    $insert_query = "INSERT INTO Transaction (productID, productName, productDescription, quantity)
                     VALUES (:id, :name, :description, :quantity)";

    // Prepare the statement
    $stmt = $pdo->prepare($insert_query);

    // Insert each product in the cart
    foreach ($cart_items as $item) {
        // Bind the values to the parameters
        $stmt->bindValue(':id', $item['productID']);
        $stmt->bindValue(':name', $item['name']);
        $stmt->bindValue(':description', $item['description']);
        $stmt->bindValue(':quantity', $item['quantity']);

        // Execute the statement
        $stmt->execute();
    }

    // Clear the cart by removing all items
    $delete_query = "DELETE FROM Cart WHERE userID = :user_id";
    $stmt = $pdo->prepare($delete_query);
    $stmt->execute(array(":user_id" => $_SESSION['user_id']));

    // Redirect to the homepage
    header('Location: home.php');
    exit();
}
?>


<header>
    <link rel="stylesheet" href="css/nav.css">
</header>

<body>
</body>