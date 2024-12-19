<?php
session_start();
require_once "conexao.php";
$conexao = conectar();
$sql = "SELECT * FROM pedido";
$result = $conexao->query(query: $sql);

if ($result->num_rows > 0) {
    
    while ($row = $result->fetch_assoc()) {
        echo "<h3>Pedido ID: " . $row['id_pedido'] . "</h3>";

       
        $pedido_detalhes = json_decode(json: $row['pedido_detalhes'], associative: true);

        echo "Usuario Solicitante : ". $_SESSION['Email'] . "<br>";
        echo "Materiais: " . implode(separator: ', ', array: $pedido_detalhes['nome_material']) . "<br>";
        echo "Quantidades: " . implode(separator: ', ', array: $pedido_detalhes['quantidade']) . "<br>";
    }
} else {
    echo "Nenhum pedido encontrado.";

}

?>