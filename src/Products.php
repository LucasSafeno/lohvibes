<?php 
namespace APP;

use PDO;

class Products{

  private $idProduct, $internalCode, $nameProduct, $descriptionProduct, $priceProduct, $dateCriation, $registrationDate, $quantityStock,  $idCategory;


public $db;

public function __construct($db){
  $this->db = $db;
} //__construct

public function __get($attr){
  return $this->$attr;
} // __get

public function __set($attr, $value){
  $this->$attr = $value;
} // __set


public function veirifyCodeProduct($code){
  $this->__set("internalCode", $code);
  
  $query = $this->db->prepare("SELECT * FROM products WHERE internalCode = :code");
  $query->bindValue(":code", $this->__get("internalCode"));
  $query->execute();

  if($query->rowCount() > 0){
    return false;
  }
  return true;

}// veirifyCodeProduct

public function listCategory(){
  $query = $this->db->query("SELECT * FROM category");
  $res = $query->fetchAll();

  return $res;
}


public function registerProduct($codigo, $nome, $descricao, $preco, $dataFabricao, $quantidade, $categoria){
  $this->__set("internalCode", $codigo);
  $this->__set("nameProduct", $nome);
  $this->__set("descriptionProduct", $descricao);
  $this->__set("priceProduct", $preco);
  $this->__set("dateCriation", $dataFabricao);
  $this->__set("quantityStock", $quantidade);
  $this->__set("idCategory", $categoria);

  $query = $this->db->prepare("INSERT INTO products SET internalCode = :code, nameProduct = :nome, descriptionProduct = :descricao, priceProduct =  :preco, dateCriation = :dataFabricao, registrationDate = NOW(), quantityStock = :quantidade, idCategory = :categoria");
  $query->bindValue(":code",$this->__get("internalCode"));
  $query->bindValue(":nome",$this->__get("nameProduct"));
  $query->bindValue(":descricao",$this->__get("descriptionProduct"));
  $query->bindValue(":preco",$this->__get("priceProduct"));
  $query->bindValue(":dataFabricao",$this->__get("dateCriation"));
  $query->bindValue(":quantidade",$this->__get("quantityStock"));
  $query->bindValue(":categoria",$this->__get("idCategory"));
  $query->execute();

} //registerProduct


public function searchProduct($codigo){
  $this->__set("internalCode", $codigo);

  $query = $this->db->prepare("SELECT * FROM products WHERE internalCode = :codigo");
  $query->bindValue(":codigo", $this->__get("internalCode"));
  $query->execute();

  if($query->rowCount() > 0){
    $dados = $query->fetch();

    return $dados;
  }else{
    return false;
  }
} // searchProduct

} //Products
?>