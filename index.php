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

  <section id="skills" class="section bg-dark-transparent mt-5">

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
          <p>I aspire to become a software engineer, crafting innovative solutions to complex problems and contributing to the advancement of technology. I'm passionate about learning new technologies and continuously improving my skills.
            Overall, software engineer is just so cool to hear 
          </p>
          <p>One cool thing about me is, I am into the Minimalist lifestyle and it applies to all of the things that I do including this Portfolio, I am just amazed on how relaxing and pleasing minimalism is, thus changing my perspective on everything.</p>
          

        </div>
      </div>
    </div>
</section>
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