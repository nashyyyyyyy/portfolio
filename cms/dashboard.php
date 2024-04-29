<?php
session_start();
include '../server.php';

// Check if the user is not logged in
if (!isset($_SESSION['username'])) {
    // Redirect to the login page
    header("Location: login.php");
    exit(); // Stop further execution
}

// Continue with your dashboard.php content
?>

<?php
// Include the database connection file
include '../server.php';

// Fetch the logo path from the intro table
$sql = "SELECT logo FROM intro WHERE id = 1";
$result = $connect->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $logoPath = $row["logo"];
} else {
    // If no logo is found, set a default path
    $logoPath = "../img/nas.png";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo $logoPath; ?>">
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" >
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
</head>
<style>
    .custom-alert {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    padding: 15px;
    background-color: #4CAF50; /* Green */
    color: white;
    text-align: center;
    z-index: 9999; /* Ensure it's on top of other elements */
}
/* Style for fixed alerts */
.fixed-alert {
    position: fixed;
    top: 0;
    left: 50%;
    transform: translateX(-50%);
    z-index: 9999;
    width: 100%;
}
</style>
<body>
    <div class="sidenav bg-dark text-center">
        <img src="<?php echo $logoPath; ?>" width="50" height="50">
        <a href="#intro" class="text-light"><i class="fas fa-home"></i><br>Intro</a>
        <a href="#skills" class="text-light"><i class="fas fa-atom"></i><br>Skills</a>
        <a href="#projects" class="text-light"><i class="fas fa-tools"></i><br>Projects</a>
        <a href="#about" class="text-light"><i class="fas fa-info-circle"></i><br>About</a>
        <a href="#" onclick="openLogoutModal()" class="text-light"><i class="fas fa-sign-out-alt"></i><br>Logout</a>
    </div>
    <!-- Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="logoutModalLabel">Confirm Log Out</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to log out?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary text-sm" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary text-sm" onclick="logout()">Log Out</button>
      </div>
    </div>
  </div>
</div>
    <div class="main frosted-bg text-warning">  
        <img src="../img/NAS_nobg.png" alt="Logo" width="50" height="50" class="d-inline-block  ml-2 "> CONTENT MANAGEMENT SYSTEM <span class="text-secondary float-right mt-2 mr-2 d-none d-sm-inline">Welcome, <span class="text-warning"><?php echo $_SESSION['username']; ?>!</span></span>
    </div>



<!-- Modal -->
<div class="modal fade" id="messagesModal" tabindex="-1" aria-labelledby="messagesModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="messagesModalLabel">Messages</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Your existing messages section without the card -->
                <div class="container mt-3">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <section id="dashboard" class="section position-relative overflow-hidden mx-auto" style="max-width: 83%; border-radius:10px">
                                <h5 class="card-title">MESSAGES</h5>
                                <form method="POST" action="delete_query.php">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Message</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // Include your database connection file
                                            include '../server.php';

                                            // Retrieve data from the message table
                                            $sql = "SELECT id, name, email, message FROM message";
                                            $result = $connect->query($sql);

                                            if ($result->num_rows > 0) {
                                                // Output data of each row
                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<tr>";
                                                    echo "<td><input type='checkbox' name='message_ids[]' value='" . $row["id"] . "'></td>";
                                                    echo "<td>" . $row["name"] . "</td>";
                                                    echo "<td>" . $row["email"] . "</td>";
                                                    echo "<td>" . $row["message"] . "</td>";
                                                    echo "</tr>";
                                                }
                                            } else {
                                                echo "<tr><td class='text-center' colspan='4'>No messages found</td></tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <div class="card-footer">
                                        <?php
                                        // Check if there are messages to display
                                        $sql_count = "SELECT COUNT(*) AS message_count FROM message";
                                        $result_count = $connect->query($sql_count);
                                        $row_count = $result_count->fetch_assoc();
                                        $message_count = $row_count['message_count'];

                                        if ($message_count > 0) {
                                            // Display the delete button
                                            echo '<button type="submit" class="btn btn-danger" name="delete_messages">Delete</button>';
                                        }
                                        ?>
                                    </div>
                                </form>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Output message count for troubleshooting -->
<?php echo "Message count: " . $messageCount; ?>

<div class="fixed-bottom d-flex justify-content-end mr-3 mb-3">
    <button type="button" class="btn btn-warning text-light" data-toggle="modal" data-target="#messagesModal">Messages
        <?php
            // Include your database connection file
            include '../server.php';

            // Query to fetch message count
            $sql_count = "SELECT COUNT(*) AS message_count FROM message";
            $result_count = $connect->query($sql_count);
            $row_count = $result_count->fetch_assoc();
            $messageCount = $row_count['message_count'];

            // Check if there are messages
            if ($messageCount > 0) {
                echo '<script src="https://cdn.lordicon.com/lordicon.js"></script>';
                echo '<lord-icon
                        id="notificationIcon"
                        src="https://cdn.lordicon.com/lznlxwtc.json"
                        trigger="loop"
                        state="loop-bell"
                        colors="primary:#ffffff"
                        style="width:20px;height:20px">
                      </lord-icon>';
                echo '<span class="badge badge-pill badge-danger ml-1">' . $messageCount . '</span>';
            }
        ?>
    </button>
</div>

<?php
// Fetch intro data from the database
$sql = "SELECT * FROM intro";
$result = $connect->query($sql);

// Check if intro data exists
if ($result->num_rows > 0) {
    // Fetch intro data and assign values to variables
    $row = $result->fetch_assoc();
    $savedLogo = $row['logo'];
    $savedIntroImg = $row['intro_img'];
    $firstName = $row['firstname'];
    $lastName = $row['lastname'];
    $flex = $row['flex'];
}
?>

<div class="row">
    <div class="col-md-12 mb-3">
        <section id="intro" class="section position-relative overflow-hidden mx-auto" style="max-width: 83%; border-radius:10px">
            <div class="card text-center" style="height: 595px;">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="#" id="intro">Intro</a>
                        </li>
                        <!-- You can add buttons or other controls here if needed -->
                    </ul>
                </div>
                <div class="card-body overflow-auto" style="font-size: 0.8rem;">
              
                                    <form method="post" id="introForm" action="update_query.php" enctype="multipart/form-data">
                    <!-- First row: logo and intro_img -->
                    <div class="form-row mb-3">
                        <div class="form-group col-md-6">
                            <label for="logo">Logo</label><br>
                            <!-- Display saved logo image -->
                            <img id="logoPreview" src="<?php echo $savedLogo; ?>" alt="Logo" width="100"><br>
                            <!-- Display input field for uploading new logo image -->
                            <input type="file" class="form-control-file mt-2" id="logo" name="logo" onchange="previewImage('logo', 'logoPreview')">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="introImg">Intro Image</label><br>
                            <!-- Display saved intro image -->
                            <img id="introImgPreview" src="<?php echo $savedIntroImg; ?>" alt="Intro Image" width="100"><br>
                            <!-- Display input field for uploading new intro image -->
                            <input type="file" class="form-control-file mt-2" id="introImg" name="intro_img" onchange="previewImage('introImg', 'introImgPreview')">
                        </div>
                    </div>
                    <!-- Second row: firstname and lastname -->
                    <div class="form-row mb-3">
                        <div class="form-group col-md-6">
                            <label for="firstname">First Name</label>
                            <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $firstName; ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="lastname">Last Name</label>
                            <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $lastName; ?>">
                        </div>
                    </div>
                    <!-- Third row: flex and socmed -->
                    <div class="form-row mb-3">
                        <div class="form-group col-md-6">
                            <label for="flex">Expertise</label>
                            <input type="text" class="form-control" id="flex" name="flex" value="<?php echo $flex; ?>">
                            
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary" name="updateIntro">Update</button>
                </form>
                </div>
                <div class="card-footer">
                    <!-- Add any additional footer content here -->
                </div>
            </div>
        </section>
    </div>
</div>








<div class="row">
    <div class="col-md-12 mb-3">
        <section id="skills" class="section position-relative overflow-hidden mx-auto" style="max-width: 83%; border-radius:10px">
            <div class="card text-center" style="height: 595px;">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="#" id="skills">Skills</a>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addskillmodal">+</button>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <form method="post" action="update_query.php">
                        <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Progress</th>
                                        <th>Icon</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Fetch skills data from the database
                                    $sql = "SELECT * FROM skills ORDER BY id ASC"; // Order by ID in ascending order
                                    $result = $connect->query($sql);

                                    // Check if there are any skills
                                    if ($result->num_rows > 0) {
                                        // Loop through each skill and display it in a form with input fields
                                        while ($row = $result->fetch_assoc()) {
                                            echo '<tr>';
                                            echo '<td><input type="text" class="form-control" name="skill_name[]" value="' . $row['skill_name'] . '"></td>';
                                            echo '<td><input type="text" class="form-control" name="description[]" value="' . $row['description'] . '"></td>';
                                            echo '<td><input type="text" class="form-control" name="skill_progress[]" value="' . $row['skill_progress'] . '"></td>';
                                            echo '<td><input type="text" class="form-control" name="skill_icon[]" value="' . $row['skill_icon'] . '"></td>';
                                            // Add a hidden input field for the skill ID
                                            echo '<input type="hidden" name="skill_id[]" value="' . $row['id'] . '">';
                                            echo '<td>';
                                            echo '<button type="submit" class="btn btn-primary btn-user btn-sm" name="update">Update</button>';
                                            echo '<a href="delete_query.php?delete_id=' . $row['id'] . '" class="btn btn-danger btn-user btn-sm">Delete</a>';
                                            echo '</td>';
                                            echo '</tr>';
                                        }
                                    } else {
                                        // If no skills found, display a message
                                        echo '<tr><td colspan="5">No skills found.</td></tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <!-- Remove any additional footer content here -->
                </div>
            </div>
        </section>
    </div>
</div>







<!-- Modal -->
<div class="modal fade" id="addskillmodal" tabindex="-1" role="dialog" aria-labelledby="addSkillModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addSkillModalLabel">Add Skill</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="insert_query.php">
                    <div class="form-group">
                        <label for="skill_name">Skill Name</label>
                        <input type="text" class="form-control" id="skill_name" name="skill_name" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="skill_progress">Skill Progress</label>
                        <input type="number" class="form-control" id="skill_progress" name="skill_progress" min="0" max="100">
                    </div>
                    <div class="form-group">
                        <label for="skill_icon">Skill Icon</label>
                        <input type="text" class="form-control" id="skill_icon" name="skill_icon">
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit" value="Add Skill">Add Skill</button>
                </form>
            </div>
        </div>
    </div>
</div>










<?php
// Connect to your database (Replace these variables with your actual database credentials)
include '../server.php';

// Function to fetch project data by ID
function fetchProjectData($projectId, $connect) {
    $sql = "SELECT * FROM projects WHERE id = $projectId";
    $result = $connect->query($sql);

    // Check if there is existing data
    if ($result->num_rows > 0) {
        // Fetch data and assign it to variables
        $row = $result->fetch_assoc();
        $id = $row["id"];
        $project_name = $row["project_name"];
        $description = $row["description"];
        $link = $row["link"];
    } else {
        // If no existing data found, set variables to empty strings
        $id = "";
        $project_name = "";
        $description = "";
        $link = "";
    }

    return array(
        'id' => $id,
        'project_name' => $project_name,
        'description' => $description,
        'link' => $link
    );
}

// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

// Define the project ID
$projectId = isset($_GET['project_id']) ? $_GET['project_id'] : 1; // Default to project 1 if no project ID is specified

// Fetch project data based on project ID
$projectData = fetchProjectData($projectId, $connect);

// Close connection
?>

<div class="row">
    <div class="col-md-12 mb-3">
        <section id="projects" class="section position-relative overflow-hidden mx-auto" style="max-width: 83%; border-radius:10px">
            <div class="card text-center" style="height: auto;">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <?php
                        // Query to fetch all project IDs
                        $sql = "SELECT id FROM projects";
                        $result = $connect->query($sql);

                        // Check if there are any projects
                        if ($result->num_rows > 0) {
                            // Fetch each project ID and create a tab for it
                            while ($row = $result->fetch_assoc()) {
                                $projectId = $row['id'];
                                echo '<li class="nav-item">';
                                echo '<a class="nav-link' . ($projectId == $projectData['id'] ? ' active' : '') . '" data-target="#project' . $projectId . '" data-toggle="tab" href="#">Project ' . $projectId . '</a>';
                                echo '</li>';
                            }
                        }
                        ?>
                        <li class="nav-item">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addProjectModal">+</button>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <?php
                        // Fetch project data for each project and create a tab-pane for it
                        $result->data_seek(0); // Reset result set to the beginning
                        while ($row = $result->fetch_assoc()) {
                            $projectId = $row['id'];
                            $projectDataItem = fetchProjectData($projectId, $connect); // Rename variable to avoid overwriting
                            echo '<div id="project' . $projectId . '" class="tab-pane fade' . ($projectId == $projectDataItem['id'] ? ' show active' : '') . '">';

                            echo '<form method="post" action="update_query.php">';
                            echo '<input type="hidden" name="id" value="' . $projectDataItem['id'] . '">';
                            echo '<div class="form-group">';
                            echo '<label for="project_name">Project Name</label>';
                            echo '<input type="text" class="form-control" id="project_name" name="project_name" value="' . $projectDataItem['project_name'] . '" required>';
                            echo '</div>';
                            echo '<div class="form-group">';
                            echo '<label for="description">Description</label>';
                            echo '<textarea class="form-control" id="description" name="description" rows="3" required>' . $projectDataItem['description'] . '</textarea>';
                            echo '</div>';
                            echo '<div class="form-group">';
                            echo '<label for="link">Link of the project</label>';
                            echo '<input type="text" class="form-control" id="link" name="link" value="' . $projectDataItem['link'] . '" required>';
                            echo '</div>';
                            echo '<button type="submit" class="btn btn-primary" name="updateProjects">Update</button>';
                            echo '<a href="delete_query.php?project_id=' . $projectId . '" class="btn btn-danger" id="deleteProject' . $projectId . '">Delete</a>';
                            echo '</form>';

                            

                            echo '</div>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>






<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Hide all tab panes initially
        $('.tab-pane').addClass('d-none');

        // Show the active tab content
        $('.nav-link.active').each(function() {
            $($(this).attr('data-target')).removeClass('d-none');
        });

        // Show tab content when a tab is clicked
        $('.nav-link').on('click', function() {
            // Hide all tab panes
            $('.tab-pane').addClass('d-none');

            // Show the tab pane associated with the clicked tab
            $($(this).attr('data-target')).removeClass('d-none');
        });
    });
</script>




<!-- Modal for adding new project -->
<div class="modal fade" id="addProjectModal" tabindex="-1" role="dialog" aria-labelledby="addProjectModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProjectModalLabel">Add New Project</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form for adding new project -->
   <form method="post" id="addProjectForm" action="insert_query.php">
    <div class="form-group">
        <label for="new_project_name">Project Name</label>
        <input type="text" class="form-control" id="new_project_name" name="new_project_name" required>
    </div>
    <div class="form-group">
        <label for="new_description">Description</label>
        <textarea class="form-control" id="new_description" name="new_description" rows="3" required></textarea>
    </div>
    <div class="form-group">
        <label for="new_link">Link of the project</label>
        <input type="text" class="form-control" id="new_link" name="new_link" required>
    </div>
    <button type="submit" class="btn btn-primary" name="addProject">Add Project</button>
</form>


            </div>
        </div>
    </div>
</div>










    <div class="row justify-content-center">
    <div class="col-md-10 mb-3">
        <section id="about" class="section position-relative overflow-hidden mx-auto" style="border-radius:10px">
            <div class="card text-center">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">About</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <h5 class="card-title">BASIC INFORMATION</h5>
                    <form  method="post" action="update_query.php">
                        <input type="hidden" name="record_id" value="<?php echo $row['id']; ?>"> 
                        <div class="table-responsive">
                            <table class="table table-bordered">
                          
                                <tbody>
                                    <?php
                                    // Include your database connection file
                                    include '../server.php';

                                    // Retrieve data from the basic_info table
                                    $sql = "SELECT * FROM basic_info";
                                    $result = $connect->query($sql);

                                    if ($result->num_rows > 0) {
                                        // Output data of each row
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>Full Name</td><td><input type='text' value='{$row['fullname']}' class='form-control' name='fullname'></td>";
                                            echo "</tr>";
                                            echo "<tr>";
                                            echo "<td>Email</td><td><input type='text' value='{$row['email']}' class='form-control' name='email'></td>";
                                            echo "</tr>";
                                            echo "<tr>";
                                            echo "<td>Contact</td><td><input type='text' value='{$row['contact']}' class='form-control' name='contact'></td>";
                                            echo "</tr>";
                                            echo "<tr>";
                                            echo "<td>Education</td><td><input type='text' value='{$row['education']}' class='form-control' name='education'></td>";
                                            echo "</tr>";
                                            echo "<tr>";
                                            echo "<td>Address</td><td><input type='text' value='{$row['address']}' class='form-control' name='address'></td>";
                                            echo "</tr>";
                                            echo "<tr>";
                                            echo "<td>Hobby</td><td><input type='text' value='{$row['hobby']}' class='form-control' name='hobby'></td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='2'>No data available</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" name="updateBasicInfo">Update</button>
       
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>







    <section id="content-management" class="section">
        
    </section>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

 <script>
  function openLogoutModal() {
    $('#logoutModal').modal('show');
  }

  function logout() {
    window.location.href = "logout.php";
  }
</script>
<script>
    // Function to show the success alert
function showSuccessAlert(message) {
    var alertDiv = document.getElementById('customAlert');
    alertDiv.style.backgroundColor = '#4CAF50'; // Green background color
    alertDiv.style.color = 'white'; // White text color
    alertDiv.innerHTML = message;
    alertDiv.style.display = 'block'; // Display the alert

    // Set timeout to hide the alert after 3 seconds
    setTimeout(function() {
        alertDiv.style.display = 'none';
    }, 3000); // 3000 milliseconds = 3 seconds
}

// Call the function to display the success alert with your message
showSuccessAlert('Record updated successfully');

</script>
<script>
// JavaScript to automatically hide the success or error message after 5 seconds
setTimeout(function(){
    document.querySelectorAll('.alert').forEach(function(alert){
        alert.style.display = 'none';
    });
}, 3000);
</script>

<script>
    // Function to create and style an alert message
    function createAlert(message, color) {
        const alertBox = document.createElement("div");
        alertBox.classList.add("alert", "fixed-top");
        alertBox.textContent = message;
        alertBox.style.backgroundColor = color;
        alertBox.style.color = "#fff";
        alertBox.style.padding = "10px";
        alertBox.style.textAlign = "center";
        alertBox.style.position = "fixed";
        alertBox.style.top = "50%";
        alertBox.style.left = "50%";
        alertBox.style.transform = "translate(-50%, -50%)";
        alertBox.style.zIndex = "9999";
        document.body.appendChild(alertBox);
        
        // Hide the alert after 2 seconds
        setTimeout(function() {
            alertBox.style.display = "none";
        }, 2000); // 2000 milliseconds = 2 seconds
    }

    // Check if there is a success message in the URL
    const urlParams = new URLSearchParams(window.location.search);
    const updateSuccess = urlParams.get('updateSuccess');
    const addSuccess = urlParams.get('addSuccess');
    const deleteSuccess = urlParams.get('deleteSuccess');

    // Show alert for update success
    if (updateSuccess === 'true') {
        createAlert("Updated successfully!", "#28a745");
    }

    // Show alert for add success
    if (addSuccess === 'true') {
        createAlert("Added successfully!", "#28a745");
    }

    // Show alert for delete success
    if (deleteSuccess === 'true') {
        createAlert("Deleted successfully!", "#dc3545");
    }
</script>


<script>
    function previewImage(input, preview) {
        var fileInput = document.getElementById(input);
        var previewImage = document.getElementById(preview);

        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                previewImage.src = e.target.result;
            }

            reader.readAsDataURL(fileInput.files[0]);
        }
    }
</script>


</body>
</html>
