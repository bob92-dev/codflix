<?php

require_once( 'model/user.php' );

/****************************
* ----- LOAD SIGNUP PAGE -----
****************************/

function signupPage() {

  $user     = new stdClass();
  $user->id = isset( $_SESSION['user_id'] ) ? $_SESSION['user_id'] : false;

  if( !$user->id ):
    require('view/auth/signupView.php');
  else:
    require('view/homeView.php');
  endif;

}

/***************************
* ----- SIGNUP FUNCTION -----
***************************/

function signUp($post)
{

    $data = new stdClass();
    $data->email = $post['email'];
    if ($post['password'] === $post['password_confirm']) {
        $data->password = $post['password'];
        $data->confirmKey = User::generateUserKey();
        //echo "coucou confirmkey de data";
        //var_dump($data);

        // creation of a new user with datas passed in the formulaire
        $user = new User($data);
        //enrolement of the user
        if (isset($user) && (!$user->isUserinBdd())) {
            $user->setUserInBdd();
            //echo "coucou user";
            //var_dump($user);
            $userData= $user->getUserByEmail();
            //echo "bonjour user data";
            //var_dump($userData);
            $_SESSION['user_id'] = $userData['id'];
            //echo "coucou session";
            //var_dump($_SESSION);
           header( 'location: index.php ');
        }
    } else {
        echo '<div class="alert alert-danger">Erreur : les mots de passe ne correspondent pas</div>';
    }

    require('view/auth/signupView.php');
}
