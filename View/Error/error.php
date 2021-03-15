    <div class="error">
        <h1>Une erreur s'est produite</h1>
        <div class="error-message">Message : <?php echo $exception->getMessage(); ?></div>
        <div class="error-stack">Pile d'éxecution : <?php echo $exception->getTraceAsString(); ?></div>
        <?php if(method_exists($exception, "getMoreDetail")) { ?>
            <div class="error-detail"><?php echo $exception->getMoreDetail(); ?></div>
        <?php } ?>
    </div>
