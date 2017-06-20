<?php
    $servername = "localhost";
    $username = "root";
    $password = "admin";
    $database = "projects";

    $db = new mysqli($servername, $username, $password, $database);

    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }
    /* echo "Connected successfully"; */
?>
