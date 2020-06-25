<?php
function dynamicFooter()
{
    if (isset($_GET['action']) && ($_GET['action'] == "contact")) {
        echo "<footer><a href='index.php'>Accueil</a></footer>";
    } else {
        echo "<footer><a href='index.php?action=contact'>Nous contacter</a></footer>";
    }
}
