<!DOCTYPE html>
<html lang="en">
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
            background-image: url('https://images.unsplash.com/photo-1417733403748-83bbc7c05140?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') !important;
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

        .form-container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-container label {
            font-weight: bold;
        }

        /* Style for form inputs */
        .form-container input[type="text"],
        .form-container input[type="number"],
        .form-container select,
        .form-container textarea {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        /* Style for submit button */
        .form-container input[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .form-container input[type="submit"]:hover {
            background-color: #0056b3;
        }

        /* Style for file input */
        .form-container input[type="file"] {
            width: 100%;
            padding:  10px 20px;
            margin: 5px 0;
            box-sizing: border-box;
        }

        /* Style for form container */
        .form-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #F9F9F9;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Style for form title */
        .form-title {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }

        /* Style for form section */
        .form-section {
            margin-top: 20px;
        }

        .big-form-container{
            max-width: 1000px;
            margin: 0 auto;
            background-color: #EFEBEB;
            border: none;
            border-radius: 10px;
            margin-bottom: 50px;
        }

        .big-form-container input[type="submit"] {
            background-color: #654a4e;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 50px; 
            margin-bottom: 50px;
            margin-left: 810px;
            align-self: flex-end; 
        }

        .big-form-container input[type="submit"]:hover {
            opacity: 0.8;
        }

        /* Style for dropdown */
        .form-container select {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            /* Additional styling */
            background-color: #fff; /* Background color */
            color: #555; /* Text color */
            height: 40px; /* Adjust the height of the dropdown */
        }

        /* Style for dropdown arrow */
        .form-container select::after {
            content: '\25BC'; /* Unicode character for downward arrow */
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
        }

        /* Style for dropdown options container */
        .form-container select option {
            background-color: #fff; /* Background color */
            color: #555; /* Text color */
            padding: 10px;
        }

        /* Style for dropdown options when hovered */
        .form-container select option:hover {
            background-color: #f0f0f0; /* Background color on hover */
        }

    </style>
</head>
<body>
    <!--Include Navigation Bar-->
    <div id="navbar-container"></div>

    <!--Banner Section-->
    <div class="container-fluid mt-4 banner_section">
        <h3>Publish An Item For Swap</h3>
        <p>Offering your pre-loved items a new home.</p>
    </div>

    <!--Form Section-->
    <div class="container mt-5">
            <form action="upload_item_handler.php" method="post" enctype="multipart/form-data">
            <div class="big-form-container">
                <br/><br/><br/>
                <div class="form-container">
                    <label for="image">Select image to upload:</label>
                    <input type="file" name="image" id="image" onchange="previewImage(event)" accept="image/*">
                    <!-- Image preview area -->
                    <div style="padding-left: 20px;" id="imagePreview"></div>
                </div>
                <br/><br/>
                <div class="form-container">
                    <label for="prod_title">Title: </label><br/>
                    <input type="text" name="prod_title" id="prod_title" required>
                    <br/><br/>
                    <label for="desc">Description: </label><br/>
                    <textarea id="desc" name="desc" rows="4" cols="50"></textarea>
                </div>
                <br/><br/>
                <div class="form-container">
                    <label for="category">Category: </label>
                    <select id="category" name="category">
                        <!-- PHP to fetch and populate category -->
                        <?php
                            session_start();
                            //connect database
                            include 'database.php';

                            // SQL query to fetch category
                            $sql = "SELECT categoryID, categoryType FROM category";
                            $result = $conn->query($sql);

                            // Check if there are any category
                            if ($result->num_rows > 0) {
                                // Fetch and output each category as an option in the dropdown
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='" . $row["categoryID"] . "'>" . $row["categoryType"] . "</option>";
                                }
                            } else {
                                echo "<option value=''>No category found</option>";
                            }
                        ?>
                    </select>
                </div>
                <br/><br/>
                <div class="form-container">
                    <label for="price">Estimated Value: £</label>
                    <input type="number" name="price" id="price" min="1" value="10" step="1">
                </div>

                <input type="submit" value="Submit" name="submit">
            </div>
            </form>
    </div>

    <!--Modal Message!-->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Login Required</h5>
                </div>
                <div class="modal-body">
                    <p>Please log in to access the sell page.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="redirectToLogin()">Login</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // JavaScript function to preview image
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('imagePreview');
                output.innerHTML = '<img src="' + reader.result + '" width="200"/>';
            }
            reader.readAsDataURL(event.target.files[0]);
        }
        $(function(){
            $("#navbar-container").load("navigation_bar.php");
        });
    </script>

</body>
</html>