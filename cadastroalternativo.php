<?php
session_start();
require_once "conexao.php";
$conexao = conectar();
$_SESSION['pedido_sucess'] = true;
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$motivo = $_POST['motivo'];

$sql = "INSERT INTO alternativo (nome_material, descricao, motivo) VALUES ('$nome','$descricao', '$motivo')";
$result = mysqli_query($conexao, $sql);
if ($result) {
    header("Location: pedidoalternativo.php");
}  else 
    header("Location: dadosusario.php");
    echo mysqli_errno($conexao) . ": " . mysqli_error($conexao);