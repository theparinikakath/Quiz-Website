<?php
session_start();

// Redirect to the login page
header('location:login.php');

// Database connection details
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'parinika';
$dbname = 'sessionpractical'; // Add the database name

// Attempt to establish a connection to the database
$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if ($con) {
    echo "Connection successful"; // Remove extra spaces
} else {
    echo "No connection found"; // Remove extra spaces
}

// Retrieve user input from the registration form
$name = $_POST['user'];
$pass = $_POST['password'];

// SQL query to check if the user already exists
$q = "SELECT * FROM signin WHERE name='$name' && password='$pass'";
$result = mysqli_query($con, $q);
$num = mysqli_num_rows($result);

if ($num == 1) {
    echo 'Duplicate user'; // Display a message for duplicate users
} else {
    // SQL query to insert a new user into the database
    $qy = "INSERT INTO signin (name, password) VALUES ('$name', '$pass')";
    if (mysqli_query($con, $qy)) {
        echo 'Registration successful'; // Display a message for successful registration
    } else {
        echo 'Registration failed'; // Display a message for registration failure
    }
}

?>
