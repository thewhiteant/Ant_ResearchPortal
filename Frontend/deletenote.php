<?php

    require_once "server.php";

    session_start();
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        
    

            $nid = $_GET['noteid'];
            $myid = $_GET['ussr'];

   

            // if($myid == $_SESSION['id']){
                $sql = "DELETE FROM `notes` WHERE `notes`.`note_id` = $nid;";
                $done = $conn->query($sql);
                if($done){
                    
                     header("Location: home.php");
                }
            }
        
       
 
            //  }
        
        

        header("Location: home.php");
    
  
?>