<?php

function verifyUser(){
    if (isset($_SESSION['name'])) {
        echo '<h2>Welcome Back' . ' ' . $_SESSION['name'] . '</h2>';
    } else {
        echo "<h2>Welcome to Agile Art!</h2>";
    }
}

function rememberUser(){
    if (isset($_SESSION['name'])) {
        echo '<a href="Profile.php?session=' . $_SESSION['name'] . '">' . $_SESSION['name'] . '</a>';
    }
}

function generateLogOut(){
    if (isset($_SESSION['name'])) {
        echo '<form method="post"  action="" >
                    <button type="submit" name="logout">Logout</button>
                </form>';
    }
}

function generateLogin(){
    if (!isset($_SESSION['name'])) {
        echo " <a href=index.php>Login</a>";
    }
}
