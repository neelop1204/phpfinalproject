
<!DOCTYPE html>
<html lang="en">
<head>
   
<!-- Meta tags for character set and viewport settings -->
  <meta charset="UTF-8">
  <title>Login</title>
    
  <!-- Bootstrap CSS inclusion from a CDN -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
  <!-- Link to an external CSS file for additional styles -->
  <link rel="stylesheet" href="css/stylelogin.css">
<body>
      
<!-- Header section with an iframe container -->
    <header>
    <div class="iframe-container">
<iframe src="Global%20files/header.php" width="1530" height="100"></iframe>
    </div></header>
        
    <!-- Main content section with a login form -->
<div class="container">
  <div class="row">
    <div class="col-md-6 form-container">
      <!-- Login Form -->
      <h2>Login</h2>
      <form  method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="form-group">
          <label for="loginEmail">Email address</label>
          <input type="email" class="form-control" id="loginEmail" name="loginEmail" required>
        </div>
        <div class="form-group">
          <label for="loginPassword">Password</label>
          <input type="password" class="form-control" id="loginPassword" name="loginPassword" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
        <a href="register.php" target="_blank" rel="noopener noreferrer">Register here</a>
      </form>
    </div>
  </div>
</div>
    
<!-- Footer section with an iframe container -->
<footer>
<div class="iframe-container">
<iframe src="Global%20files/footer.php" width="1530" height="100"></iframe>
    </div></footer>

</body>
</html>
<?php
// Include the PHP script for database connection
include 'Database.php';

// Retrieve user input from the login form
$email1 = $_POST['loginEmail'];
$password1 = $_POST['loginPassword'];

// SQL query to check if the email and password match any user in the database
$duplicate="SELECT *FROM users where email='$email1' or pass = '$password1'";
$result1=mysqli_query($conn,$duplicate);

// Check if there is a match in the database
if (mysqli_num_rows($result1) > 0) {
   header('Location:display.php');
} 
else {
    // Display an error message if login fails
   echo"Wrong email or password";
}
?>



