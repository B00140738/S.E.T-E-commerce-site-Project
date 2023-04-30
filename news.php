<?php
require "lib/homefunc.php";

?>
<link rel="stylesheet" href="css/nav.css">
<main>
    <!--User Details-->
    <div class="featured">
        <?php if (isset($_SESSION['name'])) {
            echo '<h2>Welcome Back' . ' ' . $_SESSION['name'] . '</h2>';
        } else {
            echo "<h2>Welcome to Agile Art!</h2>";
        } ?>
    </div>
    <hr>
    <br>
    <!--Products Area-->
    <div class="products">
        <h2>News</h2>
        <br>
        <br>
        <div class="products-container">
            <p>The Agile Art website has been updated, we hope you like the new website!</p>
            <br>
        </div>
        <br>
        <br>
    </div>
</body>
</main>
<footer>
<?php require "./lib/footer.php" ?>
</footer>
