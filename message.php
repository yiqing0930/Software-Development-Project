<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UWE SwapMe</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/2fa23f9518.js" crossorigin="anonymous"></script>
    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        /* Your existing styles */
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

        .card{
            border: none;
        }

        .card-body button{
            padding: 11px 14px;
            border-radius: 3px;
            background-color: #ab9fa2;
            color: white;
            margin: 10px 0px;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        .card-body button:hover{
            opacity: 0.8;
        }

        /* Additional styles for messaging window */
        .message-container {
            max-height: 400px;
            overflow-y: auto;
            padding: 10px;
        }

        .message {
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 10px;
            max-width: 70%;
        }

        .sent {
            background-color: #007bff;
            color: white;
            align-self: flex-end;
        }

        .received {
            background-color: #f1f0f0;
            color: black;
            align-self: flex-start;
        }
    </style>
</head>
<body>
    <!-- Include Navigation Bar -->
    <div id="navbar-container"></div>

    <div class="container mt-5">
        <!-- Messaging Window -->
        <div class="message-container">
            <!-- Example messages -->
            <div class="message sent">
                Hello, how can I help you today?
            </div>
            <div class="message received">
                Hi, I'm interested in purchasing a product.
            </div>
            <div class="message sent">
                Great! Which product are you interested in?
            </div>
        </div>

        <!-- Messaging Input -->
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Type your message..." aria-label="Type your message..." aria-describedby="button-send">
            <button class="btn btn-primary" type="button" id="button-send">Send</button>
        </div>
    </div>
    
    <script>
        $(function(){
            $("#navbar-container").load("navigation_bar.php");

            // Function to send message
            function sendMessage() {
                var message = $("input").val();
                if (message !== "") {
                    $(".message-container").append("<div class='message sent'>" + message + "</div>");
                    $("input").val("");
                    // Scroll to bottom of message container
                    $(".message-container").scrollTop($(".message-container")[0].scrollHeight);
                }
            }

            // Send message when button clicked
            $("#button-send").click(function() {
                sendMessage();
            });

            // Send message when Enter key pressed
            $("input").keypress(function(event) {
                if (event.which === 13) {
                    sendMessage();
                }
            });
        });
    </script>
</body>
</html>