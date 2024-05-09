<?php
session_start();

include 'database.php';

// Check if the request is sent via POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if item ID is set and not empty
    if (isset($_POST['itemId'])) {

        // Get the item ID from the POST data
        $itemId = $_POST['itemId'];
        echo $itemID;

        // SQL query to delete the item
        $sqlDeleteItem = "DELETE FROM Item WHERE itemID = '$itemId'";

        // SQL query to delete associated swap offers (assuming cascade delete is not enabled in the database)
        $sqlDeleteSwapOffers = "DELETE FROM swap_offer WHERE itemToSwapID = '$itemId' OR itemForSwapID = '$itemId'";

        // Execute the delete queries
        if ($conn->query($sqlDeleteSwapOffers) === TRUE && $conn->query($sqlDeleteItem) === TRUE) {
            // Item and associated swap offers deleted successfully
            echo "Item and associated swap offers deleted successfully.";
        } else {
            // Error deleting item
            echo "Error deleting item: " . $conn->error;
        }

        // Close the database connection
        $conn->close();
    } else {
        // Item ID not provided
        echo "Item ID not provided.";
    }
}
?>