<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reader</title>
    <link rel="icon" href="../Assets/icon.png" type="image/x-icon">

    <link rel="stylesheet" href="css/read.css">

    <style>
        html, body {
    margin: 0;
    padding: 0;
    height: 100%;
    width: 100%;
    overflow: hidden; 
}

iframe {
    position: absolute; 
    top: 0; 
    left: 0; 
    width: 100%; 
    height: 100%; 
    border: none; 
}

    </style>
</head>
<body>

<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {


        $paper = htmlspecialchars(trim($_POST['paper']));
        $uploadDirectory = "../Backend/documents/";
        $fileDestination = $uploadDirectory . basename($paper);
        
    }
?>
     

    <iframe src="../Backend/documents/AES-implementation-on-a-grain-of-sand.pdf" frameborder="0"></iframe>
</body>
</html>
