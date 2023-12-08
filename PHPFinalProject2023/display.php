<!DOCTYPE html>
<html lang="en">
<head>
       
    <!-- Meta tags for character set and viewport settings -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      
    <!-- Title of the page -->
    <title>Bootstrap Table Example</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>

<!-- Container for the content with top margin -->
<div class="container mt-5">
        
<!-- Heading for the table -->
    <h2>All registered users</h2>
    
    <!-- Bootstrap-styled table -->
    <table class="table table-bordered">
                
    <!-- Table header -->
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
            </tr>
        </thead>
                
        <!-- Table body to be dynamically populated with user data -->
       <?php
                       
            // Include the PHP script for database connection
            include 'Database.php';
                            
            // SQL query to select all columns from the 'users' table
            $sql="select *from users";

            // Execute the query
            $result=mysqli_query($conn,$sql);
            
            // Check if the query was successful
            if($result)
            {
                
                // Loop through each row of the result set
                while($row=mysqli_fetch_assoc($result))
                {
                                           
                    // Retrieve and sanitize user data
                    $name=$row['Name'];
                    $email=$row['email'];
                    $pass=$row['pass'];
                                            
                    // Output a table row with user data
                    echo'<tr>
                    <td>'.$name.'</td>
                    <td>'.$email.'</td>
                    <td>'.$pass.'</td>
                    </tr>';
                }
            }
       ?>
            <!-- Add more rows as needed -->
        </tbody>
    </table>
</div>


</body>
</html>
