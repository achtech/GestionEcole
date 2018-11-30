var confirmField = document.getElementById("confirm_password");
var passwordField = document.getElementById("password");

function checkPasswordMatch(){
    var status = document.getElementById("password_status");
    var submit = document.getElementById("submit");

    status.innerHTML = "";
    submit.removeAttribute("disabled");

    if(confirmField.value === "")
        return;

    if(passwordField.value === confirmField.value)
        return;

    status.innerHTML = "Passwords don't match";
    submit.setAttribute("disabled", "disabled");
}

passwordField.addEventListener("change", function(event){
    checkPasswordMatch();
});
confirmField.addEventListener("change", function(event){
    checkPasswordMatch();
});