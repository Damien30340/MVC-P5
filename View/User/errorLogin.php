<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <div class="col-lg-12" data-aos="fade-up">
                <h2>Erreur de login</h2>
                <div class="alert alert-danger">
                    <?= filter_var($error) ?>
                </div>
            </div>
            <div class="col-lg-12" data-aos="fade-up">
                <p>
                    <a href="Login">Se connecter</a>
                </p>
                <p>
                    <a href="/MVC-p5">Accueil</a>
                </p>
            </div>
        </div>
    </div>
</div>