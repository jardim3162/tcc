<?php
session_start();
require_once 'conexao.php';
$conexao = conectar();

if (isset($_POST['submit']) && !empty($_POST['Email']) && !empty($_POST['Senha'])) {
    $email = $_POST['Email'];
    $senha = $_POST['Senha'];

    // Proteção contra SQL Injection
    $email = mysqli_real_escape_string($conexao, $email);

    // Seleciona o usuário pelo e-mail
    $sql = "SELECT * FROM usuario WHERE email = '$email'";
    $result = mysqli_query($conexao, $sql);
    $usuario = mysqli_fetch_assoc($result);

    // Verifica se o e-mail existe no banco
    if ($usuario && password_verify($senha, $usuario['senha'])) {
        // Verifica o tipo de usuário
        if ($usuario['tipo_usuario'] == 1) {
            $_SESSION['Email'] = $email;
            header('Location: Telainicial.php');
            exit();
        } elseif ($usuario['tipo_usuario'] == 0) {
            $_SESSION['Email'] = $email;
            $_SESSION['id_usuario'] = $usuario['id_usuario'];
            header('Location: Telainicialusuario.php');
            exit();
        }
    } else {
        // Senha ou e-mail inválidos
        $_SESSION['msg'] = "<p style='color:red;'>Login ou senha inválidos</p>";
        header("location: Login.php");
        exit();
    }
} else {
    // Redireciona se os campos estiverem vazios
    $_SESSION['msg'] = "<p style='color:red;'>Preencha todos os campos</p>";
    header("location: Login.php");
    exit();
}
?>
