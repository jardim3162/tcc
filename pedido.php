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

    $sql = "INSERT INTO pedido (nome_material, quantidade, usuario, data) VALUES ('$nome_material', '$quantidade', '$email', '$agora')";
    $result = mysqli_query($conexao, $sql);
    if ($result) {
        header("Location: Telainicialusuario.php");
    } else {
        header("Location: dadosusuario.php");
    }

?>

