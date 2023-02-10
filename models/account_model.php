<?php
  
// THIS CODE WAS AN ATTEMPT TO DISPLAY THE USERNAME IN ACCOUNT DETAILS. I'm hoping to return to this //
// once I better my SQL skills //

    function get_user($user_id) {
        global $db;
        $query = "SELECT * FROM user WHERE userID = '$user_id' AND status='A' ";
        $result = $db -> query($query);
        return $result;
    }

    // $user_id = $db->quote($product_id); 
    // $query = "SELECT userName FROM user WHERE userID = $user_id";
    // $products = $db->query($query)


?>