<?php
session_start();
require_once "conexao.php";
require_once "funcoes.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tela inicial</title>
  <link rel="stylesheet" href="css/styles.css?nocache=<?= rand() ?>">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>
<?php include "navadm.php"; ?>
<body id="telainicial">
  <div class="container" style="margin-top: 10%;">
    <br>
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2>Estoque de Materiais</h2>
      <form method="GET" class="form-inline">
        <div class="input-group">
          <input type="text" name="pesquisa" class="form-control" placeholder="Pesquisar material" 
                 value="<?=$termoPesquisa; ?>">
          <div class="input-group-append">
            <button type="submit" class="btn btn-primary">Pesquisar</button>
          </div>
        </div>
      </form>
    </div>

    <div class="table-responsive" style="max-height: 800px; overflow-y: auto; margin: 0 auto; width: 100%;">
      <table class="table table-bordered table-hover text-center">
        <thead class="thead-dark">
          <tr>
            <th>Produto</th>
            <th>Estoque</th>
            <th>Opções</th>
          </tr>
        </thead>
        <tbody>
          <?php if (empty($materiais)) : ?>
            <tr>
              <td colspan="3" class="text-center">Nenhum material encontrado.</td>
            </tr>
          <?php else : ?>
            <?php foreach ($materiais as $material) : ?>
              <tr>
                <td>
                  <strong><?= ($material['nome']); ?></strong><br>
                  <small class="text-muted">Descrição: <?= ($material['descricao']); ?></small>
                </td>
                <td><?= ($material['estoque']); ?></td>
                <td>
                  <a class="btn btn-sm btn-dark" href="form-alterarmaterial.php?id_material=<?= $material['id_material']; ?>" title="Editar">
                    <i class="bi bi-pencil"></i>
                  </a>
                  <a class="btn btn-sm btn-danger" href="excluirmaterial.php?id_material=<?= $material['id_material']; ?>" title="Excluir">
                    <i class="bi bi-trash"></i>
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
    <div class="text-right">
      <a href="form-material.php" class="btn btn-primary">Cadastrar Material</a>
    </div>
  </div>
</body>
</html>
