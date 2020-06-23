<?php
require_once('model/media.php');

/***************************
 * ----- LOAD HOME PAGE -----
 ***************************/


function mediaPage(){

    echo "ceci est le dollar get. Nous sommes dans la fonction media page</br>";
    //var_dump($_GET['title']);

    $search = isset($_GET['title']) ? $_GET['title'] : null;
    if($search!=null){
        $medias = Media::filterMedias($search);
    }else{
        $medias = Media::displayAllMedias($search);
    }
    echo "ceci est le media : </br>";
    var_dump($medias);
    require_once('view/mediaListView.php');
}
    ?>