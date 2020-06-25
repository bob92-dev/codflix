<?php

/**
 * This function hundles the bahavior of the form "Nous contacter"
 *It's send an email to our web adress,handle errors and then, send us an e mail.
 */
function contactPage()
{
    if (!empty($_POST) && (($_POST['name'] == '') || $_POST['email'] == '' || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) || $_POST['message'] == '')) {
        echo '<div class="alert alert-warning">Veuillez renseigner convenablement tous les champs nécessaires</div>';
    } elseif (empty($_POST)) {
        echo '<div class="alert alert-info">Pour toute demande, envoyez-nous un message !</div>';
    } else {
        $message = htmlentities($_POST['message']);
        $messageChecked = "'" . $message . "'";
        $mail = htmlentities($_POST['email']);
        $name = htmlentities($_POST['name']);
        $headers = "'FROM :" . $mail . "'";
        $babar = mail('contact@codflix.com', 'Formulaire de contact', $messageChecked, $headers);
        echo '<div class="alert alert-success">Votre e-mail nous a été transmis</div>';
    }

    require('view/contactView.php');

}

?>