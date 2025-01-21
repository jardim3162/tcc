-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 21-Jan-2025 às 18:21
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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `alternativo`
--

INSERT INTO `alternativo` (`id_alternativo`, `nome_material`, `descricao`, `motivo`) VALUES
(1, 'Tinta', 'Cor preta, Metalex 1L', 'preciso de tinta para efetuar a pintura de um cômodo.'),
(2, 'Pano', 'Pano de algodão, 2metros', 'preciso de panos de algodão com 2metros para usar como tapete nos banheiros.\r\n '),
(3, 'Sabão liquido ', 'marca Dove, 200ml ', 'preciso de sabão para reposição nos banheiros do segundo andar.'),
(4, 'Cabo de Vassoura', 'cabo de vassoura, 1Metro, cor verde', 'preciso de novos cabos de vassoura para utilizar na faxina.'),
(5, 'Alvejante', 'Alvejante, 900ml', 'preciso de alvejante para realizar a limpeza dos banheiros.');

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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `material`
--

INSERT INTO `material` (`id_material`, `nome`, `estoque`, `descricao`) VALUES
(3, 'sabão barras', 10, 'Sabão barra, marca Dove'),
(9, 'detergente', 10, 'Detergente, marca ipan, cor laranja, 700ml'),
(11, 'sabão pó', 10, 'Sabão em pó, marca OMO'),
(15, 'pano', 10, 'Pano de algodão, cor branca, 1 metro'),
(16, 'papel toalha', 10, 'Papel toalha, tamanho 20cm, cor branca'),
(23, 'esponja', 10, 'Esponja dupla face para limpeza, marca Scotch-Brite'),
(24, 'àgua sanitária', 10, 'Àgua sanitária 2L, marca Qboa'),
(25, 'amaciante', 10, 'Amaciante concentrado 500ml, marca Downy'),
(26, 'limpador multiuso', 10, ': Limpador multiuso spray 500ml, marca Veja'),
(27, 'desinfetante', 10, 'Desinfetante floral 1L, marca Lysol'),
(28, 'sabonete liquido', 10, 'Sabonete líquido hidratante, marca Dove'),
(29, 'álcool gel', 10, 'Álcool em gel 70% 500ml, marca Asseptgel'),
(30, 'luva de borracha', 10, 'Luvas de borracha para limpeza, marca Bettanin');

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
) ENGINE=MyISAM AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`id_pedido`, `data`, `usuario`, `nome_material`, `quantidade`, `status`) VALUES
(64, '0000-00-00 00:00:00', 'teste2@gmail.com', 'sabão, detergente, papel', '2, 6, 8', 'Pendente'),
(65, '0000-00-00 00:00:00', 'teste2@gmail.com', 'papel, caneta, bombril, sabão', '3, 5, 6, 2', 'Pago'),
(70, '0000-00-00 00:00:00', 'usuario@gmail.com', 'lapis, papeis, canetas', '1, 2, 3', 'Pendente'),
(67, '0000-00-00 00:00:00', 'teste2@gmail.com', 'teste, teste, teste, teste', '1, 2, 3, 4, 5', 'Pago'),
(68, '0000-00-00 00:00:00', 'usuario@gmail.com', 'teste1, teste 2, teste3, teste4', '1, 2, 3, 4, 5, 6', 'Pago'),
(69, '0000-00-00 00:00:00', 'usuario@gmail.com', 'sabão, papel, detergente', '2, 5, 6, 7', 'Pago'),
(71, '2025-01-06 13:05:03', 'teste2@gmail.com', 'teste. teste. teste', '2, 4, 6', 'Pendente'),
(72, '2025-01-10 13:17:45', 'usuario@gmail.com', 'sabão barras, detergente, sabão pó, papel sulfite, papel toalha, TESTE', '2, 2, 2, 2, 2, 2', 'Pendente'),
(73, '2025-01-11 12:21:27', 'usuario@gmail.com', 'sabão, detergente, papel pó', '2, 2, 2', 'Pago'),
(74, '2025-01-13 12:53:41', 'usuario@gmail.com', 'sabão barras, detergente, papel sulfite', '2, 2, 2', 'Pago'),
(75, '2025-01-13 17:09:22', 'adm@gmail.com', 'sabão, detergente, papel sulfite', '2, 2, 2', 'Pago');

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
('teste2@gmail.com', '493e7baecb50ef4386193b867a8d241683e0a0200686b1093c0ea043585f857587d871569773f844c644a29062ff15e7e853', '2024-11-28 12:59:36', 0),
('joao.2020316204@aluno.iffar.edu.br', 'e395dfcfb31ac84ac16bd8d9b6944941084832b485ff82d1a295c475ec81338205026906a45962490d7250fccb017b987841', '2025-01-10 12:49:23', 0),
('joao.2020316204@aluno.iffar.edu.br', '3a5dae0eef2d9c84ac0a6d8a25a95dc76422c31edb8caa3c951ed86fea6e6defa1b2c9525f80998ce2e8ad7abc902294812f', '2025-01-10 12:59:20', 0),
('joao.2020316204@aluno.iffar.edu.br', 'ac5c1d42c617fbb216f21d3529f28a6373a97290ae85dcca5afdb1f7a1dc8082689825ad903cc19fffd04992c04ceaee5b77', '2025-01-13 17:13:16', 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `email`, `senha`, `tipo_usuario`) VALUES
(13, 'usuario', 'usuario@gmail.com', '$2y$10$ndPxw5rq.cojT9VBp3ox7.GJZ83kN6/deWKsftN121NSlSFySqlHW', 0),
(15, 'adm', 'adm@gmail.com', '$2y$10$4xA3bENgD83zrjdBBShFbOGZ78Fd35sSKL298wERIRm3VZ8fNHw0W', 1),
(17, 'sdf', 'joao.2020316204@aluno.iffar.edu.br', '$2y$10$U5SS3SZWieFhGpdOiSzrAuRY/wK9lhQaPGTu7WZZhq5knSX4GfyBu', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
