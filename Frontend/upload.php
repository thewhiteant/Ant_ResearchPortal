<?php
session_start(); 
if (!isset($_SESSION['login']) || !isset($_SESSION['usr']) || !isset($_SESSION['id'])) {
  header("Location: login.php");
    exit(); 
}

require_once "server.php";

$chk = false;
$row;
if ($_SERVER["REQUEST_METHOD"] == "GET") {

   if(isset($_GET['edit']) && isset($_GET['uid'])){

        if($_SESSION['id'] == $_GET['uid']){
            $myid = $_GET['edit'];
            $sql = "SELECT * FROM `documets` WHERE `id`= $myid;";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $chk = true;

        }else{
          header("Location: home.php");
                }
   }

}



if ($_SERVER["REQUEST_METHOD"] == "POST"){

  $iiid = $_POST["hid"];
  $fileName = $_POST["fileName"];
  $description = $_POST["description"];


  $getOldFileNameSql = $conn->prepare("SELECT `name` FROM `documets` WHERE `id` = ?");
  $getOldFileNameSql->bind_param("i", $iiid);
  $getOldFileNameSql->execute();
  $result = $getOldFileNameSql->get_result();
  $row = $result->fetch_assoc();
  $oldFileName = $row['name'];


  $sqlupdate = $conn->prepare("UPDATE `documets` SET `name` = ?, `des` = ? WHERE `id` = ?");
  $sqlupdate->bind_param("ssi", $fileName, $description, $iiid);
  
  if ($sqlupdate->execute()) {
      
      $uploadDirectory = "../Backend/documents/";
      $puranta = $uploadDirectory . basename($oldFileName);
      $notunta = $uploadDirectory . basename($fileName);

      if (file_exists($puranta)) {
          rename($puranta, $notunta);
      }
  }

  header("Location: home.php");
  exit();
} 

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Upload Paper</title>
    <link rel="icon" href="../Assets/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/upload.css" />
  </head>
  <body>
    <div class="upload-container">
      <form
        class="upload-form"
        action="<?php if(!$chk) { echo 'filemanage.php'; } else { echo htmlspecialchars($_SERVER["PHP_SELF"]); } ?>"

        method="post"
        enctype="multipart/form-data"
        onsubmit="return validateForm()"
      >
        <h1 class="form-title">Upload Your Research Paper</h1>

        <label for="pdfInput" class="file-label">
          <input type="file" id="pdfInput" name="pdfInput" accept=".pdf" <?php if($chk){echo "disabled";} ?> />
          <span class="file-button">Choose PDF</span>
        </label>

        <input
          type="text"
          id="fileName"
          name="fileName"
          placeholder="File Name"
          value="<?php if($chk) { echo htmlspecialchars($row['name']); } ?>"
          autocomplete = "off",

        />

        <textarea
          id="description"
          name="description"
          placeholder="Enter a short description"
        ><?php if($chk) {echo $row['des'];} ?></textarea>


        <input type="hidden" name="hid" value="<?php echo $chk ? $row['id'] : ''; ?>">

        <input type="submit" class="submit-btn" value="Upload Paper" />



      </form>
    </div>

    <script>

      const pdfInput = document.getElementById("pdfInput");
      const fileNameInput = document.getElementById("fileName");

      const maxSize = 100 * 1024 * 1024;

      pdfInput.addEventListener("change", function () {
        const file = pdfInput.files[0];
        if (file) {
          fileNameInput.value = file.name;
        }
      });

      function validateForm() {
        const file = pdfInput.files[0];
        const description = document.getElementById("description").value.trim();


        <?php if(!$chk) {
        
         ?>
     
        if (!file) {
          alert("Please choose a PDF file.");
          return false;
        }

        <?php 
          }
        ?>


        if (file.type !== "application/pdf") {
          alert("Only PDF files are allowed.");
          return false;
        }

        if (file.size > maxSize) {
          alert("The file size must not exceed 100MB.");
          return false;
        }
          

        return true; 
      }
    </script>
  </body>
</html>
