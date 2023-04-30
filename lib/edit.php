<?php
// Logout user if they press the "Logout" button
require "logout.php";

if (isset($_SESSION['user_name'])) {
    $user_name = $_SESSION['user_name'];

    if (isset($_POST['new_name'])) {
        $new_name = $_POST['new_name'];

        $stmt = $pdo->prepare("UPDATE User SET name = :name WHERE user_name = :user_name");
        $stmt->execute(array(':name' => $new_name, ':user_name' => $user_name));

        // update the user's session information
        $_SESSION['name'] = $new_name;
    }

    if (isset($_POST['new_user_name'])) {
        $new_user_name = $_POST['new_user_name'];

        // check if the new username is available
        $stmt = $pdo->prepare("SELECT * FROM User WHERE user_name = :user_name");
        $stmt->execute(array(':user_name' => $new_user_name));

        if ($stmt->rowCount() > 0) {
            $user_name_error = "This username is already taken.";
        } else {
            $stmt = $pdo->prepare("UPDATE User SET user_name = :user_name WHERE user_name = :old_user_name");
            $stmt->execute(array(':user_name' => $new_user_name, ':old_user_name' => $user_name));

            // update the user's session information
            $_SESSION['user_name'] = $new_user_name;
        }
    }

    if (isset($_POST['current_password']) && isset($_POST['new_password']) && isset($_POST['confirm_password'])) {
        $current_password = $_POST['current_password'];
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];

        $hashed_password = md5($current_password); // hash the user's input
        $stmt = $pdo->prepare("SELECT * FROM User WHERE user_name = :user_name AND password = :password");
        $stmt->execute(array(':user_name' => $user_name, ':password' => $hashed_password));

        if ($stmt->rowCount() > 0) {
            if ($new_password === $confirm_password) {
                $stmt = $pdo->prepare("UPDATE User SET password = :password WHERE user_name = :user_name");
                $stmt->execute(array(':password' => md5($new_password), ':user_name' => $user_name));

                $_SESSION['password'] = md5($new_password);
                $password_changed = true;
            } else {
                $password_error = "New password and confirm password do not match.";
            }
        } else {
            $password_error = "Current password is incorrect.";
        }
    }
} else {
    header("Location: login.php");
    exit();
}
?>

