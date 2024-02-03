<?php 
require_once "../../vendor/autoload.php";

use APP\Connection;
use APP\Username;
$c = new Connection();
$u = new Username($c->db);


if($_SESSION['idAcc'] != 1){
  echo "<script>window.alert('Você não tem permissão')</script>";
  echo '<script>window.location="../index.php?paginas=equipe"</script>';
}else{
  if(empty($_POST['email'])){
    echo "<script>window.alert('Preencha todos os Dados!')</script>";
    echo '<script>window.location="../index.php?paginas=equipe"</script>';
    exit();
  }else{
  
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = md5($_POST['email']);
    $telefone = $_POST['telefone'];
    $datanascimento = $_POST['datanascimento'];
    $cargo = $_POST['cargo'];
  
      if($u->verificaEmail($email)){
  
          $u->cadastraMembro($nome, $email, $senha, $telefone, $datanascimento, $cargo);
          echo "<script>window.alert('Membro Cadastrado')</script>";
          echo '<script>window.location="../index.php?paginas=equipe"</script>';
      }else{
        echo "<script>window.alert('Email já cadastrado.')</script>";
        echo '<script>window.location="../index.php?paginas=estoque"</script>';
      }
  }
}




?>