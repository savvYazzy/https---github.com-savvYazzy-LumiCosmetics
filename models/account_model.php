<?php
  
    function get_user($user_id) {
        global $db;
        $query = "SELECT * FROM user WHERE userID = '$user_id' AND status='A' ";
        $result = $db -> query($query);
        return $result;
    }

?>