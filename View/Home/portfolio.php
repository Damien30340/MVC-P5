<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2>Création détails</h2>
            <ol>
                <li><a href="/MVC-p5">Accueil</a></li>
                <li>Création détails</li>
            </ol>
        </div>

    </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Portfolio Details Section ======= -->
<section id="portfolio-details" class="portfolio-details">
    <div class="container">

        <div class="portfolio-details-container">

            <div class="owl-carousel portfolio-details-carousel">
                <img src="TemplateUser/assets/img/portfolio/portfolio-details<?= htmlspecialchars($folio->getId()) ?>-1.jpg" class="img-fluid" alt="">
                <img src="TemplateUser/assets/img/portfolio/portfolio-details<?= htmlspecialchars($folio->getId()) ?>-2.jpg" class="img-fluid" alt="">
                <img src="TemplateUser/assets/img/portfolio/portfolio-details<?= htmlspecialchars($folio->getId()) ?>-3.jpg" class="img-fluid" alt="">
            </div>

            <div class="portfolio-info">
                <h3>Information :</h3>
                <ul>
                    <li></li>
                    <li><strong>Catégorie</strong>: <?= htmlspecialchars($categorie) ?></li>
                    <li><strong>Client</strong>: <?= htmlspecialchars($folio->getClient()) ?></li>
                    <li><strong>Date du projet</strong>: <?= htmlspecialchars($folio->getDateProject()) ?></li>
                    <li><strong>Url du projet</strong>: <a href="<?= htmlspecialchars($folio->getUrlProject()) ?>"><?= htmlspecialchars($folio->getUrlProject()) ?>/</a></li>
                </ul>
            </div>

        </div>

        <div class="portfolio-description">
            <h2>Déscription du projet</h2>
            <p>
                <?= htmlspecialchars($folio->getContent()) ?>
                <br />
                <br />
                Liste des compétences acquises :
            </p>
            <ul>
                <?= $folio->getExpertise() ?>
            </ul>
        </div>

    </div>
</section><!-- End Portfolio Details Section -->
