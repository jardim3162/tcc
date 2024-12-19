<?php
session_start();
require_once "conexao.php";
require_once 'PHPmailer/src/PHPMailer.php';
$conexao = conectar();

use PHPMailer\PHPMailer\PHPMailer;

$nome_material = $_POST['nome_material'];
$quantidade = $_POST['quantidade'];
$email = $_POST['email'];
date_default_timezone_set('America/Sao_Paulo');
$data = new DateTime('now');
$agora = $data->format('Y-m-d H:i:s');

$nome_material = isset($_POST['nome_material']) ? trim($_POST['nome_material']) : '';
$quantidade = isset($_POST['quantidade']) ? trim($_POST['quantidade']) : '';

if (!empty($nome_material) && !empty($quantidade)) {
   
    $pedido_detalhes = json_encode(value: [
        "nome_material" => explode(separator: ',', string: $nome_material),
        "quantidade" => explode(separator: ',', string: $quantidade)
    ]);


    $sql = "INSERT INTO pedido (pedido_detalhes, usuario) VALUES (?)";
   

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