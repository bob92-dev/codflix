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
        $seasonNumber = Media::getSeason($media["id"]);
        $seasons = Media::getAllEpisodesofOneSeason($media["title"], $seasonNumber);
        require_once("view/detailView.php");
    }

}

function displayPage($id){
    // we check the presence and the type of our id so as to defend ourselfves against  attack
    if ((isset ($id))){
        $id_checked = (int)($id);
        $media = Media::displayOneMedia($id_checked);
        $userId = $_SESSION['user_id'];
        $myDate = date("Y-m-d H:i:s");
        Media::addOneToHistory($userId, $id,$myDate);
        require_once("view/displayView.php");
    }
}



function convertDate($englishDate){
    $frenchDate = (date("m.d.y",strtotime($englishDate)));
    return $frenchDate;
}

?>