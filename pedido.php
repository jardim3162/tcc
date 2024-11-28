<?php
require_once "conexao.php";
$conexao = conectar();
$sql = "SELECT * FROM pedido";
$result = mysqli_query(mysql: $conexao, query: $sql);
if ($result) {
  $ped = mysqli_fetch_all(result: $result, mode: MYSQLI_ASSOC);
} else {
  echo mysqli_errno(mysql: $conexao) . ": " . mysqli_error($conexao);
}

foreach ($ped as $pedido) {
}
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
  //ESTA IMPRIMINDO NA TELA SOMENTE O ID DO PRIMEIRO E O ULTIMO MATERIAL DA TABELA, ARRUMAR
  echo "Os pedidos foram :" . "<br>" .
  "Usuario Pedinte: " . $pedido['id_usuario'] . "<br>" .
  "Quantidade Pedida: " . $pedido['quantidade'] . "<br>" .
  "Material Pedido: " . $pedido['nome_material'] . ".";
  ?><br>
  <a href="Telainicialusuario.php">Voltar</a>
</body>

</html>