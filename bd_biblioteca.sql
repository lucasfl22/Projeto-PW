-- Banco de dados: `bd_biblioteca`
--
CREATE DATABASE IF NOT EXISTS `bd_biblioteca` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bd_biblioteca`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    data_cadastro DATETIME DEFAULT CURRENT_TIMESTAMP,
    acesso_admin TINYINT(1) DEFAULT 0
);


--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO usuarios (nome, email, senha, acesso_admin) VALUES
('Ana Silva', 'ana.silva@gmail.com', 'senhaAna123', 0),
('Bruno Costa', 'bruno.costa@gmail.com', 'senhaBruno456', 0),
('Carla Mendes', 'carla.mendes@gmail.com', 'senhaCarla789', 0),
('Daniel Oliveira', 'daniel.oliveira@gmail.com', 'senhaDaniel321', 0),
('Eduarda Lima', 'eduarda.lima@gmail.com', 'senhaEduarda654', 0),
('Felipe Santos', 'felipe.santos@gmail.com', 'senhaFelipe987', 0),
('Gabriela Rocha', 'gabriela.rocha@gmail.com', 'senhaGabriela159', 0),
('Henrique Almeida', 'henrique.almeida@gmail.com', 'senhaHenrique753', 0),
('Isabela Ferreira', 'isabela.ferreira@gmail.com', 'senhaIsabela852', 0),
('João Pedro', 'joao.pedro@gmail.com', 'senhaJoao456', 0);

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
-- Estrutura para tabela `interacoes`
--

CREATE TABLE interacoes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    post_id INT NOT NULL,
    usuario_id INT NOT NULL,
    like_dislike ENUM('like', 'dislike') DEFAULT NULL,          --- NÃO ESTÁ FUNCIONANDO ESSSA TABELA ---
    comentario TEXT DEFAULT NULL,
    data_interacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (post_id) REFERENCES posts(id) ON DELETE CASCADE,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE
);



--
-- Estrutura para tabela `mensagem`
--

CREATE TABLE mensagem (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    telefone VARCHAR(15) NOT NULL,
    tipo_mensagem ENUM('comentario', 'denuncia', 'sugestao', 'avaliacao') NOT NULL,
    mensagem TEXT NOT NULL,
    usuario_id INT NOT NULL,
    data_envio TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);



--
-- Despejando dados para a tabela `mensagem`
--

INSERT INTO mensagem (nome, email, telefone, tipo_mensagem, mensagem, usuario_id) VALUES
('João Silva', 'joao.silva@example.com', '123456789', 'comentario', 'Tenho apenas elogios a fazer aos desenvolvedores do site, que demonstraram plena destreza em toda a construção do site!', 1),
('Maria Oliveira', 'maria.oliveira@example.com', '987654321', 'sugestao', 'Acredito que uma ferramenta de busca seria de grande ajuda. Não é porque o site não tenha muitos usuários ativos que não haja a necessidade de buscar por posts ou usuários.', 9),
('Carlos Pereira', 'carlos.pereira@example.com', '456789123', 'denuncia', 'UMA #@#$$ e também #$$*&$! E digo mais: $#&$* $*$& ##&$&#', 4),
('Ana Costa', 'ana.costa@example.com', '321654987', 'avaliacao', 'Parabéns pelo profissionalismo! O site emana "desenvolvedores SÊNIORS". Quero contratá-los!!', 11),
('Lucas Santos', 'lucas.santos@example.com', '654321789', 'sugestao', 'Talvez fosse interessante adicionar uma seção de "Favoritos" para armazenar itens desejados.', 5),
('Fernanda Lima', 'fernanda.lima@example.com', '789123456', 'denuncia', 'Fiquei esperando a página de livros carregar por 30 minutos e no final deu erro!', 4),
('Roberto Almeida', 'roberto.almeida@example.com', '159753486', 'sugestao', 'Poderia ser interessante adicionar a opção de marcar posts como "favoritos". Isso ajudaria muito na organização!', 1),
('Juliana Martins', 'juliana.martins@example.com', '753159486', 'avaliacao', 'O site tem apresentado lentidão nas últimas semanas. Seria ótimo se pudessem melhorar o tempo de resposta nas páginas.', 3),
('Pedro Souza', 'pedro.souza@example.com', '852963741', 'denuncia', 'Tentei cadastrar minha conta e o site não está permitindo a criação. Me ajuda aí!', 4),
('Clara Rocha', 'clara.rocha@example.com', '369258147', 'comentario', 'O layout é simples e funcional, mas acredito que poderia ser mais moderno e com mais opções de customização.', 5),
('Marcos Silva', 'marcos.silva@example.com', '147258369', 'sugestao', 'Uma área de sugestões, onde os usuários possam enviar ideias diretamente para a equipe, seria bem útil.', 9),
('Tatiane Ferreira', 'tatiane.ferreira@example.com', '258369147', 'denuncia', 'A pesquisa não está funcionando corretamente. Nem todos os posts relevantes estão sendo exibidos nos resultados.', 10),
('Gustavo Lima', 'gustavo.lima@example.com', '369147258', 'avaliacao', 'O suporte foi muito rápido ao responder meu ticket. Fiquei muito satisfeito com a ajuda recebida!', 11),
('Sofia Mendes', 'sofia.mendes@example.com', '951753486', 'denuncia', 'Tentei fazer login várias vezes e não consegui acessar minha conta. Preciso de ajuda!', 12),
('Ricardo Gomes', 'ricardo.gomes@example.com', '753951852', 'avaliacao', 'O site tem um visual antiquado. Seria legal se tivesse uma repaginada para modernizar um pouco a aparência.', 11),
('Patrícia Alves', 'patricia.alves@example.com', '159753258', 'sugestao', 'Talvez uma opção de personalizar a cor do tema do site fosse legal. Isso daria mais liberdade ao usuário.', 4),
('Felipe Costa', 'felipe.costa@example.com', '258147963', 'denuncia', 'A navegação no site não está fluindo bem. Muitas vezes me perco e não encontro o que estou procurando.', 3),
('Isabela Santos', 'isabela.santos@example.com', '369258147', 'comentario', 'Adoro o conteúdo do site, muito bem escrito e com temas variados. Continue com esse excelente trabalho!', 1),
('Thiago Lima', 'thiago.lima@example.com', '147258369', 'sugestao', 'Gostaria de saber como posso excluir minha conta. Não encontrei essa opção no perfil.', 12),
('Julio Cesar', 'julio.cesar@example.com', '258369147', 'denuncia', 'O site está muito pesado. A página de vídeos leva uma eternidade para carregar.', 12),
('Mariana Ferreira', 'mariana.ferreira@example.com', '369147258', 'sugestao', 'Acho que seria interessante adicionar uma funcionalidade de "seguindo" para acompanhar usuários específicos.', 10),
('Eduardo Almeida', 'eduardo.almeida@example.com', '951753258', 'denuncia', 'O site não está funcionando bem no celular, as páginas ficam desformatadas e difícil de ler.', 11);