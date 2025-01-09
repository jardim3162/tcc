-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 09-Jan-2025 às 16:02
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
-- Estrutura da tabela `alternativo`
--

DROP TABLE IF EXISTS `alternativo`;
CREATE TABLE IF NOT EXISTS `alternativo` (
  `id_alternativo` int NOT NULL AUTO_INCREMENT,
  `nome_material` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `descricao` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `motivo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_alternativo`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `alternativo`
--

INSERT INTO `alternativo` (`id_alternativo`, `nome_material`, `descricao`, `motivo`) VALUES
(1, 'teste', 'teste do teste', 'preciso de um teste'),
(2, 'segundo teste', 'teste do segundo teste', 'preciso de um segundo teste para testar');

-- --------------------------------------------------------

--
-- Estrutura da tabela `material`
--

DROP TABLE IF EXISTS `material`;
CREATE TABLE IF NOT EXISTS `material` (
  `id_material` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `estoque` int NOT NULL,
  `descricao` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_material`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `material`
--

INSERT INTO `material` (`id_material`, `nome`, `estoque`, `descricao`) VALUES
(3, 'Sabão Barras', 8, 'Sabão Barra, marca \"Dove\"'),
(9, 'Detergente', 10, 'detergente, marca ipan, cor laranja, 700ml'),
(11, 'Sabão em Pó', 10, 'Sabão em Pó, marca OMO'),
(15, 'papel sulfite', 6, 'papel sulfite, a4, cor pardo, teste'),
(16, 'papel toalha', 4, 'papel toalha, tamanho 20ml, cor branca'),
(22, 'TESTE', 100, 'apenas um teste para testar');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

DROP TABLE IF EXISTS `pedido`;
CREATE TABLE IF NOT EXISTS `pedido` (
  `id_pedido` int NOT NULL AUTO_INCREMENT,
  `data` datetime NOT NULL,
  `usuario` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nome_material` text COLLATE utf8mb4_general_ci NOT NULL,
  `quantidade` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_general_ci DEFAULT 'Pendente',
  PRIMARY KEY (`id_pedido`)
) ENGINE=MyISAM AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`id_pedido`, `data`, `usuario`, `nome_material`, `quantidade`, `status`) VALUES
(64, '0000-00-00 00:00:00', 'teste2@gmail.com', 'sabão, detergente, papel', '2, 6, 8', 'Pago'),
(65, '0000-00-00 00:00:00', 'teste2@gmail.com', 'papel, caneta, bombril, sabão', '3, 5, 6, 2', 'Pago'),
(70, '0000-00-00 00:00:00', 'usuario@gmail.com', 'lapis, papeis, canetas', '1, 2, 3', 'Pendente'),
(67, '0000-00-00 00:00:00', 'teste2@gmail.com', 'teste, teste, teste, teste', '1, 2, 3, 4, 5', 'Pago'),
(68, '0000-00-00 00:00:00', 'usuario@gmail.com', 'teste1, teste 2, teste3, teste4', '1, 2, 3, 4, 5, 6', 'Pago'),
(69, '0000-00-00 00:00:00', 'usuario@gmail.com', 'sabão, papel, detergente', '2, 5, 6, 7', 'Pago'),
(71, '2025-01-06 13:05:03', 'teste2@gmail.com', 'teste. teste. teste', '2, 4, 6', 'Pendente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `recuperar-senha`
--

DROP TABLE IF EXISTS `recuperar-senha`;
CREATE TABLE IF NOT EXISTS `recuperar-senha` (
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `data_criacao` datetime NOT NULL,
  `usado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `recuperar-senha`
--

INSERT INTO `recuperar-senha` (`email`, `token`, `data_criacao`, `usado`) VALUES
('joao.2020316204@aluno.iffar.edu.br', '9ec6576fb764fe92d7bc5474094edb1c27395f10a2351eafcd9502c5881d196587119174b761f4a0dc370604a7064fae21bb', '2024-11-21 16:37:56', 0),
('teste2@gmail.com', '493e7baecb50ef4386193b867a8d241683e0a0200686b1093c0ea043585f857587d871569773f844c644a29062ff15e7e853', '2024-11-28 12:59:36', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `senha` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tipo_usuario` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `email`, `senha`, `tipo_usuario`) VALUES
(11, 'teste', 'teste@tesfsdfsdt.com', '$2y$10$E2AB4D6tOre10ZIdTGAv1ODEkGFUBZ01GOCqtJkq3CUezNiFmWx76', 1),
(12, 'teste2', 'teste2@gmail.com', '$2y$10$ApdSDDSCMYUlWKTCrCH5q./VkmljW8I1AR0SHAHT830DlXeE9F5CS', 0),
(13, 'usuario', 'usuario@gmail.com', '$2y$10$ndPxw5rq.cojT9VBp3ox7.GJZ83kN6/deWKsftN121NSlSFySqlHW', 0),
(15, 'adm', 'adm@gmail.com', '$2y$10$4xA3bENgD83zrjdBBShFbOGZ78Fd35sSKL298wERIRm3VZ8fNHw0W', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
