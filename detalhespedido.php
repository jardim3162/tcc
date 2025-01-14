<?php
session_start();
require_once "conexao.php";
$conexao = conectar();
if (!isset($_SESSION['Email'])) {
    echo "Erro: Usuário não está logado.";
    exit;
}
$email = $_SESSION['Email'];
$sql = "SELECT `id_pedido`, `data`, `nome_material`, `quantidade`, `usuario`, `status` 
        FROM `pedido`
        ORDER BY `id_pedido` DESC";
$result = mysqli_query($conexao, $sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css?nocache=<?= rand() ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <title>Pedidos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
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

        .pedido hr {
            border: 0;
            border-top: 1px solid #eee;
            margin: 15px 0;
        }

        .no-pedidos {
            color: #777;
            font-style: italic;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<?php include "navusuario.php"; ?><br>
<br>
<body><br>
    <h2>Seus Pedidos</h2>
    <?php
    if (mysqli_num_rows($result) > 0) {
        while ($pedido = mysqli_fetch_assoc($result)) {
            echo "<div class='pedido'>";
            echo "<p><strong>Pedido ID:</strong> {$pedido['id_pedido']}</p>";
            echo "<p><strong>Data:</strong> {$pedido['data']}</p>";
            echo "<p><strong>Material:</strong> {$pedido['nome_material']}</p>";
            echo "<p><strong>Quantidade:</strong> {$pedido['quantidade']}</p>";
            echo "<p><strong>Status:</strong> {$pedido['status']}</p>";
            echo "<hr>";
            echo "</div>";
        }
    } else {
        echo "<p class='no-pedidos'>Nenhum pedido encontrado.</p>";
    }
    ?>
</body>

</html>