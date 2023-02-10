
<?php
    $defaultCatID = 1;
    if(isset($_POST['qty'])) {
        $has_cart = get_cart($_SESSION['user_id']);
        $cart_result = $has_cart->fetch();
        if($cart_result) { 
            $cart_id = $cart_result[0];
            $_SESSION['cart_id'] = $cart_id;
            add_item($_POST['productID'], $cart_id, $_POST['size'], $_POST['qty']);
            $total_items = count_items($cart_id);
            $_SESSION['item_count'] = $total_items;
      
            echo '<script>document.querySelector("#cart_count").innerHTML = ' . $total_items . ';</script>';
        }
    }
    if(isset($_GET['catID'])) {
        $products = get_products($_GET['catID']);
    }
    else {
        $products = get_products($defaultCatID);
    }
    $imageURLs = [];
    $imageDescs = [];

    foreach($products as $product) {
        $productID = $product['productID'];
        $images = get_product_images($productID);
        foreach($images as $image) {
            $URL = 'assets/images/' . $image['imageURL'];
            array_push($imageURLs, $URL);
            $Desc = $image['imageDesc'];
            array_push($imageDescs, $Desc);
        }
    }
    if(isset($_GET['catID'])) {
        $products = get_products($_GET['catID']);
    }
    else {
        $products = get_products($defaultCatID);
    }
?>
<div id="product_panel"></div>
<main>
    <?php $count = 0; ?>
    <?php foreach($products as $product) : ?>
        
        <div class="product_tile">
            <div class="product_tile_image">  
                <img src="<?php echo $imageURLs[$count] ?>" class="productImage" 
                    title="<?php echo $imageDescs[$count] ?>">
            </div>
            <div class="product_tile_details">
                <h3><?php echo $product['productName'] ?></h3>
                <p><?php echo substr($product['productDesc'], 0, 50) ?>...</p>
                <span>$<?php echo $product['price'] ?></span>
                <a href="products.php?productID=<?php echo $product['productID'] ?>"><img class="cart_icon" src="assets/icons/svg/menu.svg"></a>
            </div>
        </div>


        <?php $count++; ?>
    <?php endforeach; ?>
</main>