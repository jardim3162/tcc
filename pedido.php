<?php
session_start();
require_once "conexao.php";
require_once 'PHPmailer/src/PHPMailer.php';
$conexao = conectar();

use PHPMailer\PHPMailer\PHPMailer;

$nome_material = $_POST['nome_material'];
$quantidade = $_POST['quantidade'];
$email = $_POST['email'];

var_dump($email, $nome_material, $quantidade);

date_default_timezone_set('America/Sao_Paulo');
$data = new DateTime('now');
$agora = $data->format('Y-m-d H:i:s');

    $sql = "INSERT INTO pedido (nome_material, quantidade, usuario) VALUES ('$nome_material', '$quantidade', '$email')";
    $result = mysqli_query($conexao, $sql);
    if ($result) {
        header("Location: Telainicialusuari o.php");
    } else {
        header("Location: dadosusuario.php");
    }
    ?>

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
</head>
<body>
<a href="Telainicialusuario.php">Voltar</a>
</body>
</html>