<?php 
namespace APP;

use PDO;

class Username{

  private $idUser, $nameUser, $emailUser, $passwordUser, $active, $photo, $idAcc, $dataRegistro, $dataNascimento, $telefone;

  public $db;

  public function __construct($db){
    $this->db = $db;
  }

  public function __get($attr){
    return $this->$attr;
  }

  public function __set($attr, $value){
    $this->$attr = $value;
  }

  public function auth($username, $password){
    $this->__set("emailUser", $username);
    $this->__set("passwordUser", $password);

    $dados = array();

    $query = $this->db->prepare("SELECT * FROM username WHERE emailUser = :email AND passwordUser = :senha");
    $query->bindValue(":email",$this->__get("emailUser"));
    $query->bindValue(":senha", md5($this->__get("passwordUser")));
    $query->execute();

    if($query->rowCount() >  0){
      $dados = $query->fetch();
      return $dados;
    }

    return $dados;
  } // auth

  public function verificaEmail($email){
    $this->__set("emailuser",$email);

    $query = $this->db->prepare("SELECT * FROM username WHERE emailUser = :email");
    $query->bindValue(":email", $this->__get("emailuser"));
    $query->execute();

    if($query->rowCount() > 0){
      return false;
    }

    return true;
  } //; verificaEmail

  public function listaCargos(){
    $query = $this->db->query("SELECT * FROM acclevel");
    $resultado = $query->fetchAll();

    return $resultado;
  }



  public function cadastraMembro($nome, $email, $senha, $telefone, $dataNascimento, $cargo){
    $this->__set("nameUser", $nome);
    $this->__set("emailUser", $email);
    $this->__set("passwordUser", $senha);
    $this->__set("telefone", $telefone);
    $this->__set("dataNascimento", $dataNascimento);
    $this->__set("idAcc", $cargo);

    $query = $this->db->prepare("INSERT INTO username SET nameUser = :nome, emailUser = :email, passwordUser = :senha, telefone = :telefone, dataRegistro = NOW(), dataNascimento = :dataNascimento, active = 0, idAcc = :idAcc");
    
    $query->bindValue(":nome",$this->__get("nameUser") );
    $query->bindValue(":email",$this->__get("emailUser") );
    $query->bindValue(":senha",$this->__get("passwordUser") );
    $query->bindValue(":telefone",$this->__get("telefone") );
    $query->bindValue(":dataNascimento",$this->__get("dataNascimento") );
    $query->bindValue(":idAcc",$this->__get("idAcc") );

    $query->execute();

  } //cadastraMembro


} // Usuários
?>