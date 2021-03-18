<div class="container">
    <div class="row">
        <div class="col-lg-12" data-aos="fade-up">
            <h2>CONTACT</h2>
            
            <p>Le message sera envoyé avec votre identifiant <?= htmlspecialchars($this->profil->getMail()) ?></p>
            <form method="POST">
                <div class="form-group">
                    <input type="hidden" class="form-control" id="mail" name="mail" value="<?= htmlspecialchars($this->profil->getMail()) ?>">
                </div>
                <div class="form-group">
                    <label for="title">Sujet du message</label>
                    <input type="text" class="form-control" id="title" name="title" required placeholder="Sujet">
                </div>
                <div class="form-group">
                    <label for="content">Contenu du message</label>
                    <textarea class="form-control" id="content" name="content" required rows="3"></textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Envoyer</button>
                </div>
            </form>
        </div>
    </div>
</div>
