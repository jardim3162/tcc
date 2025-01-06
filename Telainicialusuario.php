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
        <form action="pedido.php" method="POST" id="pedido">
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

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965Dz/0rRtnBSsmHAEW+D+OGxFb6od3JO2EPldhgxTF3eVoBhwl7l9GErI1j" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pjaaA8dDz/0rRtnBSsmHAEW+D+OGxFb6od3JO2EPldhgxTF3eVoBhwl7l9GErI1j" crossorigin="anonymous"></script>
</body>

</html>
