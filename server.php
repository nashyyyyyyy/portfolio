<?php
// Database connection parameters
$host = "localhost"; // Change this to your database host
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$database = "portfolio_cms"; // Change this to your database name

// Connect to the database
$connect = new mysqli($host, $username, $password, $database);

// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}


// Close the connection
$connect->close();
?>
