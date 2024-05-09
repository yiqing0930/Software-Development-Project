<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UWE SwapMe</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/2fa23f9518.js" crossorigin="anonymous"></script>
    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        /* Your existing styles */
        .banner_section {
            background-image: url('./img/product.jpg') !important;
            opacity: 0.9;
            background-size: cover; 
            background-position: center; 
            height: 200px; 
            color: white; 
            padding: 20px; 
            display: flex; 
            flex-direction: column; 
            justify-content: center; 
            text-align: center; 
        }

        .card{
            border: none;
            background-color:#d1cbc7;
            color: white;
        }

        .card-body button{
            padding: 11px 14px;
            border-radius: 3px;
            background-color: #b0a4a7;
            color: white;
            margin: 10px 0px;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        .card-body button:hover{
            opacity: 0.8;
        }
        
        .img-fluid {
            height: 100%;
            width: 100%; 
            object-fit: cover; 
        }

        /* Style for radio button container */
        .radio-button-group {
            display: flex;
            justify-content: space-between;
        }

        /* Hide default radio button */
        .radio-button-group input[type="radio"] {
            display: none;
        }

    
        /* Custom radio button style */
        .radio-button-group label {
            flex-basis: calc(50% - 50px); /* Adjust flex-basis for 4 buttons per row */
            padding: 35px;
            margin: 2px;
            cursor: pointer; 
            padding: 15px 20px;
            text-align: center;
            background-color: #ccc1c0;
            color: white;
            border: none;
            border-radius: 3px;
        }

        /* Style for selected radio button */
        .radio-button-group input[type="radio"]:checked + label {
            background-color: #9299a1;
        }

        form {
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            background-color: #f7f7f7;
        }

        label {
            font-weight: bold;
        }

        input[type="date"],
        input[type="time"] {
            
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button[type="submit"] {
            background-color: #7c838a;
            color: white;
            padding: 8px 10px;
            margin: 8px 0;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            width: 10%;
            margin-top: 20px;
            margin-left: 920px;
        }

        button[type="submit"]:hover {
            background-color: #abafb3;
        }

        .product_card {
            color: white !important;
            margin-bottom: 20px;
            min-height: 450px;
            background: #b0a4a7;
            position: relative;
            border: none;
        }
        
        .product-card-title {
            margin-top: 15px;
            padding-bottom: 10px;
            text-align: center;
        }

        .product-card-body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100%;
            padding: 0px;
            padding-bottom: 15px;
        }

        .product-card-img-top{
            height: 300px;
            object-fit: cover; 
        }

        
    /* Custom styling for radio buttons */
    .styled-radio-button {
        padding: 8px 25px;
        background-color: #ccc1c0;
        color: white;
        border-radius: 3px;
        cursor: pointer;
    }

    .styled-radio-button:hover {
        background-color: #9299a1;
    }

    /* Style for selected radio button */
    input[type="radio"]:checked + label.styled-radio-button {
        background-color: #9299a1;
    }

    /* Hide default radio button */
    input[type="radio"] {
        display: none;
    }
    </style>
</head>
<body>
    <!-- Include Navigation Bar -->
    <div id="navbar-container"></div>

    <br/><br/>
    <h3 style="text-align: center;">Swap Now</h3>

    <?php
        //connect database
        include 'database.php';

        // Retrieve itemID from URL parameter
        if(isset($_GET['id'])) {
            $itemID = $_GET['id'];

            // Prepare SQL query to select item based on itemID
            $sql = 
            "SELECT Item.*, Category.categoryType, User.firstName 
            FROM Item 
            INNER JOIN Category ON Item.categoryID = Category.categoryID 
            INNER JOIN User ON Item.publisherEmail = User.email 
            WHERE Item.itemID = '$itemID'";

            // Execute SQL query
            $result = $conn->query($sql);

            // Check if the query returned any results
            if ($result->num_rows > 0) {
                // Output each item's details
                while ($row = $result->fetch_assoc()) {
                    
                    // Assign Value to Item
                    $item_ID = $row["itemID"];
                    $item_title = $row["title"];
                    $item_desc = $row["description"];
                    $item_image = $row["imageURL"];
                    $item_price = $row["price"];
                    $item_category = $row["categoryType"];
                    $item_publisher = $row["publisherEmail"];
                    $item_publisherName = $row["firstName"];
                    
                }
            } else {
                echo "No item found with the provided itemID.";
            }
        } else {
            // Handle case where no itemID is provided in the URL
            echo "Item ID not provided.";
        }

    ?>

<div class="container mt-5">
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-5">
                    <div class="container">
                    <div class="container">
                    <img style="margin-left: -25px;" src="<?php echo $item_image; ?>" class="img-fluid rounded-start" alt="...">
                    </div>
    </div>
                </div>
                <div class="col-md-7">
                <div class="card-body" style="margin-left: -17px;">
                    <h5 class="card-title" style="font-size: 25px; padding-top: 20px;"><?php echo $item_title; ?></h5>
                    <div class="email-wrapper">
                        <img src="./img/profile_pic.png" style="width: 18px; height: 18px;" alt="...">
                        <p class="card-text" style="display: inline-block; vertical-align: middle;">
                            <small class="text-body-secondary"><?php echo " " .$item_publisher ; ?></small>
                        </p>
                    </div>
                    <br/>
                    <p class="card-text"><small class="text-body-secondary"><?php echo $item_category; ?></small></p>
                    <p class="card-text"><?php echo $item_desc; ?></p>
                    <p class="card-text"><small class="text-body-secondary"><?php echo '£ '.number_format($item_price, 2); ?></small></p>
                    <br/>
                </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5" style="margin-bottom: 50px;">
        <form id="dateTimeForm" action="test.php" method="GET">
        <div class="container mt-2">
            <label for="date">Select a Date:</label><br>
            <input type="date" id="date" name="date" min="<?php echo date('Y-m-d'); ?>" value="<?php echo date('Y-m-d'); ?>"><br><br>
            
            <label for="date">Select a Time:</label><br>
            <input type="time" id="time" name="time" value="<?php echo date('H:00', strtotime('+1 hour')); ?>"><br><br>

            <label for="date">Select a Location:</label><br>
            <div class="radio-button-group">


            <?php 

            // Fetch categories from the database
            $sql = "SELECT locationID, locationName FROM Location";
            $result = $conn->query($sql);

            // Check if there are any categories
            if ($result->num_rows > 0) {
                // Output each category as a checkbox
                while ($row = $result->fetch_assoc()) {
                    $locationID = $row["locationID"];
                    $locationType = $row["locationName"];

                        echo '<input type="radio" id="'. $locationID .'" name="locations" value="'. $locationID .'">';
                        echo '<label for="'.$locationID.'">'.$locationType.'</label>';
                        echo '<input type="hidden" name="selectedLocationID" id="selectedLocationID" value="'.$locationID.'">';
                        echo '<input type="hidden" name="selectedLocation" id="selectedLocation" value="'.$locationType.'">';
    
                }
            } else {
                echo 'No categories found.';
            }
            ?>

        </div>
            <br/>
            <div>
            <label for="items" style="margin-bottom: 5px;">Select An Item Possible for Swap:</label><br/>
            <?php 
            $maxPriceDifference = 5;

            // Fetch items from the database
            $sql_count = "SELECT COUNT(*) AS item_count
                    FROM Item 
                    INNER JOIN Category ON Item.categoryID = Category.categoryID 
                    WHERE Item.publisherEmail = '{$_SESSION['email']}' 
                    AND ABS(Item.price - $item_price) <= $maxPriceDifference";

                $result_count = $conn->query($sql_count);

                // Check if the query executed successfully
                if ($result_count) {
                    // Fetch the result row
                    $row = $result_count->fetch_assoc();

                    // Access the count value
                    $itemCount = $row['item_count'];

                    // Output the count
                    echo '<p style="color: green; font-size: 17px;"><small><i>' . $itemCount . ' Possible Item For Swap.</i></small></p>';
                } else {
                    // Handle query execution failure
                    echo "Error executing the query: " . $conn->error;
                }

            ?> 
            </div>
            <div class="row" style="margin-top: 3px;">
            <?php
            
            // Fetch items from the database
            $sql2 = "SELECT Item.*, Category.categoryType 
                     FROM Item 
                     INNER JOIN Category ON Item.categoryID = Category.categoryID 
                     WHERE Item.publisherEmail = '{$_SESSION['email']}' 
                     AND ABS(Item.price - $item_price) <= $maxPriceDifference";

                $result2 = $conn->query($sql2);

                // Check if there are any items
                if ($result2->num_rows > 0) {
                    // Output each item
                    while ($row = $result2->fetch_assoc()) {
                        ?>
                        <div class="col-lg-3 col-md-3">
                            <div class="card product_card">
                                <div class="position-relative">
                                    <img src="<?php echo $row["imageURL"]; ?>" class="product-card-img-top card-img-top" alt="Card Image">
                            </div>
                                <div class="product-card-body card-body">
                                    <h5 class="product-card-title card-title"><?php echo $row["title"]; ?></h5>
                                    <p class="product-card-text card-text" style="margin-top: -15px;"><small class="text-body-secondary"><?php echo $row["categoryType"]; ?></small></p>
                                    <p><?php echo '£ '.number_format($row["price"], 2); ?></p>
                                    <input type="radio" id="item_<?php echo $row["itemID"]; ?>" name="selectedItem" value="<?php echo $row["itemID"]; ?>" style="display: none;">
                                    <label for="item_<?php echo $row["itemID"]; ?>" class="styled-radio-button">Swap</label>
                                </div>
                            </div>
                        </div>
                        <?php
                }
                } else {
                    echo '<div style="margin-left: 10px; margin-bottom: 10px; margin-top: 2px;background-color: #ececec; height: 50px; width: 1120px; border-radius: 10px;">';
                    echo '<p style="margin-top: 10px;">No Similar-Priced Items Available for Swap. Please Try Another Item. </p>';
                    echo '</div>';
                }

            // Close database connection
            $conn->close();
            ?>
            </div>
                
        <input type="hidden" name="itemID" value="<?php echo $item_ID; ?>">
        <input type="hidden" name="itemTitle" value="<?php echo $item_title; ?>">
        <input type="hidden" name="publisherName" value="<?php echo $item_publisherName ; ?>">
        <input type="hidden" name="itemPublisher" value="<?php echo $item_publisher; ?>">
        <input type="hidden" name="itemPrice" value="<?php echo $item_price; ?>">
        <button type="submit">Send Offer</button>
        <!--
        <button type="submit"><a href="mailto:<?php //echo $item_publisher;?>">Send Offer</a></button>
        !-->
    </div>
    </form>
    </div>
    
    <!-- Modal for error messages -->
    <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="errorModalLabel">Error</h5>
        </div>
        <div class="modal-body">
            <p id="errorMessage"></p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
    </div>
    

    <script>
        // Function to set minimum date to today
        function setMinDate() {
            var today = new Date().toISOString().split('T')[0];
            document.getElementById("date").setAttribute("min", today);
        }

        // Call setMinDate on page load
        $(document).ready(function() {
            setMinDate();
        });

        
    // Function to validate date input
    function validateDate() {
        var selectedDate = document.getElementById("date").value;
        var today = new Date().toISOString().split('T')[0];

        if (selectedDate < today) {
            // Show error modal
            $('#errorMessage').text("Please select a valid date for item exchange!");
            $('#errorModal').modal('show');
            document.getElementById("date").value = "<?php echo date('Y-m-d'); ?>";
            return false; // Date is invalid
        }
        return true; // Date is valid
    }

    // Event listener for date input
    $(document).ready(function() {
        $('#date').on('input', function() {
            validateDate();
        });
    });

    // Event listener for form submission
    $(document).ready(function() {
        $('#dateTimeForm').submit(function(event) {
            // Validate date before form submission
            if (!validateDate()) {
                event.preventDefault(); // Prevent form submission
            }
        });
    });
        
    // JavaScript code to update itemIdToExchange when the form is submitted
    $(document).ready(function() {
        $('input[name="selectedItem"]').change(function() {
            // Get the value of the selected radio button
            var selectedItemId = $(this).val();
            // Set the value of the hidden input field to the selected item's ID
            $('#itemIdToExchange').val(selectedItemId);
        });
    });
   
        $(function(){
            $("#navbar-container").load("navigation_bar.php");
        });
    </script>
    
</body>
</html>