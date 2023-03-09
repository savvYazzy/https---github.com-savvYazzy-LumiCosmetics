<?php
require_once('database.php');

if(isset($_POST['product_id']) && isset($_POST['qty'])) {
    $product_id = $_POST['product_id'];
    $new_qty = $_POST['qty'];

    // Update the quantity value in the database
    $update_query = "UPDATE cart_items SET qty = $new_qty WHERE id = $product_id";
    $result = mysqli_query($conn, $update_query);

    if($result) {
        // Quantity updated successfully
        header('Location: cart.php');
        exit();
    } else {
        // Error updating quantity
        echo "Error updating quantity";
    }
} else {
    // Invalid request
    header('Location: cart.php');
    exit();
}
?>
