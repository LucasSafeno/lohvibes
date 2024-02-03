<?php 
namespace APP;

use PDOException;
use PDO;
define("URL", "http://localhost/lohvibes");


class Connection{
 
  public $db;


  public function __construct(){
    self::initSession();
    self::getConnection();    
  } // __construct

  public function initSession(){
    if (session_status() == PHP_SESSION_NONE) {
      session_start();
  }
  }//initSession();

  public function checkedSession(){
    if(!isset($_SESSION['nomeUser'])){
      header("Location:".URL."/index.php");
    }
  }


  public function getConnection(){

    // try connection to database
    try{
      $this->db = new PDO("mysql:dbname=lohvibes;host=localhost", "root", "root");
    }catch(PDOException $e){
      echo "Erro ao conectar banco de dados <br>";
      echo $e->getMessage();
      exit();
    }
  }// getConnection


}

?>