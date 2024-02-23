<?php
    $host = "localhost";
    $user = "sistemaweb3";
    $pass = "sistemaweb3";
    $db = "sistemaweb3";

    $conn = new mysqli($host,$user,$pass,$db);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>
