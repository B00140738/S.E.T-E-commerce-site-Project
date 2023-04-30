<?php

class Product {
    public $id;
    public $name;
    public $price;
    public $img;

    function __construct($id, $name, $price, $img) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->img = $img;
    }
    function display($pdo) {
        // Get 4 random products from the Product table
        $stmt = $pdo->prepare('SELECT * FROM Product ORDER BY RAND() LIMIT 4');
        $stmt->execute();
        $recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $products = array();
        foreach ($recently_added_products as $product) {
            $product_obj = new Product($product['id'], $product['name'], $product['price'], $product['img']);
            array_push($products, $product_obj);
        }

        foreach ($recently_added_products as $product) {
            echo '
            <div class="product">
                <a href="home.php' . $product['id'] . '">
                    <img src="imgs/' . $product['img'] . '" width="200" height="200" alt="' . $product['name'] . '">
                </a>
                <span class="name">' . $product['name'] . '</span>
                <span class="price">
                    €' . $product['price'] . '
                </span>
                <form method="post" action="add_to_cart.php">
                    <input type="hidden" name="product_id" value="' . $product['id'] . '">
                    <input type="number" name="quantity" value="1" min="1" max="99">
                    <button type="submit">Add to Cart</button>
                </form>
            </div>';
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getImg()
    {
        return $this->img;
    }

}

