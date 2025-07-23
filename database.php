<?php
    $dsn = 'mysql:host=172.21.82.208;dbname=GROUP4';//host a changer quand ce sera sur le réseau de l'école
    $username = 'GROUP4';
    $password = '479';
    try {
        $db = new PDO($dsn, $username, $password);
        //echo"<p>Connected to database:</p>";
    } 
    catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo "<p>Error connecting to database: $error_message</p>";
        exit();
    }
?>