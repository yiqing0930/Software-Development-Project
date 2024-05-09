<!DOCTYPE html>
<html lang="en">
<?php session_start() ?>
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
        .director_card{
            background-color: #FAFAFA;
            border: none;
        }
        .terms_container {
            background-color: #FAF9F9;
            border-radius: 30px;
            padding: 20px;
            text-align: center;
            margin-top: 30px;
        }
        .booking_container {
            padding: 20px;
            text-align: center;
            margin-top: 30px;
        }
        .booking_container .btn {
            border-width: 2px;
            border-radius: 40px;
            padding: 12px 25px;
            font-size: 18px;
        }
        @media (max-width: 576px) {
            /* Small devices (576px and below) */
            .terms_container {
                height: auto;
                /* Make height auto for small screens */
            }
        }
        .card {
            color: white !important;
            margin-bottom: 20px;
            min-height: 320px;
            background: #A89EA0;
            position: relative;
            border: none;
        }
        .card-title {
            margin-top: 15px;
            padding-bottom: 10px;
            text-align: center;
        }
        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100%;
            padding: 0px;
            padding-bottom: 15px;
        }
        .card-img-top{
            height: 270px;
            object-fit: cover; 
        }
        .btn-love {
            position: absolute;
            bottom: 5px;
            right: 5px;
            background-color: transparent;
            border: none; /* Remove border */
            border-radius: 50%; /* Make it round */
            color: white;
            z-index: 1; /* Ensure it's on top of the image */
        }
        .btn-love:focus {
            outline: none;
        }
        .btn-love.clicked {
            background-color: red; /* Change background color when clicked */
            color: white; /* Change icon color when clicked */
        }

        .swap-available {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: rgba(255, 255, 255, 0.7); /* Adjust the opacity and color as needed */
            padding: 5px 9px;
            border-radius: 5px;
            font-size: 14px;
            color: black;
        }

    </style>
</head>
<body>
    <!--Include Navigation Bar-->
    <div id="navbar-container"></div>

    <!--Banner Section-->
    <div class="container-fluid mt-4 banner_section">
        <h3>Items</h3>
        <p>Search for something you truly desire.</p>
    </div>

    <div class="container-fluid mt-5">
        <div class="row">
            <!-- Narrow container on the left (col-sm-2) -->
            <div class="col-sm-3">
                <div style="margin-left: 10px;">
                    <h5>Search</h5>
                    <form action="search_query.php" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search_query" placeholder="Search for product's name...">
                            <button type="submit" class="btn btn-outline-secondary">
                                <i class="fas fa-search"></i> <!-- Search icon -->
                            </button>
                        </div>
                    </form>
                </div>
                <br/>
                <div style="margin-left: 10px; background-color: #f0f0f0; border-radius: 10px;">
                    <form action="filter_items.php" method="GET" style="margin-left: 5px; padding: 15px;">
                        <h5>Filter By Categories:</h5>
                        <?php
                        // Include database connection
                        include 'database.php';

                        // Fetch categories from the database
                        $sql = "SELECT categoryID, categoryType FROM Category";
                        $result = $conn->query($sql);

                        // Check if there are any categories
                        if ($result->num_rows > 0) {
                            // Output each category as a checkbox
                            while ($row = $result->fetch_assoc()) {
                                $categoryID = $row["categoryID"];
                                $categoryType = $row["categoryType"];
                                echo '<input type="checkbox" id="category_' . $categoryID . '" name="category[]" value="' . $categoryType . '">';
                                echo '<label style="margin-left: 5px;" for="category_' . $categoryID . '">' . $categoryType . '</label><br>';
                            }
                        } else {
                            echo 'No categories found.';
                        }

                        // Close database connection
                        $conn->close();
                        ?>
                        <br>
                        <input type="submit" value="Apply Filters">
                    </form>
                </div>
            </div>
            <!-- Wider container on the right (col-sm-9) -->
            <div class="col-sm-9">
                <div class="row">
                    <?php
                    // Include database connection
                    include 'database.php';

                    if(isset($_SESSION['email'])){
                        // Fetch items from the database
                        $sql = "SELECT Item.*, Category.categoryType FROM Item 
                        INNER JOIN Category ON Item.categoryID = Category.categoryID 
                        WHERE Item.publisherEmail != '{$_SESSION['email']}'";
                    }else{
                        // Fetch items from the database
                        $sql = "SELECT Item.*, Category.categoryType FROM Item 
                        INNER JOIN Category ON Item.categoryID = Category.categoryID";
                    }

                    $result = $conn->query($sql);

                    // Check if there are any items
                    if ($result->num_rows > 0) {
                        // Output each item
                        while ($row = $result->fetch_assoc()) {
                            if(isset($_SESSION['email'])){
                                $item_price = $row["price"]; 
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
                                $row_count = $result_count->fetch_assoc();

                                // Access the count value
                                $itemCount = $row_count['item_count'];

                            } else {
                                // Handle query execution failure
                                echo "Error executing the query: " . $conn->error;
                            }
                            }
                            ?>

                            <div class="col-lg-4 col-md-4">
                                <div class="card">
                                    <div class="position-relative">
                                        <?php if(isset($_SESSION['email'])){ 
                                            echo '<div class="swap-available">' .$itemCount .' Swaps Available</div>';
                                        } ?>
                                        <img src="<?php echo $row["imageURL"]; ?>" class="card-img-top" alt="Card Image">
                                        <!-- Love icon for wishlist -->
                                        <?php $item_ID = $row["itemID"];?>
                                        <button class="btn btn-love" onclick="toggleWishlist(this, '<?php echo $item_ID;?>')">
                                            <i class="far fa-heart"></i>
                                        </button>
                                        <!-- End of love icon -->
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $row["title"]; ?></h5>
                                        <p class="card-text" style="margin-top: -15px;"><small class="text-body-secondary"><?php echo $row["categoryType"]; ?></small></p>
                                        <p style="font-size: 15px;"><i>Estimated <b><?php echo ' £ '.number_format($row["price"], 0); ?></b></i></p>
                                        <a href="product_details.php?id=<?php echo $row["itemID"]; ?>" target="_self" class="btn btn-outline-light btn-view">View >></a>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        echo 'No items found.';
                    }

                    // Close database connection
                    $conn->close();
                    ?>
                </div>
            </div>
        </div>
        <script>
            // Function to toggle wishlist item
            function toggleWishlist(button) {
                // Toggle heart icon
                $(button).find('i').toggleClass('far fas');

                // Toggle color class
                $(button).toggleClass('clicked');
            }
        </script>

        <!-- Load Navigation Bar -->
        <script>
            $(function(){
                $("#navbar-container").load("navigation_bar.php");
            });
        </script>
    </div>
</body>
</html>