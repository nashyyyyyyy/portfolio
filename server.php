<?php
// Define database connection variables
$db_host = 'sql110.infinityfree.com';
$db_username = 'if0_36393398';
$db_password = '9LpSJn7dL8QXoFW';
$db_name = 'if0_36393398_portfolio_cms';

// Create connection
$connect = mysqli_connect($db_host, $db_username, $db_password, $db_name);

// Check connection
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
