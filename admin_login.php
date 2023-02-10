<?php

include 'models/database.php';

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  if ($username == "lumiAD" && $password == "Yasmine_1!") {
    session_start();
    $_SESSION['logged_in'] = true;
    header("Location: admin_dashboard.php");
  } else {
    $error = "Incorrect username or password";
  }
}

?>
<html>
  <head>
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-5">
      <h1 class="text-center">Admin Login</h1>
      <form action="" method="post" class="form-group mt-5">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" class="form-control"><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" class="form-control"><br><br>
        <input type="submit" name="submit" value="Submit" class="btn btn-primary">
      </form>
      <?php if (isset($error)) { echo "<p class='text-danger mt-2'>$error</p>"; } ?>
    </div>
  </body>
</html>
