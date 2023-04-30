<?php
session_start();
require "lib/db_conn.php";
require_once "lib/User.php";

if (isset($_POST['uname']) && isset($_POST['password'])
    && isset($_POST['name']) && isset($_POST['re_password'])) {

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);
    $re_pass = validate($_POST['re_password']);
    $name = validate($_POST['name']);

    $user_data = 'uname='. $uname. '&name='. $name;

    if (empty($uname)) {
        header("Location: signup.php?error=User Name is required&$user_data");
        exit();
    } else if(empty($pass)){
        header("Location: signup.php?error=Password is required&$user_data");
        exit();
    } else if(empty($re_pass)){
        header("Location: signup.php?error=Re Password is required&$user_data");
        exit();
    } else if(empty($name)){
        header("Location: signup.php?error=Name is required&$user_data");
        exit();
    } else if($pass !== $re_pass){
        header("Location: signup.php?error=The confirmation password  does not match&$user_data");
        exit();
    }else {
        $stmt = $pdo->prepare("SELECT * FROM User WHERE user_name=:uname");
        $stmt->bindParam(':uname', $uname);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            header("Location: signup.php?error=The username is taken try another&$user_data");
            exit();
        } else {
            $user = new User($uname, $pass, $name); // create a new User object

            $stmt = $pdo->prepare("INSERT INTO User(user_name, password, name) VALUES(:uname, :pass, :name)");
            $stmt->bindParam(':uname', $user->user_name);
            $stmt->bindParam(':pass', $user->password);
            $stmt->bindParam(':name', $user->name);
            $result = $stmt->execute();
            if ($result) {
                header("Location: signup.php?success=Your account has been created successfully");
                exit();
            } else {
                header("Location: signup.php?error=unknown error occurred&$user_data");
                exit();
            }
        }
    }

} else {
    header("Location: signup.php");
    exit();
}
