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

        .item-edit-icon {
            display: inline-block;
            width: 22px;
            height: 22px;
            line-height: 22px;
            text-align: center;
            border-radius: 50%; 
            background-color: #ccc; 
            cursor: pointer;
            margin-left: 5px;
        }

        /* Style for the delete icon container */
        .delete-icon-container {
            width: 30px; 
            height: 30px; 
            background-color: white;
            border-radius: 30%;
            display: flex;
            justify-content: center;
            align-items: center;
            border:none; 
            opacity: 0.75;
        }

        /* Style for the delete icon */
        .delete-icon {
            font-size: 16px; /* Adjust size as needed */
        }

    </style>
</head>
<body>
    <!-- Include Navigation Bar -->
    <div id="navbar-container"></div>

    <!-- Banner Section -->
    <div class="container-fluid mt-4 banner_section">
        <h3>My Profile</h3>
        <?php echo "Welcome Back, " .$_SESSION['userName']; ?>
    </div>

    <?php 
        include 'database.php';
        
        // User's email address
        $userEmail = $_SESSION['email']; 

        // SQL query to fetch user information
        $sqlUser = "SELECT firstName, lastName, dateBirth, profilePic FROM User WHERE email = '$userEmail'";

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
                                    <!-- Delete Icon with Circular Background -->
                                    <span class="position-absolute top-0 end-0 mt-2 me-2">
                                        <div class="delete-icon-container">
                                        <i class="fas fa-trash-alt delete-icon" style="color: #E34234;cursor: pointer;" onclick="testing('<?php echo $row['itemID']; ?>')"></i>
                                        </div>
                                    </span>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <span class="item-title" id="item-title-<?php echo $row['itemID']; ?>">
                                            <?php echo isset($row["title"]) ? $row["title"] : 'N/A';; ?>
                                        </span>  
                                        <span class="item-edit-icon" onclick="editField('item-title-<?php echo $row['itemID']; ?>')">&#9998;</span>
                                    </h5>
                                    <p class="card-text" style="margin-top: -15px;"><small class="text-body-secondary"><?php echo $row["categoryType"]; ?></small></p>
                                    <p>
                                        <strong>Value: £</strong>
                                        <span id="item-price-<?php echo $row['itemID']; ?>">
                                            <?php echo isset($row["price"]) ? number_format($row["price"], 0) : 'N/A'; ?>
                                        </span>
                                        <span class="item-edit-icon" onclick="editField('item-price-<?php echo $row['itemID']; ?>')">&#9998;</span>
                                    </p>
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

        <!-- Modal for displaying error message -->
        <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="errorModalLabel">Error</h5>
                    </div>
                    <div class="modal-body">
                        Please ensure that the input on;y contains a valid numeric value and is not empty!
                    </div>
                    <div class="modal-footer">
                        <a href="profile.php"><button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for delete confirmation -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete Confirmation</h5>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this item?
                </div>
                <div class="modal-footer">
                    <a href="profile.php"><button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button></a>
                    <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        var deleteItemId;
        // Function to handle delete confirmation
    function testing(itemId) {
        $('#deleteModal').modal('show');
        //$('#deleteModal').modal('show');
        deleteItemId = itemId;
        
    }

        function editField(fieldId) {
            var spanElement = document.getElementById(fieldId);
            var currentValue = spanElement.textContent.trim();

            var inputElement = document.createElement('input');
            inputElement.type = 'text';
            inputElement.value = currentValue;

            // Add an event listener for input validation
            inputElement.addEventListener('input', function(event) {
                // Allow only numeric input for the price field
                if (fieldId.startsWith('item-price-')) {
                    this.value = this.value.replace(/[^0-9.]/g, ''); // Allow decimal point as well
                }
             });

        spanElement.parentNode.replaceChild(inputElement, spanElement);

        inputElement.focus();

        inputElement.addEventListener('blur', function () {
            var newValue = inputElement.value.trim();

            var newSpanElement = document.createElement('span');
            newSpanElement.id = fieldId;
            newSpanElement.textContent = newValue;

            inputElement.parentNode.replaceChild(newSpanElement, inputElement);

            if (fieldId.startsWith('item-price-') && !isValidNumeric(newValue)) {
                $('#errorModal').modal('show'); // Show modal if input is not valid
            } else {
                updateDatabase(fieldId, newValue);
            }
        });
    }

    function isValidNumeric(value) {
        // Check if the value is a valid numeric value
        return !isNaN(parseFloat(value)) && isFinite(value);
    }

    function updateDatabase(fieldId, newValue) {
        $.ajax({
            type: "POST",
            url: "update_process.php", 
            data: {
                fieldId: fieldId,
                newValue: newValue
            },
            success: function(response) {
                console.log("Update successful");
            },
            error: function(xhr, status, error) {
                console.error("Error updating database:", error);
            }
        });
    }

    // Handle delete confirmation
    $('#confirmDeleteBtn').on('click', function() {
            // Perform delete action
            console.log(deleteItemId);
            deleteItem(deleteItemId);
            $('#deleteModal').modal('hide');
        });

    

        // Function to delete item
        function deleteItem(itemId) {
            $.ajax({
                url: 'delete_item.php',
                method: 'POST',
                data: { itemId: itemId },
                success: function(response) {
                    console.log("Item deleted successfully.");
                    // Reload the page or update the UI as needed
                    location.reload();
                },
                error: function(xhr, status, error) {
                    console.error("Error deleting item:", error);
                    alert("Error deleting item. Please try again later.");
                }
            });
        }
        

</script>

    <script>
        $(function(){
            $("#navbar-container").load("navigation_bar.php");
        });

        // Function to handle delete confirmation
        function confirmDelete(itemId) {
            $('#deleteConfirmationModal').modal('show');

            // Set up event listener for delete confirmation
            $('#confirmDeleteBtn').off('click').on('click', function() {
                // If user confirms delete, handle deletion
                deleteProduct(itemId);
                $('#deleteConfirmationModal').modal('hide');
            });
        }

        // Function to handle product deletion
        function deleteProduct(itemId) {
            $.ajax({
                type: "POST",
                url: "delete_item.php",
                data: { itemId: itemId },
                success: function(response) {
                    console.log("Product deleted successfully");
                    // Reload the page or update the UI as needed
                    location.reload();
                },
                error: function(xhr, status, error) {
                    console.error("Error deleting product:", error);
                }
            });
        }
    </script>
</body>
</html>