<?php 
require_once "../../vendor/autoload.php";

use APP\Connection;
use APP\Products;

$c = new Connection();
$p = new Products($c->db);

if(isset($_SESSION)){
  if(empty($_GET['codigo'])){
    echo "<script>window.alert('Preencha todos os Dados!')</script>";
    echo '<script>window.location="../index.php?paginas=estoque"</script>';
    exit();
  }else{
    $codigo = addslashes($_GET['codigo']);

    if($p->searchProduct($codigo)){
      $dados = $p->searchProduct($codigo);

      
      echo "<script>window.alert('Produto : ". $dados['nameProduct']."  Valor : ".$dados['priceProduct']." Quantidade em Estoque :  ".$dados['quantityStock']."')</script>";
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


?>