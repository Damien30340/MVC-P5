<div class="container">
    <div class="row">
        <div class="col-lg-12" data-aos="fade-up">
            <h2>Inscription</h2>
            <form action="Register" method="POST">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="email" required name="mail" id="mail">
                    <div class="input-group-append"><span class="input-group-text mailLabel" aria-label="fin de mail">@exemple.com</span></div>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend"><span class="input-group-text passLabel" aria-label="password">*</span></div>
                    <input type="password" class="form-control" placeholder="Mot de passe (minimum 6 caractères)" required name="password" id="password" >
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend"><span class="input-group-text pass2Label" aria-label="password2">*</span></div>
                    <input type="password" class="form-control" placeholder="Retaper votre mot de passe" required name="password2" id="password2" >
                </div>
                <p style="font-size:0.8em;">Votre mot de passe doit se composer de 4 types de caractères différents : majuscules, minuscules, chiffres, et signes de ponctuation ou caractères spéciaux (€, #...).</p>
                <button class="btn btn-primary" type="submit">S'inscrire</button>
            </form>
            <br />
            <a href="Login" style="color: white;">
                <div class="btn btn-primary">Déjà un compte ?</div>
            </a>
        </div>
    </div>
</div>

