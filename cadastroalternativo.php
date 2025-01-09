<?php
session_start();
require_once "conexao.php";
$conexao = conectar();

$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$motivo = $_POST['motivo'];

$sql = "INSERT INTO alternativo (nome_material, descricao, motivo) VALUES ('$nome','$descricao', '$motivo')";
$result = mysqli_query($conexao, $sql);
if ($result) {
    $_SESSION['msg'] = "<p style='color:green;'> Material cadastrado com sucesso</p>";
    header("Location: pedidoalternativo.php");
}  else 
    $_SESSION['msg'] = "<p style='color:red;'> Material não foi cadastrado</p>";
    header("Location: dadosusario.php");
    echo mysqli_errno($conexao) . ": " . mysqli_error($conexao);