<?php ob_start();
?>

<div class="row">
    <div class="col-12">
    <div class="col-md-4 offset-md-8">
        <form method="get">
            <div class="form-group has-btn">
                <input type="search" id="search" name="title" value="<?= $search; ?>" class="form-control"
                       placeholder="Rechercher un film ou une série">

                <button type="submit" class="btn btn-block bg-red">Valider</button>
            </div>
        </form>
    </div>
    </div>

        <?php foreach( $medias as $media ): ?>
    <div class="row">
        <div class="col-12">
        <div class="card" style="width: 18rem;">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="<?= $media['trailer_url']; ?>" allowfullscreen></iframe>
            </div>
            <div class="card-body">
                <h5 class="card-title"><?= $media['title']; ?></h5>
                <a class="item" href="index.php?media=<?= $media['id']; ?>&type=<?= $media['type']; ?>">
                    <a href="index.php?media=<?= $media['id'];?>&type=<?= $media['type']; ?>" class="btn btn-primary">Voir le trailer</a>
            </div>
        </div>
        </div >
    </div>

        <?php endforeach; ?>



<?php
// MOI : ob-get-clean récupére les données mises en tempaons et
$content = ob_get_clean();
?>


<?php require('dashboard.php'); ?>
