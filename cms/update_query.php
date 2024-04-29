<?php
// Include your database connection file
include '../server.php';

// Check if the form is submitted for updating basic info
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['updateBasicInfo'])) {
    // Retrieve basic info form data
    $fullname = mysqli_real_escape_string($connect, $_POST['fullname']);
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $contact = mysqli_real_escape_string($connect, $_POST['contact']);
    $education = mysqli_real_escape_string($connect, $_POST['education']);
    $address = mysqli_real_escape_string($connect, $_POST['address']);
    $hobby = mysqli_real_escape_string($connect, $_POST['hobby']);

    // Update query for basic info
    $updateBasicInfo = "UPDATE basic_info 
                        SET fullname='$fullname', email='$email', contact='$contact', education='$education', address='$address', hobby='$hobby' 
                        WHERE id = 1";

    if ($connect->query($updateBasicInfo) !== TRUE) {
        // Error message for basic info update
        echo "Error updating Basic Info: " . $connect->error;
    }
}

// Check if the form is submitted for updating projects
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['updateProjects'])) {
    // Retrieve projects form data
    $project_name = mysqli_real_escape_string($connect, $_POST['project_name']);
    $description = mysqli_real_escape_string($connect, $_POST['description']);
    $link = mysqli_real_escape_string($connect, $_POST['link']);

    // Update query for projects
    $updateProjects = "UPDATE projects SET description='$description', link='$link' WHERE project_name='$project_name'";

    // Execute the update query for projects
    if ($connect->query($updateProjects) !== TRUE) {
        // Error message for projects update
        echo "Error updating project: " . $connect->error;
    }
}

// Check if the form is submitted for updating intro
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['updateIntro'])) {
    // Retrieve intro form data
    $firstname = mysqli_real_escape_string($connect, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($connect, $_POST['lastname']);
    $flex = mysqli_real_escape_string($connect, $_POST['flex']);

    // Check if new logo image is selected
    if (!empty($_FILES['logo']['name'])) {
        $logo = $_FILES['logo']['name'];
        $logoTargetFilePath = "image/" . $logo;
        // Move uploaded logo file
        if (move_uploaded_file($_FILES["logo"]["tmp_name"], $logoTargetFilePath)) {
            // Update logo path in database
            $updateLogo = "UPDATE intro SET logo = '$logoTargetFilePath' WHERE id = 1";
            $connect->query($updateLogo);
        } else {
            // Handle logo upload error
            echo '<div class="alert alert-danger fixed-top" role="alert">Error uploading logo.</div>';
        }
    }

    // Check if new intro image is selected
    if (!empty($_FILES['intro_img']['name'])) {
        $introImg = $_FILES['intro_img']['name'];
        $introImgTargetFilePath = "image/" . $introImg;
        // Move uploaded intro image file
        if (move_uploaded_file($_FILES["intro_img"]["tmp_name"], $introImgTargetFilePath)) {
            // Update intro image path in database
            $updateIntroImg = "UPDATE intro SET intro_img = '$introImgTargetFilePath' WHERE id = 1";
            $connect->query($updateIntroImg);
        } else {
            // Handle intro image upload error
            echo '<div class="alert alert-danger fixed-top" role="alert">Error uploading intro image.</div>';
        }
    }

    // Update text fields in database
    $updateTextFields = "UPDATE intro SET 
                            firstname = '$firstname', 
                            lastname = '$lastname', 
                            flex = '$flex'
                        WHERE id = 1";
    if ($connect->query($updateTextFields) === TRUE) {
        // Redirect to the page after successful update
        header("Location: dashboard.php?updateSuccess=true");
        exit();
    } else {
        // Display an error message if update fails
        echo '<div class="alert alert-danger fixed-top" role="alert">Error updating record: ' . $connect->error . '</div>';
    }
}

// Check if the form for updating skills is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    // Retrieve form data for skills
    $skill_ids = $_POST['skill_id'];
    $skill_names = $_POST['skill_name'];
    $descriptions = $_POST['description'];
    $skill_progresses = $_POST['skill_progress'];
    $skill_icons = $_POST['skill_icon'];

    // Loop through each skill to update
    foreach ($skill_ids as $key => $id) {
        $name = mysqli_real_escape_string($connect, $skill_names[$key]);
        $description = mysqli_real_escape_string($connect, $descriptions[$key]);
        $progress = mysqli_real_escape_string($connect, $skill_progresses[$key]);
        $icon = mysqli_real_escape_string($connect, $skill_icons[$key]);

        // Update skill in the database
        $sql = "UPDATE skills SET skill_name='$name', description='$description', skill_progress='$progress', skill_icon='$icon' WHERE id='$id'";
        $result = $connect->query($sql);
        if (!$result) {
            // Display error message if update fails
            echo '<div class="alert alert-danger fixed-top" role="alert">Error updating record: ' . $connect->error . '</div>';
            exit(); // Exit the script if an error occurs
        }
    }

    // Check if the update was successful
    if ($connect->query($sql) === TRUE) {
        // Redirect to the page after successful update
        header("Location: dashboard.php?updateSuccess=true");
        exit();
    }
}

// Close the database connection
$connect->close();

// Redirect to dashboard.php
header("Location: dashboard.php?updateSuccess=true");
exit();
?>
