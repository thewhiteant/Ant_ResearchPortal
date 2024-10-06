<?php
// Database configuration
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "rpdatabase"; 






try {
    $conn = new mysqli($servername, $username, $password, $database);
    $conn->set_charset("utf8mb4"); // Set character set if necessary
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

} catch (\Throwable $th) {
    echo "Tell Whiteant: " . $th->get_message();
}

?>
