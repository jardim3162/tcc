<?php
require_once "conexao.php";
$conexao = conectar();

$nome_material = $_POST['nome_material'];
$quantidade = $_POST['quantidade'];

$nome_material = isset($_POST['nome_material']) ? trim($_POST['nome_material']) : '';
$quantidade = isset($_POST['quantidade']) ? trim($_POST['quantidade']) : '';

if (!empty($nome_material) && !empty($quantidade)) {
   
    $pedido_detalhes = json_encode(value: [
        "nome_material" => explode(separator: ',', string: $nome_material),
        "quantidade" => explode(separator: ',', string: $quantidade)
    ]);


    $sql = "INSERT INTO pedido (pedido_detalhes) VALUES (?)";
    $stmt = $conexao->prepare(query: $sql);
    $stmt->bind_param("s", $pedido_detalhes);
    $stmt->execute();

    echo "Pedido salvo com sucesso!";
} else {
    echo "Por favor, preencha todos os campos.";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<a href="Telainicialusuario.php">Voltar</a>
</body>
</html>