-- Banco de dados: `bd_biblioteca`
--
CREATE DATABASE IF NOT EXISTS `bd_biblioteca` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bd_biblioteca`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL UNIQUE,
  `email` varchar(100) NOT NULL UNIQUE,
  `senha` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'Calebe', 'calebearcilio@gmail.com', '12345'),
(3, 'Calebe2', 'calebeawrcilio@gmail.com', '1231'),
(4, 'Calebe3', 'calebear231cilio@gmail.com', '12345'),
(5, 'Calebe34', 'cal23ebearcilio@gmail.com', '12324354676'),
(9, 'Joaquim', 'joaquim@gmail.com', '1234'),
(10, 'chico', 'chico@gmail.com', 'chico');
