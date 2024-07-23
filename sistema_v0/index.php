<?php 
  require_once("vendor/autoload.php");

  use APP\Connection;
  use APP\Username;

  $c = new Connection();
  $u = new Username($c->db);
  if(isset($_SESSION['idUser'])){
    header("Location: painel/index.php");
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestão Loh Vibes</title>
    <!-- Icons Bootstrap !-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- CSS CUSTOM !-->
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
  
    <div class="content">
        <div class="formulario">
          <form action="" method="POST">
            <h1 class="displa-2">Gestão LohVibes</h1>
              <div class="form-floating mb-3">
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                <label for="email">Seu Email</label>
              </div>

              <div class="form-floating">
                <input type="password" class="form-control" id="senha" name="senha" placeholder="Password">
                <label for="senha">Sua Senha</label>
              </div>

              <button type="submit" class="btn btn-primary  w-100 mt-4">Logar</button>

                <?php 
             if(isset($_POST['email']) && isset($_POST['senha'])){
                if(empty($_POST['email']) || empty($_POST['senha'])){ ?>
                <div class="alert alert-danger mt-2" role="alert">
                  Preencha todos os dados!
                </div>
                <?php 
                }else{
                  $email = addslashes($_POST['email']);
                  $senha = addslashes($_POST['senha']);

                  if($u->auth($email, $senha)){
                    $dados = $u->auth($email, $senha);

                    $_SESSION['idUser'] = $dados['idUser'];
                    $_SESSION['nomeUser'] = $dados['nameUser'];
                    $_SESSION['idAcc'] = $dados['idAcc'];

                    //echo $_SESSION['nomeUser'];
                    echo "<script>window.alert('Login realizado com sucesso. Aguarde');</script>";
                    echo '<script>window.location="painel/index.php"</script>';
                    exit();                  
                  }else{ ?>
                    <div class="alert alert-danger mt-2" role="alert">
                      Nenhum usuário encontrados
                    </div>
                  <?php
                  }
                  
                }
             }
                ?>
          </form>
        </div>
    </div>
 



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
  </body>
</html>