<?php
session_start(); 
if (!isset($_SESSION['login']) && !isset($_SESSION['usr']) && !isset($_SESSION['id'])) {
    header("Location: login.php");
    exit(); 
}

require_once "server.php";

$sql = "SELECT * FROM `documets` JOIN `auth` ON `userid` = `uid` ORDER BY `utime` DESC";
$result = $conn->query($sql);

  

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Research Portal</title>
    <head>
    <link rel="icon" href="../Assets/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="MainContent">  
        <div class="Contents">
 
            <div class="searchbox">
                <form action="#" class="sbf">
                    <input type="text" placeholder="Query">
                    <input type="submit" value="Search">
                </form>
            </div>

            <div class="docs">      
               
            <?php
            if ($result) {
                if ($result->num_rows > 0) {
                     while ($row = $result->fetch_assoc()) {
            ?>   

                <div class="doc">
                    <img src="../Assets/defaultdocpreview.png" alt="corrupt">
                  <div class="titleofpaper">
                     <?php echo  htmlspecialchars($row['name']); ?>
                     <div class="desc">
                    <?php echo  htmlspecialchars($row['des']); ?>
                  </div>
                  </div>
             
                <div class="metaInfo">
                    <?php
                        if($row['uid'] == $_SESSION['id']){
                    ?>
                        <div class="actionbtns" >
                           <a href="upload.php?edit= <?php echo  htmlspecialchars($row['id']);?> &&uid= <?php echo  htmlspecialchars($row['uid']);?> "><button class="abtn" style="background-color:#EF5A6F">Edit</button></a>
                           <a href="deletepaper.php?del= <?php echo  htmlspecialchars($row['id']);?> &&uid= <?php echo  htmlspecialchars($row['uid']);?>"><button class="abtn" style="background-color:#536493">Delete</button></a>
                        </div>

                    <?php
                        }
                    ?>

                    <div class="user" style="color: <?php echo  htmlspecialchars($row['color']);?>;">
                        @<?php echo  htmlspecialchars($row['nname']);?>
                    </div>
                    <hr>
                    <div class="time"><?php echo  htmlspecialchars($row['utime']);?></div>
                  </div>
                </div>         
                

             <?php 
                     }}}
             ?>
            </div>
            
    </div>



        <div class="side_content">
          
        <div class="upup">
        <div class = "usr" > <?php echo  $_SESSION['usr']; ?> </div>
        </div>
        <div class="upper">             
            <a href="login.php?error=lo"> <button class="logout-btn">Logout</button></a>

            <div class="dark_mode">
            <input type="checkbox" name="checkbox" id="toggle">
            <label for="toggle" class="switch"></label>
            </div>

            </div>

            <a href="upload.php">   
            <div class="upload">
            <svg class="Upload_svg"  xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"  fill="#e8eaed"><path d="M440-320v-326L336-542l-56-58 200-200 200 200-56 58-104-104v326h-80ZM240-160q-33 0-56.5-23.5T160-240v-120h80v120h480v-120h80v120q0 33-23.5 56.5T720-160H240Z"/></svg>        
            </div>  
            </a>   
  
          


            <div class="notepad">
              <div class="Notes-fns">
                  <h1>My Notes</h1>
                  <div class="note-input">
                      <textarea id="noteText" placeholder="Write your note here..."></textarea>
                      <button id="addNoteBtn">Add Note</button>
                  </div>
                  
              </div>
              <div class="notes-list" id="notesList"></div>
          </div>
                      
        </div>  
       



    
        </div>
          
      </div>

    </div>

    <script src="js/note.js"></script>

</body>
</html>