<?php
session_start();
require "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);

    if (empty($uname)) {
        $error = "User Name is required";
    } else if(empty($pass)){
        $error = "Password is required";
    } else {
        // hashing the password
        $pass = md5($pass);

        try {
            $stmt = $pdo->prepare("SELECT * FROM User WHERE user_name=:uname AND password=:pass");
            $stmt->bindParam(':uname', $uname, PDO::PARAM_STR);
            $stmt->bindParam(':pass', $pass, PDO::PARAM_STR);
            $stmt->execute();

            if ($stmt->rowCount() === 1) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($row['user_name'] === $uname && $row['password'] === $pass) {
                    $_SESSION['user_name'] = $row['user_name'];
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['user_id'] = $row['userID']; // set the user_id in the session array
                    header("Location: ../home.php"); // Redirect the user to home.php
                    exit();
                } else {
                    $error = "Incorrect User name or password";
                }

            } else {
                $error = "Incorrect User name or password";
            }
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            exit();
        }
    }

    header("Location: ../index.php?error=$error"); // Redirect the user to index.php if login failed
    exit();

} else {
    header("Location: ../home.php");
    exit();
}
