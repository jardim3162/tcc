-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06/01/2025 às 02:39
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

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
-- Estrutura para tabela `material`
--

CREATE TABLE `material` (
  `id_material` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `estoque` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `material`
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
-- Estrutura para tabela `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `nome_material` text NOT NULL,
  `quantidade` varchar(255) NOT NULL,
  `status` varchar(50) DEFAULT 'Pendente'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pedido`
--

INSERT INTO `pedido` (`id_pedido`, `data`, `usuario`, `nome_material`, `quantidade`, `status`) VALUES
(64, '0000-00-00 00:00:00', 'teste2@gmail.com', 'sabão, detergente, papel', '2, 6, 8', 'Pago'),
(65, '0000-00-00 00:00:00', 'teste2@gmail.com', 'papel, caneta, bombril, sabão', '3, 5, 6, 2', 'Pago'),
(70, '0000-00-00 00:00:00', 'usuario@gmail.com', 'lapis, papeis, canetas', '1, 2, 3', 'Pendente'),
(67, '0000-00-00 00:00:00', 'teste2@gmail.com', 'teste, teste, teste, teste', '1, 2, 3, 4, 5', 'Pago'),
(68, '0000-00-00 00:00:00', 'usuario@gmail.com', 'teste1, teste 2, teste3, teste4', '1, 2, 3, 4, 5, 6', 'Pendente'),
(69, '0000-00-00 00:00:00', 'usuario@gmail.com', 'sabão, papel, detergente', '2, 5, 6, 7', 'Pendente');

-- --------------------------------------------------------

--
-- Estrutura para tabela `recuperar-senha`
--

CREATE TABLE `recuperar-senha` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `data_criacao` datetime NOT NULL,
  `usado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `recuperar-senha`
--

INSERT INTO `recuperar-senha` (`email`, `token`, `data_criacao`, `usado`) VALUES
('joao.2020316204@aluno.iffar.edu.br', '9ec6576fb764fe92d7bc5474094edb1c27395f10a2351eafcd9502c5881d196587119174b761f4a0dc370604a7064fae21bb', '2024-11-21 16:37:56', 0),
('teste2@gmail.com', '493e7baecb50ef4386193b867a8d241683e0a0200686b1093c0ea043585f857587d871569773f844c644a29062ff15e7e853', '2024-11-28 12:59:36', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `tipo_usuario` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `email`, `senha`, `tipo_usuario`) VALUES
(11, 'teste', 'teste@tesfsdfsdt.com', '$2y$10$E2AB4D6tOre10ZIdTGAv1ODEkGFUBZ01GOCqtJkq3CUezNiFmWx76', 1),
(12, 'teste2', 'teste2@gmail.com', '$2y$10$ApdSDDSCMYUlWKTCrCH5q./VkmljW8I1AR0SHAHT830DlXeE9F5CS', 0),
(13, 'usuario', 'usuario@gmail.com', '$2y$10$ndPxw5rq.cojT9VBp3ox7.GJZ83kN6/deWKsftN121NSlSFySqlHW', 0),
(15, 'adm', 'adm@gmail.com', '$2y$10$4xA3bENgD83zrjdBBShFbOGZ78Fd35sSKL298wERIRm3VZ8fNHw0W', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id_material`);

--
-- Índices de tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `material`
--
ALTER TABLE `material`
  MODIFY `id_material` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
