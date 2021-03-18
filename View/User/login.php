<div class="container">
    <div class="row">
        <div class="col-lg-12" data-aos="fade-up">
            <h2>Connexion</h2>
            <?= isset($noLogin) ? $noLogin : null ?>
            <form action="Login" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="email"  required name="mail" id="mail">
                    <div class="input-group-append"><span class="input-group-text mailLabel" aria-label="fin de mail">@exemple.com</span></div>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend"><span class="input-group-text passLabel" aria-label="****">*</span></div>
                    <input type="password" class="form-control" placeholder="Mot de passe" required name="password" id="password">
                </div>
                <button class="btn btn-primary" type="submit">Se connecter</button>
            </form>
            <br />
            <a href="Register" style="color: white;">
                <div class="btn btn-primary">Première visite ? S'inscrire</div>
            </a>
            <br>
        </div>
    </div>
</div>
