<?php

    require_once "server.php";
    session_start();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    

    $note = $_POST['notess'];
    $myid = $_SESSION['id'];

    $sql = "INSERT INTO `notes` (`note`, `uid`) VALUES ('$note', '$myid');";
    $done = $conn->query($sql);
    if($done){
        header("Location: home.php");
    }
}

?>