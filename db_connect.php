<?php 
    $host="localhost";
    $username = "root";
    $pass = '';
    $db_name = "doanphp";
    $conn = new mysqli($host, $username, $pass, $db_name);
    if ($conn -> connect_error) {
        die("Error:".$conn->connect_error);
        exit();
    }
    $conn->set_charset("utf8")
?>