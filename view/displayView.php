<?php ob_start(); ?>
<div class="contanier-fluid">
    <div class="row">
        <div class="col-12 text-center">
            <h1>Vous allez voir : <?= $media['title']; ?></h1>
            <div class="card">
                <div>

                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="<?= $media['trailer_url']; ?>" allowfullscreen></iframe>
                    </div>

                </div>
                <h5 class="card-header"><?= $media['title']; ?>
                </h5>
                <div class="card-body">

                    <h5 class="card-title">
                        <?php echo "Saison n° " . Media::getSeason($media['id']) . " Episode : " . Media::getEpisode($media['id'])?>;

                        </h5>
                    <h6 class="card-subtitle mb-2 text-muted">Sorti le <?= convertDate($media["release_date"]) ?></h6>
                    <p>RESUME : <?= $media['summary'] ?></p>
                </div>
            </div>
        </div>

        <?php
        $content = ob_get_clean();
        ?>


        <?php require('dashboard.php'); ?>
