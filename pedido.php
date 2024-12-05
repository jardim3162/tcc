<?php
require_once "conexao.php";
$conexao = conectar();

$vetor1= $_POST['quantidade'];
$vetor2= $_POST['id_material'];

$sql = " SELECT * FROM pedido";
$result = mysqli_query(mysql: $conexao, query: $sql);
if ($result) {
  $ped = mysqli_fetch_all(result: $result, mode: MYSQLI_ASSOC);
} else {
  echo mysqli_errno(mysql: $conexao) . ": " . mysqli_error($conexao);
}

foreach ($vetor1 as $pedido) {
   $pedido = $vetor1;
}


foreach ($vetor2 as $pedido) {
  
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
  echo "a quantidade pedida foi: " . $vetor1 . ".";
  // var_dump($vetor1);
  // var_dump($vetor2);
  ?><br>
  <a href="Telainicialusuario.php">Voltar</a>
</body>

</html>