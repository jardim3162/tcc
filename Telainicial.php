<?php
session_start();
require_once "conexao.php";
require_once "funcoes.php";

$termoPesquisa = isset($_GET['pesquisa']) ? trim($_GET['pesquisa']) : '';

if ($termoPesquisa) {
    $stmt = $conexao->prepare("SELECT * FROM material WHERE nome LIKE ? OR descricao LIKE ?");
    $searchTerm = "%$termoPesquisa%";
    $stmt->bind_param("ss", $searchTerm, $searchTerm);
} else {
    $stmt = $conexao->prepare("SELECT * FROM material");
}

$stmt->execute();
$result = $stmt->get_result();
$materiais = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
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
  <div class="container" style="margin-top: 5%;">
    <br>
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2>Estoque de Materiais</h2>
      <form method="GET" action="" class="form-inline">
        <div class="input-group">
          <input type="text" name="pesquisa" class="form-control" placeholder="Pesquisar material" 
                 value="<?= htmlspecialchars($termoPesquisa); ?>">
          <div class="input-group-append">
            <button type="submit" class="btn btn-primary">Pesquisar</button>
          </div>
        </div>
      </form>
    </div>
    
    <table class="table table-bordered table-hover">
      <thead class="thead-dark text-center">
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
                <strong><?= htmlspecialchars($material['nome']); ?></strong><br>
                <small class="text-muted">Descrição: <?= htmlspecialchars($material['descricao']); ?></small>
              </td>
              <td class="text-center"><?= htmlspecialchars($material['estoque']); ?></td>
              <td class="text-center">
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
    <div class="text-right">
      <a href="form-material.php" class="btn btn-primary">Cadastrar Material</a>
    </div>
  </div>
</body>
</html>
