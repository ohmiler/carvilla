<?php

    $host = 'localhost';
    $db = 'carvilla_db';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    try {
        $con = new PDO($dsn, $user, $pass);
        
        // Set PDO attributes using setAttribute method
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  // Error mode: Exceptions
        $con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);  // Default fetch mode: Associative array
        $con->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);  // Disable emulated prepared statements

        // echo "Connected successfully!";

    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>
