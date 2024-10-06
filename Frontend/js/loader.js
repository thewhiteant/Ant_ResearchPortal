window.addEventListener("load", function () {
  setTimeout(function () {
    const preloader = document.getElementById("preloader");
    preloader.style.opacity = "0";
    preloader.style.transition = "opacity 0.5s ease-in-out";

    setTimeout(function () {
      preloader.style.display = "none";

      fetch("check_session.php")
        .then((response) => response.json())
        .then((data) => {
          if (data.login) {
            window.location.href = "home.php";
          } else {
            window.location.href = "login.php";
          }
        });
    }, 500);
  }, 2000);
});
