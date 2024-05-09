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

  <style>
    .carousel-item img {
      object-fit: cover;
    }

    .carousel-caption {
      left: 3% !important;
      background: rgba(0, 0, 0, 0.6);
      text-align: left !important;
      width: 50%;
      padding: 2%;
      margin-bottom: 3%;
      font-size: 1.5vw;
    }

    button.active {
      background-color: #00E0FF !important;
    }

    .carousel-control-next,
    .carousel-control-prev {
      width: 5%;
    }

    .img-fluid {
      width: 100%;
      min-height: 600px;
      max-height: 600px;
    }

    /* On screens that are 992px or less, set the background color to blue */
    @media screen and (max-width: 992px) {
      .img-fluid {
        min-height: 450px;
        max-height: 450px;
      }
    }

    /* On screens that are 600px or less, set the background color to olive */
    @media screen and (max-width: 600px) {
      .img-fluid {
        min-height: 200px;
        max-height: 200px;
      }
    }
  </style>

</head>

<body>
  <!-- Include a container for the navigation bar -->
  <div id="navbar-container"></div>

  <div id="carouselExampleCaptions" class="carousel slide">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
        aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
        aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
        aria-label="Slide 3"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3"
        aria-label="Slide 4"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="https://assets.hydrock.com/production/resources/images/Projects/UWE-Facility-of-Engineering-hero.jpg?w=2500&q=95&fm=webp&fit=min&crop=focalpoint&fp-x=0.5&fp-y=0.5&dm=1655822657&s=a0162ab1d2323291c85ee247cfe9386f" class="d-block img-fluid">
        <div class="container-fluid">
          <div class="carousel-caption d-md-block">
            <h3 style="font-size: 3vw">UWE SwapMe</h3>
            <p>A dedicated platform designed specifically for UWE staff and students. We are committed to promoting sustainable practices and fostering a sense of community among UWE staff and students.</p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img src="./img/uwe_img2.jpeg" class="d-block img-fluid" alt="...">
        <div class="container-fluid">
          <div class="carousel-caption d-md-block">
            <h3 style="font-size: 3vw">What We Do</h3>
            <p>We provide a convenient and user-friendly platform for UWE staff and students to exchange items they no longer need for ones they desire.</p>
            </p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img src="https://darkroom.ribaj.com/0/668/db5c9562b051bc05b7f63d85a302db65:1733924d6c2411d89d088dbcb1a293d7/uwe-bristol-school-of-engineering" class="d-block img-fluid" alt="...">
        <div class="container-fluid">
          <div class="carousel-caption d-md-block">
            <h3 style="font-size: 3vw">Our Misson</h3>
            <p>Our goal is to reduce waste, promote eco-conscious behavior, and create opportunities for meaningful interactions among UWE community.</p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img src="https://darkroom.ribaj.com/0/668/5956c13180f7ce3f5e899f4d84b2310c:7b568f7568a4808ecc142e81013cdb0b/uwe-bristol-school-of-engineering" class="d-block img-fluid" alt="...">
        <div class="container-fluid">
          <div class="carousel-caption d-md-block">
            <h3 style="font-size: 3vw">Join SwapMe Today</h3>
            <p>Be a part of the sustainable movement at UWE. Together, we can make a positive impact on the environment while building a stronger sense of community within our campus.</p>
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <!-- Include the navigation bar using JavaScript -->
  <script>
    $(function () {
      $("#navbar-container").load("navigation_bar.php");
    });
  </script>
</body>

</html>