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
   <!--script sweet alert-->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
</head>
 <?php include "navusuario.php"; ?><br>
<body>
<div class="container-pedido">
         <!-- topend, topstart , topmiddle -->
 <?php if (isset($_SESSION['pedido_sucess']) && $_SESSION['pedido_sucess'] == true) { ?>
        <script>
            Swal.fire({
                position: "top-middle", 
                icon: "success",
                title: "pedido efetuado com sucesso!",
                showConfirmButton: false,
                timer: 1500,
                customClass: {
                popup: 'small-popup' // Aplique uma classe CSS personalizada
                }
            });
        </script>
        <?php
        // Apagar a variável de sessão para evitar que o alerta apareça novamente após a próxima atualização da página
        unset($_SESSION['pedido_sucess']);
        ?>
    <?php } ?>

  <div class="container">
    <h2>Estoque de Produtos</h2>
    <div class="table-responsive">
      <form id="pedidoForm" action="pedido.php" method="post">
        <table class="table table-bordered table-striped">
          <thead class="thead-dark">
            <tr>
              <th>Produto</th>
              <th class="text-center">Estoque</th>
              <th class="text-center">Pedidos</th>
            </tr>
          </thead>
          <tbody>
            <?php if (empty($materiais)) : ?>
              <tr><td colspan="3" class="text-center">Nenhum material encontrado.</td></tr>
            <?php else : ?>
              <?php foreach ($materiais as $k => $material) : ?>
                <tr>
                  <td><strong><?= htmlspecialchars($material['nome']); ?></strong><br>
                    <small class="text-muted">Descrição: <?= htmlspecialchars($material['descricao']); ?></small>
                  </td>
                  <td class="text-center"><?= htmlspecialchars($material['estoque']); ?></td>
                  <td class="text-center"> 
                    <input type="hidden" name="pedidos[<?= $k ?>][id_material]" value="<?= $material['id_material'] ?>"> 
                    <input style="width:80px" type="number" name="pedidos[<?= $k ?>][quantidade]" value="0" />
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#confirmModal">Enviar pedido</button>
      </form>
    </div>
  </div>

  <!-- Modal de Confirmação -->
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
          Tem certeza que deseja realizar este pedido?
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
  </script>
</body>
</html>
