<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/signUpForm.css">

<?php
if (isset($_POST['submit'])) {
    require "../common.php";

try{
    require_once '../src/DBconnect.php';
    $new_user = array(
    "username" => escape($_POST['username']),
    "firstname" => escape($_POST['firstname']),
    "lastname" => escape($_POST['lastname']),
    "email" => escape($_POST['email']),
    "phoneNumber" => escape($_POST['phoneNumber']),
    "password" => escape($_POST['password']),
    "address" => escape($_POST['address']),
    "type" => escape($_POST['type'])
    );

    $sql = sprintf("INSERT INTO %s (%s) values (%s)", "users", implode(", ", array_keys($new_user)),
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
echo $new_user['firstname']. ' successfully added';
}
?>

<body>
<!--Sign up form to gather user input (NOTE: all fields must be required)-->

<h1 id="title">Nearly there, you're one step away from all your e-commerce needs!</h1>
<br>
<br>
<div class="container">
    <div class="form">
        <form action="index.php" method="POST">
            <!--Username-->
            <label for="username">Username: </label>
            <input type="text" id="username" name="username" required>
            <br>
            <br>
            <label for="name">Name: </label>
            <input type="text" id="name" name="name" required>
            <br>
            <br>
            <label for="name">Last name: </label>
            <input type="text" id="lastname" name="lastname">
            <br>
            <br>
            <!--Email-->
            <label for="email">Email Address: </label>
            <input type="text" id="email" name="email" placeholder="john@doe.com" required>
            <br>
            <br>
            <!--Phone number-->
            <label for="phone_number">Phone Number: </label>
            <input type="tel" id="phone_number" name="phone_number" placeholder="000-0000000" pattern="[0-9]{10}">
            <br>
            <br>
            <label for="password">Password: </label>
            <input type="text" id="password" name="password" required>
            <br>
            <br>
            <!--Address-->
            <label for="address">Address: </label>
            <input type="text" id="address" name="address" required>
            <br>
            <br>
            <!--User type-->
            <label for="type">Select user type: </label>
            <br>
            <!--Radio buttons for type-->
            <br>
            <input type="radio" id="buyer" name="type" value="Buyer">
            <label for="Buyer">Buyer</label><br>
            <br>
            <input type="radio" id="seller" name="type" value="Seller">
            <label for="Seller">Seller</label><br>
            <br>
            <input type="radio" id="employee" name="type" value="Employee">
            <label for="Employee">Employee</label>
            <br>
            <br>
            <!--Sign Up-->
            <div class="button">
                <button id="submit" name="Sign Up">Sign Up</button>
                <button id="cancel" name="Cancel">Cancel</button>
            </div>
        </form>
    </div>
</div>
</body>

<?php include "template/footer.php"; ?>
