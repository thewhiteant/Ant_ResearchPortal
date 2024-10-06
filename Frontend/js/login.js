let Eye_color = ["#FCCD2A", "#fff", "#2d6423", "#4a4a4a"];
let i = 0;

function showHide() {
  var passInput = document.getElementById("password");
  var eyeBtn = document.getElementById("eyeBtn");
  if (passInput.type === "password") {
    passInput.type = "text";
    eyeBtn.style.backgroundColor = Eye_color[i];
  } else {
    passInput.type = "password";
    eyeBtn.style.backgroundColor = Eye_color[i + 1];
  }
}

const dark_mode = [
  {
    "--highlight": "#2d6423",
    "--bg_color": "#191A19",
    "--header_border": "#4E9F3D",
    "--text_shadow": "#ffeba4ca",
    "--box_shadow": "#ffffff00",
    "--eye_btn_bgc": "#4a4a4a",
    "--switch_bgc": "#00000040",
    "--switch_bgc_after": "#4a4a4a",
    "--switch_checked": "#2d6423",
    "--Eye_icon": "white",
    "--input_texts": "#FCCD2A",
    "--all_Text_clr": " #FCCD2A",
    "--Input_bg_clr": "#4a4a4a",
    "--bg1": "transparent",
    "--bg1b": "#fcce2ac6",
    "--bg2": "transparent",
    "--bg2b": "#ff875bd4",
    "--bg3": "transparent",
    "--bg3b": "lightgreen",
    "--bg4": "transparent",
    "--bg4b": "lightblue",
    "--blur_2": "12px",
  },
  {
    "--highlight": " #fccd2a",
    "--bg_color": " #c0eba6",
    "--header_border": " #000",
    "--text_shadow": " #000",
    "--box_shadow": " #0000007a",
    "--eye_btn_bgc": " #fff",
    "--switch_bgc": " #00000040",
    "--switch_bgc_after": " #f9ffeb",
    "--switch_checked": " #2d6423",
    "--Eye_icon": " #000",
    "--input_texts": " #000",
    "--all_Text_clr": " #000",
    "--Input_bg_clr": " #fff",
    "--bg1": "#fcce2ac6",
    "--bg2": "#ff875bd4",
    "--bg3": "lightgreen",
    "--bg4": "lightblue",
    "--bg1b": "black",
    "--bg2b": "black",
    "--bg3b": "black",
    "--bg4b": "black",
    "--blur_2": "8px",
  },
];

let darkMode_btn = document.getElementById("toggle");
darkMode_btn.addEventListener("change", () => {
  if (darkMode_btn.checked) {
    i = 2;
    change_theme(0);
    showHide();
    showHide();
  } else {
    i = 0;
    change_theme(1);
    showHide();
    showHide();
  }
});

function change_theme(e) {
  for (const [key, value] of Object.entries(dark_mode[e])) {
    document.documentElement.style.setProperty(key, value);
  }
}

// Validation Function
function validateForm() {
  const username = document.getElementById("username").value;
  const password = document.getElementById("password").value;

  // Check if username is empty
  if (username.trim() === "") {
    alert("Username cannot be empty.");
    return false; // Prevent form submission
  }

  // Check if password is at least 6 characters
  if (password.length < 6) {
    alert("Password must be at least 6 characters long.");
    return false; // Prevent form submission
  }

  // Additional validation can be added here

  return true; // Allow form submission
}

// Attach validation to form submission
document
  .getElementById("loginForm")
  .addEventListener("submit", function (event) {
    if (!validateForm()) {
      event.preventDefault(); // Prevent form submission if validation fails
    }
  });
