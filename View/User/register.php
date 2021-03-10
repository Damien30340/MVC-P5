<div class="container">
    <div class="row">
        <div class="col-lg-12" data-aos="fade-up">
            <h2>Inscription</h2>
            <form method="POST" onsubmit="validatePass()" >
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="email" required name="mail" id="mail">
                    <div class="input-group-append"><span class="input-group-text" aria-label="fin de mail">@exemple.com</span></div>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend"><span class="input-group-text" aria-label="****">*</span></div>
                    <input type="password" class="form-control" placeholder="Mot de passe" required name="password" id="password">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend"><span class="input-group-text" aria-label="****">*</span></div>
                    <input type="password" class="form-control" placeholder="Retaper votre mot de passe" required name="password2" id="password2">
                </div>
                <button class="btn btn-primary" type="submit">S'inscrire</button>
            </form>
            <br />
            <a href="Login" style="color: white;">
                <div class="btn btn-primary">Déjà un compte ?</div>
            </a>
        </div>
    </div>
</div>

<script>
function validatePass(){

var pass = document.getElementById("password").value;
var pass2 = document.getElementById("password2").value;

if (pass != pass2) {
    alert("Les mots de passe ne sont pas identiques");
    return false;
}
else {
    return true;
}

}
</script>

