<?php
session_start();
require_once "conexao.php";
$conexao = conectar();

if (!isset($_SESSION['Email'])) {
    echo "Erro: Usuário não está logado.";
    exit;
}

$email = $_SESSION['Email'];

// Buscar o id_usuario com base no email
$sql_usuario = "SELECT id_usuario FROM usuario WHERE email = ?";
$result_usuario = $conexao->prepare($sql_usuario);
$result_usuario->bind_param("s", $email);
$result_usuario->execute();
$result_usuario = $result_usuario->get_result();

// Verificando se o usuário foi encontrado
if ($result_usuario->num_rows > 0) {
    $usuario = $result_usuario->fetch_assoc();
    $usuario_id = $usuario['id_usuario'];
} else {
    echo "Erro: Usuário não encontrado.";
    exit;
}

// Agora, utilizando o $usuario_id na consulta de pedidos
$sql = "SELECT p.data, 
                GROUP_CONCAT(m.nome SEPARATOR ', ') AS materiais,
                SUM(p.quantidade) AS total_quantidade, 
                p.status
         FROM pedido p
         JOIN material m ON p.id_material = m.id_material
         WHERE p.usuario_id = ?
         GROUP BY p.data, p.status
         ORDER BY p.data DESC";

$result = $conexao->prepare($sql);
$result->bind_param("i", $usuario_id);
$result->execute();
$result = $result->get_result();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css?nocache=<?= rand() ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
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
<?php include "navusuario.php"; ?><br><br>
<body><br>
    <h2>Seus Pedidos</h2>
    <?php
    if ($result->num_rows > 0) {
        while ($pedido = $result->fetch_assoc()) {
            echo "<div class='pedido'>";
            echo "<p><strong>Data:</strong> " . date("d/m/Y H:i", strtotime($pedido['data'])) . "</p>";
            echo "<p><strong>Materiais:</strong> {$pedido['materiais']}</p>";
            echo "<p><strong>Total Quantidade:</strong> {$pedido['total_quantidade']}</p>";
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
