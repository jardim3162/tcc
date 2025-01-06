<?php
require_once "conexao.php";
$conexao = conectar();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['marcar_pago'])) {
        $pedido_id = intval($_POST['pedido_id']);
        $sql_update_pedido = "UPDATE pedido SET status = 'Pago' WHERE id_pedido = $pedido_id";
        mysqli_query($conexao, $sql_update_pedido);
    } elseif (isset($_POST['marcar_pendente'])) {
        $pedido_id = intval($_POST['pedido_id']);
        $sql_update_pedido = "UPDATE pedido SET status = 'Pendente' WHERE id_pedido = $pedido_id";
        mysqli_query($conexao, $sql_update_pedido);
    }   
        $sql_select_pedido = "SELECT nome_material, quantidade FROM pedido WHERE id_pedido = $pedido_id";
        $result_pedido = mysqli_query($conexao, $sql_select_pedido);
        
        if ($result_pedido && mysqli_num_rows($result_pedido) > 0) {
            $pedido = mysqli_fetch_assoc($result_pedido);
            $materiais = explode(',', $pedido['nome_material']);
            $quantidades = explode(',', $pedido['quantidade']);
            
            foreach ($materiais as $index => $material) {
                $material = trim($material);
                $quantidade = intval($quantidades[$index]);
                
                $sql_update_material = "
                    UPDATE material 
                    SET estoque = estoque - $quantidade 
                    WHERE nome = '$material'
                ";
                mysqli_query($conexao, $sql_update_material);
            }
        }
        
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
    <link rel="stylesheet" href="css/styles.css?nocache=<?= rand() ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
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
<?php include "navadm.php"; ?>

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

            echo "<form method='POST'>";
            echo "<input type='hidden' name='pedido_id' value='{$pedido['id_pedido']}'>";
            if ($pedido['status'] === 'Pago') {
                echo "<button type='submit' name='marcar_pendente'>Marcar como Pendente</button>";
            } elseif ($pedido['status'] !== 'Pago') {
                echo "<button type='submit' name='marcar_pago'>Marcar como Pago</button>";
            }
            echo "</form>";

            echo "</div>";
        }
    } else {
        echo "<p class='no-pedidos'>Nenhum pedido encontrado.</p>";
    }
    ?>
</body>

</html>