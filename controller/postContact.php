<?php
//var_dump($_POST);


// This function redirect to the view
function contactPage(){
    // checking if there are errors
    $errors=[];
    if(array_key_exists('message', $_POST) || $_POST['name']==''){
            $errors['name'] = "Veuillez renseigner votre nom";
    }
    if(array_key_exists('email', $_POST) || $_POST['email']==''){
        $errors['email'] = "Veuillez renseigner votre courriel";
    }
    if(array_key_exists('message', $_POST) || $_POST['message']==''){
        $errors['message'] = "Veuillez indiquer un message";
    }
    var_dump($errors);

    //if(!empty($errors)){
    //    header('Location:index.php');
    // session_start()
    //}
    //else {
        $message= htmlentities($_POST['message']);
        $headers = 'FROM : site@monsite.fr';
        mail('contactPage@codfixc.com', 'Formulaire de contact', $message, $headers);

   // }

    require('view/contactView.php');


}
?>