<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fixed Responsive Navbar</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      padding-top: 60px; /* Para evitar sobreposição da navbar */
    }

    /* Navbar Styles */
    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: #343a40;
      color: white;
      padding: 10px 20px;
      position: fixed;
      top: 0;
      width: 100%;
      z-index: 1000;
    }

    .navbar-left {
      display: flex;
      align-items: center;
    }

    .navbar-brand {
      display: flex;
      align-items: center;
      text-decoration: none;
      color: white;
      margin-right: 20px;
    }

    .navbar-brand img {
      width: 40px;
      height: 40px;
      margin-right: 10px;
    }

    .navbar-menu {
      display: flex;
      list-style: none;
      margin: 0;
      padding: 0;
    }

    .navbar-menu li {
      margin: 0 10px;
    }

    .navbar-menu a {
      text-decoration: none;
      color: white;
      padding: 5px 10px;
      transition: background-color 0.3s;
    }

    .navbar-menu a:hover {
      background-color: #495057;
      border-radius: 5px;
    }

    .navbar-right {
      display: flex;
      align-items: center;
    }

    .navbar-toggle {
      display: none;
      flex-direction: column;
      cursor: pointer;
    }

    .navbar-toggle div {
      width: 25px;
      height: 3px;
      background-color: white;
      margin: 3px 0;
    }

    @media (max-width: 768px) {
      .navbar-menu {
        display: none;
        flex-direction: column;
        background-color: #343a40;
        position: absolute;
        top: 60px;
        left: 20px;
        width: calc(100% - 40px);
        border-radius: 5px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      }

      .navbar-menu.active {
        display: flex;
      }

      .navbar-toggle {
        display: flex;
      }
    }
  </style>
</head>
<body>

<nav class="navbar">
  <div class="navbar-left">
    <a class="navbar-brand" href="#">
      <img src="logo.png" alt="Logo">
    </a>
    <ul class="navbar-menu" id="navbarMenu">
      <li><a href="Telainicial.php">Início</a></li>
      <li><a href="detalhespedidoadm.php">Pedidos</a></li>
      <li><a href="pedidoalternativoadm.php">Alternativo</a></li>
    </ul>
  </div>
  <div class="navbar-right">
    <a href="logout.php" class="text-danger">
      <svg xmlns="http://www.w3.org/2000/svg" width="30" height="25" fill="currentColor" class="bi bi-power" viewBox="0 0 16 16">
        <path d="M7.5 1v7h1V1z"/>
        <path d="M3 8.812a5 5 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812"/>
      </svg>
    </a>
    <div class="navbar-toggle" id="navbarToggle">
      <div></div>
      <div></div>
      <div></div>
    </div>
  </div>
</nav>

<script>
  const navbarToggle = document.getElementById('navbarToggle');
  const navbarMenu = document.getElementById('navbarMenu');

  navbarToggle.addEventListener('click', () => {
    navbarMenu.classList.toggle('active');
  });
</script>

</body>
</html>
