<?php
require_once "conexao.php";
$conexao = conectar();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['marcar_pago'])) {
    $pedido_id = intval($_POST['pedido_id']);
    $sql_update_pedido = "UPDATE pedido SET status = 'Pago' WHERE id_pedido = $pedido_id";
    mysqli_query($conexao, $sql_update_pedido);
}

$sql = "SELECT `id_pedido`, `data`, `nome_material`, `quantidade`, `usuario`, `status` 
        FROM `pedido`
        ORDER BY `id_pedido` ASC";
$result = mysqli_query($conexao, $sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todos os Pedidos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }
        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }
        .pedido {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            margin: 10px auto;
            max-width: 600px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .pedido p {
            margin: 5px 0;
        }
        .pedido form {
            margin-top: 10px;
        }
        .no-pedidos {
            color: #777;
            font-style: italic;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h2>Todos os Pedidos</h2>
    <?php
    if (mysqli_num_rows($result) > 0) {
        while ($pedido = mysqli_fetch_assoc($result)) {
            echo "<div class='pedido'>";
            echo "<p><strong>Pedido ID:</strong> {$pedido['id_pedido']}</p>";
            echo "<p><strong>Data:</strong> {$pedido['data']}</p>";
            echo "<p><strong>Material:</strong> {$pedido['nome_material']}</p>";
            echo "<p><strong>Quantidade:</strong> {$pedido['quantidade']}</p>";
            echo "<p><strong>Status:</strong> {$pedido['status']}</p>";

            if ($pedido['status'] !== 'Pago') {
                echo "<form method='POST'>";
                echo "<input type='hidden' name='pedido_id' value='{$pedido['id_pedido']}'>";
                echo "<button type='submit' name='marcar_pago'>Marcar como Pago</button>";
                echo "</form>";
            }

            echo "</div>";
        }
    } else {
        echo "<p class='no-pedidos'>Nenhum pedido encontrado.</p>";
    }
    ?>
</body>
</html>
