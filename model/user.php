<?php

require_once( 'database.php' );

class User {

  protected $id;
  protected $email;
  protected $password;
  protected $confirmKey;



  public function __construct( $user = null ) {

    if( $user != null ):
      $this->setId( isset( $user->id ) ? $user->id : null );
      $this->setEmail( $user->email );
      $this->setPassword( $user->password, isset( $user->password_confirm ) ? $user->password_confirm : false );
      $this->setConfirmKey($user->confirmKey);
    endif;
  }

  /***************************
  * -------- SETTERS ---------
  ***************************/

  public function setId( $id ) {
    $this->id = $id;
  }

  public function setEmail( $email ) {

    if ( !filter_var($email, FILTER_VALIDATE_EMAIL)):
      throw new Exception( 'Email incorrect' );
    endif;

    $this->email = $email;

  }

  public function setPassword( $password, $password_confirm = false ) {

    if( $password_confirm && $password != $password_confirm ):
      echo "Vos mots de passes sont différents";
      throw new Exception( 'Vos mots de passes sont différents' );
    endif;

    $this->password = hash("sha256", $password);

  }


    /**
     * @param mixed $confirmKey
     */
    public function setConfirmKey($confirmKey)
    {
        $this->confirmKey = $confirmKey;
    }

  /***************************
  * -------- GETTERS ---------
  ***************************/

  public function getId() {
    return $this->id;
  }

  public function getEmail() {
    return $this->email;
  }

  public function getPassword() {
    return $this->password;
  }


    /**
     * @return mixed
     */
    public function getConfirmKey()
    {
        return $this->confirmKey;
    }
  /*****************************************************************
  * -------- CREATE NEW USER IN DATABASE(BDD) ---------
  ******************************************************************/
  public function isUserinBdd(){
      $presence = false;
      $db  = init_db();
      // Check if email already exist
      try{
          $req  = $db->prepare( "SELECT * FROM user WHERE email = ?" );
          $req->execute( array( $this->getEmail() ) );
          if($req->rowCount() > 0){
              $presence =true;
              echo '<div class="alert alert-danger">Vous êtes deja inscris</div>';
          }

      }catch(Exception $e){
          echo "erreur lors de l'exectiution de la requete" . $e.getmessage;
      }
     ;
     $db = null;
     return $presence;
  }

  public function setUserInBdd() {
    // Open database connection
    $db   = init_db();
    // Insert new user
    $req  = $db->prepare( "INSERT INTO user ( email, password, confirmkey ) VALUES ( :email, :password, :confirmkey )" );
    $req->execute( array(
      'email'     => $this->getEmail(),
      'password'  => hash('SHA256',$this->getPassword()),
      'confirmkey'=> $this->getConfirmKey()
    ));
     $req->closeCursor();
    // Close databse connection
    $db = null;
  }

  /**************************************
  * -------- GET USER DATA BY ID --------
  ***************************************/

  public static function getUserById( $id ) {

    // Open database connection
    $db   = init_db();

    $req  = $db->prepare( "SELECT * FROM user WHERE id = ?" );
    $req->execute( array( $id ));

    // Close databse connection
    $db   = null;

    return $req->fetch();
  }

  /***************************************
  * ------- GET USER DATA BY EMAIL -------
  ****************************************/

  public function getUserByEmail() {

    // Open database connection
    $db   = init_db();

    $req  = $db->prepare( "SELECT * FROM user WHERE email = ?" );
    $req->execute( array( $this->getEmail() ));

    // Close databse connection
    $db   = null;

    return $req->fetch();
  }

  public static function generateUserKey(){
      $keylenght = 16;
      $key = "";
      for($i=1; $i>=$keylenght;$i++){
          $key .= mt_rand(0,9);
      }
      return (int)$key;
  }
}