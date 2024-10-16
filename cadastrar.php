<?php
session_start();
require_once "conexao.php";
$conexao = conectar();

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "INSERT INTO usuario (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
$result = mysqli_query($conexao, $sql);
if ($result) {
    $_SESSION['msg'] = "<p style='color:green;'> Usuario cadastrado com sucesso</p>";
    header("Location: CadastrarSenha.php");
} else {
    $_SESSION['msg'] = "<p style='color:red;'> Usuario não foi cadastrado</p>";
    header("Location: CadastrarSenha.php");
    echo mysqli_errno($conexao) . ": " . mysqli_error($conexao);
}