
<?php
  
    function get_cart($user_id) {
        global $db;
        $query = "SELECT * FROM cart WHERE userID = '$user_id' AND status='A' ";
        $result = $db -> query($query);
        return $result;
    }
   
    function create_cart($user_id) {
        global $db;
        $query = "INSERT INTO cart (cartID, userID, openDate, closeDate, status)" . 
            " VALUES(null, $user_id, CURDATE(), CURDATE(), 'A')";
        $result = $db -> query($query);
        return $result;
    }
   
    function count_items($cart_id) {
        global $db;
        $query = "SELECT SUM(qty) FROM item WHERE cartID = $cart_id";
        $result = $db -> query($query);
        $vals = $result->fetch();
        $total = $vals[0];
        return $total;
    }
  
    function get_items($cart_id) {
        global $db;
        $query = "SELECT i.itemID, p.productName, i.size, i.qty, p.price
                    FROM item i
                    INNER JOIN product p ON i.productID = p.productID
                    WHERE i.cartID = $cart_id AND i.status = 'A'";
        $result = $db->query($query);
        $items = $result->fetchAll();
        return $items;
    } 
  
    function add_item($product_id, $cart_id, $size, $qty) {
        global $db;
        // Check if the item already exists in the cart
        $query = "SELECT * FROM item WHERE productID = $product_id AND cartID = $cart_id AND size = '$size' AND status = 'A'";
        $result = $db->query($query);
        if ($result->rowCount() > 0) {
            // If the item already exists, update the quantity
            $item = $result->fetch();
            $query = "UPDATE item SET qty = qty + $qty WHERE itemID = {$item['itemID']}";
            $db->query($query);
        } else {
            // If the item doesn't exist, add it to the cart
            $query = "INSERT INTO item (productID, cartID, size, qty, status)
                      VALUES ($product_id, $cart_id, '$size', $qty, 'A')";
            $db->query($query);
        }
    }
    
    function update_qty($item_id, $qty) {
        global $db;
        $query = "UPDATE item
                    SET qty = $qty
                    WHERE itemID = $item_id";
        $db->query($query);
    }

    function get_total_price($cart_id) {
        global $db;
        $query = "SELECT SUM(p.price * i.qty) as total_price
                    FROM item i
                    INNER JOIN product p ON i.productID = p.productID
                    WHERE i.cartID = $cart_id AND i.status = 'A'";
        $result = $db->query($query);
        $total_price = $result->fetch()['total_price'];
        return $total_price;
    }
    
    function get_promo_code_discount($promo_code) {
        global $conn;
        $query = "SELECT discount_amount FROM promo_codes WHERE promo_code = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $promo_code);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          return $row['discount_amount'];
        } else {
          return false;
        }
      }

   // Function to apply a promo code to the cart and return the new total price
function apply_promo_code($promo_code, $cart_id, $db) {
    // Prepare the SQL statement to retrieve the promo code information
    $query = "SELECT promo_code_id, discount_amount, is_active FROM promo_codes WHERE promo_code = '$promo_code'";
    $result = $db->query($query);
  
    // Fetch the promo code information from the result set
    $row = $result->fetch_assoc();
    $promo_code_id = $row['promo_code_id'];
    $discount_amount = $row['discount_amount'];
    $is_active = $row['is_active'];
  
    // Check if the promo code exists and is active
    if ($result->num_rows > 0 && $is_active) {
      // Update the cart with the promo code information
      $update_query = "UPDATE carts SET promo_code_id = $promo_code_id WHERE cart_id = $cart_id";
      $db->query($update_query);
  
      // Apply the discount to the total price
      $total_price = get_total_price($cart_id, $db);
      $total_price -= $discount_amount;
  
      // Return the updated total price
      return $total_price;
    } else {
      // Return false if the promo code is invalid or inactive
      return false;
    }
  }
     
?>