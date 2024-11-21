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
  <link rel="stylesheet" href="css/styles.css?nocache=<?= rand() ?>" >
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>

<?php include "navadm.php"; ?>

<body id="telainicial">
  <div class="container" style="overflow-y:auto; margin-top: 5%;"><br>
  <i class="bi bi-person-circle text-success" style="font-size: 40px;" style="font-family: 'Helvetica';"> Logado</i>
  <table>
    <thead>
      <tr>
        <!-- arrumar a tabela deixar a estilização branca deixar mais centralizado a tabela-->
        <th>ID</th>
        <th>Produto</th>
        <th>Estoque</th>
        <th>Opções</th>
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
            <a class="btn btn-sm btn-dark" href="form-alterarmaterial.php?id_material=<?php echo $material['id_material']; ?>">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
              </svg>
            </a>
            <a class="btn btn-sm btn-danger" href="excluirmaterial.php?id_material=<?php echo $material['id_material']; ?>">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
              </svg>
            </a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div><br>
<a href="form-material.php" class="btn btn-primary">Cadastrar Material</button>
</form>   
</body>
</html>