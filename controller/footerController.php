<?php
function dynamicFooter(){
    if ($_GET['action']=="contacter"){
        echo "<footer><a href='index.php'>Accueil</a></footer>";
    }
    else{
        echo "<footer><a href='index.php?action=contacter'>Nous contacter</a></footer>";
    }
}
