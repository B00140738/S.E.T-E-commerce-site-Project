<?php
session_start();
include "./lib/db_conn.php";
require "./lib/header.php";
require "./lib/edit.php";

?>
<header>
    <link href="css/updateprofile.css" rel="stylesheet">
    <link rel="stylesheet" href="css/nav.css">
</header>
<main>
    <body>
    <fieldset class="update-profile">
        <form action="profile.php" method="post">
            <label for="current_password">Current Password:</label>
            <input class="input-update" type="password" id="current_password" name="current_password" required>

            <label for="new_password">New Password:</label>
            <input class="input-update" type="password" id="new_password" name="new_password" required>

            <label for="confirm_password">Confirm New Password:</label>
            <input class="input-update" type="password" id="confirm_password" name="confirm_password" required>
            <?php if (isset($password_error)) { echo "<p class='error'>$password_error</p>"; } ?>
            <?php if (isset($password_changed)) { echo "<p class='success'>Password changed successfully!</p>"; } ?>

            <input type="submit" value="Update">
        </form>

    </fieldset>
    </body>
</main>
