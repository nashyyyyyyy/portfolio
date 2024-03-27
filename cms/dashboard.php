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
        <a href="#" onclick="confirmLogout();" class="text-light"><i class="fas fa-sign-out-alt"></i><br>Logout</a>
    </div>

    <div class="main frosted-bg text-warning">
        <img src="../img/NAS_nobg.png" alt="Logo" width="50" height="50" class="d-inline-block  ml-2 "> CONTENT MANAGEMENT SYSTEM <span class="text-secondary float-right mt-2 mr-2 d-none d-sm-inline">Welcome, <span class="text-warning"><?php echo $_SESSION['username']; ?>!</span></span>
    </div>

    <section id="dashboard" class="section position-relative overflow-hidden mx-auto mt-3" style="max-width: 85%; border-radius:10px">
        <div class="overlay"></div>
        <div class="container section-content v-center">
            <div class="row">
                <div class="col-md-12 text-dark">
                    <h5 class="text-warning text-left">DASHBOARD</h5>
                    
                        
                </div>
            </div>
        </div>
    </section>

    <section id="dashboard" class="section position-relative overflow-hidden mx-auto mt-3" style="max-width: 85%; border-radius:10px">
      
        <div class="container section-content v-center">
            <div class="row">
                <div class="col-md-12 text-dark">
                <div class="card text-center">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link active text-success" href="#">Active</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#">Disabled</a>
                        </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">SKILLS</h5>
                        <p class="card-text"></p>
                        <a href="#" class="btn btn-warning">Save changes</a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="dashboard" class="section position-relative overflow-hidden mx-auto mt-3" style="max-width: 85%; border-radius:10px">
       
        <div class="container section-content v-center">
            <div class="row">
                <div class="col-md-12 text-dark">
                <div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a class="nav-link active text-success" href="#">Active</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul>
  </div>
  <div class="card-body">
    <h5 class="card-title">PROJECTS</h5>
    <p class="card-text"></p>
    <a href="#" class="btn btn-warning">Save changes</a>
  </div>
</div>
                </div>
            </div>
        </div>
    </section>

    <section id="dashboard" class="section position-relative overflow-hidden mx-auto mt-3" style="max-width: 85%; border-radius:10px">
       
        <div class="container section-content v-center">
            <div class="row">
                <div class="col-md-12 text-dark">
                <div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a class="nav-link active text-success" href="#">Active</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul>
  </div>
  <div class="card-body">
    <h5 class="card-title">ABOUT</h5>
    <p class="card-text"></p>
    <a href="#" class="btn btn-warning">Save changes</a>
  </div>
</div>
                </div>
            </div>
        </div>
    </section>

    <section id="content-management" class="section">
        
    </section>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
    function confirmLogout() {
        var confirmation = confirm("Are you sure you want to log out?");
        if (confirmation) {
            window.location.href = "logout.php"; // Redirect to logout.php if confirmed
        } else {
            // Do nothing if canceled
        }
    }
</script>
</body>
</html>
