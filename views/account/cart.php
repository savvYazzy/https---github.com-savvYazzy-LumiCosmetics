
<?php
    $cart = get_items($_SESSION['cart_id']);
?>

<div class="page-heading">My Cart</div>
<div class="MyAccountOrderDetails">
    <h3>Product Name</h3>
    <h3>Qty</h3>
    <h3>Price</h3>

</div>

<main>
    <div id="categories">
        <?php foreach($cart as $item) : ?>
            <div class="line_item">
                <div class="product_detail"><?php echo $item['productName'] ?></div>
                <div class="product_detail"><?php echo $item['qty'] ?></div>
                <!-- <form class="product_detail" action="update_qty.php" method="post" class="qty-form">
                    <input type="hidden" name="item_id" value="<?php echo $item['itemID'] ?>">
                    <div class="product_detail">
                        <input id="qty-num" type="number" name="qty" value="<?php echo $item['qty'] ?>">
                        <input id="qty-sub"type="submit" value="Update"> 
                    </div>
                </form> -->
                <div class="product_detail">$<?php echo $item['price'] ?></div>
            </div>      
        <?php endforeach; ?>
    </div>
    <br>
    <div class="page-heading"><a href="checkout.php" alt="navigation"><img class="cart_icon" src="assets/icons/svg/cart.svg"></a>Checkout</div>
</main>


