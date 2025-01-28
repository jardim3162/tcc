<?php
session_start();
require_once "conexao.php";
$conexao = conectar();
$_SESSION['alterar_sucess'] = true;
$id_material = $_POST['id_material'];
$nome = $_POST['nome'];
$estoque = $_POST['estoque'];
$descricao = $_POST['descricao'];

$sql = "UPDATE material SET nome='$nome', estoque='$estoque', descricao='$descricao' WHERE id_material=$id_material";
$result = mysqli_query($conexao, $sql);
if ($result) {
    header("Location: telainicial.php");
} else {
    echo mysqli_errno($conexao) . ": " . mysqli_error($conexao);
}