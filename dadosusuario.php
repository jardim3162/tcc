<?php
session_start();
require_once 'conexao.php';
$conexao = conectar();
$email = $_SESSION['Email'];
$sql = "SELECT * FROM usuario WHERE email = '$email'";
$result = mysqli_query($conexao, $sql);
$usuario = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados do Usuário</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: rgb(211, 211, 211);
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
        }

        .user-container {
            margin-top: 10%;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .user-info {
            font-size: 18px;
            line-height: 1.6;
        }

        .user-info span {
            font-weight: bold;
        }

        .user-icon {
            font-size: 50px;
            color: #007bff;
            margin-bottom: 15px;
        }
    </style>
</head>
<?php include "navusuario.php"; ?>
<body>
    <!-- Conteúdo de usuário -->
    <div class="user-container">
        <!-- Ícone do usuário centralizado -->
        <i class="bi bi-person-bounding-box user-icon"></i>

        <h1>Dados do Usuário</h1>
        <div class="user-info">
            <p><span>Nome:</span> <?php echo $usuario['nome']; ?></p>
            <p><span>Email:</span> <?php echo $usuario['email']; ?></p>
        </div>
    </div>

</body>

</html>
