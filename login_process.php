<?php
session_start();

//connect database
include 'database.php';

// Retrieve user input
$email = $_POST['email'];
$password = $_POST['password'];

// SQL query to check if the user exists and the password is correct
$sql = "SELECT email, password, firstName AS studentFirstName
        FROM Student
        WHERE email = ? AND password = ?";
$stmt = $conn->prepare($sql);

// Check if the query was prepared successfully
if (!$stmt) {
    die("Error in preparing the SQL statement: " . $conn->error);
}

// Bind parameters
$stmt->bind_param("ss", $email, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // User found, retrieve user information
    $row = $result->fetch_assoc();
    $_SESSION['email'] = $email;
    $_SESSION['userName'] = $row['studentFirstName'];
    
    //Redirect User to index page
    header("Location: index.php");
  
} else {
    // User not found or incorrect password, redirect to login page with error message
    header("Location: login.php?error=incorrect_password");
}

$stmt->close();
$conn->close();
?>