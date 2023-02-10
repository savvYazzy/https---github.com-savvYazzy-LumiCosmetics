
<?php 
    if(isset($_SESSION['user_id'])) {
        echo '<form id="logout_form" id="logout_btn" name="logout" action="index.php" method="POST">';
        echo '<div id="cart_left">';
        echo '<a href="cart.php?cartID=' . $_SESSION["cart_id"] . '" ><img class="cart_icon" src="assets/icons/svg/cart.svg"></a><br>';
        echo '<span id="cart_count">' . $_SESSION["item_count"] . '</span>';
        echo '</div>';
        echo '<div id="cart_right">';
        echo 'Welcome, ' . $_SESSION['username'] . '';
        echo '<input type="submit" value="Log out" name="logout" id="logoutBTN">';
        echo '</div>';
        echo '</form>';
    }
    else {
        echo '<form id="login_form" name="login" action="index.php" method="POST">';
        echo '<input type="text" name="username" id="username" placeholder=" Username" required>';
        echo '<input type="password" name="password" id="password" placeholder=" Password" required>';
        echo '<input type="submit" name="submit" id="submit" value="Log In"><br>';
        echo '<a id="create_account_link" href="register.php"> Dont have an existing account? Sign up here!</a>';
        echo '</form>';
    }
?>





