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

        .profile-picture-container {
            width: 320px; /* Adjust size as needed */
            height: 320px; /* Adjust size as needed */
            border-radius: 50%;
            overflow: hidden;
            margin-bottom: 20px; /* Adjust spacing */
        }

        .profile-picture {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .profile_container{
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            background-color: #f7f7f7;
        }

        .edit-icon {
            display: inline-block;
            width: 23px;
            height: 23px;
            line-height: 23px;
            text-align: center;
            border-radius: 50%; 
            background-color: #ccc; 
            cursor: pointer;
            margin-left: 5px;
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
        $sqlUser = "SELECT firstName, lastName, dateBirth, profilePic FROM Student WHERE email = '$userEmail'";

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
            $profileImg = $row['profilePic'];
        }else{
            echo 'User Not Found.';
        }
    ?>

    <br/>
    <div class="container mt-5">
    <div class="row">
        <div class="col-md-4">
            <div class="profile-picture-container">
                <img src="<?php echo $profileImg; ?>" alt="Profile Picture" class="profile-picture">
            </div>
        </div>
        <div class="col-md-8 profile_container">
            <div class="container mt-5" style="margin-left: 20px;">
                <h3>Personal Information</h3>
                <br/>
                <p><strong>Email: </strong><?php echo isset($_SESSION['email']) ? $_SESSION['email'] : 'N/A'; ?></p>
                
                <!-- Editable First Name -->
                <p>
                    <strong>First Name: </strong>
                    <span id="first-name"><?php echo isset($firstName) ? $firstName : 'N/A'; ?></span>
                    <span class="edit-icon" onclick="editField('first-name')">&#9998;</span>
                </p>
                
                <!-- Editable Last Name -->
                <p>
                    <strong>Last Name: </strong>
                    <span id="last-name"><?php echo isset($lastName) ? $lastName : 'N/A'; ?></span>
                    <span class="edit-icon" onclick="editField('last-name')">&#9998;</span>
                </p>
                
                <p><strong>Birth Date: </strong><?php echo isset($formattedDate) ? $formattedDate : 'N/A'; ?></p>
            </div>
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
    function editField(fieldId) {
        // Get the span element containing the text
        var spanElement = document.getElementById(fieldId);

        // Get the current text content
        var currentValue = spanElement.textContent.trim();

        // Create an input element
        var inputElement = document.createElement('input');
        inputElement.type = 'text';
        inputElement.value = currentValue;

        // Replace the span with the input element
        spanElement.parentNode.replaceChild(inputElement, spanElement);

        // Focus the input element
        inputElement.focus();

        // Add event listener to handle editing
        inputElement.addEventListener('blur', function () {
            // Get the new value from the input field
            var newValue = inputElement.value.trim();

            // Create a new span element with the new value
            var newSpanElement = document.createElement('span');
            newSpanElement.id = fieldId;
            newSpanElement.textContent = newValue;

            // Replace the input field with the new span element
            inputElement.parentNode.replaceChild(newSpanElement, inputElement);

            // Update the value in the database via AJAX
            updateDatabase(fieldId, newValue);
        });
    }

    function updateDatabase(fieldId, newValue) {
        // You'll need to implement AJAX here to send the updated value to the server and update the database
        // Example:
        /*
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'update.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                // Handle response from the server
                console.log(xhr.responseText);
            }
        };
        xhr.send('field=' + encodeURIComponent(fieldId) + '&value=' + encodeURIComponent(newValue));
        */
        // Replace 'update.php' with the URL of your server-side script that handles database updates
    }
</script>

    <script>
        $(function(){
            $("#navbar-container").load("navigation_bar.php");
        });
    </script>
</body>
</html>