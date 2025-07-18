<?php
    $dsn = 'mysql:host=localhost;dbname=group4';//host a changer quand ce sera sur le réseau de l'école
    $username = 'root';
    $password = '';
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