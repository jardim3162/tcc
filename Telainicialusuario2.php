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
  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css" rel="stylesheet">
   <!--script sweet alert-->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
</head>
<?php include "navusuario.php"; ?><br>
<br>
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
      <form action="pedido.php"  method="post">

          <table class="table table-bordered table-striped">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Produto</th>
                <th scope="col" class="text-center">Estoque</th>
                <th scope="col" class="text-center">Pedidos</th>
              </tr>
            </thead>
            <tbody>
              <?php if (empty($materiais)) : ?>
                <tr>
                  <td colspan="2" class="text-center">Nenhum material encontrado.</td>
                </tr>
              <?php else : ?>
                <?php foreach ($materiais as $k =>  $material) : ?>
                  <tr>
                    <td>

                      <strong><?= htmlspecialchars($material['nome']); ?></strong><br>
                      <small class="text-muted">Descrição: <?= htmlspecialchars($material['descricao']); ?></small>
                    </td>
                    <td class="text-center"><?= htmlspecialchars($material['estoque']); ?></td>

                    <td class="text-center"> 
                        <input type="hidden"                         name="pedidos[<?= $k ?>][id_material]" value="<?= $material[ "id_material"] ?>"> 
                        <input style="width:80px"   type="number"   name="pedidos[<?= $k ?>][quantidade]" value="0"     />  
                    </td>


                  </tr>
                <?php endforeach; ?>
              <?php endif; ?>
            </tbody>
          </table>

          <button type="submit" class="btn btn-primary">Enviar pedido</button>
        </form>
    </div>
  </div>
</body>

</html>