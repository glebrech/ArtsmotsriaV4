<?php

/**
 * Class to handle programmation
 */

class Programme
{

  // Properties

  /**
  * @var int The programmation ID from the database
  */
  public $id = null;

  /**
  * @var string When the programme was published
  */
  public $dayofweek = null;

  /**
  * @var int Full title of the programme
  */
  public $year_festival = null;

  /**
  * @var string A short url_image of the programme
  */
  public $url_image = null;

  /**
  * @var string The HTML content of the programme
  */
  public $title = null;

  /**
  * @var string The HTML content of the programme
  */
  public $content = null;


  /**
  * Sets the object's properties using the values in the supplied array
  *
  * @param assoc The property values
  */

  public function __construct( $data=array() ) {
    if ( isset( $data['id'] ) ) $this->id = (int) $data['id'];
    if ( isset( $data['dayofweek'] ) ) $this->dayofweek = preg_replace ( "/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "", $data['dayofweek'] );
    if ( isset( $data['year_festival'] ) ) $this->year_festival = (int) $data['year_festival'];
    if ( isset( $data['title'] ) ) $this->title =  $data['title'] ;
    if ( isset( $data['content'] ) ) $this->content = $data['content'];
    if ( isset( $data['url_image'] ) ) $this->url_image = $data['url_image'];
    if ( isset( $data['publicationDate'] ) ) $this->publicationDate = (int) $data['publicationDate'];

  }


  /**
  * Sets the object's properties using the edit form post values in the supplied array
  *
  * @param assoc The form post values
  */

  public function storeFormValues ( $params ) {

    // Store all the parameters
    $this->__construct( $params );

    // Parse and store the publication date
    if ( isset($params['publicationDate']) ) {
      $publicationDate = explode ( '-', $params['publicationDate'] );

      if ( count($publicationDate) == 3 ) {
        list ( $y, $m, $d ) = $publicationDate;
        $this->publicationDate = mktime ( 0, 0, 0, $m, $d, $y );
      }
    }
  }


  /**
  * Returns an Programme object matching the given programme ID
  *
  * @param int The programme ID
  * @return Programme|false The programme object, or false if the record was not found or there was a problem
  */

  public static function getById( $id ) {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") );
    $sql = "SELECT *, UNIX_TIMESTAMP(publicationDate) AS publicationDate FROM programmation WHERE id = :id";
    $st = $conn->prepare( $sql );
    $st->bindValue( ":id", $id, PDO::PARAM_INT );
    $st->execute();
    $row = $st->fetch();
    $conn = null;
    if ( $row ) return new Programme( $row );
  }


  /**
  * Returns all (or a range of) Programme objects in the DB
  *
  * @param int Optional The number of rows to return (default=all)
  * @return Array|false A two-element array : results => array, a list of Programme objects; totalRows => Total number of programmation
  */

  public static function getList( $numRows=1000000 ) {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") );
    $sql = "SELECT SQL_CALC_FOUND_ROWS *, UNIX_TIMESTAMP(publicationDate) AS publicationDate FROM programmation
            ORDER BY publicationDate DESC LIMIT :numRows";

    $st = $conn->prepare( $sql );
    $st->bindValue( ":numRows", $numRows, PDO::PARAM_INT );
    $st->execute();
    $list = array();

    while ( $row = $st->fetch() ) {
      $programme = new Programme( $row );
      $list[] = $programme;
    }

    // Now get the total number of programmation that matched the criteria
    $sql = "SELECT FOUND_ROWS() AS totalRows";
    $totalRows = $conn->query( $sql )->fetch();
    $conn = null;
    return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
  }


  /**
  * Inserts the current Programme object into the database, and sets its ID property.
  */

  public function insert() {

    // Does the Programme object already have an ID?
    if ( !is_null( $this->id ) ) trigger_error ( "Programme::insert(): Attempt to insert an Programme object that already has its ID property set (to $this->id).", E_USER_ERROR );

    // Insert the Programme
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") );
    $sql = "INSERT INTO programmation ( publicationDate, dayofweek,title, year_festival, url_image , content ) 
    VALUES ( FROM_UNIXTIME(:publicationDate), :dayofweek, :title, :year_festival, :url_image, :content )";
    $st = $conn->prepare ( $sql );
    $st->bindValue( ":publicationDate", $this->publicationDate, PDO::PARAM_INT );
    $st->bindValue( ":dayofweek", $this->dayofweek, PDO::PARAM_STR );
    $st->bindValue( ":title", $this->title, PDO::PARAM_STR );
    $st->bindValue( ":year_festival", $this->year_festival, PDO::PARAM_INT );
    $st->bindValue( ":url_image", $this->url_image, PDO::PARAM_STR );
    $st->bindValue( ":content", $this->content, PDO::PARAM_STR );
    $st->execute();
    $this->id = $conn->lastInsertId();
    $conn = null;
  }


  /**
  * Updates the current Programme object in the database.
  */

  public function update() {

    // Does the Programme object have an ID?
    if ( is_null( $this->id ) ) trigger_error ( "Programme::update(): Attempt to update an Programme object that does not have its ID property set.", E_USER_ERROR );
   
    // Update the Programme
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") );
    $sql = "UPDATE programmation SET publicationDate=FROM_UNIXTIME(:publicationDate), dayofweek=:dayofweek, title=:title, year_festival=:year_festival, url_image=:url_image, content=:content WHERE id = :id";
    $st = $conn->prepare ( $sql );
    $st->bindValue( ":publicationDate", $this->publicationDate, PDO::PARAM_INT );
    $st->bindValue( ":dayofweek", $this->dayofweek, PDO::PARAM_STR );
    $st->bindValue( ":title", $this->title, PDO::PARAM_STR );
    $st->bindValue( ":year_festival", $this->year_festival, PDO::PARAM_INT );
    $st->bindValue( ":url_image", $this->url_image, PDO::PARAM_STR );
    $st->bindValue( ":content", $this->content, PDO::PARAM_STR );
    $st->bindValue( ":id", $this->id, PDO::PARAM_INT );
    $st->execute();
    $conn = null;
  }


  /**
  * Deletes the current Programme object from the database.
  */

  public function delete() {

    // Does the Programme object have an ID?
    if ( is_null( $this->id ) ) trigger_error ( "Programme::delete(): Attempt to delete an Programme object that does not have its ID property set.", E_USER_ERROR );

    // Delete the Programme
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") );
    $st = $conn->prepare ( "DELETE FROM programmation WHERE id = :id LIMIT 1" );
    $st->bindValue( ":id", $this->id, PDO::PARAM_INT );
    $st->execute();
    $conn = null;
  }

}

?>