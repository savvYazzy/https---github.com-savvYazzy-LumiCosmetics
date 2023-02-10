
<?php

    function get_products($catID) {
        global $db;
        $query = "SELECT * FROM product WHERE catID = '$catID'";
        $result = $db -> query($query);
        return $result;
    }
  
    function get_product_images($productID) {
        global $db;
        $query = "SELECT * FROM image WHERE productID = '$productID'";
        $result = $db -> query($query);
        return $result;
    }
  
    function get_product_details($productID) {
        global $db;
        $query = "SELECT * FROM product WHERE productID = '$productID'";
        $result = $db -> query($query);
        return $result;
    }
    function get_product_by_id($product_id) {
        global $db;
        $query = "SELECT * FROM product WHERE productID = '$product_id'";
        $result = $db->query($query);
        $product = $result->fetch();
        return $product;
    }
    
?>