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
(10, 'chico', 'chico@gmail.com', 'chico'),
(11, 'Ana Silva', 'ana.silva@gmail.com', 'ana123'),
(12, 'Carlos Pereira', 'carlos.pereira@hotmail.com', 'carlos456'),
(13, 'Maria Oliveira', 'maria.oliveira@yahoo.com', 'maria789'),
(14, 'Luiz Fernando', 'luiz.fernando@gmail.com', 'luiz000'),
(15, 'Gabriel Souza', 'gabriel.souza@outlook.com', 'gabriel321'),
(16, 'Juliana Costa', 'juliana.costa@uol.com.br', 'juliana111'),
(17, 'Fernando Almeida', 'fernando.almeida@gmail.com', 'fernando222'),
(18, 'Beatriz Lima', 'beatriz.lima@bol.com.br', 'beatriz333'),
(19, 'Roberta Rocha', 'roberta.rocha@gmail.com', 'roberta444'),
(20, 'Marcelo Santos', 'marcelo.santos@hotmail.com', 'marcelo555');


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
  CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE
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
('filme', 'O Poderoso Chefão', 'Um clássico absoluto do cinema.', 10.0, 10),
('livro', 'Harry Potter e a Pedra Filosofal', 'Uma história mágica que encanta todas as idades.', 9.2, 1),
('filme', 'Star Wars: Uma Nova Esperança', 'O início de uma saga inesquecível no espaço.', 9.8, 3),
('serie', 'Game of Thrones', 'Uma trama épica, embora o final tenha decepcionado muitos.', 8.5, 4),
('livro', '1984', 'Uma visão distópica poderosa e impactante.', 9.0, 5),
('filme', 'Interstellar', 'Uma jornada emocionante sobre espaço e humanidade.', 9.3, 9),
('serie', 'The Office', 'Um humor brilhante e personagens cativantes.', 9.5, 10),
('livro', 'O Alquimista', 'Uma narrativa inspiradora sobre seguir seus sonhos.', 8.8, 11),
('filme', 'Parasita', 'Uma obra-prima que mistura gêneros com perfeição.', 9.6, 12),
('serie', 'Friends', 'Uma comédia leve e icônica que marcou gerações.', 9.0, 13),
('livro', 'A Menina que Roubava Livros', 'Uma história emocionante narrada pela Morte.', 8.9, 14),
('filme', 'Gladiador', 'Uma saga épica de coragem e vingança.', 9.0, 15),
('serie', 'Black Mirror', 'Um olhar perturbador sobre o impacto da tecnologia.', 8.7, 16),
('livro', 'O Pequeno Príncipe', 'Um clássico atemporal cheio de lições de vida.', 9.5, 17),
('filme', 'A Origem', 'Uma viagem inteligente pelo mundo dos sonhos.', 9.4, 18),
('serie', 'Dark', 'Uma trama complexa e fascinante sobre viagem no tempo.', 9.1, 19),
('livro', 'O Senhor dos Anéis', 'Achei muito longo e tedioso. Não entendi a hype.', 3.0, 5),
('serie', 'Breaking Bad', 'É um pouco supervalorizada, achei a narrativa arrastada em algumas partes.', 5.0, 9),
('filme', 'Matrix', 'Na minha opinião, não tem nada de especial, uma história confusa e chata.', 4.0, 10),
('livro', 'Dom Quixote', 'Uma leitura cansativa e sem graça. Não vale o hype.', 4.5, 14),
('serie', 'Stranger Things', 'É uma série para adolescentes, nada de tão interessante assim.', 5.2, 20),
('filme', 'O Poderoso Chefão', 'Nada mais que um monte de diálogos longos. Achei muito superestimado.', 4.2, 4),
('livro', 'O Alquimista', 'História rasa e sem sentido. Não entendi o motivo de tanta adoração.', 3.5, 3),
('filme', 'O Exorcista', 'Achei mais engraçado do que assustador. Não merece todo o reconhecimento.', 3.0, 4),
('serie', 'The Walking Dead', 'É sempre a mesma coisa. Encheção de linguiça.', 4.8, 9);

