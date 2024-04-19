<!DOCTYPE html>
<html>
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
body{
    background-color: #edeaeb;
    font-family: 'Ubuntu', sans-serif;
}

form {
    border: 3px solid #f1f1f1;
}

input[type=text], input[type=password] {
  width: 100%;
  padding: 10px;
  margin: 5px 0;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  
}

button {
  background-color: #ab9fa2;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button.close {
  background-color: #f44336;
  padding: 6px 14px;
  float: right;
  width : 6%;
  text-align: center; !important;
  margin-top: -16px;
  margin-right: -16px;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 6px 16px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

.container {
    width: 620px; /* Set desired width */
    margin: 0 auto; /* Center the container horizontally */
    padding: 16px;
    background-color: white; /* Ensure background color */
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>
<div class="container mt-6">
    <a href="index.php"><button class="close" onclick="closeWindow()">X</button></a><br/>
    <h2 style="text-align:center;">Login</h2>
    <form action="login_process.php" method="post">
    <div class="imgcontainer">
        <img src="./img/profile.png" class="avatar" style="height=50%; width=100%;">
    </div>

    <div class="container1" style="margin: 30px;">
        <label for="uname"><b>Student Email</b></label>
        <input type="text" placeholder="Enter Email" name="email" required>
        <br/>
        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" id="myInput" required>
        <label>
        <input type="checkbox" onclick="showPassword()">Show Password
        </label><br><br>
        <a href="index.php"><button type="submit">Login</button></a>
    </div>
    </form>
</div>

<!-- Modal -->
<div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="errorModalLabel">Error</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p id="errorMessage">Incorrect Password. Please Check and Re-Enter!</p>
      </div>
    </div>
  </div>
</div>

<script>
function showPassword() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

function closeWindow() {
  window.close();
}
</script>

<script>
  // Check if there's an error message
  <?php if (isset($_GET['error']) && $_GET['error'] === "incorrect_password"): ?>
    // Show the modal
    $(document).ready(function(){
      $('#errorModal').modal('show');
    });
  <?php endif; ?>
</script>

</body>
</html>