<?php
session_start();
require "./lib/db_conn.php";
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
            <label for="new_user_name">New Username:</label>
            <input class="input-update" type="text" id="new_user_name" name="new_user_name" required>
            <?php if (isset($user_name_error)) { echo "<p class='error'>$user_name_error</p>"; } ?>
            <label for="new_name">New Name:</label>
            <input class="input-update" type="text" id="new_name" name="new_name" required>
            <input type="submit" value="Update">
        </form>

    </fieldset>
    </body>
</main>

