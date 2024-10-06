


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="icon" href="../Assets/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/login.css" />
  </head>
  <body>
    <div class="bg_left BGS"></div>
    <div class="bg_right BGS"></div>
    <div class="bg_top BGS"></div>
    <div class="bg_bottom BGS"></div>

    <div class="dark_mode">
      <input type="checkbox" name="checkbox" id="toggle" />
      <label for="toggle" class="switch"></label>
    </div>

    <h1 class="heading">Research Portal</h1>
    <form class="loginForm" id="loginForm" method = "post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validateForm()">
      <input class="inputs Username" type="text" placeholder="Username" name = "usr" id="username"autocomplete="off" />
      <div class="pass">
        <input
          class="inputs pinput"
          id="password"
          type="password"
          name = "pass"
          placeholder="Password"
        />
        <div class="eye" id="eyeBtn" onclick="showHide()">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            height="24px"
            viewBox="0 -960 960 960"
            width="24px"
            fill="#000000"
          >
            <path
              d="M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Zm0-300Zm0 220q113 0 207.5-59.5T832-500q-50-101-144.5-160.5T480-720q-113 0-207.5 59.5T128-500q50 101 144.5 160.5T480-280Z"
            />
          </svg>
        </div>
      </div>
      <input class="inputs subBtn" type="submit" />
    </form>


<?php

require_once 'server.php';


session_start();

if(isset($_SESSION['login']) && isset($_SESSION['usr'])){
  header("Location: home.php");
}


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
    $row = mysqli_fetch_assoc($res);
    if (mysqli_num_rows($res) > 0) {
          $_SESSION['login'] = true;
          $_SESSION['usr'] = $usrname;
          $_SESSION['id'] = $row['uid'];
          header("Location: home.php");
        echo "login sucessfull";
        } else {
          header("Location: login.php?error=wc");
      }
    mysqli_stmt_close($stmt);
  }


if ($_SERVER["REQUEST_METHOD"] == "GET") {

  $er = isset($_GET['error']);

  if($er == "wc"){
    echo ' <script> alert("Wrong Credential"); </script>';
  }
  

  if($er == "lo"){
    session_destroy();
  }
}

?>

    <script src="js/login.js"></script>
   
  </body>
</html>
