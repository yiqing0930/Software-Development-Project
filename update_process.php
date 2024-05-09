<?php
session_start();

include 'database.php';

// Check if the request is sent via POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get fieldId and newValue from the POST data
    $fieldId = $_POST["fieldId"];
    $newValue = $_POST["newValue"];
    // Extract the item ID from the fieldId
    $itemId = substr($fieldId, strlen("item-title-"));

    // Get user email from session
    $userEmail = $_SESSION['email'];

    // Update database based on the fieldId
    switch ($fieldId) {
        case "first-name":
            $sql = "UPDATE User SET firstName = '$newValue' WHERE email = '$userEmail'";
            break;
        case "last-name":
            $sql = "UPDATE User SET lastName = '$newValue' WHERE email = '$userEmail'";
            break;
        default:
            // Check if the fieldId starts with "item-title-" (indicating a product title update)
            if (strpos($fieldId, "item-title-") === 0) {
                // If so, update the product title using the extracted item ID
                $sql = "UPDATE Item SET title = '$newValue' WHERE itemID = '$itemId'";
            } elseif (strpos($fieldId, "item-price-") === 0) {
                // If the fieldId starts with "item-price-" (indicating a product price update)
                // Extract the item ID from the fieldId
                $itemId = substr($fieldId, strlen("item-price-"));
                // Update the product price using the extracted item ID
                $sql = "UPDATE Item SET price = '$newValue' WHERE itemID = '$itemId'";
            } else {
                // Handle other fields if needed
            }
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