<?php

    // Replace these with your actual database credentials
    $db_host = "localhost";
    $db_username = "php_weblog";
    $db_password = "123";
    $db_name = "weblog";

    // Create a database connection
    $conn = new mysqli($db_host, $db_username, $db_password, $db_name);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>