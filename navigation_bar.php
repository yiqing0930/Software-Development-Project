<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <title>UWE SwapMe</title>

    <style>
        .social-icon {
            padding: 10px;
            color: white;
        }

        .navbar-1 {
            background-color: #0E1D35;
            padding: 1%;
            color: white;
        }

        .navbar-2 {
            background-color: #ffffff;
            padding-left: 30px;
            padding-right: 30px;
        }

        a {
            color: white;
        }

        .dropdown-toggle {
            cursor: pointer;
        }

        body { 
            font-family: 'Ubuntu', sans-serif;
        }
        
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">
            <img src="./img/logo.png" style="margin-left: 25px;" height="100" width="105%" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent" style="justify-content: right; margin-right: 30px;">
            <ul class="navbar-nav mr-auto" style="margin:right">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="aboutMe.php">About SwapMe</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="product.php">Items</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="publish.php">Swap Now</a>
                </li>
                <?php
                    session_start();
                    

                    if (isset($_SESSION['userName'])) {
                       // echo ' <li class="nav-item">';
                       // echo '<a class="nav-link" href="wishlist.php"><img src="./img/wishlist.png" style="margin-top: -3px; margin-right: 8px; margin-bottom: 10px; width: 29px; height: auto;"></a>';
                       // echo ' </li>';
                        echo '<a href="profile.php">';
                        echo '<li class="nav-item">
                                <img src="https://images.rawpixel.com/image_png_800/czNmcy1wcml2YXRlL3Jhd3BpeGVsX2ltYWdlcy93ZWJzaXRlX2NvbnRlbnQvbHIvdjkzNy1hZXctMTExXzEucG5n.png" style="margin-left: 5px; width: 39px; height: auto;">
                            </li>';
                        echo ' <li class="nav-item">';
                        echo '<a href="profile.php" class="nav-link">' . $_SESSION['userName'] . '</a>';
                        echo ' </li>';
                        echo '</a>';
                        echo ' <li class="nav-item">';
                        echo '<a class="nav-link" href="logout.php">Logout</a>';
                        echo ' </li>';
                    } else {
                        echo ' <li class="nav-item">';
                        echo '<a class="nav-link" href="login.php">Login</a>';
                        echo ' </li>';
                    }
                ?>
                
                <!--
                <li class="nav-item">
                    <img src="./img/profile.png" style="margin-left: 25px; width: 50px; height: auto;">
                </li>
               !-->
            </ul>
        </div>
    </nav>

    <script>
        $(document).ready(function () {
            $('#aboutLink').click(function (e) {
                e.preventDefault(); // Prevent default navigation
                window.location.href = $(this).attr('href'); // Go to aboutus.html
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            // Check if user is logged in
            <?php if(isset($_SESSION['userName'])): ?>
                console.log("User is logged in");
                // If logged in, hide the login modal
                $('#loginModal').modal('hide');
            <?php else: ?>
                console.log("User is not logged in");
                // If not logged in, show the login modal
                $('#loginModal').modal('show');
            <?php endif; ?>
        });

        // Function to redirect to the login page
        function redirectToLogin() {
            window.location.href = 'login.php'; 
        }

        // Function to redirect to the sell page
        function redirectToSellPage() {
            window.location.href = 'publish.php'; // Adjust the URL as needed
        }
    </script>
</body>

</html>