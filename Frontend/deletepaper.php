<?php
// Include the server connection file
require_once "server.php";

// Start session to access session variables
session_start();

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $delete = isset($_GET['del']) ? intval($_GET['del']) : 0;
    $uid = isset($_GET['uid']) ? intval($_GET['uid']) : 0;

    if ($delete > 0 && $uid > 0) {

        if ($_SESSION['id'] == $uid) {

            $gesql  = "SELECT * FROM `documets` WHERE `id` = ?";
            $stmt = $conn->prepare($gesql);
            $stmt->bind_param("i", $delete);
            $stmt->execute();
            $result = $stmt->get_result();

     
            if ($result && $result->num_rows > 0) {
                $nmae = $result->fetch_assoc();
                $name = $nmae['name'];
                $uploadDirectory = "../Backend/documents/";
                $fileDestination = $uploadDirectory . basename($name);
                $sql = "DELETE FROM `documets` WHERE `id` = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $delete);
                $deleteResult = $stmt->execute();
                
                if ($deleteResult) {
                   
                    if (file_exists($fileDestination)) {
                        if (unlink($fileDestination)) {
                            header("Location: home.php");
                            exit;
                        } else {
                            echo "Error deleting the file.";
                        }
                    } else {
                        echo "File does not exist.";
                    }
                } else {
                    echo "Error deleting the record from the database.";
                }
            } else {
                echo "Document not found.";
            }
        } else {
            // Redirect if the session id does not match the uid
            header("Location: home.php");
            exit;
        }
    } else {
        // Redirect if delete or uid parameters are not valid
        header("Location: home.php");
        exit;
    }
}
?>
