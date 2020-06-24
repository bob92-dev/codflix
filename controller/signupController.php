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

function signUp( $post ) {

    $data = new stdClass();
    $data->email = $post['email'];
    if ($post['password'] === $post['password_confirm']){
        $data->password = $post['password'];
        }
    else {
        echo "erreur, indiquez deux fois le même mot de passe svp";
    }
    $data->confirmKey = User::generateUserKey();

    // creation of a new user with datas passed in the formulaire
    $user = new User($data);
    //enrolement of the user
    if(isset($user) && (!$user->isUserinBdd())) {
        $user->setUserInBdd();
        $_SESSION['user_id'] = $user->getId();
        header(mediaPage());
    }
    require('view/auth/signupView.php');
}
