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
        <h2>About us</h2>
        <br>
        <br>
        <div class="products-container">
            <p>Founded in 2015, we strive to encourage young, new artists to Revolutionize the Market!</p>
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
