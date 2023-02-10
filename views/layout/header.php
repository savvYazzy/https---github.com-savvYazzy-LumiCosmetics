

<?php 
    session_start(); 
    require('includes/package.php');
    if(isset($_POST['logout'])) {
        unset($_SESSION['user_id']);
        session_destroy();
    }
    if(isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $loggedIn = login($username, $password);
        $result = $loggedIn->fetch();
        if($result) {
            $user_id = $result[0]; 
            $_SESSION['user_id'] = $user_id;
            $_SESSION['username'] = $result[1];
            
            $has_cart = get_cart($user_id);
            $cart_result = $has_cart->fetch();
            if($cart_result) {
                $cart_id = $cart_result[0];
                $_SESSION['cart_id'] = $cart_id;
                $user_id = $cart_result[1];
                $total_items = count_items($cart_id);
                if($total_items == null)
                    $_SESSION['item_count'] = 0;
                else 
                    $_SESSION['item_count'] = $total_items;
            }
            else { 
                create_cart($user_id);
                $has_cart = get_cart($user_id);
                $cart_result = $has_cart->fetch();
                if($cart_result) { 
                    $cart_id = $cart_result[0];
                    $user_id = $cart_result[1];
                    $total_items = count_items($cart_id);
                    if($total_items == null)
                        $_SESSION['item_count'] = 0;
                    else 
                        $_SESSION['item_count'] = $total_items;
                    $_SESSION['cart_id'] = $cart_id;
                }
            }
        }
        else {
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <title>Lumi Cosmetics E-Commerce Shop</title>
</head>
<body>

<header>
    <?php require('views/account/login.php'); ?>
</header>


