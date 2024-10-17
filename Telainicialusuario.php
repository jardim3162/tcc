<?php
session_start();
require_once "conexao.php";
$conexao = conectar();
if (!isset($_SESSION['Email'])) {
  header('Location: Login.php');
  exit();
}

$sql = "SELECT * FROM material";
$result = mysqli_query(mysql: $conexao, query: $sql);
if ($result) {
  $materiais = mysqli_fetch_all(result: $result, mode: MYSQLI_ASSOC);
} else {
  echo mysqli_errno(mysql: $conexao) . ": " . mysqli_error($conexao);
}
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

<?php include "navusuario.php"; ?>

<body id="telainicial">
  <div class="container" style="overflow-y:auto; margin-top: 5%;">
  <i class="bi bi-person-circle text-success" style="font-size: 40px;" style="font-family: 'Helvetica';"> Logado</i>
  <table>
    <thead>
      <tr>
        <!-- arrumar a tabela deixar a estilização branca deixar mais centralizado a tabela-->
        <th>ID</th>
        <th>Produto</th>
        <th>Estoque</th>
        <th>Quantidade</th>
        <th>Ajuda</th>
      </tr>
    </thead>
    <tbody style="overflow:visible">
      <?php foreach ($materiais as $material) : ?>
        <tr>
         <td><?php echo $material['id_material']; ?></td>
         <td class="produto">
           <div class="descricao1"> <?php echo $material['descricao']; ?> </div>
       
            <?php echo $material['nome']; ?>  
          </td>
          
           <td><?php echo $material['estoque']; ?></td>
          <td>
            <form action="pedido.php" method="post">
              <input type="hidden" name="id_material" value="<?php echo $material['id_material']; ?>">
              <input type="number" name="quantidade" placeholder= "Quantidade" value="null" min="0" max="<?php echo $material['estoque']; ?>">
          </td>
          <td>Selecione a quantidade desejada</td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div><br>
<a href="pedido.php" class="btn btn-primary">Efetuar Pedido</button>
</form>   
</body>
</html>