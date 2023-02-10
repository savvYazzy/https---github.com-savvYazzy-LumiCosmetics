<?php
    $dsn = 'mysql:host=107.174.33.194;dbname=lumiDB';
    $username = 'lumiAD';
    $password = 'Yasmine_1!';

    try {
        $db = new PDO($dsn, $username, $password);
    }
    catch(PDOException $e) {
        $error_message = $e->getMessage();
        include('views/databaseERR/database_error.php');
        exit();
    } 
    ?>
