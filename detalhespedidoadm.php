<?php
require_once "conexao.php";
$conexao = conectar();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['marcar_pago'])) {
        $pedido_id = intval($_POST['pedido_id']);

        $sql_update_pedido = "UPDATE pedido SET status = 'Pago' WHERE id_pedido = $pedido_id";
        mysqli_query($conexao, $sql_update_pedido);

        $sql_select_pedido = "SELECT nome_material, quantidade FROM pedido WHERE id_pedido = $pedido_id";
        $result_pedido = mysqli_query($conexao, $sql_select_pedido);

        if ($result_pedido && mysqli_num_rows($result_pedido) > 0) {
            $pedido = mysqli_fetch_assoc($result_pedido);

            $nome_material = trim($pedido['nome_material']);
            $quantidade = trim($pedido['quantidade']);

            $materiais = explode(',', $nome_material); 
            $quantidades = explode(',', $quantidade); 

            if (count($materiais) === count($quantidades)) {
                foreach ($materiais as $index => $material) {
                    $material = trim($material);
                    $quantidade_atual = intval(trim($quantidades[$index]));

                    if (!empty($material) && $quantidade_atual > 0) {
                        $sql_update_material = "
                            UPDATE material 
                            SET estoque = estoque - $quantidade_atual 
                            WHERE nome = '$material'
                        ";
                        mysqli_query($conexao, $sql_update_material);
                    }
                }
            } else {
                error_log("Inconsistência entre materiais e quantidades no pedido ID: $pedido_id");
            }
        }
    } elseif (isset($_POST['marcar_pendente'])) {
        $pedido_id = intval($_POST['pedido_id']);
        $sql_update_pedido = "UPDATE pedido SET status = 'Pendente' WHERE id_pedido = $pedido_id";
        mysqli_query($conexao, $sql_update_pedido);
    }
}

$sql = "SELECT id_pedido, data, nome_material, quantidade, usuario, status 
        FROM pedido
        ORDER BY id_pedido ASC";
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

            echo "<form method='POST' id='form-{$pedido['id_pedido']}'>";
            echo "<input type='hidden' name='pedido_id' value='{$pedido['id_pedido']}'>";
            if ($pedido['status'] === 'Pago') {
                echo "<button type='submit' class='btn btn-warning'>Marcar como Pendente</button>";
                echo "<input type='hidden' name='marcar_pendente'>";
            } else {
                echo "<button type='button' class='btn btn-success' onclick='abrirModal({$pedido['id_pedido']})'>Marcar como Pago</button>";
            }
            echo "</form>";

            echo "</div>";
        }
    } else {
        echo "<p class='no-pedidos'>Nenhum pedido encontrado.</p>";
    }
    ?>

    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">Confirmar Ação</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Tem certeza que deseja marcar este pedido como <strong>Pago</strong>? Esta ação não pode ser desfeita e os respectivos produtos terão que ser atualizados manualmente na tabela caso ocorra um erro.
                </div>
                <div class="modal-footer">
                    <form method="POST" id="confirmForm">
                        <input type="hidden" name="pedido_id" id="pedidoIdInput">
                        <input type="hidden" name="marcar_pago">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Confirmar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function abrirModal(pedidoId) {
            document.getElementById('pedidoIdInput').value = pedidoId;
            $('#confirmModal').modal('show');
        }
    </script>
</body>

</html>
