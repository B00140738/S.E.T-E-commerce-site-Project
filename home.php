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

    <?php if (isset($message)): ?>
        <div class="message">
            <?=$message?>
        </div>
    <?php endif; ?>

    <?php if(!empty($_GET['search']) && !empty($search_results)): ?>
        <h2>Results for '<?php echo $_GET['search']; ?>'</h2>
        <div class="product-list">
            <?php foreach ($search_results as $product): ?>
                <div class="product">
                    <a href="home.php<?=$product['id']?>">
                        <img src="imgs/<?=$product['img']?>" width="200" height="200" alt="<?=$product['name']?>">
                    </a>
                    <span class="name">
                        <a href="home.php<?=$product['id']?>"><?=$product['name']?></a>
                    </span>
                    <span class="price">
                        €<?=$product['price']?>
                    </span>
                    <form method="post" action="">
                        <input type="hidden" name="product_id" value="<?=$product['id']?>">
                        <button type="submit">Add to Cart</button>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
    <?php elseif(!empty($_GET['search']) && empty($search_results)): ?>
        <h2>No results found for '<?php echo $_GET['search']; ?>'</h2>
    <?php endif; ?>

    <!--Products Area-->
    <div class="products">
        <h2>Products</h2>
        <br>
        <br>
        <div class="products-container">
            <h3>Bestsellers</h3>
            <br>
            <!--Products go here!-->
            <div class="product-item">
                <?php foreach ($recently_added_products as $product): ?>
                    <div class="product">
                        <a href="home.php<?=$product['id']?>">
                            <img src="imgs/<?=$product['img']?>" width="200" height="200" alt="<?=$product['name']?>">
                            <span class="name"><?=$product['name']?></span>
                            <span class="price">€<?=$product['price']?></span>
                        </a>

                        <form method="post">
                            <input type="hidden" name="product_id" value="<?=$product['id']?>">
                            <button type="submit">Add to Cart</button>
                        </form>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <br>
        <br>
        <div class="products-container">
            <h3>Vintage</h3>
            <br>
            <!--Products go here!-->
            <div class="product-item">
                <?php foreach ($recently_added_products as $product): ?>
                    <div class="product">
                        <a href="home.php<?=$product['id']?>">
                            <img src="imgs/<?=$product['img']?>" width="200" height="200" alt="<?=$product['name']?>">
                        </a>
                        <span class="name"><?=$product['name']?></span>
                        <span class="price">
                            €<?=$product['price']?>
                        </span>
                        <form method="post">
                            <input type="hidden" name="product_id" value="<?=$product['id']?>">
                            <button type="submit">Add to Cart</button>
                        </form>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <br>
        <br>
        <div class="products-container">
            <h3>Bestsellers</h3>
            <br>
            <!--Products go here!-->
            <div class="product-item">
                <?php foreach ($recently_added_products as $product): ?>
                    <div class="product">
                        <a href="home.php<?=$product['id']?>">
                            <img src="imgs/<?=$product['img']?>" width="200" height="200" alt="<?=$product['name']?>">
                            <span class="name"><?=$product['name']?></span>
                            <span class="price">€<?=$product['price']?></span>
                        </a>

                        <form method="post">
                            <input type="hidden" name="product_id" value="<?=$product['id']?>">
                            <button type="submit">Add to Cart</button>
                        </form>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <br>
        <br>
        <div class="products-container">
            <h3>Vintage</h3>
            <br>
            <!--Products go here!-->
            <div class="product-item">
                <?php foreach ($recently_added_products as $product): ?>
                    <div class="product">
                        <a href="home.php<?=$product['id']?>">
                            <img src="imgs/<?=$product['img']?>" width="200" height="200" alt="<?=$product['name']?>">
                        </a>
                        <span class="name"><?=$product['name']?></span>
                        <span class="price">
          €<?=$product['price']?>
        </span>
                        <form method="post">
                            <input type="hidden" name="product_id" value="<?=$product['id']?>">
                            <button type="submit">Add to Cart</button>
                        </form>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <br>
        <br>
        <div class="products-container">
            <h3>Bestsellers</h3>
            <br>
            <!--Products go here!-->
            <div class="product-item">
                <?php foreach ($recently_added_products as $product): ?>
                    <div class="product">
                        <a href="home.php<?=$product['id']?>">
                            <img src="imgs/<?=$product['img']?>" width="200" height="200" alt="<?=$product['name']?>">
                        </a>
                        <span class="name"><?=$product['name']?></span>
                        <span class="price">€<?=$product['price']?></span>
                        <form method="post">
                            <input type="hidden" name="product_id" value="<?=$product['id']?>">
                            <button type="submit">Add to Cart</button>
                        </form>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <br>
        <br>
    </div>
</body>
</main>
<footer>

</footer>