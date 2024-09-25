function showHide() {
    var passInput = document.getElementById("password");
    var eyeBtn = document.getElementById("eyeBtn");
    if(passInput.type==="password"){
        passInput.type="text";
        eyeBtn.style.backgroundColor = "#FCCD2A";
    }
    else{
        passInput.type = "password";
        eyeBtn.style.backgroundColor = "#FFFBE6";    
    }
}