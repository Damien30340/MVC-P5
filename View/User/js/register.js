function validatePass(){

    var pass = document.getElementById("password").value;
    var pass2 = document.getElementById("password2").value;

    if (pass != pass2) {
        alert("Les mots de passe ne sont pas identiques");
        return false;
    }
    if (pass == pass2) {
        alert("Les mots de passs sont identiques");
        return false;
    }

}
