<nav class="menu-navegacao">
    <ul>
        <li><a href="?pg=components/conteudo/conteudo">Menu</a></li>
        <li><a href="?pg=bate-papo/bate-papo_filme">Veja Filmes</a></li>
        <li><a href="?pg=bate-papo/bate-papo_serie">Veja Séries</a></li>
        <li><a href="?pg=bate-papo/bate-papo_livro">Veja Livros</a></li>
    <?php if (logado()){ ?>         
        <li><a href="?pg=fale_conosco/form_envia_msg">Fale Conosco</button></a></li>
    <?php } else{ ?>
        <li><a href="?pg=acesso/login/form-login">Fale Conosco</button></a></li>
    <?php } ?>
    </ul>
</nav>
