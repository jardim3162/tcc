<?php
session_start();
require_once "conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido Alternativo</title>
    <link rel="stylesheet" href="css/styles.css?">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css" rel="stylesheet">
   <!--script sweet alert-->
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
    <style>
        body {
            background-color: #f0f2f5;
            font-family: 'Roboto', sans-serif;
        }

        .container {
            margin-top: 5%;
            background-color: #ffffff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
        }

        .form-section {
            margin-bottom: 25px;
        }

        h5 {
            margin-bottom: 25px;
            font-weight: bold;
            color: #007bff;
        }

        .btn {
            font-weight: bold;
            letter-spacing: 0.5px;
            padding: 10px;
        }

        input.form-control {
            margin-bottom: 20px;
            padding: 12px;
            border-radius: 5px;
        }

        label {
            font-weight: bold;
            color: #495057;
        }

        footer {
            margin-top: 30px;
            text-align: center;
            font-size: 14px;
            color: #6c757d;
        }

        .form-group label {
            margin-bottom: 8px;
            display: inline-block;
        }
    </style>
</head>
<?php include "navusuario.php"; ?>
<body> 
    <!-- topend, topstart , topmiddle -->
<?php if (isset($_SESSION['pedido_sucess']) && $_SESSION['pedido_sucess'] == true) { ?>
        <script>
            Swal.fire({
                position: "top-middle", 
                icon: "success",
                title: "Pedido efetuado com sucesso!",
                showConfirmButton: false,
                timer: 1500,
                customClass: {
                popup: 'small-popup' // Aplique uma classe CSS personalizada
                }
            });
        </script>
        <?php
        // Apagar a variável de sessão para evitar que o alerta apareça novamente após a próxima atualização da página
        unset($_SESSION['pedido_sucess']);
        ?>
    <?php } ?>
    <div class="container">
        <div class="col-md-12 mx-auto">
            <form action="cadastroalternativo.php" method="POST">
                <div class="form-section">
                    <h5 class="text-center">Realizar Pedido</h5>
                    <div class="form-group">
                        <label for="nome_material">Nome do Material:</label>
                        <input type="text" name="nome" class="form-control" placeholder="Digite o nome do material" required>
                        <label for="descricao_material">Descrição do Material:</label>
                        <input type="text" name="descricao" class="form-control" placeholder="Digite a descrição do material" required>
                        <label for="motivo_pedido">Motivo do Pedido:</label>
                        <input type="text" name="motivo" class="form-control" placeholder="Informe o motivo do pedido" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Enviar Pedido</button>
            </form>
        </div>
    </div>
    <footer>
        <p>&copy; 2025 Sistema de Pedidos. Todos os direitos reservados.</p>
    </footer>
</body>

</html>
