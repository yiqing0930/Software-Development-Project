<?php
session_start();
$user_name = $_SESSION['userName'];
$user_email = $_SESSION['email'];

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Retrieve form data
    $selectedDate = $_GET['date'];
    $selectedTime = $_GET['time'];
    $selectedItemID = $_GET['itemID'];
    $selectedItem = $_GET['itemTitle']; 
    $selectedItemPrice = $_GET['itemPrice']; 
    $selectedItemForExchange = $_GET['selectedItem']; 
    $locationID = $_GET['selectedLocationID'];
    $location = $_GET['selectedLocation'];
    $publisher_name = $_GET['publisherName'];  
    $publisher_email = $_GET['itemPublisher']; 

    //connect database
    include 'database.php';

        // Prepare SQL query to select item based on itemID
        $sql = 
        "SELECT Item.*, Category.categoryType, User.firstName 
        FROM Item 
        INNER JOIN Category ON Item.categoryID = Category.categoryID 
        INNER JOIN User ON Item.publisherEmail = User.email 
        WHERE Item.itemID = '$selectedItemForExchange'";

        // Execute SQL query
        $result = $conn->query($sql);

        // Check if the query returned any results
        if ($result->num_rows > 0) {
            // Output each item's details
            while ($row = $result->fetch_assoc()) {
                
                // Assign Value to Item
                $item_exchange_title = $row["title"];
                $item_exchange_price = $row["price"];
                
            }
        } else {
            echo "No item found with the provided itemID.";
            exit; // Stop script execution here
        }
        
    // Carry Out Database Operation first
    // Retrieve the latest item ID from the database
    $sql_latest_id = "SELECT offerID FROM swap_offer ORDER BY offerID DESC LIMIT 1";
    $result_latest_id = $conn->query($sql_latest_id);

    if ($result_latest_id->num_rows > 0) {
        $latest_id = $result_latest_id->fetch_assoc()['offerID'];
        // Extract the numeric part of the latest item ID and increment it
        $latest_numeric_part = intval(substr($latest_id, 3));
        $next_numeric_part = $latest_numeric_part + 1;
        // Generate the next item ID with leading zeros
        $offer_ID = 'OFR' . sprintf('%02d', $next_numeric_part);
    } else {
        // If no previous item exists, start from OFR01
        $offer_ID = 'OFR01';
    }

    // Check if the generated offerID already exists in the table
    $check_sql = "SELECT offerID FROM swap_offer WHERE offerID = '$offer_ID'";
    $result_check = $conn->query($check_sql);

    // If the generated offerID already exists, increment the numeric part until a unique offerID is found
    while ($result_check->num_rows > 0) {
        $next_numeric_part++; // Increment the numeric part
        $offer_ID = 'OFR' . sprintf('%02d', $next_numeric_part); // Generate the next offerID

        // Check again if the offerID already exists
        $check_sql = "SELECT offerID FROM swap_offer WHERE offerID = '$offer_ID'";
        $result_check = $conn->query($check_sql);
    }


    // Insert swap offer details into the database
    $insertSql = "INSERT INTO swap_offer (offerID, itemToSwapID, itemForSwapID, date, time, locationID, requesterEmail) 
                  VALUES ('$offer_ID', '$selectedItemID', '$selectedItemForExchange', '$selectedDate', '$selectedTime', '$locationID', '$user_email')";

    if ($conn->query($insertSql) === TRUE) {
        
        // Replace the '+' symbol with a space
        $selectedDate = str_replace('+', ' ', $selectedDate);
        $selectedTime = str_replace('+', ' ', $selectedTime);
        $selectedItem = str_replace('+', ' ', $selectedItem);
        $selectedItemPrice = str_replace('+', ' ', $selectedItemPrice);
        $selectedItemForExchange = str_replace('+', ' ', $selectedItemForExchange);

        // Construct the mailto URL with the extracted details
        $emailSubject = "Swap Offer";
        $emailBody = "Dear $publisher_name,\n\n I hope this email finds you well. I wanted to reach out to express my interest in initiating a swap on SwapMe.\n\nPreferred Item Swapping Activity\n------------------------------------\nDate: $selectedDate\nTime: $selectedTime\nLocation: UWE $location\nInterested Item: $selectedItem (Estimated Value: £ $selectedItemPrice)\nItem for Swap: $item_exchange_title (Estimated Value: £ $item_exchange_price)\n\n\n Looking forward to your response and hoping to hear from you soon.\n\nWarm Regards, \n$user_name";
                    
        // Encode the email subject and body for URL
        $emailSubjectEncoded = urlencode($emailSubject);
        $emailBodyEncoded = urlencode($emailBody);

        // Replace '+' with a space in the encoded strings
        $emailSubjectEncoded = str_replace('+', '%20', $emailSubjectEncoded);
        $emailBodyEncoded = str_replace('+', '%20', $emailBodyEncoded);

        // Construct the mailto URL
        $mailtoUrl = "mailto:$publisher_email?subject=$emailSubjectEncoded&body=$emailBodyEncoded";

        // Use JavaScript to open mailto link in a new window
        echo "<script>window.open('$mailtoUrl');</script>";
        echo "<script>window.open('index.php');</script>";
        exit; // Stop script execution here


    } else {
        echo "Error: " . $insertSql . "<br>" . $conn->error;
    }

    
    $conn->close(); 
} 
?>
