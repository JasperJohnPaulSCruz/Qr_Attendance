<?php 
session_start();
require('db.php');

if (isset($_POST['login'])) {
    // Retrieve user inputs
   echo $email = $_POST['email'];
   echo $password = $_POST['password'];
   echo $section = $_POST['section'];
   echo $group = $_POST['group'];

    // Prepare and execute a SQL query to check credentials
    
    $sql = "SELECT name, email, password FROM users WHERE email = '$email'  AND password = '$password'";
    $result=$conn->query($sql);

    
        // Check if a row exists with the given credentials
    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
            echo $_SESSION['name'] = $row['name'];
        }
        // echo "Successful login, redirect to the landing page";
        // Store data in sessions
        echo $_SESSION['section'] = $section;
        echo $_SESSION['group'] = $group;

        // Redirect to the landing page
        header("Location: index.php");
        exit;
    } else {
        // echo" Display an error message and redirect back to the login page";
        header('Location: login.php?error=1');
        exit;
    }
}
// Close the database connection
$conn->close();
?>