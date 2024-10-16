<?php

$text = "Bem-vindo à nossa página de mais informações! Aqui você vai encontrar tudo sobre os nossos serviços de limpeza profissional.";

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mais Informações - Serviços de Limpeza</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: rgb(211, 211, 211);
            margin: 0;
            padding: 0;
            color: #333;
        }

        .header {
            background-color: #4CAF50;
            color: white;
            padding: 15px;
            text-align: center;
        }

        .content {
            padding: 20px;
        }

        h1 {
            color: #4CAF50;
        }

        .info-section {
            margin: 30px 0;
        }

        .info-box {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .info-box h2 {
            color: #333;
            margin-bottom: 10px;
        }

        .info-box p {
            font-size: 16px;
            color: #555;
        }

        .btn-primary {
            background-color: #4CAF50;
            border: none;
        }

        .btn-primary:hover {
            background-color: #45a049;
        }

        footer {
            background-color: #4CAF50;
            color: white;
            text-align: center;
            padding: 10px;
            position: absolute;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>

<body>

    <div class="header">
        <h1>Mais Informações sobre nossos Serviços de Limpeza</h1>
        <p><?php echo $text; ?></p>
    </div>

    <div class="container content">
        <div class="row info-section">
            <div class="col-md-6">
                <div class="info-box">
                    <h2>Sobre Nós</h2>
                    <p>
                        Somos uma empresa especializada em serviços de limpeza profissional para ambientes comerciais e residenciais.
                        Nosso compromisso é com a qualidade, pontualidade e excelência no atendimento ao cliente.
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="info-box">
                    <h2>Nossos Serviços</h2>
                    <p>
                        Oferecemos uma ampla gama de serviços, incluindo limpeza de escritórios, limpeza pós-obra, higienização de carpetes,
                        limpeza de vidros e muito mais. Personalizamos nossos serviços de acordo com a sua necessidade.
                    </p>
                </div>
            </div>
        </div>

        <div class="row info-section">
            <div class="col-md-12">
                <div class="info-box">
                    <h2>Por que escolher nossa empresa?</h2>
                    <p>
                        Utilizamos produtos de alta qualidade e equipamentos modernos para garantir uma limpeza impecável e segura.
                        Nossa equipe é treinada para lidar com todos os tipos de ambientes, sempre com eficiência e discrição.
                    </p>
                    <a href="contato.php" class="btn btn-primary">Entre em Contato</a>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 - Empresa de Limpeza. Todos os direitos reservados.</p>
    </footer>

</body>

</html>
