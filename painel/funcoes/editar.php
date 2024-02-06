<?php 
require_once("../../vendor/autoload.php");

use APP\Connection;
use APP\Username;
use APP\Products;

$c = new Connection();
$u = new Username($c->db);
$p = new Products($c->db);

$c->checkedSession();

$id = $_GET['id'];

$produto = $p->searchProduct($id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Produto - <?=$produto['nameProduct']; ?> </title>
</head>
<style>
  *{ 
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    color: white;
    transition: .5s;
  }
  a{
    text-decoration: none;
  }

  header{
    width: 100%;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: flex-end;
    background-color: #202020;
  }

  header ul{
    list-style: none;
    margin-right: 50px;
    display: flex;

  }
  header ul li {
    margin-right: 15px;
  }
  header ul li a{
    opacity: .8;
  }

  header ul li a:hover{
    opacity: 1;
  }

  main{
    width: 100%;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  main form h2, main form label, main form input{
    color: black;
  }
  main form h2{
    margin-bottom: 15px;
    border-bottom: 1px solid black;
  }

  main form input{
    outline: none;
    border: none;
    height: 30px;
    background: #202020;
    color: white;
    border-bottom: 1px solid black;
    text-align: center;
  }

  main form{
    display: flex;
    flex-direction: column;
    text-align: center;
  }

  main form .form-control label{
    font-weight: bold;
    text-transform: uppercase;
  }
  main form .form-control input{
    width: 100%;

  }

  button{
  margin-top: 10px;
  background-color: #4CEF6A;
  color: black;
  font-weight: bold;
  text-transform: uppercase;
  padding: 15px 70px;
  border: 1px solid  #0DFF00;
  border-radius: 5px;
  cursor: pointer;
  opacity: .9;
  margin: 10px 0;;
  }

  button:hover{
    opacity: 1;
    border: 1px solid black;
  }

</style>
<body>

  <header>
    <nav>
      <ul>
        <li>Olá, <?=$_SESSION['nomeUser']?></li>
        <li><a href="../logout.php">Sair</a></li>
      </ul>
    </nav>
  </header>

  <main>

      <form action="editar_submit.php" method="POST">
          <h2><?=$produto['nameProduct']?></h2>

          <div class="form-control">
            <label for="codigo">Código</label>
            <input type="text" name="codigo" id="codigo" value="<?=$id?>">
          </div>

          <div class="form-control">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome"  placeholder="<?=$produto['nameProduct']?>">
          </div>


          <div class="form-control">
            <label for="descricao">Descrição</label>
            <input type="text" name="descricao" id="descricao"  placeholder="<?=$produto['descriptionProduct']?>">
          </div>


          <div class="form-control">
                <label for="preco">Preço</label>
                <input type="text" name="preco" id="preco" size="7" maxlength="7" placeholder="<?=$produto['priceProduct']?>"> 
          </div>

          <div class="form-control">
                <label for="estoque">Estoque</label>
                <input type="text" name="estoque" id="estoque" size="7" maxlength="7" placeholder="<?=$produto['quantityStock']?>"> 
          </div>

          <div class="form-control">
            <button type="submit">Editar</button>
          </div>


      </form>
  
  </main>

  
</body>
</html>