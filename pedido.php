<?php
$ped= array();
$ped= array("id_usuario" =>$_POST['id_usuario'], "id_material" =>$_POST['id_material'], "quantidade" =>$_POST['quantidade']);
foreach($ped as $valor){

    echo $valor['id_usuario'];
}


var_dump($ped);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php


$quantidade = $_POST['quantidade'];
// $materi= $_POST['id_material'];
//ESTA IMPRIMINDO NA TELA SOMENTE O ID DO PRIMEIRO E O ULTIMO MATERIAL DA TABELA, ARRUMAR
echo "Os pedidos foram :$quantidade";

?><br>
<a href="Telainicialusuario.php">Voltar</a>    
</body>
</html>
