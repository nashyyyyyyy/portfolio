<?php
// Include your database connection file
include '../server.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $education = $_POST['education'];
    $address = $_POST['address'];
    $hobby = $_POST['hobby'];

    // Update query
    $sql = "UPDATE basic_info 
            SET fullname='$fullname', email='$email', contact='$contact', education='$education', address='$address', hobby='$hobby'";

    // Execute the update query
    if ($connect->query($sql) === TRUE) {
        echo "<div id='customAlert' class='custom-alert' style='display: none;'></div>";
    } else {
        echo "Error updating record: " . $connect->error;
    }

    // Close the database connection
    $connect->close();
}
?>