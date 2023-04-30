<?php
require "lib/cartfunc.php";
$total_price = 0;
?>
<header>
    <link rel="stylesheet" href="css/cart.css">
    <link rel="stylesheet" href="css/nav.css">

</header>
<div style="text-align: center;">
    <main>
        <div class="cart-container">
            <h2>Shopping Cart</h2>

            <?php if(empty($cart_items)): ?>
                <p>Your cart is empty!</p>
            <?php else: ?>
                <table>
                    <thead>
                    <tr>
                        <th class="center">Product</th>
                        <th class="center">Name</th>
                        <th class="center">Description</th>
                        <th class="center">Price</th>
                        <th class="center">Qty.</th>
                        <th class="center">Total</th>
                        <th class="center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($cart_items as $item): ?>
                        <tr>
                            <td class="center"><div class="product-img"><img src="imgs/<?=$item['img']?>" width="100" height="100" alt="<?=$item['name']?>"></div></td>
                            <td class="center"><div class="product-name"><?=$item['name']?></div></td>
                            <td class="center"><div class="product-description"><?=$item['description']?></div></td>
                            <td class="center"><div class="product-price">€<?=$item['price']?></div></td>
                            <td class="center">
                                <form method="post">
                                    <div class="product-quantity">
                                        <input type="hidden" name="cart_id" value="<?=$item['cartID']?>">
                                        <input type="number" name="quantity" value="<?=$item['quantity']?>" min="1" style="width: 40px" onchange="this.form.submit()">
                                    </div>
                                </form>
                            </td>
                            <td class="center"><div class="product-total">€<?=$item['price'] * $item['quantity']?></div></td>
                            <td class="center">
                                <form method="post">
                                    <div class="product-remove">
                                        <input type="hidden" name="cart_id" value="<?=$item['cartID']?>">
                                        <button type="submit" name="remove">Remove</button>

                                    </div>

                                </form>
                            </td>
                        </tr>
                        <?php $total_price += ($item['price'] * $item['quantity']); ?>

                    <?php endforeach; ?>

                    <tr>
                        <td colspan="3"></td>

                        <td colspan="2"><strong>Total</strong></td>
                        <td colspan="2"><strong>€<?=$total_price?></strong></td>

                    </tr>
                    </tbody>

                </table>
            <?php endif; ?>
            <form  action="checkOut.php" method="post">
               <button type="submit" name="complete_transaction">Complete Transaction</button>
            </form>

        </div>
    </main>
</div>





