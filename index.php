<?php
include 'server.php';
?>

<?php
// Include the database connection file
include 'server.php';

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
    <title>Portfolio</title>
    <link rel="shortcut icon" type="image/x-icon" href="cms/<?php echo $logoPath; ?>">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" >
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<?php
include 'server.php'; // Include your database connection file

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $contact = $_POST['contact']; // New field
    $socmed = $_POST['socmed']; // New field
    

    // Check connection
    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
    }

    // Prepare SQL query
    $sql = "INSERT INTO message (name, email, contact, socmed, message) VALUES ('$name', '$email', '$contact', '$socmed', '$message')";

    // Execute SQL query
    if ($connect->query($sql) === TRUE) {
        echo "<div id='successMessage' class='centered alert success'>Message inserted successfully</div>";
    } else {
        echo "<div id='errorMessage' class='centered alert error'>Error inserting message: " . $connect->error . "</div>";
    }

    // Close database connection
    $connect->close();
}
?>




<style>
.alert {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 15px;
            border-radius: 5px;
            z-index: 1000; /* Ensure the alerts are displayed above other content */
        }

        /* Style for error message */
        .alert.error {
            background-color: #f44336; /* Red color for error */
            color: white;
        }

        /* Style for success message */
        .alert.success {
            background-color: #4CAF50; /* Green color for success */
            color: white;
        }



.about-text p {
    font-size: 16px;
    line-height: 1.6;
    color: #ffffff;
}
</style>
<body>
<?php
// Check for error message in URL
if (isset($_GET['error'])) {
    // Display error message
    echo "<div class='alert error'>" . $_GET['error'] . "</div>";
}

// Check for success message in URL
if (isset($_GET['success'])) {
    // Display success message
    echo "<div class='alert success'>" . $_GET['success'] . "</div>";
}
?>
<?php
// Include the database connection file
include '../server.php';

// Fetch all columns from the intro table
$sql = "SELECT * FROM intro WHERE id = 1"; // Adjust the WHERE clause as needed
$result = $connect->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Extracting all column values
    $logoPath = $row["logo"];
    $introImgPath = $row["intro_img"];
    $firstname = $row["firstname"];
    $lastname = $row["lastname"];
    $flex = $row["flex"];
    $socmed = $row["socmed"];
} else {
    // If no data is found, set default values or handle accordingly
    $logoPath = "img/nas_logo.png"; // Adjust the default logo path as needed
    $introImgPath = "img/mypic.png"; // Adjust the default intro_img path as needed
    $firstname = "No data"; // Default firstname
    $lastname = "No data"; // Default lastname
    $flex = "No data"; // Default flex value
    $socmed = "No data"; // Default social media value
}
?>
 <div id="alertContainer"></div>
  <nav class="navbar navbar-expand-lg navbar-light bg-transparent" id="home">
    <div class="container">
      <a class="navbar-brand" href="cms/login.php">
        <img src="cms/<?php echo $logoPath; ?>" alt="Logo" width="50" height="50" class="d-inline-block align-top">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menubar" aria-controls="menubar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
  
      <div class="collapse navbar-collapse" id="menubar">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link text-warning" href="#home">HOME</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="#skills" id="myLink">SKILLS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="#projects">PROJECTS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="#about" >ABOUT ME</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link text-light" data-toggle="modal" data-target="#exampleModalCenter">MESSAGE ME</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
      <section>
          <div class="d-none d-md-block">
              <img src="cms/<?php echo $introImgPath; ?>" width="500" height="550" alt="My Picture">
          </div>
      </section>

      <hr class="solid-break-line d-none d-md-block">
      </div>
      <div class="col-md-6" style="margin-top: 100px;">
        <h1 class="text-warning" style="text-shadow: 3px 3px 3px black;"><?php echo $firstname; ?></h1> <h1 class="text-light" style="text-shadow: 3px 3px 3px black;"><?php echo $lastname; ?></h1>
        <h6 class="text-light" style="text-shadow: 3px 3px 3px black;"><?php echo $flex; ?></h6>
        <div class="dropdown">
        <button class="btn btn-dark btn-sm dropdown-toggle" type="button" id="socialDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Connect with me
        </button>
           
        <div class="dropdown-menu" aria-labelledby="socialDropdown">
            <a class="dropdown-item" href="https://www.facebook.com/nasar.saabdula" target="_blank"><i class="fab fa-facebook-f"></i> Facebook</a>
            <a class="dropdown-item" href="https://www.instagram.com/nashy.io" target="_blank"><i class="fab fa-instagram"></i> Instagram</a>
            <a class="dropdown-item" href="https://github.com/nashyyyyyyy" target="_blank"><i class="fab fa-github"></i> GitHub</a>
            <a class="dropdown-item" href="mailto:mrrious26@gmail.com" target="_blank"><i class="fab fa-google"></i> Gmail</a>
        </div>
    </div>

      </div>
    </div>
  </div>

  <div class="sidenav bg-dark text-center d-none d-md-block">
        <img src="cms/<?php echo $logoPath; ?>" width="55" height="55" alt="Logo">
        <a href="#home" class="text-light"><i class="fas fa-home"></i><br>Home</a>
        <a href="#skills" class="text-light"><i class="fas fa-atom"></i><br>Skills</a>
        <a href="#projects" class="text-light"><i class="fas fa-tools"></i><br>Projects</a>
        <a href="#about" class="text-light"><i class="fas fa-info-circle"></i><br>About</a>
  </div>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Messaging Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="padding: 15px;">
       <form method="post" action="message.php">
            <div class="form-group">
                <label for="name">Your Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Your Email <span class="text-danger">*</span></label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="contact">Contact Number</label>
                <input type="text" class="form-control" id="contact" name="contact" >
            </div>
            <div class="form-group">
                <label for="socmed">Social Media</label>
                <input type="text" class="form-control" id="socmed" name="socmed" >
            </div>
            <div class="form-group">
                <label for="message">Message <span class="text-danger">*</span></label>
                <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
            </div>
            <div class="text-right">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
        </form>

      </div>
    </div>
  </div>
