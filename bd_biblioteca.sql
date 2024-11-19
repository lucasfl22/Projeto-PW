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

ALTER TABLE `usuarios`
ADD COLUMN `data_cadastro` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP;


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


--
-- Estrutura para tabela `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` enum('livro','serie','filme') NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `comentario` text NOT NULL,
  `avaliacao` decimal(4,2) NOT NULL DEFAULT 0.00,
  `usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario_id` (`usuario_id`),
  CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


--
-- Despejando dados para a tabela `posts`
--

INSERT INTO `posts` (`tipo`, `titulo`, `comentario`, `avaliacao`, `usuario_id`) VALUES
('livro', 'O Senhor dos Anéis', 'Uma obra épica e envolvente!', 9.5, 1),
('serie', 'Breaking Bad', 'Excelente narrativa e personagens marcantes.', 10.0, 3),
('filme', 'Matrix', 'Revolucionário no uso de efeitos visuais.', 9.0, 4),
('livro', 'Dom Quixote', 'Uma leitura clássica e enriquecedora.', 8.0, 5),
('serie', 'Stranger Things', 'Uma ótima nostalgia dos anos 80.', 8.7, 9),
('filme', 'O Poderoso Chefão', 'Um clássico absoluto do cinema.', 10.0, 10);


--
-- Estrutura para tabela `interacoes`
--

CREATE TABLE interacoes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    post_id INT NOT NULL,
    usuario_id INT NOT NULL,
    like_dislike ENUM('like', 'dislike') DEFAULT NULL,
    comentario TEXT DEFAULT NULL,
    data_interacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (post_id) REFERENCES posts(id) ON DELETE CASCADE,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE
);