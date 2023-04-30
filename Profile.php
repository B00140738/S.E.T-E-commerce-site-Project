<?php
session_start();
require "./lib/db_conn.php";
require "./lib/header.php";
require "./lib/edit.php";

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Profile Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="css/nav.css">
</head>
<body class="loggedin">
<div class="content">
    <h2>Your Profile Page</h2>
    <div>
        <p>Your account details are below:</p>
        <table>
            <tr>
                <td>Username:</td>
                <td><?=$_SESSION['user_name']?></td>
            </tr>
            <tr>
                <td>Name:</td>
                <td><?=$_SESSION['name']?></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td>************</td>
            </tr>
            <tr><td><a href="updateprofile.php?">Change Username/Name</a></td></tr>
            <tr><td><a href="update-pass.php?">Change password</a></td></tr>

        </table>
        <br>
    </div>
</div>
</body>
</html>
<footer>
    <?php require "./lib/footer.php" ?>
</footer>
