<?php
session_start();
require_once "conexao.php";
$conexao = conectar();
if (!isset($_SESSION['Email'])) {
    echo "Erro: Usuário não está logado.";
    exit;
}
$email = $_SESSION['Email'];
$sql = "SELECT `id_pedido`, `data`, `nome_material`, `quantidade`, 'usuario' 
        FROM `pedido` 
        WHERE `usuario` = '$email'";
$result = mysqli_query($conexao, $sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>
</head>
<body>
    <h2>Seus Pedidos</h2>
    <?php
    if (mysqli_num_rows($result) > 0) {
        while ($pedido = mysqli_fetch_assoc($result)) {
            echo "<p>Pedido ID: {$pedido['id_pedido']}</p>";
            echo "<p>Data: {$pedido['data']}</p>";
            echo "<p>Material: {$pedido['nome_material']}</p>";
            echo "<p>Quantidade: {$pedido['quantidade']}</p>";
            echo "<hr>";
        }
    } else {
        echo "<p>Você ainda não fez nenhum pedido.</p>";
    }
    ?>
</body>
</html>