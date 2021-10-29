<?php

require_once '../vendor/autoload.php';

use App\Controller\SessionController;
use App\Model\Produto;

$sessao = new SessionController();
$sessao->verificarLogin();

$arraySessao = $sessao->recuperarSessoes();

$instanciaProduto = new Produto();
$arrayProdutos = $instanciaProduto->recuperarProdutos($arraySessao['id']);

$lista = '';
foreach ($arrayProdutos as $produto) {
  $lista .= '<tr>
              <th scope="row">
              <a onclick=' . "deletarProduto('" . $produto['idProduto'] . "')" . '><i class="fas fa-trash"></i></a>
              </th>
              <td>
                <div id="table_celula" style="display: block;">' . $produto['nome'] .
    '<a onclick=' . "editarCampo('nome','" . $produto['idProduto'] . "')" . '><i class="fas fa-edit"></i></a>
                </div>
              </td>
              <td>
                <div id="table_celula" style="display: block;">' . $produto['quantidade'] .
    '<a onclick=' . "editarCampo('quantidade','" . $produto['idProduto'] . "')" . '><i class="fas fa-edit"></i></a>
                </div>
              </td>
              <td>
              <div id="table_celula" style="display: block;">' . $produto['preco'] .
    '<a onclick=' . "editarCampo('preco','" . $produto['idProduto'] . "')" . '><i class="fas fa-edit"></i></a>
              </div>
            </td>';
}

$lista != '' ? $lista : $lista = '<td colspan=4 style="text-align: center">Nenhum produto encontrado</td>' 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style/home.css">
  <!-- Link do font-awsome -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <!-- links bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  <title>Área de produtos</title>
</head>

<body>
  <section class="container-edicao" id="container_edicao" style="display: none;">
    <div class="aux-container-edicao">
      <i class="fas fa-times" onclick="fecharEdicao()"></i>

      <!-- Alteração de Nome -->
      <div class="edit-popup" id="alteracao_popup" style="display: none;">
        <form action="/app//Controller///Produto///editaProduto.php" method="post">
          <h4 id="titulo_edit_popup">Novo nome do produto</h4>
          <input type="text" id="novo_valor" name="novoValor" required>
          <button class="small-red-btn" type="submit">Alterar</button>
        </form>
      </div>

      <!-- Deletar item -->
      <div class="edit-popup" id="delecao_popup" style="display: none;">
        <form action="/app//Controller///Produto///deletaProduto.php" method="post">
          <h4 id="titulo_edit_popup">Deseja deletar esse produto?</h4>
          <button class="small-red-btn" type="submit" name="deletar">Sim</button>
        </form>
        <button class="small-white-btn" onclick="fecharDelecao()">Não</button>
      </div>

      <div class="background-popup">

      </div>
  </section>
  <header>
    <div class="container-header">
      <div class="container-title">
        Olá <?=$arraySessao['nome']?> , sejam bem-vindos!
      </div>
      <a href="/app//Controller//logout.php">
        <div class="header-section">Sair </div>
      </a>
    </div>
  </header>
  <section class="container-home">
    <h3>Produtos</h3>
    <div class="tabela-produtos">
      <div class="table-responsive-md">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">Excluir</th>
              <th scope="col">Produto</th>
              <th scope="col">Estoque</th>
              <th scope="col">Preço</th>
            </tr>
          </thead>
          <tbody>
            <?= $lista ?>
          </tbody>
        </table>
      </div>
      <button id="btnCadastrar" onclick="exibirAddProd()">Adicionar produto</button></a>
      <section class="container-addprod" id="container_addprod" style="display: none;">
        <form action="/app/Controller/Produto/adicionaProduto.php" method="post">
          <h3>Novo Produto</h3>
          <div class="input-box">
            <input name="nome" type="text" placeholder="Nome do produto" required>
            <input name="estoque" type="number" placeholder="Quantidade em estoque" required>
            <input name="preco" type="number" step="0.01" placeholder="Preço" required>
          </div>
          <button class="small-red-btn" type="submit">Adicionar</button>
        </form>
      </section>
  </section>

</body>

</html>

<script>
  function exibirAddProd() {
    container_addprod.style.display = "block";
  }

  function editarCampo(tipoDoCampo, idProduto) {
    container_edicao.style.display = "block";
    alteracao_popup.style.display = "block";
    switch (tipoDoCampo) {
      case 'cnome':
        titulo_edit_popup.innerHTML = "Alterar o nome do produto";
        <?php
        ?>
        break;
      case 'quantidade':
        titulo_edit_popup.innerHTML = "Alterar a quantidade em estoque";
        novo_valor.setAttribute('type', 'number');
        break;
      case 'preco':
        titulo_edit_popup.innerHTML = "Alterar o preço do produto";
        novo_valor.setAttribute('type', 'number');
        novo_valor.setAttribute('step', '0.01');
        break;
    }

    document.cookie = `idParaAlteracao=${idProduto}; expires=2022 12:00:00 UTC; path=/`;
    document.cookie = `campoParaAlteracao=${tipoDoCampo}; expires=2022 12:00:00 UTC; path=/`;
  }

  function fecharEdicao() {
    container_edicao.style.display = "none";
    alteracao_popup.style.display = "none";
    delecao_popup.style.display = "block";

  }

  function deletarProduto(idProduto) {
    container_edicao.style.display = "block";
    delecao_popup.style.display = "block";
    document.cookie = `idParaAlteracao=${idProduto}; expires=2022 12:00:00 UTC; path=/`;
  }

  function fecharDelecao() {
    container_edicao.style.display = "none";
    delecao_popup.style.display = "none";
    alteracao_popup.style.display = "none";

  }
</script>