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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
 
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
    <div class="container">
      <a class="navbar-brand" href="login.php">
        <img src="img/nas_nobg.png" alt="Logo" width="50" height="50" class="d-inline-block align-top">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menubar" aria-controls="menubar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
  
      <div class="collapse navbar-collapse" id="menubar">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link text-warning" href="#">HOME</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="#">ABOUT</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="#">CONTACT</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="#">ACCOUNT</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <section>
          <div>
            <img src="img/mypic.png" width="500" height="550" alt="My Picture">
          </div>
        </section>
      </div>
      <div class="col-md-6 d-none d-md-block" style="margin-top: 100px;">
        <h1>NASAR SAABDULA</h1>
        <h6 class="text-warning">Full Stack Web Developer</h6>
        <button class="btn btn-dark btn-sm">Get to know me  &#11206;</button>
      </div>
    </div>
  </div>

  <section class="">
    <h1>HELLO</h1>
  </section>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>