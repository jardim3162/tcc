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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
</head>
<?php include "navusuario.php"; ?><br>
<body>
<div class="container-pedido">
 <?php if (isset($_SESSION['pedido_sucess']) && $_SESSION['pedido_sucess'] == true) { ?>
        <script>
            Swal.fire({
                position: "top-middle", 
                icon: "success",
                title: "Pedido efetuado com sucesso!",
                showConfirmButton: false,
                timer: 1500,
                customClass: {
                popup: 'small-popup'
                }
            });
        </script>
        <?php
        unset($_SESSION['pedido_sucess']);
        ?>
    <?php } ?>

  <div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2>Estoque de Produtos</h2>
      <input type="text" id="pesquisaMateriais" class="form-control w-25" placeholder="Pesquisar materiais...">
    </div>
    <div class="table-responsive">
      <form id="pedidoForm" action="pedido.php" method="post">
        <table class="table table-bordered table-hover text-center">
          <thead class="thead-dark">
            <tr>
              <th>Produto</th>
              <th>Estoque</th>
              <th>Pedidos</th>
            </tr>
          </thead>
          <tbody>
            <?php if (empty($materiais)) : ?>
              <tr><td colspan="3" class="text-center">Nenhum material encontrado.</td></tr>
            <?php else : ?>
              <?php foreach ($materiais as $k => $material) : ?>
                <tr class="linha-material">
                  <td><strong><?= htmlspecialchars($material['nome']); ?></strong><br>
                    <small class="text-muted">Descrição: <?= htmlspecialchars($material['descricao']); ?></small>
                  </td>
                  <td><?= htmlspecialchars($material['estoque']); ?></td>
                  <td> 
                    <input type="hidden" name="pedidos[<?= $k ?>][id_material]" value="<?= $material['id_material'] ?>"> 
                    <input style="width:80px" type="number" name="pedidos[<?= $k ?>][quantidade]" value="0" min="0" max="<?= $material['estoque'] ?>" />
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table>
        <div class="text-right">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#confirmModal">Enviar pedido</button>
        </div>
      </form>
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
          Tem certeza que deseja realizar este pedido? Verifique se as quantias selecionadas estão corretas!
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-primary" id="confirmarEnvio">Confirmar</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    document.getElementById("confirmarEnvio").addEventListener("click", function() {
      document.getElementById("pedidoForm").submit();
    });

    $(document).ready(function() {
      $('#pesquisaMateriais').on('input', function() {
        var pesquisa = $(this).val().toLowerCase();
        $('.linha-material').each(function() {
          var nomeMaterial = $(this).find('strong').text().toLowerCase();
          $(this).toggle(nomeMaterial.includes(pesquisa));
        });
      });
    });
  </script>
</body>
</html>
