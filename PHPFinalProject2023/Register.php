
<!DOCTYPE html>
<html lang="en">
<head>
    
<!-- Meta tags for character set and viewport settings -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Page</title>
    
  <!-- Bootstrap CSS inclusion from a CDN -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
 
   <!-- Link to an external CSS file for additional styles -->
   <link rel="stylesheet" href="./css/styleform.css">
  
</head> 
<body>
      
<!-- Header section with an iframe container -->
<header>
<div class="iframe-container">
<iframe src="Global%20files/header.php" width="1530" height="100"></iframe>
    </div>
  </header>
      
  <!-- Main content section with a registration form -->
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h3 class="text-center">Register</h3>
        </div>
        <div class="card-body">
          <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"enctype="multipart/form-data">
           
          <!-- Form fields for name, email, password, and image -->
          <!-- File input for profile image -->  
          <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
            </div>
            <div class="form-group">
              <label for="email">Email address</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <div class="form-group">
        <label for="image">Profile Image</label>
        <input type="file" class="form-control-file" id="image" name="image">
    </div>
            <!-- Submit button to register -->
            <button type="submit" id="submit" name="submit" class="btn btn-primary btn-block">Register</button>
          </form>
        </div>
      </div>
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

// Check if the registration form is submitted
if (isset($_POST["submit"])) {
     
  // Retrieve user input from the registration form
    $name = $_POST['name'];
    $pass = $_POST['password'];
    $haspass = password_hash($pass, PASSWORD_DEFAULT);
    $mail = $_POST['email'];
    
    // Check if the email or password already exists in the database
    $duplicate="SELECT *FROM users where email='$mail' or pass='$pass'";
    $result1=mysqli_query($conn,$duplicate);
       
    // If a user with the same email or password already exists, display an alert
    if (mysqli_num_rows($result1) > 0) {
      echo "<script>alert('User alredy registered!');</script>";
    }
    else
    {
// File upload handling
    $targetDirectory = __DIR__ . "/uploads/";
    $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
      // The file was successfully uploaded
  } else {
      // There was an error uploading the file
      echo "move_uploaded_file failed. Debugging information: " . $_FILES["image"]["error"];
  }
  

    // Check file size (adjust as needed)
    if ($_FILES["image"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats (you can modify this as needed)
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG, and GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        // If everything is OK, try to upload the file
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {

            // Insert data into the database  
            $imagePath = $targetFile;
            $sql = "INSERT INTO users VALUES ('$name', '$mail', '$haspass', '$imagePath')";

            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('User successfully registered!');</script>";
            } else {
                echo "Error inserting data into the database: " . mysqli_error($conn);
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
  }
}

// Close the database connection
mysqli_close($conn);
?>
