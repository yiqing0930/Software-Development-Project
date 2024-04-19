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
</head>
<body>
    <!--Include Navigation Bar-->
    <div id="navbar-container"></div>

    <!--Modal Message!-->
    <div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadModalLabel">Successful</h5>
                </div>
                <div class="modal-body">
                    <p>Item Uploaded Successfully!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="redirectToSellPage()">Ok</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function(){
            $("#navbar-container").load("navigation_bar.php");
        });

        <?php if (isset($_SESSION['upload']) && $_SESSION['upload'] == true): ?>
            // Show the modal
            $(document).ready(function(){
            $('#uploadModal').modal('show');
            });
        <?php endif; ?>

        // Function to redirect to the login page
        function redirectToSellPage() {
            window.location.href = 'sell.php'; 
        }
    </script>

</body>
</html>