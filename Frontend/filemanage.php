<?php
require_once "server.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["pdfInput"])) {
    $uploadDirectory = "../Backend/documents/";
    $fileName = $_POST["fileName"];
    $fileTmpName = $_FILES["pdfInput"]["tmp_name"];
    $description = $_POST["description"];
    $originalFileName = $_FILES["pdfInput"]["name"];
    $fileExtension = pathinfo($originalFileName, PATHINFO_EXTENSION); 
    // $finalFileName = $fileName . '.' . $fileExtension;
    $finalFileName = $fileName;

    if (!is_dir($uploadDirectory)) {
        mkdir($uploadDirectory, 0777, true);
    }
    $currentDate = date("Y-m-d");
    $fileDestination = $uploadDirectory . basename($finalFileName);
    if (move_uploaded_file($fileTmpName, $fileDestination)) {
        $stmt = $conn->prepare("INSERT INTO `documets` (`name`, `des`, `userid`, `utime`) VALUES (?, ?, ?, ?)");
        if ($stmt === false) {
            echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
            exit();
        }

        $stmt->bind_param("ssss", $finalFileName, $description, $_SESSION['id'], $currentDate);

        if ($stmt->execute()) {
            header("Location: home.php"); 
            exit(); 
        } else {
            echo "Error executing statement: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error uploading the file.";
    }
}

$conn->close();
?>
