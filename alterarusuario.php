<?php
require_once "conexao.php";
session_start();
$conexao = conectar();

$id_usuario = $_POST['id_usuario'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$_SESSION['Email'] = $email;
$sql = "UPDATE usuario SET nome='$nome', email='$email' WHERE id_usuario=$id_usuario";
$result = mysqli_query($conexao, $sql);
if ($result) {
    header("Location: dadosusuario.php");
} else {
    echo mysqli_errno($conexao) . ": " . mysqli_error($conexao);
}