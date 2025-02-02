<?php
require_once "conexao.php";
$conexao = conectar();

$id_usuario = $_GET['id_usuario'];

// Exclui os pedidos associados ao usuário
$sql_pedidos = "DELETE FROM pedido WHERE usuario_id = $id_usuario";
mysqli_query($conexao, $sql_pedidos);

$sql = "DELETE FROM usuario WHERE id_usuario = $id_usuario";
$result = mysqli_query($conexao, $sql);

if ($result) {
    header("Location: Login.php");
} else {
    echo mysqli_errno($conexao) . ": " . mysqli_error($conexao);
}
?>
