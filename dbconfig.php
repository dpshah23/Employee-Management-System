<?php
$username = 'root'; 
$db_password = ''; 
$servername = "localhost";
$database = 'employee management system';

$conn = new mysqli($servername, $username, $db_password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


?>