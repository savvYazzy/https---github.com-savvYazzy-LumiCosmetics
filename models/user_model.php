
<?php
  
    function create_account($username, $password) {
        global $db;
        $query = "INSERT INTO user (userID, username, password, joinDate, endDate, status) " . 
            " VALUES(null, '$username', '$password', CURDATE(), CURDATE(), 'A')";
        $result = $db -> query($query);
        return $result;
    }
  
    function login($username, $password) {
        global $db;
        $query = "SELECT * FROM user WHERE username='$username' AND password='$password' AND status='A'";
        $result = $db->query($query);
        return $result;
    }

?>