<main>
  <div class="main-container">
        <div class="estoque-container">
          <div class="estoque-opcoes">

            <div class="estoque-opcao">
              <button type="submit"  class="openModal" data-modal-target="modalAdicionarProduto">Adicionar Produto</button>
            </div>
         
            <div class="estoque-opcao">
              <button type="submit" class="openModal" data-modal-target="modalConsultarProduto">Consultar Produto</button>
            </div>

            <div class="estoque-opcao">
              <button type="submit" class="openModal" data-modal-target="modalEditarProduto"">Editar Produto</button>
            </div>
          </div>
        </div>
  </div>

            <!-- MODAIS !-->

  <div id="modalAdicionarProduto" class="modal">
    <div class="modal-content">
          <h2>Cadastrar Produto</h2>
          <!-- Seu formulário aqui -->
            <form action="funcoes/cadastrar_produto.php" method="post" class="cadastroEstoque">

              <div class="form-control">
                <label for="codigo">Código Interno</label>
                <input type="text" name="codigo" id="codigo" size="6" maxlength="6">
              </div>

              <div class="form-control">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome">
              </div>

              <div class="form-control">
                <label for="descricao">Descrição</label>
                <input type="text" name="descricao" id="descricao">
              </div>

              <div class="form-control">
                <label for="preco">Preço</label>
                <input type="text" name="preco" id="preco" size="7" maxlength="7"> 
              </div>

              <div class="form-control">
                <label for="categoria">Categoria</label>
                <select name="categoria" id="categoria">
                <option value="" selected></option>
                  <?php 
                  use APP\Connection;
                  use APP\Products;

                  $c = new Connection();
                  $p = new Products($c->db);
                    $categorias = $p->listCategory();
                    foreach($categorias as $categoria):
                  ?>
                    <option value="<?= $categoria['idCategory']?>"><?= $categoria['titleCategory']?></option>
                  <?php endforeach; ?>
                </select>
              </div>

              <div class="form-control">
                <label for="dataFabricao">Data Fabricação</label>
                <input type="date" name="dataFabricao" id="dataFabricao"> 
              </div>

              <div class="form-control">
                <label for="quantidade">Qntd. Estoque</label>
                <input type="text" name="quantidade" id="quantidade" size="3" maxlength="3"> 
              </div>

              <div class="form-control btn-estoque">
                <button type="submit" class="btn-verde">Cadastrar</button>
              </div>
            </form>


          <button class="close-button closeModal">Fechar</button>
      </div>
  </div>


      <!-- Consulta produto !--> 
    <div id="modalConsultarProduto" class="modal">
      <div class="modal-content">
          <h2>Consultar Produto</h2>
          <!-- Formulário !--> 
          <form action="funcoes/consulta_produto.php" method="get">
            <div class="form-control">
              <label for="codigo">Código</label>
              <input type="text" name="codigo" id="codigo" size="6" maxlength="6">
            </div>

            <div class="form-control">
            <button type="submit" class="btn-verde">Pesquisar</button>
            </div>

          </form>
          <button class="close-button closeModal closeModalConsultarProduto">Fechar</button>
      </div>
    </div>

    <!-- Editar !-->
    <div id="modalEditarProduto" class="modal">
      <div class="modal-content">
         <!-- Formulário !--> 
         <form action="funcoes/editar_produto.php" method="get">
            <div class="form-control">
              <label for="codigo">Código</label>
              <input type="text" name="codigo" id="codigo" size="6" maxlength="6">
            </div>

            <div class="form-control">
            <button type="submit" class="btn-verde">Pesquisar</button>
            </div>

          </form>
          <button class="close-button closeModal closeModalConsultarProduto">Fechar</button>
      </div>
    </div>
</main>