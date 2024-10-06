<?php
    session_start(); // Start the session
    // $_SESSION['login'] = true; // Set the login status to true
    // $_SESSION['usr'] = "Kudds"; // Set the username
    // echo $_SESSION['login']." ". $_SESSION['usr'];
    session_destroy();
   
    echo "Done"; 
?>
