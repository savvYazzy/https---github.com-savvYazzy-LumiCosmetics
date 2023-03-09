<?php
$cart = get_items($_SESSION['cart_id']);

// Check if the promo code form has been submitted
if (isset($_POST['apply_promo_code'])) {
  $promo_code = $_POST['promo_code'];
  $promo_code_query = "SELECT * FROM promo_codes WHERE promo_code = '$promo_code' AND end_date >= NOW()";
  $promo_code_result = mysqli_query($conn, $promo_code_query);

  if (mysqli_num_rows($promo_code_result) > 0) {
    $promo_code_data = mysqli_fetch_assoc($promo_code_result);
    $discount_amount = $promo_code_data['discount_amount'];

    // Apply the discount to the total price
    $total_price = get_total_price($_SESSION['cart_id']) - $discount_amount;
  }
}

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
                <div id="qty-update">
                <form id="update_qty_form_<?php echo $item['id']; ?>" method="post" action="update_qty.php">
                        <!-- <input type="hidden" name="item_id" value="-->
                        <!-- <button type="submit" name="qty_change" value="-">-</button> -->
                        <input type="number" name="qty" value="<?php echo $item['qty']; ?>" onchange="updateTotalPrice(this)">
                        <button type="submit" name="qty_change" value="apply-qty">Apply</button>
                        <button><img class="trash_icon" src="assets/icons/svg/trash.svg"></button>
                    </form>
                </div>
                <div class="product_detail">$<?php echo $item['price'] * $item['qty'] ?></div>
            </div>      
        <?php endforeach; ?>
    </div>
    <br>
    <div class="page-heading" id="total-price">
      Total Price: $
      <?php 
        if (isset($total_price)) {
          // Display the discounted total price
          echo number_format($total_price, 2);
        } else {
          // Display the regular total price
          echo number_format(get_total_price($_SESSION['cart_id']), 2);
        }
      ?>
    </div>

    <br><br>
    <form method="post" action="">
      <div class="promo-code">
        Promo Code: <input type="text" name="promo_code">
        <button type="submit" name="apply_promo_code">Apply</button>
      </div>
    </form>

    <br><br>
    <div class="page-heading"><a href="checkout.php" alt="navigation"><img class="cart_icon" src="assets/icons/svg/cart.svg"></a>Checkout</div>
</main>
