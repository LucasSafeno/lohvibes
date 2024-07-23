<?php 
  include_once "includes/header.php";

  $pagina = isset($_GET['paginas']) ? $_GET['paginas'] : 'home';

  echo $pagina;

  if($pagina =='home'){
    include_once("paginas/home.php");
  }else if($pagina == 'cliente'){
    include_once("paginas/cliente.php");
  }else if($pagina == 'estoque'){
    include_once("paginas/estoque.php");
  }else if($pagina == 'venda' ){
    include_once("paginas/venda.php");
  }else if($pagina == 'equipe'){
    include_once("paginas/equipe.php");
  }

  include_once "includes/footer.php";
?>



