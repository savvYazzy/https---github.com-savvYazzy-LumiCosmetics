<?php
    include_once 'db_connect.php';
    include_once 'cart_model.php';

    if (isset($_POST['item_id'], $_POST['qty'])) {
        $item_id = $_POST['item_id'];
        $qty = $_POST['qty'];

        update_qty($item_id, $qty);

        header("Location: cart_item.php");
        exit();
    }
?>
