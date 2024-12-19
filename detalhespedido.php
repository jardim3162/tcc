<?php
require_once "conexao.php";
$conexao = conectar();

$sql = "SELECT * FROM pedidos";
$result = $conexao->query($sql);

if ($result->num_rows > 0) {
    
    while ($row = $result->fetch_assoc()) {
        echo "<h3>Pedido ID: " . $row['id_pedido'] . "</h3>";

       
        $pedido_detalhes = json_decode($row['pedido_detalhes'], true);

        echo "Materiais: " . implode(', ', $pedido_detalhes['nome_material']) . "<br>";
        echo "Quantidades: " . implode(', ', $pedido_detalhes['quantidade']) . "<br>";
    }
} else {
    echo "Nenhum pedido encontrado.";
}

?>