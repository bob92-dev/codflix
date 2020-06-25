<?php
require_once('model/media.php');

function historyPage(){
    $user_id = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : false;
    if ($user_id){
        var_dump($user_id);
        $history = Media::getHistory($_SESSION['user_id']);
        echo "ceci est le var dump de history</br>";
        var_dump($history);
        require_once('view/historyView.php');
    }
    else{
        header('location: index.php');
    }

}