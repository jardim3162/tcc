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

foreach($ped as $pedido){

    echo $pedido['id_usuario']; "<br>";
    echo $pedido['id_material'];
    echo $pedido['quantidade'];
    echo $pedido['data_pedido'];
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$nome = $_POST['nome'];
$quantidade= $_POST['quantidade'];
//ESTA IMPRIMINDO NA TELA SOMENTE O ID DO PRIMEIRO E O ULTIMO MATERIAL DA TABELA, ARRUMAR
echo "Os pedidos foram : $nome, $quantidade";
$ped= array();
$ped= array("id_usuario" =>$_POST['id_usuario'], "id_material" =>$_POST['id_material'], "quantidade" =>$_POST['quantidade'], "nome" =>$_POST['nome']);
?><br>
<a href="Telainicialusuario.php">Voltar</a>    
</body>
</html>
