<?php 
require_once "../../vendor/autoload.php";

use APP\Connection;
use APP\Products;

$c = new Connection();
$p = new Products($c->db);

if(isset($_SESSION)){
  if(empty($_POST['nome'])){
    echo "<script>window.alert('Preencha todos os Dados!')</script>";
    echo '<script>window.location="../index.php?paginas=estoque"</script>';
    exit();
  }else{
    $codigo = addslashes($_POST['codigo']);
    $nome = addslashes($_POST['nome']);
    $descricao = addslashes($_POST['descricao']);
    $preco = addslashes($_POST['preco']);
    $estoque = addslashes($_POST['estoque']);

    echo $codigo;
    if($p->updateProduct($codigo, $nome, $descricao, $preco, $estoque)){
      
      echo "<script>window.alert('Produto Editado');</script>";
      echo '<script>window.location="../index.php?paginas=estoque"</script>';
    }else{
      echo "<script>window.alert('Protudo não localizado')</script>";
      echo '<script>window.location="../index.php?paginas=estoque"</script>';
    }
  }
}else{
  echo "<script>window.alert('Você não tem permissão')</script>";
  echo '<script>window.location="../index.php?paginas=estoque"</script>';
}
