<?php require('views/layout/nav.php'); ?>

<?php
session_start();

//check if the user is not logged in as admin
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: admin_login.php");
    exit;
}



//code to perform add, edit and delete operations on the products
if (isset($_POST['add'])) {
    $productName = mysqli_real_escape_string($conn, $_POST['productName']);
    $productDesc = mysqli_real_escape_string($conn, $_POST['productDesc']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $imageURL = mysqli_real_escape_string($conn, $_FILES['image']['name']);
    
    //upload image to the server
    $target = "images/".basename($imageURL);
    move_uploaded_file($_FILES['image']['tmp_name'], $target);
    
    //add product data to the database
    $query = "INSERT INTO product (productName, productDesc, price)
    VALUES ('$productName', '$productDesc', '$price')";
    mysqli_query($conn, $query);
    
    //get the product ID of the recently added product
    $productID = mysqli_insert_id($conn);
    
    //add the image data to the database
    $query = "INSERT INTO image (imageURL, imageDesc, productID)
    VALUES ('$imageURL', '$productDesc', '$productID')";
    mysqli_query($conn, $query);
    
    header("Location: admin_dashboard.php");
    }

    if (isset($_POST['edit'])) {
        // Retrieve the product details from the database to populate the form
        $productID = mysqli_real_escape_string($conn, $_POST['productID']);
        $query = "SELECT * FROM product WHERE productID = $productID";
        $result = mysqli_query($conn, $query);
        $product = mysqli_fetch_assoc($result);
        
        // Check if the product was found in the database
        if ($product) {
        $productName = $product['productName'];
        $productDesc = $product['productDesc'];
        $price = $product['price'];
        } else {
        // Product not found in the database, redirect back to the dashboard
        header("Location: admin_dashboard.php");
        exit;
        }
        }
        
        // Update the product details in the database when the form is submitted
        if (isset($_POST['update'])) {
        $productID = mysqli_real_escape_string($conn, $_POST['productID']);
        $productName = mysqli_real_escape_string($conn, $_POST['productName']);
        $productDesc = mysqli_real_escape_string($conn, $_POST['productDesc']);
        $price = mysqli_real_escape_string($conn, $_POST['price']);
        
        $query = "UPDATE product SET productName='$productName', productDesc='$productDesc', price='$price' WHERE productID=$productID";
        mysqli_query($conn, $query);
        
        header("Location: admin_dashboard.php");
        exit;
        }

        if (isset($_POST['delete'])) {
            //delete product code here
            $query = "DELETE FROM product WHERE productID = '$productID'";
            mysqli_query($conn, $query);
          
            header("Location: admin_dashboard.php");
          }

?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <h1 class="text-center mt-5">Welcome to the Admin Dashboard</h1>
    
    <!-- Add, Edit and Delete form for products -->
    <form action="" method="post" class="mt-5">
      <div class="form-group">
        <label for="productName">Product Name</label>
        <input type="text" name="productName" class="form-control" id="productName" placeholder="Product Name">
      </div>
      <div class="form-group">
        <label for="productDesc">Product Description</label>
        <input type="text" name="productDesc" class="form-control" id="productDesc" placeholder="Product Description">
      </div>
      <div class="form-group">
        <label for="price">Price</label>
        <input type="text" name="price" class="form-control" id="price" placeholder="Price">
      </div>
      <div class="form-group">
      <label for="productImage">Product Image</label>
      <input type="file" class="form-control-file" id="productImage" name="productImage">
    </div>
      <input type="submit" name="add" value="Add Product" class="btn btn-primary mr-2">
      <input type="submit" name="edit" value="Edit Product" class="btn btn-secondary mr-2">
      <input type="submit" name="delete" value="Delete Product" class="btn btn-danger">
    </form>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  
