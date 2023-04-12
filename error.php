<?php
// Start the session
session_start();

// Check if there is an error message in the session
if (isset($_SESSION["error_message"])) {
    // Display the error message
    echo "<p>Error: " . $_SESSION["error_message"] . "</p>";

    // Clear the error message from the session
    unset($_SESSION["error_message"]);
}

     // Password is incorrect
       $_SESSION["error_message"] = "Invalid email or password";
        header("Location: login.php");
         exit();
?>
