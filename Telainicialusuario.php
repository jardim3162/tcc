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
  <title>Tela Inicial</title>
  <link rel="stylesheet" href="css/styles.css?nocache=<?= rand() ?>">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <style>
    body {
      background-color: #f8f9fa;
      font-family: Arial, sans-serif;
    }
    #telainicial {
      padding: 20px;
    }
    .table {
      margin-top: 20px;
    }
    .container-form {
      margin-top: 40px;
      background-color: #ffffff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .btn-primary {
      margin-top: 20px;
    }
    .bi-person-circle {
      font-size: 60px;
      color: #28a745;
    }
  </style>
</head>

<?php include "navusuario.php"; ?>

<body id="telainicial">
  <div class="text-center mb-4">
    <i class="bi bi-person-circle"></i>
    <p class="h5 text-success mt-2">Logado</p>
  </div>

  <div class="container">
    <h2 class="text-center mb-4">Estoque de Produtos</h2>
    <table class="table table-bordered table-striped">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Produto</th>
          <th scope="col">Estoque</th>
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

  <div class="container container-form">
    <h4 class="text-center">Exemplo de Conteúdo</h4>
    <p class="text-muted">Este espaço pode ser utilizado para formulários ou outra informação relevante.</p>
    <div class="row">
      <div class="col-md-6">
        <h5 class="text-primary">Sessão 1</h5>
        <p>Adicione aqui as informações desejadas.</p>
      </div>
      <div class="col-md-6">
        <h5 class="text-primary">Sessão 2</h5>
        <p>Adicione mais informações aqui.</p>
      </div>
    </div>
  </div>

  <div class="text-center">
    <button type="submit" class="btn btn-primary">Efetuar Pedido</button>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pjaaA8dDz/0rRtnBSsmHAEW+D+OGxFb6od3JO2EPldhgxTF3eVoBhwl7l9GErI1j" crossorigin="anonymous"></script>
</body>

</html>
