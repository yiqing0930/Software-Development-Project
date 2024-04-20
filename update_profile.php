<?php
session_start();

include 'database.php';

// Check if the request is sent via POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get fieldId and newValue from the POST data
    $fieldId = $_POST["fieldId"];
    $newValue = $_POST["newValue"];

    // Get user email from session
    $userEmail = $_SESSION['email'];

    // Update database based on the fieldId
    switch ($fieldId) {
        case "first-name":
            $sql = "UPDATE Student SET firstName = '$newValue' WHERE email = '$userEmail'";
            break;
        case "last-name":
            $sql = "UPDATE Student SET lastName = '$newValue' WHERE email = '$userEmail'";
            break;
        default:
            // Handle other fields if needed
            break;
    }

    // Execute the update query
    if ($conn->query($sql) === TRUE) {
        echo "Update successful";
    } else {
        echo "Error updating database: " . $conn->error;
    }

    // Close database connection
    $conn->close();
}
?>