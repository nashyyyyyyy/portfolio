<?php
include 'server.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <link rel="shortcut icon" type="image/x-icon" href="img/nas.png">
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
    
    // Validate form data (you can add more validation if needed)
    if (empty($name) || empty($email) || empty($message)) {
        echo "All fields are required";
        exit;
    }

    // Check connection
    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
    }

    // Prepare SQL query
    $sql = "INSERT INTO message (name, email, message) VALUES ('$name', '$email', '$message')";

    // Execute SQL query
    if ($connect->query($sql) === TRUE) {
      echo "<div id='successMessage' class='success'>Message inserted successfully</div>";
    } else {
        echo "Error inserting message: " . $connect->error;
    }

    // Close database connection
    $connect->close();
}
?>
<script>
// Remove success message after 3 seconds
setTimeout(function(){
    var successMessage = document.getElementById('successMessage');
    if(successMessage){
        successMessage.style.display = 'none';
    }
}, 3000);
</script>

<style>
/* Style for success message */
.success {
    background-color: #d4edda;
    border-color: #c3e6cb;
    color: #155724;
    padding: 10px;
    margin-top: 10px;
    border: 1px solid transparent;
    border-radius: .25rem;
    text-align:center;
    font-size:15px;
}
/* Style for error message */
.error {
    background-color: #f8d7da;
    border-color: #f5c6cb;
    color: #721c24;
    padding: 10px;
    margin-top: 10px;
    border: 1px solid transparent;
    border-radius: .25rem;
    text-align:center;
    font-size:15px;
}
.about-text {
    background-color: rgba(255, 255, 255, 0.1);
    padding: 20px;
    border-radius: 10px;
    margin-bottom: 20px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
}

.about-text p {
    font-size: 16px;
    line-height: 1.6;
    color: #ffffff;
}
</style>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-transparent" id="home">
    <div class="container">
      <a class="navbar-brand" href="cms/login.php">
        <img src="img/nas_logo.png" alt="Logo" width="50" height="50" class="d-inline-block align-top">
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
              <img src="img/mypic.png" width="500" height="550" alt="My Picture">
          </div>
      </section>

      <hr class="solid-break-line d-none d-md-block">
      </div>
      <div class="col-md-6" style="margin-top: 100px;">
        <h1 class="text-warning" style="text-shadow: 3px 3px 3px black;">NASAR</h1> <h1 class="text-light" style="text-shadow: 3px 3px 3px black;">SAABDULA</h1>
        <h6 class="text-light" style="text-shadow: 3px 3px 3px black;">Full Stack Web Developer</h6>
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
      <div class="modal-body">
        <form method="post" >
          <div class="form-group">
            <label for="name">Your Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
          </div>
          <div class="form-group">
            <label for="email">Your Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="form-group">
            <label for="message">Message</label>
            <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
          </div>
          <div class="text-right">
         
          <input type="submit" class="btn btn-primary" value="Submit">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
      
      
    
    </div>
  </div>
</div>


  <div style="margin-top:-100px">
  <section id="skills" class="section bg-dark-transparent">

    <div class="container section-content v-center">
      <div class="row">
        <div class="col-md-12 text-white text-center">
          <h2 class="text-warning">SKILLS</h2>
          <h3> Front-end expertise </h3>
          <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">HTML</div>
          </div>
          <br>
          <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">CSS</div>
          </div>
          <br>
          <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: 30%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">JavaScript</div>
          </div>
          <br>
          <h3> Back-end expertise </h3>
          <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">PHP</div>
          </div>
          <br>
          <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">PYTHON</div>
          </div>
          <br>
          <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: 30%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">MYSQL</div>
          </div>
        </div>
      </div>
    </div>
</section>

<section id="projects" class="section bg-dark-transparent mt-5">
    <div class="container section-content v-center">
      <div class="row">
        <h2 class="text-warning text-center">PROJECTS</h2>
        <div class="col-md-4">
          
          <div class="card text-white bg-success mb-3">
            <div class="card-header">PC kart</div>
            <div class="card-body">
              <h5 class="card-title">e-Commerce website</h5>
              <p class="card-text">I am one of the developer of the PC kart which is my first e-Commerce project.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card text-white bg-danger mb-3">
            <div class="card-header">AOFRS</div>
            <div class="card-body">
              <h5 class="card-title">Software Engineering Project</h5>
              <p class="card-text">I am one of the programmer of the Administrative Office Management System for the Admin of Western Mindanao State University.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card text-white bg-primary mb-3">
            <div class="card-header">VAXSPACE</div>
            <div class="card-body">
              <h5 class="card-title">Capstone Project</h5>
              <p class="card-text">I am the developer of the capstone project that is still in progress.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<section id="about" class="section bg-dark-transparent mt-5">
    <div class="container section-content v-center">
        <div class="row">
            <div class="col-md-12 text-white">
                <h2 class="text-warning text-center">ABOUT ME</h2>
                <div class="about-content">
                    <?php 
                    // Include your database connection file
                    include 'server.php';
                    
                    
                    // Query to fetch data from the "basic-info" table
                    $basic_info_sql = "SELECT * FROM basic_info";
                    $basic_info_result = $connect->query($basic_info_sql);
                    
                    if ($basic_info_result->num_rows > 0) {
                        // Output data of each row
                        while($basic_info_row = $basic_info_result->fetch_assoc()) {
                            // Display basic info data here
                            echo "<table class='table table-bordered'>";
                           
                            echo "<tr><th>Full Name</th><td>{$basic_info_row['fullname']}</td></tr>";
                            echo "<tr><th>Email</th><td>{$basic_info_row['email']}</td></tr>";
                            echo "<tr><th>Contact</th><td>{$basic_info_row['contact']}</td></tr>";
                            echo "<tr><th>Education</th><td>{$basic_info_row['education']}</td></tr>";
                            echo "<tr><th>Address</th><td>{$basic_info_row['address']}</td></tr>";
                            echo "<tr><th>Hobby</th><td>{$basic_info_row['hobby']}</td></tr>";
                            echo "<tr><th>About me</th><td>{$basic_info_row['content']}</td></tr>";
                            echo "</table>";
                        }
                    } else {
                        echo "No basic info found";
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



</body>
</html>

