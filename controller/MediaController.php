<?php
require_once('model/media.php');

/***************************
 * ----- LOAD MEDIA PAGES -----
 ***************************/


function mediaPage(){

    $search = isset($_GET['title']) ? $_GET['title'] : null;
    if($search!=null){
        $medias = Media::filterMedias($search);
    }else{
        $medias = Media::displayAllMedias();
    }
    require_once('view/mediaListView.php');
}

function detailPage($id){
    // we check the presence and the type of our id so as to defend ourselfves against  attack
    if ((isset ($id))){
        $id_checked = (int)($id);
        $media = Media::displayOneMedia($id_checked);
        require_once("view/detailView.php");
    }
}

function detailPageSerie($id)
{
    if ((isset ($id))) {
        $id_checked = (int)($id);
        $media = Media::displayOneMedia($id_checked);
        $episode= Media::getMediaById($id_checked);
        $seasons = Media::showAllEpisodes($episode['title']);
        require_once("view/detailView.php");
    }
}
?>