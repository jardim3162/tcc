<?php
require_once "conexao.php";
$conexao = conectar();

$nome_material = $_POST['nome_material'];
$quantidade = $_POST['quantidade'];
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de Pedidos</title>
</head>

<body>
<?php
 var_dump($nome_material);
 var_dump($quantidade);
 ?>
  <a href="Telainicialusuario.php">Voltar</a>
</body>

</html>