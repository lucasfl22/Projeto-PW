<section class="sobre">
    <div class="container">
        <?php include_once("acesso/sessao.php"); ?>
            <h2 class="titulo">Bem-vindo à Administração do CineBookly!</h2><br><br><br>

        <div class="funcionalidades-container">
            <div class="funcionalidade">
                <h3>Veja aqui todos os posts já feitos no site!</h3>
                <a href="?pg=bate-papo/lista_posts"><button class="botao">Posts</button></a>
            </div>

            <div class="funcionalidade">
                <h3>Veja a lista de todos os usuários cadastrados no sistema!</h3>
                <a href="?pg=admin/lista_user"><button class="botao">Usuários</button></a>
            </div>
        </div>

        <div class="funcionalidades-container">
            <div class="funcionalidade">
                <h3>Veja as mensagens enviadas pelos usuários!</h3>
                <a href="?pg=fale_conosco/lista_msg"><button class="botao">Mensagens</button></a>
            </div>

            <div class="funcionalidade">
                <h3>Vá para o Site Principal</h3>
                <p style="color: black;">Sua sessão será encerrada</p>
                <a href="?pg=acesso/logout"><button class="botao">CineBookly</button></a>
            </div>
        </div>

    </div>
</section>