--
-- Estrutura para tabela `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL UNIQUE,
  `senha` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


--
-- Despejando dados para a tabela `admin`
--

INSERT INTO `admin` (`email`, `senha`) VALUES
('adm4@gmail.com', '123456'),
('administrador@outlook.com', '000000'),
('suporte@gmail.com', '654321'),
('gerente@site.com', 'senha123'),
('moderador@site.com', 'mod456'),
('supervisor@site.com', 'supervisor789'),
('manager@site.com', 'manager2024'),
('assistente@site.com', 'assistente321');



--
-- Estrutura para tabela `mensagem`
--

CREATE TABLE `mensagem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assunto` text NOT NULL,
  `mensagem` text NOT NULL,
  `usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


--
-- Despejando dados para a tabela `mensagem`
--

INSERT INTO `mensagem` (`assunto`, `mensagem`, `usuario_id`) VALUES
('Elogios', 'Tenho apenas elogios a fazer aos desenvolvedores do site, que demonstraram plena destreza em toda a construção do site!', 1),
('Sujestão', 'Acredito que uma ferramenta de busca seria de grande ajuda. Não é porque o site não tenha muitos usuários ativos que não haja a necessidade de buscar por posts ou usuários.', 9),
('Melhore!!!', 'UMA #@#$$ e também #$$*&$! E digo mais: $#&$* $*$& ##&$&#', 14),
('Parabéns!', 'Parabéns pelo profissionalismo! O site emana "desenvolvedores SÊNIORS". Quero contratá-los!!', 20),
('Adicionar aos Favoritos', 'Talvez fosse interessante adicionar uma seção de "Favoritos" para armazenar itens desejados.', 18),
('Reclamação', 'Fiquei esperando a página de livros carregar por 30 minutos e no final deu erro!', 14),
('Sugestão de Funcionalidade', 'Poderia ser interessante adicionar a opção de marcar posts como "favoritos". Isso ajudaria muito na organização!', 1),
('Feedback de Performance', 'O site tem apresentado lentidão nas últimas semanas. Seria ótimo se pudessem melhorar o tempo de resposta nas páginas.', 3),
('Erro no Cadastro', 'Tentei cadastrar minha conta e o site não está permitindo a criação. Me ajuda aí!', 4),
('Opinião sobre o Layout', 'O layout é simples e funcional, mas acredito que poderia ser mais moderno e com mais opções de customização.', 5),
('Sugestão de Melhorias', 'Uma área de sugestões, onde os usuários possam enviar ideias diretamente para a equipe, seria bem útil.', 9),
('Problema na Pesquisa', 'A pesquisa não está funcionando corretamente. Nem todos os posts relevantes estão sendo exibidos nos resultados.', 10),
('Elogios ao Suporte', 'O suporte foi muito rápido ao responder meu ticket. Fiquei muito satisfeito com a ajuda recebida!', 11),
('Problema no Login', 'Tentei fazer login várias vezes e não consegui acessar minha conta. Preciso de ajuda!', 12),
('Reclamação sobre o Design', 'O site tem um visual antiquado. Seria legal se tivesse uma repaginada para modernizar um pouco a aparência.', 13),
('Sugestão para Melhorias', 'Talvez uma opção de personalizar a cor do tema do site fosse legal. Isso daria mais liberdade ao usuário.', 14),
('Problema de Navegação', 'A navegação no site não está fluindo bem. Muitas vezes me perco e não encontro o que estou procurando.', 15),
('Elogios sobre o Conteúdo', 'Adoro o conteúdo do site, muito bem escrito e com temas variados. Continue com esse excelente trabalho!', 16),
('Dúvida sobre Funcionalidade', 'Gostaria de saber como posso excluir minha conta. Não encontrei essa opção no perfil.', 17),
('Desempenho abaixo do esperado', 'O site está muito pesado. A página de vídeos leva uma eternidade para carregar.', 18),
('Sugestão de Novos Recursos', 'Acho que seria interessante adicionar uma funcionalidade de "seguindo" para acompanhar usuários específicos.', 19),
('Problema na Responsividade', 'O site não está funcionando bem no celular, as páginas ficam desformatadas e difícil de ler.', 20);
