<?php
// Include your database connection file
include '../server.php';

// Check if the skill ID is provided in the query parameter for deletion
if (isset($_GET['delete_id'])) {
    // Get the skill ID from the query parameter
    $skill_id = $_GET['delete_id'];

    // Prepare the DELETE query for skills
    $sql = "DELETE FROM skills WHERE id = $skill_id";

    // Execute the DELETE query for skills
    if ($connect->query($sql) === TRUE) {
        // Redirect back to the dashboard with success message for skill deletion
        header("Location: dashboard.php?deleteSuccess=true");
        exit();
    } else {
        // If an error occurs, display an error message for skill deletion
        echo "Error deleting skill record: " . $connect->error;
        exit();
    }
} elseif (isset($_GET['project_id'])) {
    // If no skill ID is provided, check if project ID is provided for deletion
    // Get the project ID to delete
    $projectId = $_GET['project_id'];

    // Prepare the DELETE query for projects
    $sql = "DELETE FROM projects WHERE id = $projectId";

    // Execute the DELETE query for projects
    if ($connect->query($sql) === TRUE) {
        // Redirect to dashboard.php with deleteSuccess query parameter after successful project deletion
        header("Location: dashboard.php?deleteSuccess=true");
        exit(); // Ensure that subsequent code is not executed after redirection
    } else {
        // Display error message if query execution fails for project deletion
        echo "Error deleting project record: " . $connect->error;
        exit();
    }
} elseif (isset($_POST['delete_messages'])) {
    // Check if any messages are selected for deletion
    if (!empty($_POST['message_ids'])) {
        // Escape and sanitize the selected message ids
        $message_ids = array_map('intval', $_POST['message_ids']);
        $message_ids = implode(',', $message_ids);

        // Delete selected messages from the database
        $sql = "DELETE FROM message WHERE id IN ($message_ids)";
        if ($connect->query($sql) === TRUE) {
            // Show success message for message deletion
            header("Location: dashboard.php?deleteSuccess=true");
            exit();
        } else {
            echo "Error deleting messages: " . $connect->error;
        }
    } else {
        echo "No messages selected for deletion.";
    }
} else {
    // If neither skill ID nor project ID is provided, redirect back to the dashboard
    header("Location: dashboard.php");
    exit();
}

// Close connection
$connect->close();
?>
