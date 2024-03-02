<?php
    session_start();
    include '../server.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="shortcut icon" type="image/x-icon" href="../img/nas.png">
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" >
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <div class="sidenav bg-dark text-center">
        <a href="#" class="text-light"><i class="fas fa-tachometer-alt"></i><br>Dash</a>
        <a href="#" class="text-light"><i class="fas fa-atom"></i><br>Skills</a>
        <a href="#" class="text-light"><i class="fas fa-tools"></i><br>Projects</a>
        <a href="#" class="text-light"><i class="fas fa-info-circle"></i><br>About</a>
        <a href="logout.php" class="text-light"><i class="fas fa-sign-out-alt"></i><br>Logout</a>
    </div>

    <div class="main frosted-bg text-warning">
        <img src="../img/NAS_nobg.png" alt="Logo" width="50" height="50" class="d-inline-block  ml-2 "> CONTENT MANAGEMENT SYSTEM <span class="text-secondary float-right mt-2 mr-2 d-none d-sm-inline">Welcome, <span class="text-warning"><?php echo $_SESSION['username']; ?>!</span></span>
    </div>

    <section id="dashboard" class="section">
        DASHBOARD
    </section>

    <section id="skills" class="section">
       SKILLS
    </section>

    <section id="projects" class="section">
       PROJECTS
    </section>

    <section id="about" class="section">
        ABOUT ME
    </section>

    <section id="content-management" class="section">
        
    </section>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
