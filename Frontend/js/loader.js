// Wait until the page has fully loaded
window.addEventListener("load", function () {
  // Add a 2-second delay before starting the fade out
  setTimeout(function () {
    // Fade out the preloader
    const preloader = document.getElementById("preloader");
    preloader.style.opacity = "0";
    preloader.style.transition = "opacity 0.5s ease-in-out";

    // After fade-out, redirect to home.html
    setTimeout(function () {
      preloader.style.display = "none";
      // Redirect to home.html
      window.location.href = "home.html";
    }, 500); // match the fade-out duration
  }, 2000); // 2-second delay before fade-out starts
});
