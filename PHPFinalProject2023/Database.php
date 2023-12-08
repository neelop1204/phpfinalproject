<?php
// Database connection parameters
$host = "172.31.22.43";         // Database host (replace with your actual host)
$username = "Neelkumar200556051";  // Database username (replace with your actual username)
$password = "RkE6lLlz4d";         // Database password (replace with your actual password)
$dbname = "Neelkumar200556051";   // Database name (replace with your actual database name)

// Establish a connection to the database
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check if the connection was successful
if (!$conn) {
    // If the connection fails, terminate the script and display an error message
    die("Connection failed: " . mysqli_connect_error());
}
?>
