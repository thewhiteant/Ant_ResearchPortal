
<?php

    require_once "server.php";
    session_start();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $usrname = htmlspecialchars(trim($_POST['usr']));
    $password = htmlspecialchars(trim($_POST['pass']));
    $usrname_crypto = hash("sha256", $usrname);
    $password_crypto = hash("sha256", $password);
    
    $res = null;
    $sql = 'SELECT * FROM `auth` WHERE `username` = ? AND `password` = ?';
  

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'ss', $usrname_crypto, $password_crypto);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($res) > 0) {
          $_SESSION['login'] = true;
          $_SESSION['usr'] = $usrname;
          header("Location: home.php");
        echo "login sucessfull";
        } else {
          header("Location: login.php?error=wc");
      }
    mysqli_stmt_close($stmt);
  
  
}









?>