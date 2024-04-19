<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/2fa23f9518.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>UWE SwapMe</title>
    <style>
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
        }

        .card-body button{
            padding: 11px 14px;
            border-radius: 3px;
            background-color: #ab9fa2;
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
            min-height: 400px;
            width: 100%; 
            object-fit: cover; 
        }

    </style>
</head>
<body>
    <!--Include Navigation Bar-->
    <div id="navbar-container"></div>

    <?php
        // Include database connection
        include 'database.php';

        // Retrieve itemID from URL parameter
        if(isset($_GET['id'])) {
            $itemID = $_GET['id'];

            // Prepare SQL query to select item based on itemID
            $sql = 
            "SELECT Item.*, Category.categoryType, Student.firstName 
            FROM Item 
            INNER JOIN Category ON Item.categoryID = Category.categoryID 
            INNER JOIN Student ON Item.publisherEmail = Student.email 
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

        <?php 
            if(isset($_SESSION['email'])){
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

                } else {
                    // Handle query execution failure
                    echo "Error executing the query: " . $conn->error;
                }
            }

            ?> 


    <div class="container mt-5">
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-5">
                    <img src="<?php echo $item_image; ?>" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-7">
                <div class="card-body" style="margin-left: 20px;">
                    <h5 class="card-title" style="font-size: 25px;"><?php echo $item_title; ?></h5>
                    <div class="email-wrapper">
                        <img src="./img/profile_pic.png" style="width: 18px; height: 18px;" alt="...">
                        <p class="card-text" style="display: inline-block; vertical-align: middle;">
                            <small class="text-body-secondary"><?php echo " " .$item_publisher ; ?></small>
                        </p>
                    </div>
                    <br/>
                    <p class="card-text"><small class="text-body-secondary"><?php echo $item_category; ?></small></p>
                    <p class="card-text"><?php echo $item_desc; ?></p>
                    <?php 
                        if(isset($_SESSION['email'])){
                            echo '<p class="card-text" style="color: green; font-size: 17px;"><small><i><strong>' . $itemCount.' Possible Item For Swap.</strong></i></small></p>';
                        }
                    ?>
                    <p class="card-text"><small class="text-body-secondary"><?php echo '£ '.number_format($item_price, 2); ?></small></p>
                    <br/>
                    <a><button id="swapButton" type="button">Swap Now</button></a>
                </div>
                </div>
            </div>
        </div>
    </div>
    <br/>

    <!-- Modal for Error Message -->
    <div class="modal fade" id="errorLoginRequiredModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="errorModalLabel">Error</h5>
                </div>
                <div class="modal-body">
                    You need to log in to perform this action.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="redirectToLogin()">Login</button>
                </div>
            </div>
        </div>
    </div>

    

    <script>
        // JavaScript to display error modal
        function displayErrorModal() {
            $('#errorLoginRequiredModal').modal('show');
        }
    </script>

    <?php
    // Check if the session email is set
    $isSessionSet = isset($_SESSION['email']) ? 'true' : 'false';

?>

    <script>
        // Define a JavaScript variable to store the session status
        var isSessionSet = <?php echo $isSessionSet; ?>;
        
        // JavaScript to handle button click
            $('#swapButton').click(function() {
                if (isSessionSet) {
                    // Get the itemID
                    var itemID = '<?php echo $item_ID; ?>'; // Add quotes around PHP variable
                    // Redirect to swapme.php with itemID as parameter
                    window.location.href = 'swap.php?id=' + itemID;
                } else {
                    // Display error modal if session email is not set
                    displayErrorModal();
                }
            });
    </script>

    <script>
        $(function(){
            $("#navbar-container").load("navigation_bar.php");
        });
    </script>
</body>
</html>