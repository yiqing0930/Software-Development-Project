<?php
    session_start();
    
    // Clear all session variables
    session_unset();

    // Destroy the session
    session_destroy();

    // Redirect user back to index.php
    header("Location: index.php");
    exit();
?>