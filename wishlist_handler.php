<?php
session_start();



if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve the item ID from the POST data
    $itemID = $_POST["itemID"];


    /*
    // Check if the item is already in the wishlist
    if (in_array($itemID, $_SESSION["wishlist"])) {
        // If the item is already in the wishlist, remove it
        $_SESSION["wishlist"] = array_diff($_SESSION["wishlist"], [$itemID]);
        echo "Item removed from wishlist.";
    } else {
        // If the item is not in the wishlist, add it
        $_SESSION["wishlist"][] = $itemID;
        echo "Item added to wishlist.";
    }
    */
} else {
    // If the request method is not POST or itemID is not set, return an error
    http_response_code(400);
    echo "Bad request.";
}