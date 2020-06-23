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
    $data->password = $post['password'];
    $data->password_confirm = $post['password_confirm'];


    // creation of a new user with datas passed in the formulaire
    $user = new User($data);
    $user->createUser();
    $userData = $user->getUserByEmail();

    // turning the session on
    if ($userData && sizeof($userData) != 0):
        if ($user->getPassword() == $userData['password']):

            // Set session
            $_SESSION['user_id'] = $userData['id'];

            header('location: index.php ');
        endif;
    endif;

    require('view/auth/signupView.php');
}
