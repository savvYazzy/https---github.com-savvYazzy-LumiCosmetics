
<?php
    $defaultProductID = 0;
    if(isset($_GET['productID'])) {
        $products = get_product_details($_GET['productID']);
    }
    $imageURLs = [];
    $imageDescs = [];
    $catID = '';
    $productName = '';
    $productPrice = '';
    $productDesc = '';

    foreach($products as $product) {
        $productID = $product['productID'];
        $catID = $product['catID'];
        $productName = $product['productName'];
        $productPrice = $product['price'];
        $productDesc = $product['productDesc'];
        $images = get_product_images($productID);
        foreach($images as $image) {
            $URL = $image['imageURL'];
            array_push($imageURLs, $URL);
            $Desc = $image['imageDesc'];
            array_push($imageDescs, $Desc);
        } 
    } 
?>
<main>
    <div id="product_details_container">
        <div id="product_details_details">
            <span id="product_name_span"><?php echo strtoupper($productName) ?></span><br>
            <span id="product_price_span">$<?php echo $productPrice ?></span>
            <p><?php echo $productDesc ?></p>
            <form id="cart_controls" action="products.php?catID=<?php echo $catID ?>" method="POST" name="add_to_cart">
                <input type="number" min="1" max="10" name="qty" value="1">
                <select name="size">
                    <option value="Package Qty">Select Package&nbsp;&nbsp;</option>
                    <option value="Regular Pack">Regular pack</option>
                    <option value="Premium Pack">Premium pack</option>
                    <option value="Exclusive pack">Exclusive pack</option>
                </select><br>
                <input type="hidden" name="productID" value="<?php echo $productID ?>">
                <input type="hidden" name="catID" value="<?php echo $catID ?>">
                <?php if(isset($_SESSION['user_id'])) {
                    echo '<button type="submit">Add to Cart</button>';
                }   
                else {
                    echo '<a href="register.php" title="please log in" id="LogCart">Log In to Purchase</a>';
                }
                ?>
            </form>
        </div>
        <div id="product_image_container">
            <div>
                <img id="hero_image" class="hero_image" src="<?php echo 'assets/images/' . $imageURLs[0] ?>" title="<?php echo $productName ?>">
            </div>
            <div>
                <?php for ($i = 0; $i < count($imageURLs); $i++) { ?>
                    <img src="<?php echo 'assets/images/' . $imageURLs[$i] ?>" onclick="SwapImage(this.src);" class="product_details_image" title="<?php echo $imageDescs[$i] ?>">
                <?php } ?>
            </div>
        </div>
    </div>
</main>