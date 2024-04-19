<?php
// Establishing connection to the database
$servername = "localhost";
$username = "root";
$password = "Kyqing020930:)";
$dbname = "swapme";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>