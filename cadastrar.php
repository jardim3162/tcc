<?php
session_start();
require_once "conexao.php";
$conexao = conectar();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $confirmar_senha = $_POST['confirmar_senha'];


    if ($senha !== $confirmar_senha) {
        $_SESSION['msg'] = "<p style='color:red;'>As senhas não coincidem.</p>";
        header("Location: Cadastrarsenha.php");
        exit;
    }
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
    $sql = "INSERT INTO usuario (nome, email, senha) VALUES ('$nome', '$email', '$senhaHash')";

    $result = mysqli_query($conexao, $sql);
    if ($result) {
        $_SESSION['cadastro_sucess'] = true;
        header("Location: Cadastrarsenha.php");
    } else {
        $_SESSION['msg'] = "<p style='color:red;'>Usuário não foi cadastrado</p>";
        error_log(mysqli_errno($conexao) . ": " . mysqli_error($conexao));
        header("Location: Cadastrarsenha.php");
    }
}
?>
