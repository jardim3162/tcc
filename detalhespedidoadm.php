<?php
require_once "conexao.php";
$conexao = conectar();

$feedback = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pedido_id = intval($_POST['pedido_id']);
    
    if (isset($_POST['marcar_pago'])) {

        $sql_update_pedido = "UPDATE pedido SET status = 'Pago' WHERE grupo_pedido = ?";
        $stmt = $conexao->prepare($sql_update_pedido);
        $stmt->bind_param("i", $pedido_id);
        $stmt->execute();

        $sql_select_pedido = "SELECT id_material, quantidade FROM pedido WHERE grupo_pedido = ?";
        $stmt = $conexao->prepare($sql_select_pedido);
        $stmt->bind_param("i", $pedido_id);
        $stmt->execute();
        $result_pedido = $stmt->get_result();

        while ($pedido = $result_pedido->fetch_assoc()) {
            $id_material = intval($pedido['id_material']);
            $quantidade = intval($pedido['quantidade']);
            if ($quantidade > 0) {
                $sql_update_material = "UPDATE material SET estoque = estoque - ? WHERE id_material = ?";
                $stmt = $conexao->prepare($sql_update_material);
                $stmt->bind_param("ii", $quantidade, $id_material);
                $stmt->execute();
            }
        }

        $feedback = "Pedido marcado como Pago com sucesso!";
    } elseif (isset($_POST['marcar_pendente'])) {
        $sql_update_pedido = "UPDATE pedido SET status = 'Pendente' WHERE grupo_pedido = ?";
        $stmt = $conexao->prepare($sql_update_pedido);
        $stmt->bind_param("i", $pedido_id);
        $stmt->execute();

        $feedback = "Pedido marcado como Pendente com sucesso!";
    }
}

$sql = "SELECT p.grupo_pedido, p.data, p.status, 
               GROUP_CONCAT(m.nome SEPARATOR ', ') AS materiais, 
               GROUP_CONCAT(p.quantidade SEPARATOR ', ') AS quantidades,
               u.nome AS nome_usuario
        FROM pedido p
        JOIN material m ON p.id_material = m.id_material
        JOIN usuario u ON p.usuario_id = u.id_usuario
        GROUP BY p.grupo_pedido, p.data, p.status
        ORDER BY p.grupo_pedido DESC";
$result = mysqli_query($conexao, $sql);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <title>Todos os Pedidos</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f5f5f5; margin: 0; }
        .container { max-width: 800px; margin: 20px auto; }
        .pedido { background: #fff; border-radius: 5px; padding: 15px; margin-bottom: 15px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); }
        .pedido h3 { margin-bottom: 10px; }
        .pedido p { margin: 5px 0; }
        .btn-container { display: flex; justify-content: space-between; }
        .status-pago { color: green; }
        .status-pendente { color: red; }
    </style>
</head>
<?php include "navadm.php"; ?>
<body>
    <div class="container" style="margin-top:5%;">
        <h2 class="text-center">Todos os Pedidos</h2>

        <?php if (!empty($feedback)): ?>
            <div class="alert alert-success"><?= $feedback ?></div>
        <?php endif; ?>

        <?php while ($pedido = mysqli_fetch_assoc($result)): ?>
            <div class='pedido'>
                <h3>Pedido: <?= $pedido['grupo_pedido'] ?></h3>
                <p><strong>Data:</strong> <?= date("d/m/Y H:i", strtotime($pedido['data'])) ?></p>
                <p><strong>Materiais:</strong> <?= $pedido['materiais'] ?></p>
                <p><strong>Quantidade:</strong> <?= $pedido['quantidades'] ?></p>
                <p><strong>Status:</strong> 
                    <span class="<?= $pedido['status'] === 'Pago' ? 'status-pago' : 'status-pendente' ?>">
                        <?= $pedido['status'] ?>
                    </span>
                </p>
                <div class='btn-container'>
                    <?php if ($pedido['status'] === 'Pago'): ?>
                        <form method='POST'>
                            <input type='hidden' name='pedido_id' value='<?= $pedido['grupo_pedido'] ?>'>
                            <button type='submit' name='marcar_pendente' class='btn btn-warning'>Marcar como Pendente</button>
                        </form>
                    <?php else: ?>
                        <button class='btn btn-success' onclick='abrirModal(<?= $pedido['grupo_pedido'] ?>)'>Marcar como Pago</button>
                    <?php endif; ?>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
    
    <!-- Modal de Confirmação -->
    <div class="modal fade" id="confirmModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Confirmar Ação</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    "Tem certeza que deseja marcar este pedido como <strong>Pago</strong>? 
                    A ação podera ser desfeita entretanto os respectivos materiais pagos terão que ser corrigidos manualmente!!".
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