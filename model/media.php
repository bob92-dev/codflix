<?php

require_once('database.php');

class Media
{

    protected $id;
    protected $genre_id;
    protected $title;
    protected $type;
    protected $status;
    protected $release_date;
    protected $summary;
    protected $trailer_url;

    public function __construct($media)
    {

        $this->setId(isset($media->id) ? $media->id : null);
        $this->setGenreId($media->genre_id);
        $this->setTitle($media->title);
    }

    /***************************
     * -------- SETTERS ---------
     ***************************/

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setGenreId($genre_id)
    {
        $this->genre_id = $genre_id;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function setReleaseDate($release_date)
    {
        $this->release_date = $release_date;
    }

    /***************************
     * -------- GETTERS ---------
     ***************************/

    public function getId()
    {
        return $this->id;
    }

    public function getGenreId()
    {
        return $this->genre_id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getReleaseDate()
    {
        return $this->release_date;
    }

    public function getSummary()
    {
        return $this->summary;
    }

    public function getTrailerUrl()
    {
        return $this->trailer_url;
    }

    /************************************
     * -------- GET MEDIA BY ID --------
     ************************************/
    public static function getMediaById($id)
    {

        // Open database connection
        $db = init_db();

        $req = $db->prepare("SELECT * FROM media WHERE id = ?");
        $req->execute(array($id));

        // Close databse connection
        $db = null;

        return $req->fetch();
    }


    /***************************
     * -------- GET LIST --------
     ***************************/

    public static function filterMedias($title)
    {
        // Open database connection
        $db = init_db();
        $req = $db->prepare("SELECT * FROM media WHERE title LIKE '$title%' ORDER BY release_date DESC");
        $req->execute(array($title));
        // Close database connection
        $db = null;
        return $req->fetchAll();
    }


    public static function displayAllMedias()
    {
        $db = init_db();
        $req = $db->prepare("SELECT * FROM media ORDER BY release_date DESC");
        $req->execute();
        // Close database connection
        $db = null;
        return $req->fetchAll();
    }

    public static function displayOneMedia($id)
    {
        $db = init_db();
        $req = $db->prepare("SELECT * FROM media WHERE id= ?");
        $req->execute(array($id));
        $db = null;
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    public static function getAllEpisodesofOneSeason($title, $saisonName)
    {
        $db = init_db();
        $req = $db->prepare("SELECT * FROM media as M 
LEFT JOIN series as S
on M.id = S.mediaId
where title = ? AND saison= ?");
        $req->execute(array($title, $saisonName));
        $response = $req->fetchAll();
        $db = null;
        return $response;
    }

    public static function getSeason($id)
    {
        $db = init_db();
        $req = $db->prepare("SELECT * FROM series where mediaId=?");
        $req->execute(array($id));
        $response = $req->fetchAll();
        $db = null;
        return $response[0]["saison"];
    }

    public static function getEpisode($id)
    {
        $db = init_db();
        $req = $db->prepare("SELECT * FROM series where mediaId=?");
        $req->execute(array($id));
        $response = $req->fetchAll();
        $db = null;
        return $response[0]["episode"];
    }


    public static function getHistory($userid)
    {
        $db = init_db();
        $req = $db->prepare("SELECT * FROM history LEFT JOIN user on history.user_id = user.id LEFT JOIN media on history.media_id = media.id where user_id = ?");
        $req->execute(array($userid));
        $response = $req->fetchAll();
        $db = null;
        return $response;

    }

    public static function addOneToHistory($userid, $mediaId, $startdate)
    {
        $db = init_db();
        $req = $db->prepare("INSERT INTO history (user_id, media_id,start_date) VALUES (?, ?,?)");
        $req->execute(array($userid, $mediaId, $startdate));
        $db = null;

    }


}