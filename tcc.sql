-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 04-Out-2024 às 12:28
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tcc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `material`
--

DROP TABLE IF EXISTS `material`;
CREATE TABLE IF NOT EXISTS `material` (
  `id_material` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `estoque` int NOT NULL,
  `quantidade` int NOT NULL,
  `descricao` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_material`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `material`
--

INSERT INTO `material` (`id_material`, `nome`, `estoque`, `quantidade`, `descricao`) VALUES
(2, 'Papel higiênico', 10, 0, 'Papel higiênico rolo 12x6 metros, marca '),
(3, 'Sabão Barras', 8, 5, 'Sabão Barra, marca \"Dove\"'),
(9, 'Detergente', 10, 0, 'detergente, marca ipan, cor laranja, 700ml'),
(11, 'Sabão em Pó', 10, 0, 'Sabão em Pó, marca OMO'),
(15, 'papel sulfite', 6, 0, 'papel sulfite, a4, cor pardo'),
(16, 'papel toalha', 4, 0, 'papel toalha, tamanho 20ml, cor branca');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `tipo_usuario` int NOT NULL,
  `nome` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `senha` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `tipo_usuario`, `nome`, `email`, `senha`) VALUES
(2, 0, 'pablo', 'pablo@gmail.com', '1234'),
(3, 0, 'marcus', 'marcus@gmail.com', '123456'),
(4, 0, 'lucas', 'lucas@gmail.com', '123456'),
(6, 1, 'Administrador', 'adm2024@gmail.com', '1234'),
(7, 0, 'fernando', 'fernando@gmail.com', '12345'),
(8, 0, 'arthur', 'arthur@gmail.com', '123456'),
(9, 0, 'jonas', 'jonas@gmail.com', '12345'),
(10, 0, 'gabriel', 'gabriel@gmail.com', '1234');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
