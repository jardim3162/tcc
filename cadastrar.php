<?php
session_start();
require_once "conexao.php";
$conexao = conectar();

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

// Gera o hash da senha
$senhaHash = password_hash($senha, PASSWORD_DEFAULT);

// Corrige a query para usar o hash da senha
$sql = "INSERT INTO usuario (nome, email, senha) VALUES ('$nome', '$email', '$senhaHash')";

// Executa a query
$result = mysqli_query($conexao, $sql);

if ($result) {
    header("Location: Login.php");
} else {
    $_SESSION['msg'] = "<p style='color:red;'>Usuário não foi cadastrado</p>";
    error_log(mysqli_errno($conexao) . ": " . mysqli_error($conexao));
    header("Location: CadastrarSenha.php");
}
?>
