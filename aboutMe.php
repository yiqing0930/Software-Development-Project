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
            /*background-image: url('https://images.unsplash.com/photo-1523712999610-f77fbcfc3843?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') !important; */
            background-image: url('https://images.unsplash.com/photo-1519606247872-0440aae9b827?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') !important;
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

        .director_card{
            background-color: #FAFAFA;
            border: none;
        }

        .card {
            border: none !important;
        }

        .card-title {
            margin-top: 5px;
            padding-bottom: 10px;
            text-align: center;
        }

        .card-body {
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100%;
            margin: 50px;
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

        .star-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center; 
            align-items: center;
        }

        .star {
            position: relative;
            width: 150px;
            /* Adjust for the width of the hexagon */
            height: 150px;
            /* Adjust for the height of the hexagon */
            background-color: #FF9090;
            clip-path: url(#starClip);
        }

        .star::after {
            content: "";
            width: 100px;
            height: 100px;
            position: absolute;
            background-color: white;
            clip-path: inherit;
            margin-left: -50px;
            margin-top: 25px;
        }

        .star-text {
            position: absolute;
            top: 55%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            z-index: 1;
            font-weight: bold;
            font-size: 30px;
            color: #FF9090;
        }
    </style>
</head>
<body>
    <!--Include Navigation Bar-->
    <div id="navbar-container"></div>

    <!--Banner Section-->
    <div class="container-fluid mt-4 banner_section">
        <h3>SwapMe</h3>
        <p> Secure and Exclusive Platform for UWE Staff and Students Only</p>
    </div>

    <svg id="color-fill" xmlns="http://www.w3.org/2000/svg" version="1.1" width="0" height="0"
        xmlns:xlink="http://www.w3.org/1999/xlink">
        <defs>
            <clipPath id="starClip" clipPathUnits="objectBoundingBox">
                <polygon
                    points="0.5 0, 0.61 0.35, 0.98 0.35, 0.68 0.57, 0.79 0.91, 0.5 0.7, 0.21 0.91, 0.32 0.57, 0.02 0.35, 0.39 0.35">
                </polygon>
            </clipPath>
        </defs>
    </svg>
    
    <div class="container mt-4">
        <div class=" mb-3 mt-5 director_card" >
            <div class="row g-0">
            <div class="col-md-4" style="background: white;">
                <div class="card-title">
                        <img src="./img/about1.jpg" class="img-fluid rounded-start">
                </div>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                <h4 class="card-title">Publish to Sell</h4>
                <p class="card-text"><small class="text-body-secondary">List Your Items Effortlessly​</small></p>
                <p class="card-text">Easily publish your unwanted items for sale on our platform. Simply upload photos, add descriptions, and set your price – it's that simple. Our user-friendly interface makes listing your items a breeze, allowing you to reach potential students to swap quickly and efficiently.</p>
                </div>
            </div>
            </div>
        </div>

        <div class="card mb-3 mt-5 director_card" >
            <div class="row g-0">
            <div class="col-md-8">
                <div class="card-body">
                <h4 class="card-title">Find Your Desired Items For Exchange</h4>
                <p class="card-text"><small class="text-body-secondary">Discover with Ease</small></p>
                <p class="card-text">Browse through listings to find the items you desire and add them to your favorites for quick access. With a diverse range of items available, from textbooks to electronic devices, you're sure to find exactly what you're looking for on Swap Me.</p>
                </div>
            </div>
            <div class="col-md-4" style="background: white;">
                <div class="card-title" >
                        <img src="https://media.istockphoto.com/id/1414126704/vector/online-shopping-concept.jpg?s=612x612&w=0&k=20&c=crMSuH56xz0OwOU9aD9WruiACBWyZY_TOnbG4hQaXec=" class="img-fluid rounded-start">
                        
                </div>
            </div>
            </div>
        </div>

        <div class=" mb-3 mt-5 director_card" >
            <div class="row g-0">
            <div class="col-md-4" style="background: white;">
                <div class="card-title">
                        <img src="./img/about2.jpg" class="img-fluid rounded-start">
                </div>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                <h4 class="card-title">Exclusive Access</h4>
                <p class="card-text"><small class="text-body-secondary">Trust Your Community​</small></p>
                <p class="card-text">Rest assured knowing that only UWE students have access to Swap Me. Our authentication process ensures a trusted community for all your exchange needs. By limiting access to UWE students, we create a sense of camaraderie and trust among our users, fostering a vibrant and active exchange community.</p>
                </div>
            </div>
            </div>
        </div>

        <div class="card mb-3 mt-5 director_card" >
            <div class="row g-0">
            <div class="col-md-8">
                <div class="card-body">
                <h4 class="card-title">Seamless Communication</h4>
                <p class="card-text"><small class="text-body-secondary">Connect Confidently</small></p>
                <p class="card-text">Communicate with other users, finalize exchange details, and confirm transactions effortlessly through our integrated messaging system. Our platform allows for clear and efficient communication, ensuring that all parties involved are on the same page throughout the exchange process.</p>
                </div>
            </div>
            <div class="col-md-4" style="background: white;">
                <div class="card-title" >
                        <img src="./img/about3.jpg" class="img-fluid rounded-start">
                        
                </div>
            </div>
            </div>
        </div>
    </div> 

    <!--Include Footer-->
    <div id="footer-container"></div>

    <script>
        $(function(){
            $("#navbar-container").load("navigation_bar.php");
        });
    </script>
</body>
</html>
