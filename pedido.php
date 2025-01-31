<?php
session_start();
$_SESSION['pedido_sucess']= true;
require_once "conexao.php";
require_once 'recuperar-senha/PHPmailer/src/PHPMailer.php';
$conexao = conectar();

use PHPMailer\PHPMailer\PHPMailer;

$pedidos = $_POST['pedidos'];

date_default_timezone_set('America/Sao_Paulo');
$data = new DateTime('now');
$agora = $data->format('Y-m-d H:i:s');

$sql = "";
$cnt = 0;
$sql_grupo = "SELECT grupo_pedido FROM pedido ORDER BY grupo_pedido DESC LIMIT 1";
$result_grupo = executarSQL($conexao, $sql_grupo);
$grupo = $result_grupo->fetch_assoc();
    $grupo_pedido = $grupo['grupo_pedido'];
    $pedido_grupo = $grupo_pedido + 1;
// Exibindo o array resultante
foreach($pedidos as $pedido){
  
    if ($pedido['quantidade'] > 0) {
        $cnt++;
        $sql  =  $sql . "INSERT INTO pedido (id_material,  quantidade,   status  , usuario_id    ,   data, grupo_pedido) VALUES (" . $pedido['id_material']  . ",  " .   $pedido['quantidade']  .  ",  "   .  " 'Pendente'  " . ", "  .   $_SESSION['id_usuario'] .  ",  '$agora', $pedido_grupo) ; ";
    }
 }


 if ($cnt >= 1) { //tem pedidos

        $r = false;


        if ($cnt > 1) {  //te mais de um pedido
            $r =  mysqli_multi_query($conexao,   $sql );
        }
        else { // é apenas 1 pedido
            $r =  mysqli_query($conexao,   $sql );
        }

        if ($r) { //gravou no banco
            header("Location: Telainicialusuario.php");
        } else { //deu erro ao gravar
            header("Location: dadosusuario.php");
        }

        } 
    else { // veio pedidos em branco (nenhum pedido)

        header("Location: dadosusuario.php");
    }

?>