</div>

      
      
    
    </div>
  </div>
</div>


<section id="skills" class="section bg-dark-transparent">
    <div class="container section-content v-center">
        <div class="row">
            <div class="col-md-12 text-white text-center">
                <h2 class="text-warning">SKILLS</h2>
            </div>
            <div class="col-md-12" style="color: #fff; padding: 5px; min-height: 70vh; background-color: rgba(163, 163, 163, 0.5); border-radius: 10px; box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.5);">
                <?php
                // Include the server.php file
                include 'server.php';

                // Perform a query to fetch skills data
                $sql = "SELECT * FROM skills ORDER BY id ASC";
                $result = mysqli_query($connect, $sql);

                // Check if there are any skills
                if (mysqli_num_rows($result) > 0) {
                    // Loop through each skill and output the skill name, description, icon, and progress
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<div class="row align-items-center">';
                        echo '<div class="col-md-6">';
                        echo '<h4><i class="' . $row["skill_icon"] . '"></i> ' . $row["skill_name"] . '</h4>';
                        echo '<p>' . $row["description"] . '</p>';
                        echo '</div>'; // Close col-md-6
                        echo '<div class="col-md-6">';
                        echo '<div class="progress">';
                        echo '<div class="progress-bar" role="progressbar" style="width: ' . $row["skill_progress"] . '%" aria-valuenow="' . $row["skill_progress"] . '" aria-valuemin="0" aria-valuemax="100">' . $row["skill_progress"] . '%</div>';
                        echo '</div>'; // Close progress
                        echo '</div>'; // Close col-md-6
                        echo '</div>'; // Close row
                    }
                } else {
                    echo "No skills found.";
                }
                ?>
            </div>
        </div>
    </div>
</section>

<?php

function random_color() {
    return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
}

include '../server.php';

$sql = "SELECT project_name, description, link, id FROM projects";
$result = $connect->query($sql);
?>

<section id="projects" class="section bg-dark-transparent mt-5">
    <div class="container section-content v-center">
        <div class="row">
            <h2 class="text-warning text-center">PROJECTS</h2>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    
                    $random_color = random_color();

                    echo '<div class="col-md-4">';
                    echo '<div class="card text-white mb-3 project-card" style="background-color: ' . $random_color . ';" data-project-id="' . $row["id"] . '" data-toggle="modal" data-target="#projectModal" data-project-name="' . $row["project_name"] . '" data-description="' . $row["description"] . '" data-link="' . $row["link"] . '">';
                    echo '<div class="card-header">' . $row["project_name"] . '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<p class="text-center text-warning">No projects found.</p>';
            }
            ?>
        </div>
    </div>
