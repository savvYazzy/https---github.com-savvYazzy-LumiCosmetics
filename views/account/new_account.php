
<?php 
    if(isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        create_account($username, $password);
    }
?>

<form id="sign_up_form" action="<?php echo ($_SERVER['PHP_SELF']) ?>" method="POST">
    <input type="text" name="username" placeholder="enter a username"><br>
    <input type="password" name="password" placeholder="enter a password"><br>
    <button type="submit">Create New Account</button>
</form>