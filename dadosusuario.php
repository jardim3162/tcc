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
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css" rel="stylesheet">
   <!--script sweet alert-->
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
    <style>
        body {
            background-color: #f0f2f5;
            font-family: Arial, sans-serif;
        }
        .user-container {
            background-color: rgb(255, 255, 255);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 300px;
            text-align: center;
            margin: auto;
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
<div class="container-alterarusuario">
         <!-- topend, topstart , topmiddle -->
 <?php if (isset($_SESSION['alterado_sucess']) && $_SESSION['alterado_sucess'] == true) { ?>
        <script>
            Swal.fire({
                position: "top-middle", 
                icon: "success",
                title: "usuário alterado com sucesso!",
                showConfirmButton: false,
                timer: 1500,
                customClass: {
                popup: 'small-popup' // Aplique uma classe CSS personalizada
                }
            });
        </script>
        <?php
        // Apagar a variável de sessão para evitar que o alerta apareça novamente após a próxima atualização da página
        unset($_SESSION['alterado_sucess']);
        ?>
    <?php } ?>
    <div class="user-container" style="margin-top: 20vh;">
        <i class="bi bi-person-bounding-box user-icon"></i>

        <h1>Dados do Usuário</h1>
        <div class="user-info">
            <p><span>Nome:</span> <?php echo $usuario['nome']; ?></p>
            <p><span>Email:</span> <?php echo $usuario['email']; ?></p>

            <a class="btn btn-sm btn-dark" href="form-alterarusuario.php?id_usuario=<?= $usuario['id_usuario']; ?>" title="Editar">
                    <i class="bi bi-pencil"></i>
                Alterar Perfil</a></p>
                <a
                    class="btn btn-sm btn-danger excluir-usuario" 
                    data-id="<?= $usuario['id_usuario']; ?>" 
                    title="Excluir">
                    <i class="bi bi-trash"></i>
                  Excluir Perfil</a>
        </div>
    </div>
    <script>
  document.querySelectorAll('.excluir-usuario').forEach(button => {
    button.addEventListener('click', function (e) {
      e.preventDefault();

      const idusuario = this.getAttribute('data-id');

      Swal.fire({
        title: 'Tem certeza?',
        text: "Esta ação não pode ser desfeita.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Sim, excluir',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.isConfirmed) {

          window.location.href = `excluirusuario.php?id_usuario=${idusuario}`;
        }
      });
    });
  });
</script>
</body>

</html>