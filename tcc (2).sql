-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02/02/2025 às 22:59
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
-- Estrutura para tabela `alternativo`
--

CREATE TABLE `alternativo` (
  `id_alternativo` int(11) NOT NULL,
  `nome_material` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `motivo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `alternativo`
--

INSERT INTO `alternativo` (`id_alternativo`, `nome_material`, `descricao`, `motivo`) VALUES
(1, 'Tinta', 'Cor preta, Metalex 1L', 'preciso de tinta para efetuar a pintura de um cômodo.'),
(2, 'Pano', 'Pano de algodão, 2metros', 'preciso de panos de algodão com 2metros para usar como tapete nos banheiros.\r\n '),
(3, 'Sabão liquido ', 'marca Dove, 200ml ', 'preciso de sabão para reposição nos banheiros do segundo andar.'),
(4, 'Cabo de Vassoura', 'cabo de vassoura, 1Metro, cor verde', 'preciso de novos cabos de vassoura para utilizar na faxina.'),
(5, 'Alvejante', 'Alvejante, 900ml', 'preciso de alvejante para realizar a limpeza dos banheiros.');

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
-- Estrutura para tabela `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL,
  `grupo_pedido` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `status` varchar(50) DEFAULT 'Pendente',
  `id_material` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pedido`
--

INSERT INTO `pedido` (`id_pedido`, `grupo_pedido`, `data`, `usuario_id`, `quantidade`, `status`, `id_material`) VALUES
(89, 1, '2025-01-31 12:55:48', 13, 3, 'Pendente', 3),
(90, 1, '2025-01-31 12:55:48', 13, 3, 'Pendente', 15),
(91, 1, '2025-01-31 12:55:48', 13, 3, 'Pendente', 16),
(92, 2, '2025-01-31 12:56:00', 13, 4, 'Pago', 3),
(99, 4, '2025-01-31 18:43:34', 13, 2, 'Pago', 9),
(100, 4, '2025-01-31 18:43:34', 13, 4, 'Pago', 15),
(101, 4, '2025-01-31 18:43:34', 13, 3, 'Pago', 16),
(102, 5, '2025-02-02 18:17:09', 13, 3, 'Pendente', 3),
(103, 5, '2025-02-02 18:17:09', 13, 1, 'Pendente', 9),
(104, 5, '2025-02-02 18:17:09', 13, 4, 'Pendente', 11),
(105, 5, '2025-02-02 18:17:09', 13, 6, 'Pendente', 15),
(106, 6, '2025-02-02 18:27:20', 13, 1, 'Pendente', 3),
(107, 6, '2025-02-02 18:27:20', 13, 2, 'Pendente', 9),
(108, 6, '2025-02-02 18:27:20', 13, 3, 'Pendente', 11),
(109, 6, '2025-02-02 18:27:20', 13, 4, 'Pendente', 15),
(110, 7, '2025-02-02 18:46:09', 13, 1, 'Pendente', 3),
(111, 7, '2025-02-02 18:46:09', 13, 2, 'Pendente', 9),
(112, 7, '2025-02-02 18:46:09', 13, 3, 'Pendente', 11),
(113, 7, '2025-02-02 18:46:09', 13, 6, 'Pendente', 15);

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
('teste2@gmail.com', '493e7baecb50ef4386193b867a8d241683e0a0200686b1093c0ea043585f857587d871569773f844c644a29062ff15e7e853', '2024-11-28 12:59:36', 0),
('joao.2020316204@aluno.iffar.edu.br', 'e395dfcfb31ac84ac16bd8d9b6944941084832b485ff82d1a295c475ec81338205026906a45962490d7250fccb017b987841', '2025-01-10 12:49:23', 0),
('joao.2020316204@aluno.iffar.edu.br', '3a5dae0eef2d9c84ac0a6d8a25a95dc76422c31edb8caa3c951ed86fea6e6defa1b2c9525f80998ce2e8ad7abc902294812f', '2025-01-10 12:59:20', 0),
('joao.2020316204@aluno.iffar.edu.br', 'ac5c1d42c617fbb216f21d3529f28a6373a97290ae85dcca5afdb1f7a1dc8082689825ad903cc19fffd04992c04ceaee5b77', '2025-01-13 17:13:16', 0);

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
(13, 'usuario', 'usuario@gmail.com', '$2y$10$ndPxw5rq.cojT9VBp3ox7.GJZ83kN6/deWKsftN121NSlSFySqlHW', 0),
(15, 'adm', 'adm@gmail.com', '$2y$10$4xA3bENgD83zrjdBBShFbOGZ78Fd35sSKL298wERIRm3VZ8fNHw0W', 1),
(17, 'sdf', 'joao.2020316204@aluno.iffar.edu.br', '$2y$10$U5SS3SZWieFhGpdOiSzrAuRY/wK9lhQaPGTu7WZZhq5knSX4GfyBu', 0),
(19, 'teste', 'teste@gmail.com', '$2y$10$h19y/vfjxSngcAvNXDHjhOcsoar01p/ESWq9SiWsH/rBvNqsk4.MK', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `alternativo`
--
ALTER TABLE `alternativo`
  ADD PRIMARY KEY (`id_alternativo`);

--
-- Índices de tabela `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id_material`);

--
-- Índices de tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `id_material_idx` (`id_material`) USING BTREE,
  ADD KEY `id_usuario_idx` (`id_pedido`),
  ADD KEY `id_usuario_fk` (`usuario_id`);

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
-- AUTO_INCREMENT de tabela `alternativo`
--
ALTER TABLE `alternativo`
  MODIFY `id_alternativo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `material`
--
ALTER TABLE `material`
  MODIFY `id_material` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `id_material_fk2` FOREIGN KEY (`id_material`) REFERENCES `material` (`id_material`),
  ADD CONSTRAINT `id_usuario_fk` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
