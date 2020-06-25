<?php ob_start(); ?>
<div class="contanier-fluid">
    <div class="row">
        <div class="col-12 text-center">
            <h1>A voir : <?= $media['title']; ?> </h1>
            <div class="card">
                <div>
                    <iframe class="embed-responsive-item"
                            style='width:640px; height:368px' src="<?= $media['trailer_url']; ?>"
                            allowfullscreen></iframe>
                </div>
                <h5 class="card-header"><?= $media['title']; ?>
                </h5>
                <div class="card-body">

                    <h5 class="card-title">
                        <?php if ($_GET['type'] == 'serie') {
                            echo "Saison n° " . Media::getSeason($media['id']) . " Episode : " . Media::getEpisode($media['id']);
                        }

                        ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted">Sorti le <?= convertDate($media["release_date"]) ?></h6>
                    <p>RESUME : <?= $media['summary'] ?></p>


                    <a href="index.php?media=<?= $media['id']; ?>&show=true"
                       class="btn btn-primary">Voir<?php
                        if ($_GET['type'] == 'serie') {
                            echo " cet épisode";
                        } else {
                            echo "ce film";
                        } ?></a>

                </div>
            </div>
        </div>


        <?php if ($_GET['type'] == 'serie'): ?>
            <h1 class="col-12 text-center"><p>Voir les autres épisodes de la saison</p></h1>
            <?php foreach ($seasons as $season): ?>
                <div class="row">
                    <div class="col-12">
                        <div class="card" style="width: 18rem;">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="<?= $season['trailer_url']; ?>"
                                        allowfullscreen></iframe>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><?= $season['title']; ?></h5>
                                <h6 class="card-subtitle mb-2 text-muted">Sorti
                                    le <?= convertDate($season["release_date"]) ?></h6>
                                <p class="card-subtitle mb-2">Episode n°<?= $season["episode"] ?></p>
                                <a class="item"
                                   href="index.php?media=<?= $season['id']; ?>&type=<?= $season['type']; ?>">
                                    <a href="index.php?media=<?= $season['mediaId']; ?>&type=<?= $season['type']; ?>"
                                       class="btn btn-primary">Voir l'épisode</a>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        <?php endif; ?>

    </div>
</div>


<?php
$content = ob_get_clean();
?>


<?php require('dashboard.php'); ?>
