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

<?php include "navusuario.php"; ?>

<body id="telainicial">
  <div class="container" style="overflow-y:auto; margin-top: 5%;">
  <i class="bi bi-person-circle text-success" style="font-size: 40px;" style="font-family: 'Helvetica';"> Logado</i>
  <form action="pedido.php" method="post">
  <table> 
    <!-- arrumar as bordas deixar mais nitido -->
    <thead>
      <tr>
        <!-- arrumar a tabela deixar a estilização branca deixar mais centralizado a tabela-->
        <th>ID</th>
        <th>Produto</th>
        <th>Estoque</th>
        <th>Quantidade</th>
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
          <!-- adicionar um add na parte da quantidade e exibir as informações como exibição dando a função do usuario excluir e editar o pedido antes de enviar selecionar o botão abaixo de tudo para envio final e exibir as informações dos pedidos usando um for para o historico -->
           <td><?php echo $material['estoque']; ?></td>
          <td>
              <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['id_usuario']; ?>">
              <input type="hidden" name="id_material" value="<?php echo $material['id_material']; ?>">
              <input type="hidden" name="nome" value="<?php echo $material['nome']; ?>">
              <input type="number" name="quantidade" placeholder= "Quantidade" value="null" min="0" max="<?php echo $material['estoque']; ?>">
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div><br>
<button type="submit" class="btn btn-primary">Efetuar Pedido</button>
</form>   
</body>
</html>