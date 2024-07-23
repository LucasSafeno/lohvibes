<main>
  <div class="main-container">
        <div class="equipe-container">
            <div class="equipe-opcoes">

              <div class="equipe-opcao">
                  <button type="submit" class="openModal" data-modal-target="modalAdicionarMembro">Adicionar Membro a equipe</button>
              </div>

              <div class="equipe-opcao">
                  <button type="submit" onclick="mostrarAlerta()" >Pesquisar Membro</button>
              </div>
            </div>
        </div>
  </div>


  <div id="modalAdicionarMembro" class="modal">
    <div class="modal-content">
          <h2>Cadastrar Membro</h2>
          <!-- Seu formulário aqui -->
          <form action="funcoes/cadastrar_membro.php" method="post">
            <div class="form-control">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome">
            </div>

            <div class="form-control">
                <label for="email">Email</label>
                <input type="email" name="email" id="email">
            </div>

            <div class="form-control">
              <label for="senha">Senha</label>
              <input type="password" name="senha" id="senha" placeholder="Senha enviada via email!" disabled>
            </div>

            <div class="form-control">
              <label for="cargo">Cargo</label>
              <select name="cargo" id="cargo">
                <?php 
                  $cargos = $u->listaCargos();
                ?>
                <option value="" selected></option>
                <?php foreach($cargos as $cargo): ?>
                <option value="<?= $cargo['idAcc']?>"><?= $cargo['titleAcc'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="form-control">
              <label for="telefone">Telefone</label>
              <input type="text" name="telefone" id="telefone" maxlength="11" size="11" placeholder="DDD+NUMERO">
            </div>

            <div class="form-control">
              <label for="datanascimento">Data Nascimento</label>
              <input type="date" name="datanascimento" id="datanascimento">
            </div>

          
            <div class="form-control">
            <?php 
              if(isset($_SESSION['idAcc']) && $_SESSION['idAcc'] == 1 ){
            ?>
              <button type="submit" class="btn-verde">Cadastrar</button>
            <?php }else{ ?>
            <button type="submit" class="btn-desativado" disabled>Cadastrar</button>
            <?php } ?>
            </div>
        
          </form>
          <button class="close-button closeModal">Fechar</button>
      </div>
  </div>
</main>