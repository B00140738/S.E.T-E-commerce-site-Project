<?php
function signUp()
{
if (isset($_POST['submit'])) {
    require "../common.php";

    try{
        require_once '../src/DBconnect.php';
        $new_user = array(
            "username" => escape($_POST['firstname']),
            "name" => escape($_POST['firstname']),
            "lastname" => escape($_POST['lastname']),
            "email" => escape($_POST['email']),
            "age" => escape($_POST['age']),
            "location" => escape($_POST['location'])
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
}
?>