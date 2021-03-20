<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <br>
            <h3>Votre e'mail est transmis</h3>
            <div class="alert alert-success">
                <p>Votre message</p>
                <p>Sujet : <?= filter_var($title) ?></p>
                <p>Contenu : <?= filter_var($content) ?></p>
            </div>
            <p><a href="Posts&1">Voir tous les posts</a></p>
            <p><a href="/MVC-p5">Accueil</a></p>
        </div>
    </div>
</div>