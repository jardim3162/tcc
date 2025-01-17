<?php
session_start();
require_once "conexao.php";
$conexao = conectar();

$nome = $_POST['nome'];
$estoque = $_POST['estoque'];
$descricao = $_POST['descricao'];

$sql = "INSERT INTO material (nome, estoque, descricao) VALUES ('$nome', '$estoque', '$descricao')";
$result = mysqli_query($conexao, $sql);
if ($result) {
    header("Location: Telainicial.php");
}  else {
    header("Location: form-material.php");
    echo mysqli_errno($conexao) . ": " . mysqli_error($conexao);
}