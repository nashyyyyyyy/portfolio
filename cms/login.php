<?php
// Include server.php file which contains database connection and other functions
include '../server.php';

session_start(); // Start session

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare SQL statement to fetch user from the database
    $query = "SELECT * FROM info WHERE username='$username' AND password='$password'";
    $result = mysqli_query($connect, $query); // Pass $connect as the first argument

    // Check if user exists and password is correct
    if (mysqli_num_rows($result) == 1) {
        // User found, store user details in session variables
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";

        // Redirect to dashboard or any other page after successful login
        header('location: dashboard.php');
        exit; // Make sure to exit after redirection
    } else {
        // If user does not exist or password is incorrect, display error message
         echo '<style>.error-alert { background-color: #ffcccc; color: #ff0000; padding: 10px; position: fixed; top: 10px; left: 50%; transform: translateX(-50%); border-radius: 5px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.5); }</style>';
        echo '<div class="error-alert">Invalid username or password</div>';
        echo '<script>setTimeout(function() { document.querySelector(".error-alert").style.display = "none"; }, 2000);</script>';
    }
}
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
  <title>Login</title>
<link rel="shortcut icon" type="image/x-icon" href="<?php echo $logoPath; ?>">
  <link rel="stylesheet" href="login.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>

<div class="container mt-5">
  <div class="row">
    <div class="col-md-4 offset-md-4 login-form">
      <h4 class="text-center mb-3 mt-3">Login to <strong class="text-warning" style="font-size:30px;">CMS</strong></h4>
      <form action="login.php" method="post" autocomplete="off" style="padding:20px;" >
        <div class="form-group">
          <label for="username">Username:</label>
          <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-dark btn-block text-warning">Login</button>
        <a href="../index.php" class="btn btn-light btn-block">Go back</a>
      </form>
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
