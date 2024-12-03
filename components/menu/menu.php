<nav class="menu-navegacao">
    <ul>
        <li><a href="?pg=components/conteudo/conteudo">Menu</a></li>
        <li><a href="?pg=bate-papo/bate-papo_filme">Veja Filmes</a></li>
        <li><a href="?pg=bate-papo/bate-papo_serie">Veja Séries</a></li>
        <li><a href="?pg=bate-papo/bate-papo_livro">Veja Livros</a></li>
        <li><a href="?pg=amizades/amizade">Amizades</a></li>

        <?php if (logado()): ?> 
            <li><a href="?pg=fale_conosco/form_envia_msg">Fale Conosco</a></li>
        <?php else: ?>
            <li><a href="?pg=acesso/login/form-login">Fale Conosco</a></li>
        <?php endif; ?>

        <!-- Verifica se 'acesso_admin' está definido e se é igual a 1 -->
        <?php if (isset($_SESSION['acesso_admin']) && $_SESSION['acesso_admin'] == 1): ?>
            <li><a href="admin/">Admin</a></li>
        <?php endif; ?>
    </ul>
</nav>
