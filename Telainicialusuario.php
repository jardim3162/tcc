<?php
session_start();
require_once "conexao.php";
require_once "funcoes.php";
$email = $_SESSION['Email'];
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tela Inicial</title>
  <link rel="stylesheet" href="css/styles.css?nocache=<?= rand() ?>">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>
<?php include "navusuario.php"; ?><br>
<br>

<body id="telainicial"><br>
  <div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2>Estoque de Produtos</h2>
      <form method="GET" class="form-inline">
        <div class="input-group">
          <input type="text" name="pesquisa" class="form-control" placeholder="Pesquisar material"
            value="<?= $termoPesquisa; ?>">
          <div class="input-group-append">
            <button type="submit" class="btn btn-primary">Pesquisar</button>
          </div>
        </div>
      </form>
    </div>

    <div class="table-responsive">
      <table class="table table-bordered table-striped">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Produto</th>
            <th scope="col" class="text-center">Estoque</th>
          </tr>
        </thead>
        <tbody>
          <?php if (empty($materiais)) : ?>
            <tr>
              <td colspan="2" class="text-center">Nenhum material encontrado.</td>
            </tr>
          <?php else : ?>
            <?php foreach ($materiais as $material) : ?>
              <tr>
                <td>
                  <strong><?= htmlspecialchars($material['nome']); ?></strong><br>
                  <small class="text-muted">Descrição: <?= htmlspecialchars($material['descricao']); ?></small>
                </td>
                <td class="text-center"><?= htmlspecialchars($material['estoque']); ?></td>
              </tr>
            <?php endforeach; ?>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>

  <div class="container container-form mt-5">
    <h4 class="text-center">Pedidos</h4>
    <p class="text-muted text-center">Realize seu Pedido abaixo.</p>
    <div class="row justify-content-center">
      <div class="col-md-8">
        <form action="pedido.php" method="POST" id="pedido" onsubmit="return confirmarPedido()">
          <input type="hidden" name="email" value="<?= $_SESSION['Email']; ?>">
          <div class="form-section">
            <h5 class="text-primary">Sessão 1</h5>
            <div class="form-group">
              <label for="nome_material">Digite os materiais (separados por vírgula):</label>
              <input type="text" id="nome_material" name="nome_material" class="form-control" placeholder="Exemplo: sabão, livros, papéis..." required>
            </div>
          </div>
          <div class="form-section">
            <h5 class="text-primary">Sessão 2</h5>
            <div class="form-group">
              <label for="quantidade">Digite as quantidades (separadas por vírgula):</label>
              <input type="text" id="quantidade" name="quantidade" class="form-control" placeholder="Exemplo: 2, 4, 6, 8..." required>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block">Efetuar Pedido</button>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="confirmModalLabel">Confirmar Pedido</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Tem certeza que deseja realizar este pedido?</p>
          <p><strong>Materiais:</strong> <span id="confirmMateriais"></span></p>
          <p><strong>Quantidades:</strong> <span id="confirmQuantidades"></span></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-primary" id="confirmarEnvio">Confirmar</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="commaAlertModal" tabindex="-1" role="dialog" aria-labelledby="commaAlertModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="commaAlertModalLabel">Atenção!</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Os campos 'Materiais' e 'Quantidades' devem ser preenchidos com valores separados apenas por vírgulas.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function confirmarPedido() {
      const materiais = document.getElementById("nome_material").value.trim();
      const quantidades = document.getElementById("quantidade").value.trim();

      if (materiais === "" || quantidades === "") {
        alert("Preencha todos os campos antes de enviar o pedido.");
        return false;
      }

      const regexMateriais = /^[a-zA-ZÀ-ÿ\s]+(\s*,\s*[a-zA-ZÀ-ÿ\s]+)*$/;
      const regexQuantidades = /^\d+(\s*,\s*\d+)*$/;

      if (!regexMateriais.test(materiais) || !regexQuantidades.test(quantidades)) {
        $('#commaAlertModal').modal('show');
        return false;
      }

      const materiaisArray = materiais.split(",").map(item => item.trim());
      const quantidadesArray = quantidades.split(",").map(item => item.trim());

      if (materiaisArray.length !== quantidadesArray.length) {
        alert("O número de materiais deve corresponder ao número de quantidades.");
        return false;
      }

      document.getElementById("confirmMateriais").innerText = materiais;
      document.getElementById("confirmQuantidades").innerText = quantidades;

      $('#confirmModal').modal('show');
      return false;
    };

    document.getElementById("confirmarEnvio").addEventListener("click", function() {
      document.getElementById("pedido").submit();
    });
  </script>
</body>

</html>