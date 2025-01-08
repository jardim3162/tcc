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
<?php include "navusuario.php"; ?>

<body id="telainicial">
  <div class="text-center mb-4">
    <i class="bi bi-person-circle"></i>
    <p class="h5 text-success">Logado</p>
  </div>

  <div class="container">
    <h2 class="text-center mb-4">Estoque de Produtos</h2>
    <div class="table-responsive">
      <table class="table table-bordered table-striped">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Produto</th>
            <th scope="col" class="text-center">Estoque</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($materiais as $material) : ?>
            <tr>
              <td>
                <strong><?php echo $material['nome']; ?></strong><br>
                <small class="text-muted">Descrição: <?php echo $material['descricao']; ?></small>
              </td>
              <td class="text-center"> <?php echo $material['estoque']; ?> </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
  <div class="container container-form">
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

  <!-- Modal de Confirmação de Pedido -->
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

  <!-- Modal de Aviso para Separação por Vírgulas -->
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

      // Expressão regular ajustada para aceitar vírgulas com ou sem espaços extras
      const regex = /^[a-zA-ZÀ-ÿ0-9]+(\s*,\s*[a-zA-ZÀ-ÿ0-9]+)*$/;

      // Verificando se os campos de materiais e quantidades estão corretos
      if (!regex.test(materiais) || !regex.test(quantidades)) {
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
    }

    document.getElementById("confirmarEnvio").addEventListener("click", function () {
      document.getElementById("pedido").submit();
    });
  </script>
</body>
</html>
