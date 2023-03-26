<link rel="stylesheet" href="css/style.css">

<?php
if (isset($_POST['submit'])) {
    require "../common.php";

try{
    require_once '../src/DBconnect.php';
    $new_user = array(
    "user_name" => escape($_POST['username']),
    "password" => escape($_POST['password']),
    "Email" => escape($_POST['email']),
    "phone_number" => escape($_POST['phone_number']),
    "Address" => escape($_POST['address']),
    "user_types" => escape($_POST['type'])
    );

    $sql = sprintf("INSERT INTO %s (%s) values (%s)", "Users", implode(", ", array_keys($new_user)),
        ":" . implode(", :", array_keys($new_user))
    );
    $statement = $connection->prepare($sql);
    $statement->execute($new_user);
    }

catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
    }
}

require "template/header.php";
if (isset($_POST['submit']) && $statement){
echo $new_user['user_name']. ' successfully added';
}
?>

<h2>Add a user</h2>
<form method="post">
    <label for="username">Username</label>
    <input type="text" name="username" id="username" required>
    <label for="password">Password</label>
    <input type="text" name="password" id="password" required>
    <label for="email">Email Address</label>
    <input type="email" name="email" id="email" required>
    <label for="phone_number">Phone Number</label>
    <input type="text" name="phone_number" id="phone_number">
    <label for="address">Address</label>
    <input type="text" name="address" id="address">
    <label for="type">Type</label>
    <input type="text" name="type" id="type" placeholder="Buyer/Seller/Employee">
    <input type="submit" name="submit" value="Submit">

</form>
<a href="index.php">Back to home</a>

<?php include "template/footer.php"; ?>
