<?php
session_start();
require_once 'conexao.php';
$conexao = conectar();
if (isset($_POST['submit']) && !empty($_POST['Email']) && !empty($_POST['Senha'])) {
    $email = $_POST['Email'];
    $senha = $_POST['Senha'];

    $email = mysqli_real_escape_string($conexao, $email);
    $senha = mysqli_real_escape_string($conexao, $senha);

    $sql = "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'";
    $result = mysqli_query($conexao,$sql);
    $usuario = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) > 0 && $usuario['tipo_usuario'] == 1) {
        $_SESSION['Email'] = $email;
         header('Location: Telainicial.php');
        exit();
    } if (mysqli_num_rows($result) > 0 && $usuario['tipo_usuario'] == 0) {
        $_SESSION['Email'] = $email;
        $_SESSION['id_usuario'] = $usuario['id_usuario'];
         header('Location: Telainicialusuario.php');
        exit();
    }
    else{
        header("location: Login.php");
    }
    exit();
}
