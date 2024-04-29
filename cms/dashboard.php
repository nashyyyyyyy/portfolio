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

</style>
<body>
    <div class="sidenav bg-dark text-center">
    <a href="#dashboard" class="text-light" style="position: relative;">
    <i class="fas fa-envelope"></i>
    <?php
    // Include your database connection file
    include '../server.php';

    // Retrieve count of messages
    $sql = "SELECT COUNT(*) as count FROM message";
    $result = $connect->query($sql);
    $row = $result->fetch_assoc();
    $message_count = $row['count'];

    // Close database connection
    $connect->close();

    // Display the envelope icon and message count
    if ($message_count > 0) {
        echo "<span class='badge badge-danger badge-pill' style='position: absolute; top: -8px; right: -8px; font-size: 12px;'>$message_count</span>";
    }
    ?>
    <br>Message
</a>



        <a href="#skills" class="text-light"><i class="fas fa-atom"></i><br>Skills</a>
        <a href="#projects" class="text-light"><i class="fas fa-tools"></i><br>Projects</a>
        <a href="#about" class="text-light"><i class="fas fa-info-circle"></i><br>About</a>
        <a href="#" onclick="confirmLogout();" class="text-light"><i class="fas fa-sign-out-alt"></i><br>Logout</a>
    </div>

    <div class="main frosted-bg text-warning">  
        <img src="../img/NAS_nobg.png" alt="Logo" width="50" height="50" class="d-inline-block  ml-2 "> CONTENT MANAGEMENT SYSTEM <span class="text-secondary float-right mt-2 mr-2 d-none d-sm-inline">Welcome, <span class="text-warning"><?php echo $_SESSION['username']; ?>!</span></span>
    </div>

    <div class="container mt-3">
    <div class="row">
        <div class="col-md-12 mb-3">
            <section id="dashboard" class="section position-relative overflow-hidden mx-auto" style="max-width: 83%; border-radius:10px">
                <div class="card text-center" style="height: 590px;">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" href="#">Messages</a>
                            </li>
                           
                        </ul>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">MESSAGES</h5>
                        <table class="table">
                            <thead>
                                <tr>
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
                                $sql = "SELECT name, email, message FROM message";
                                $result = $connect->query($sql);

                                if ($result->num_rows > 0) {
                                    // Output data of each row
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $row["name"] . "</td>";
                                        echo "<td>" . $row["email"] . "</td>";
                                        echo "<td>" . $row["message"] . "</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='3'>No messages found</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>


                   
                </div>
            </section>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 mb-3">
            <section id="skills" class="section position-relative overflow-hidden mx-auto" style="max-width: 83%; border-radius:10px">
                <div class="card text-center" style="height: 590px;">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" href="#" id="skills">Skills</a>
                            </li>
                            
                        </ul>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">SKILLS</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-primary">Update</a>
                        <button class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 mb-3">
            <section id="projects" class="section position-relative overflow-hidden mx-auto" style="max-width: 83%; border-radius:10px">
                <div class="card text-center" style="height: 590px;">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" href="#" >Projects</a>
                            </li>
                           
                        </ul>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">PROJECTS</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-primary">Update</a>
                        <button class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </section>
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
                    <form  method="post">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Field</th>
                                        <th>Value</th>
                                    </tr>
                                </thead>
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
                            <button type="submit" class="btn btn-primary" name="updateBtn">Update</button>
                            <button class="btn btn-danger" id="deleteBtn">Delete</button>
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
    function confirmLogout() {
        var confirmation = confirm("Are you sure you want to log out?");
        if (confirmation) {
            window.location.href = "logout.php"; // Redirect to logout.php if confirmed
        } else {
            // Do nothing if canceled
        }
    }
</script>
<script>
    document.getElementById('deleteBtn').addEventListener('click', function() {
        console.log('Delete button clicked');
        if (confirm('Are you sure you want to delete this record?')) {
            document.getElementById('formData').setAttribute('action', 'delete.php'); // Change 'delete.php' to your actual delete script
            document.getElementById('formData').submit();
        }
    });
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
</body>
</html>
