<?php 
require_once "../../vendor/autoload.php";

use APP\Connection;
use APP\Products;

$c = new Connection();
$p = new Products($c->db);


if($_SESSION['idAcc'] != 1 && $_SESSION['idAcc'] != 4){
  echo "<script>window.alert('Você não tem permissão')</script>";
  echo '<script>window.location="../index.php?paginas=estoque"</script>';
}else{
  if(empty($_POST['codigo'])){
    echo "<script>window.alert('Preencha todos os Dados!')</script>";
    echo '<script>window.location="../index.php?paginas=equipe"</script>';
    exit();
  }else{

    $codigo = addslashes($_POST['codigo']);
    $nome = addslashes($_POST['nome']);
    $descricao = addslashes($_POST['descricao']);
    $preco = addslashes($_POST['preco']);
    $dataFabricao = addslashes($_POST['dataFabricao']);
    $quantidade = addslashes($_POST['quantidade']);
    $categoria = addslashes($_POST['categoria']);

    if($p->veirifyCodeProduct($codigo)){

      // METODO CADASTRO PRODUTO
      $p->registerProduct($codigo, $nome, $descricao, $preco, $dataFabricao, $quantidade, $categoria);
      echo "<script>window.alert('Produto Cadastrado')</script>";
      echo '<script>window.location="../index.php?paginas=estoque"</script>';
    }else{
      echo "<script>window.alert('Código já utilizado. PRODUTO NÃO CADASTRADO')</script>";
      echo '<script>window.location="../index.php?paginas=estoque"</script>';
    }
  }
}


?>