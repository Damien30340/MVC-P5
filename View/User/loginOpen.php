<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <h3>Vous êtes déjà connecté</h3>
            <p>Vous utilisez l'identifiant : <?= $_SESSION['user']->getMail() ?></p>
            <p><a href="Posts">Voir tous les posts</a></p>
            <p><a href="Disconnect">Se deconnecter</a></p>
        </div>
    </div>
</div>