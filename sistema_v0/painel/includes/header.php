<?php 
require_once("../vendor/autoload.php");

use APP\Connection;
use APP\Username;

$c = new Connection();
$u = new Username($c->db);
$c->checkedSession();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Painel Loh Vibes - <?= isset($_GET['paginas']) ? strtoupper($_GET['paginas']) : 'HOME'; ?></title>
  <link rel="stylesheet" href="css/style.css">
  <!-- Icons Boostrap !-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
  
  <nav class="menu-lateral">
    <div class="btn-expandir">
      <i class="bi bi-list" id="btn-exp"></i>
    </div><!-- btn-expand !--> 


    <ul>
      <li class="item-menu">
        <a href="index.php?paginas=home">
          <span class="icon"><i class="bi bi-house-door"></i></span>
          <span class="txt-link">Home</span>
        </a>
      </li>

      <li class="item-menu">
        <a href="index.php?paginas=cliente">
          <span class="icon"><i class="bi bi-person-gear"></i></span>
          <span class="txt-link">Clientes</span>
        </a>
      </li>

      <li class="item-menu">
        <a href="index.php?paginas=equipe">
          <span class="icon"><i class="bi bi-person-vcard"></i></i></span>
          <span class="txt-link">Equipe</span>
        </a>
      </li>

      <li class="item-menu">
        <a href="index.php?paginas=estoque">
          <span class="icon"><i class="bi bi-bag"></i></span>
          <span class="txt-link">Estoque</span>
        </a>
      </li>

      <li class="item-menu">
        <a href="index.php?paginas=venda">
          <span class="icon"><i class="bi bi-cart-plus"></i></span>
          <span class="txt-link">Venda</span>
        </a>
      </li>

      <li class="item-menu">
        <a href="logout.php" class="sair">Sair</a>
      </li>

    </ul>
  </nav><!-- nav !--> 