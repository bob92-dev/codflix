<?php ob_start(); ?>
<div class="media-detail-container">
    <div class="media-block-title">
        <h1>A voir : <?= $media["title"]; ?></h1>
        <div>
            <iframe style='width:480px; height:270px' allowfullscreen="" frameborder="0"
                    src="<?= $media["trailer_url"]; ?>"></iframe>
        </div>
    </div>
    <section class="media-block-description">
        <div class="media-fiche-film">
            <h2>Les détails du film</h2>
            <div><span>Genre :<span><?= $media["genre_id"]?></div>
            <div><span>Type :<span><?= $media["type"]?></div>
            <div><span>Sortie le : <span><?= $media["release_date"]?></div>
        </div>
        <div>
            <h2 class="media-fiche-film">RESUME :</h2>
            <?= $media["summary"]?>

        <?php if($_GET['type']=='serie'):?>
        <?php var_dump($_GET['type'])?>
          <?php foreach( $seasons as $season ): ?>
           <div class="video">
                <div>
                    <iframe allowfullscreen="" frameborder="0"
                            src="<?= $season['trailer_url']; ?>" ></iframe>
                </div>
            </div>
            <div class="title"><?= $season['title']; ?></div>
        </a>
                <?php endforeach; ?>
        <?php endif;?>

        </div>
      </section>





</div>


<?php
// MOI : ob-get-clean récupére les données mises en tempaons et
$content = ob_get_clean();
//var_dump($content);

?>


<?php require('dashboard.php'); ?>
