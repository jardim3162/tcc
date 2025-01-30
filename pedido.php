<?php
session_start();
$_SESSION['pedido_sucess']= true;
require_once "conexao.php";
require_once 'recuperar-senha/PHPmailer/src/PHPMailer.php';
$conexao = conectar();

use PHPMailer\PHPMailer\PHPMailer;





$pedidos = $_POST['pedidos'];





// $nome_material = $_POST['nome_material'];
// $quantidade = $_POST['quantidade'];
// $email = $_POST['email'];

// var_dump($email, $nome_material, $quantidade);

date_default_timezone_set('America/Sao_Paulo');
$data = new DateTime('now');
$agora = $data->format('Y-m-d H:i:s');

$sql = "";
$cnt = 0;

// Exibindo o array resultante
foreach($pedidos as $pedido){
  
    if ($pedido['quantidade'] > 0) {
        $cnt++;
        $sql  =  $sql . "INSERT INTO pedido (id_material,  quantidade,   status  , usuario_id    ,   data) VALUES (" . $pedido['id_material']  . ",  " .   $pedido['quantidade']  .  ",  "   .  " 'Pendente'  " . ", "  .   $_SESSION['id_usuario'] .  ",  '$agora') ; ";
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
            header("Location: Telainicialusuario2.php");
        } else { //deu erro ao gravar
            header("Location: dadosusuario.php");
        }

        } 
    else { // veio pedidos em branco (nenhum pedido)

        header("Location: dadosusuario.php");
    }

?>

