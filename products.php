
<?php require('views/layout/header.php'); ?><br>
<?php require('views/layout/nav.php'); ?>

<?php 
    if(isset($_GET['catID'])) {
        require('views/product/product_list.php');
    }
    else {
        require('views/product/product_details.php');
    }
?>

<?php require('views/layout/footer.php'); ?>





