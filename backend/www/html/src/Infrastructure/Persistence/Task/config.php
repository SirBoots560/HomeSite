<?php
    //Database Connection
    $host = "mysql";
    $port = 3306;
    $username = "root";
    $password = "mrVEp2zTD6";
    $dbName = "homesite";

    $conn = new mysqli($host, $username, $password, $dbName, $port);     // Create connection
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);              // Check connection
    }