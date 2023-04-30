<?php
// Logout user if they press the "Logout" button
if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: index.php');
}