</section>


<div class="modal fade" id="projectModal" tabindex="-1" role="dialog" aria-labelledby="projectModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="projectModalLabel">Project Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="projectModalBody">
                <!-- Project details will be loaded here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var projectCards = document.querySelectorAll('.project-card');
        projectCards.forEach(function(card) {
            card.addEventListener('click', function() {
                var projectName = this.getAttribute('data-project-name');
                var projectDescription = this.getAttribute('data-description');
                var projectLink = this.getAttribute('data-link');
                var modalBody = document.getElementById('projectModalBody');
                modalBody.innerHTML = '<p>Loading...</p>';
                setTimeout(function() {
                    var projectDetails = "<h5 class='modal-title'>" + projectName + "</h5>";
                    projectDetails += "<p>Description: " + projectDescription + "</p>";
                    if (projectLink) {
                        projectDetails += "<div class='embed-responsive embed-responsive-16by9'><iframe class='embed-responsive-item' src='" + projectLink + "' allowfullscreen></iframe></div>";
                    }
                    modalBody.innerHTML = projectDetails;
                }, 1000);
            });
        });
    });
</script>




<section id="about" class="section bg-dark-transparent mt-5">
    <div class="container section-content v-center">
        <div class="row">
            <div class="col-md-12 text-white" >
                <h2 class="text-warning text-center">ABOUT ME</h2>
                <div class="about-content" style="padding: 5px; min-height: 70vh; background-color: rgba(163, 163, 163, 0.5); border-radius: 10px; box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.5);">
                    <?php 
                    // Include your database connection file
                    include 'server.php';
                    
                    
                    
                    // Query to fetch data from the "basic-info" table
                    $basic_info_sql = "SELECT * FROM basic_info";
                    $basic_info_result = $connect->query($basic_info_sql);
                    
                    if ($basic_info_result->num_rows > 0) {
                        // Output data of each row
                        echo "<div class='basic-info'>";
                        while($basic_info_row = $basic_info_result->fetch_assoc()) {
                            // Display basic info data here
                            echo "<div class='basic-info-item'>";
                            echo "<p>My name is <h4>{$basic_info_row['fullname']}.</h4></p>";
                            echo "<p>I can be reached at {$basic_info_row['email']} or {$basic_info_row['contact']}.</p>";
                            echo "<p>I pursued my education in {$basic_info_row['education']}.</p>";
                            echo "<p>I currently reside at {$basic_info_row['address']}.</p>";
                            echo "<p>In my free time, I enjoy {$basic_info_row['hobby']}.</p>";
                            echo "</div>";
                        }
                        echo "</div>"; // Closing div for basic-info
                    } else {
                        echo "<p>No basic info found</p>";
                    }
                    // Query to fetch data from the "about" table
                    $about_sql = "SELECT * FROM about";
                    $about_result = $connect->query($about_sql);
                    
                    if ($about_result->num_rows > 0) {
                        // Output data of each row
                        while($about_row = $about_result->fetch_assoc()) {
                            echo "<p>'{$about_row['content']}'</p>";
                        }
                    } else {
                        echo "<p>No content found for the about section</p>";
                    }
                    // Close database connection
                    $connect->close();
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>





</div>

<footer class="text-center text-white">
    <p style="font-size:12px">&copy; 2024 NAS. All rights reserved.</p>
</footer>

<script>
    window.addEventListener('scroll', function() {
        var skillsSection = document.getElementById('skills');
        var sidenav = document.querySelector('.sidenav');

        if (isElementInViewport(skillsSection)) {
            sidenav.classList.add('sticky');
        } else {
            sidenav.classList.remove('sticky');
        }
    });

    function isElementInViewport(el) {
        var rect = el.getBoundingClientRect();
        return (
            rect.top >= 0 &&
            rect.bottom <= (window.innerHeight || document.documentElement.clientHeight)
        );
    }
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    // Remove the messages after 2 seconds
    setTimeout(function() {
        var alerts = document.querySelectorAll('.alert');
        alerts.forEach(function(alert) {
            alert.remove();
        });
    }, 2000);
</script>


</body>
</html>

