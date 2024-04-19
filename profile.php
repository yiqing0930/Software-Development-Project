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
            /*background-image: url('https://images.unsplash.com/photo-1523712999610-f77fbcfc3843?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') !important; */
            background-image: url('https://images.unsplash.com/photo-1486241699476-e92ba0f6feec?q=80&w=1932&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') !important;
            opacity: 0.8;
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

        .product_card {
            color: white !important;
            margin-bottom: 20px;
            min-height: 450px;
            background: #b8aea3;
            position: relative;
            border: none;
        }

        .profile_card{
            background: #dbd6d0;
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
            height: 300px;
            object-fit: cover; 
        }
    </style>
</head>
<body>
    <!--Include Navigation Bar-->
    <div id="navbar-container"></div>

    <!--Banner Section-->
    <div class="container-fluid mt-4 banner_section">
        <h3>My Profile</h3>
        <?php echo "Welcome Back, " .$_SESSION['userName']; ?>
    </div>

    <?php 
        include 'database.php';
        
        // User's email address
        $userEmail = $_SESSION['email']; 

        // SQL query to fetch user information
        $sqlUser = "SELECT firstName, lastName, dateBirth FROM Student WHERE email = '$userEmail'";

        // Execute the query
        $result = $conn->query($sqlUser);

        // Check if the query was successful
        if ($result->num_rows > 0) {
            // Fetch the data
            $row = $result->fetch_assoc();
            
            // Extract user information
            $firstName = $row['firstName'];
            $lastName = $row['lastName'];
            $dob = $row['dateBirth'];
            $formattedDate = date('jS F Y', strtotime($dob));
        }else{
            echo 'User Not Found.';
        }
    ?>

    <div class="container mt-5">
        <div class="card profile_card">
            <div class="card-body" style="margin: 20px;">
                <h4 class="card-title">Personal Information</h4>
                <br/>
                <p class="card-text"><?php echo '<strong>Email: </strong>'.$_SESSION['email']; ?></p>
                <p class="card-text"><?php echo '<strong>First Name: </strong>'.$firstName;; ?></p>
                <p class="card-text"><?php echo '<strong>Last Name: </strong>'.$lastName; ?></p>
                <p class="card-text"><?php echo '<strong>Birth Date: </strong>'.$formattedDate; ?></p>
            </div>
        </div>
    </div>

    <!-- Wider container on the right (col-sm-10) -->
    <div class="container mt-5">
        <br/>
        <h3 style="text-align: center">My Products</h3>
        <br/><br/>
        <div class="row">
            <?php

            // Fetch items from the database
            $sql = "SELECT Item.*, Category.categoryType FROM Item 
            INNER JOIN Category ON Item.categoryID = Category.categoryID 
            WHERE Item.publisherEmail = '{$_SESSION['email']}'";
            $result = $conn->query($sql);

                // Check if there are any items
                if ($result->num_rows > 0) {
                    // Output each item
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <div class="col-lg-4 col-md-4">
                            <div class="card product_card">
                                <div class="position-relative">
                                    <img src="<?php echo $row["imageURL"]; ?>" class="card-img-top" alt="Card Image">
                            </div>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row["title"]; ?></h5>
                                    <p class="card-text" style="margin-top: -15px;"><small class="text-body-secondary"><?php echo $row["categoryType"]; ?></small></p>
                                    <p><?php echo '£ '.number_format($row["price"], 2); ?></p>
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
        <br/><br/>

    <script>
        $(function(){
            $("#navbar-container").load("navigation_bar.php");
        });
    </script>
</body>
</html>