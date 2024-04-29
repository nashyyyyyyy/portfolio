<?php
include 'server.php'; // Include your database connection file

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    
    // Validate form data
    if (empty($name) || empty($email) || empty($message)) {
        header("Location: index.php?error=All fields are required");
        exit();
    }

    // Insert message into database
    $sql = "INSERT INTO message (name, email, message) VALUES ('$name', '$email', '$message')";
    if ($connect->query($sql)) {
        header("Location: index.php?success=Message inserted successfully");
        exit();
    } else {
        header("Location: index.php?error=" . $connect->error);
        exit();
    }
}
?>
