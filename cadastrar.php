<?php
session_start();
require_once "conexao.php";
$conexao = conectar();

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];


$senhaHash = password_hash($senha, PASSWORD_DEFAULT);


$sql = "INSERT INTO usuario (nome, email, senha) VALUES ('$nome', '$email', '$senhaHash')";

$result = mysqli_query($conexao, $sql);

if ($result) {
    header("Location: Login.php");
} else {
    $_SESSION['msg'] = "<p style='color:red;'>Usuário não foi cadastrado</p>";
    error_log(mysqli_errno($conexao) . ": " . mysqli_error($conexao));
    header("Location: CadastrarSenha.php");
}
?>
