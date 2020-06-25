<?php ob_start();
?>

<?php foreach ($history as $media): ?>
    <div class="row body_current">
        <div class="col-12">
            <div class="card" style="width: 18rem;">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="<?= $media['trailer_url']; ?>"
                            allowfullscreen></iframe>
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $media['title']; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted">Sorti le <?= convertDate($media["release_date"]) ?></h6>
                    <a class="item" href="index.php?media=<?= $media['id']; ?>&type=<?= $media['type']; ?>">
                        <a href="index.php?media=<?= $media['id']; ?>&type=<?= $media['type']; ?>"
                           class="btn btn-primary">Voir le trailer</a>
                </div>
            </div>
        </div>
    </div>

<?php endforeach; ?>



    <?php
    // MOI : ob-get-clean récupére les données mises en tempaons et
    $content = ob_get_clean();
    ?>


    <?php require('dashboard.php'); ?>