<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit']) && $_POST['submit'] == 'Add Skill') {
    // Database connection
    include '../server.php';

    // Check connection
    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
    }

    // Prepare and bind parameters
    $skill_name = $_POST['skill_name'];
    $description = $_POST['description'];
    $skill_progress = $_POST['skill_progress'];
    $skill_icon = $_POST['skill_icon'];

    // SQL query to insert data
    $sql = "INSERT INTO skills (skill_name, description, skill_progress, skill_icon) VALUES ('$skill_name', '$description', $skill_progress, '$skill_icon')";

    // Execute the query
    if ($connect->query($sql) === TRUE) {
        // Redirect to dashboard.php with addSuccess query parameter
        header("Location: dashboard.php?addSuccess=true");
        exit(); // Ensure that subsequent code is not executed after redirection
    } else {
        echo "Error: " . $sql . "<br>" . $connect->error;
    }

    // Close connection
    $connect->close();
}
?>



<?php
// Check if the form is submitted
if(isset($_POST['addProject'])) {
    // Include your database connection
    include '../server.php';

    // Get form data and sanitize
    $new_project_name = mysqli_real_escape_string($connect, $_POST['new_project_name']);
    $new_description = mysqli_real_escape_string($connect, $_POST['new_description']);
    $new_link = mysqli_real_escape_string($connect, $_POST['new_link']);

    // Check if the project name already exists
    $check_sql = "SELECT COUNT(*) AS project_count FROM projects WHERE project_name = '$new_project_name'";
    $check_result = $connect->query($check_sql);
    $row = $check_result->fetch_assoc();
    $project_count = $row['project_count'];

    if ($project_count > 0) {
        // Project with the same name already exists, do nothing
    } else {
        // Insert data into the database
        $sql = "INSERT INTO projects (project_name, description, link) VALUES ('$new_project_name', '$new_description', '$new_link')";

        // Execute the query
        if ($connect->query($sql) === TRUE) {
            // Redirect to dashboard.php after successful insertion
            header("Location: dashboard.php?addSuccess=true");
            exit(); // Ensure that subsequent code is not executed after redirection
        } else {
            // Redirect to dashboard.php with error flag
            header("Location: dashboard.php?addError=true");
            exit(); // Ensure that subsequent code is not executed after redirection
        }
    }

    // Close connection
    $connect->close();
}
?>






