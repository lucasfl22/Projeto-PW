<section class="sobre">
    <div class="container">
        <h2 class="titulo">Bem-vindo ao CineBookly</h2>
        <p class="descricao">O CineBookly é um espaço interativo onde você pode explorar, avaliar e compartilhar suas experiências com filmes, séries e livros. Nosso objetivo é criar uma comunidade apaixonada por cultura e entretenimento, onde todos podem contribuir com resenhas, classificações e interagir com outros usuários. Vamos juntos transformar a maneira como você compartilha suas descobertas!</p>
        
        <div class="funcionalidades-container">
            <div class="funcionalidade">
                <h3>Converse sobre Filmes</h3>
                <p>No Bate-Papo de filmes, você pode adicionar novos títulos, dar notas, escrever resenhas detalhadas e discutir suas opiniões com outros usuários. Organize seus filmes de acordo com suas preferências e compartilhe suas impressões com a comunidade apaixonada por cinema.</p>
                <button class="botao">Bate-Papo (Filmes)</button>
                
                <!-- Condicional para redirecionamento caso o user esteja logado ou não -->
                <?php if (logado()){ ?>         
                    <button class="botao"><a href="?pg=crud/form_cria_post&tipo=filme">Criar uma Publicação</a></button>
                <?php } else{ ?>
                    <button class="botao"><a href="?pg=acesso/login/form-login">Criar uma Publicação</a></button>
                <?php } ?>
            </div>

            <div class="funcionalidade">
                <h3>Explore Séries com a Comunidade</h3>
                <p>No Bate-Papo de séries, compartilhe suas opiniões sobre as últimas temporadas, dê notas, deixe resenhas e discuta suas cenas favoritas com outros usuários. Organize suas séries preferidas e interaja com quem compartilha seus gostos.</p>
                <button class="botao">Bate-Papo (Séries)</button>

                <!-- Condicional para redirecionamento caso o user esteja logado ou não -->
                <?php if (logado()){ ?>         
                    <button class="botao"><a href="?pg=crud/form_cria_post&tipo=serie">Criar uma Publicação</a></button>
                <?php } else{ ?>
                    <button class="botao"><a href="?pg=acesso/login/form-login">Criar uma Publicação</a></button>
                <?php } ?>
            </div>
        </div>

        <div class="funcionalidades-container">
            <div class="funcionalidade">
                <h3>Compartilhe suas Leituras</h3>
                <p>No Bate-Papo de livros, você pode adicionar suas leituras, dar notas, escrever resenhas profundas e debater com outros leitores. Organize seus livros favoritos e troque impressões com a comunidade literária.</p>
                <button class="botao">Bate-Papo (Livros)</button>

                <!-- Condicional para redirecionamento caso o user esteja logado ou não -->
                <?php if (logado()){ ?>         
                    <button class="botao"><a href="?pg=crud/form_cria_post&tipo=livro">Criar uma Publicação</a></button>
                <?php } else{ ?>
                    <button class="botao"><a href="?pg=acesso/login/form-login">Criar uma Publicação</a></button>
                <?php } ?>
            </div>

            <div class="funcionalidade">
                <h3>Seu Perfil Pessoal</h3>
                <p>No seu perfil, acompanhe todas as suas publicações, visualize seu histórico de avaliações e interações, e veja as atividades dos seus amigos. Esse é o seu espaço exclusivo no CineBookly, onde você pode organizar e rever todas as suas experiências.</p>
                <button class="botao">Ver meu perfil</button>
            </div>
        </div>

    </div>
</section>
