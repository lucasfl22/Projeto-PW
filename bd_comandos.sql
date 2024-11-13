-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12/11/2024 às 16:19
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
-- Banco de dados: `bd_equipe_e`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
`id` int(11) NOT NULL,
`nome` varchar(100) NOT NULL,
`email` varchar(50) DEFAULT NULL,
`telefone` varchar(15) DEFAULT NULL,
`cidade` varchar(50) DEFAULT NULL,
`estado` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `email`, `telefone`, `cidade`, `estado`) VALUES
(2, 'svs', 'ooorrr@outlook.com', '454458', 'fsefs', 'fsefse'),
(4, 'Amelinton Santos Silva', 'Amelindo@gmail.com', '90907070', ' todas', 'df');

-- --------------------------------------------------------

--
-- Estrutura para tabela `contatos`
--

CREATE TABLE `contatos` (
`id` int(11) NOT NULL,
`nome` varchar(100) DEFAULT NULL,
`email` varchar(100) DEFAULT NULL,
`assunto` varchar(50) DEFAULT NULL,
`mensagem` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `contatos`
--

INSERT INTO `contatos` (`id`, `nome`, `email`, `assunto`, `mensagem`) VALUES
(2, 'Mariana', 'mariana@yahoo.com', 'Qualquer', ' Mensagem qualquer'),
(4, 'Jubileu', 'jubs@hotmail.com', 'Assunto A', ' Mensagem A');

-- --------------------------------------------------------

--
-- Estrutura para tabela `contratador`
--

CREATE TABLE `contratador` (
`id` int(11) NOT NULL,
`nome` varchar(100) NOT NULL,
`email` varchar(100) NOT NULL,
`senha` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `freela`
--

CREATE TABLE `freela` (
`id` int(11) NOT NULL,
`nome` varchar(100) NOT NULL,
`email` varchar(100) NOT NULL,
`senha` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `freela_projeto`
--

CREATE TABLE `freela_projeto` (
`id_freela` int(11) NOT NULL,
`id_projeto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `projeto`
--

CREATE TABLE `projeto` (
`id` int(11) NOT NULL,
`titulo` varchar(255) NOT NULL,
`descricao` text DEFAULT NULL,
`remuneracao` decimal(10,2) DEFAULT NULL,
`vagas` int(11) NOT NULL,
`id_contratador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
`id` int(11) NOT NULL,
`usuario` varchar(50) NOT NULL,
`senha` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`, `senha`) VALUES
(1, 'ester', '000000');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `contatos`
--
ALTER TABLE `contatos`
ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `contratador`
--
ALTER TABLE `contratador`
ADD PRIMARY KEY (`id`),
ADD UNIQUE KEY `email` (`email`);

--
-- Índices de tabela `freela`
--
ALTER TABLE `freela`
ADD PRIMARY KEY (`id`),
ADD UNIQUE KEY `email` (`email`);

--
-- Índices de tabela `freela_projeto`
--
ALTER TABLE `freela_projeto`
ADD PRIMARY KEY (`id_freela`,`id_projeto`),
ADD KEY `id_projeto` (`id_projeto`);

--
-- Índices de tabela `projeto`
--
ALTER TABLE `projeto`
ADD PRIMARY KEY (`id`),
ADD KEY `id_contratador` (`id_contratador`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `contatos`
--
ALTER TABLE `contatos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `contratador`
--
ALTER TABLE `contratador`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `freela`
--
ALTER TABLE `freela`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `projeto`
--
ALTER TABLE `projeto`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `freela_projeto`
--
ALTER TABLE `freela_projeto`
ADD CONSTRAINT `freela_projeto_ibfk_1` FOREIGN KEY (`id_freela`) REFERENCES `freela` (`id`),
ADD CONSTRAINT `freela_projeto_ibfk_2` FOREIGN KEY (`id_projeto`) REFERENCES `projeto` (`id`);

--
-- Restrições para tabelas `projeto`
--
ALTER TABLE `projeto`
ADD CONSTRAINT `projeto_ibfk_1` FOREIGN KEY (`id_contratador`) REFERENCES `contratador` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;