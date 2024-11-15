<nav class="menu-navegacao">
    <ul>
        <li><a href="?pg=components/conteudo/conteudo">Menu</a></li>
        <li><a href="#">Perfil</a></li>
        <li><a href="#">Amizades</a></li>
        <li><a href="#">Fale Conosco</a></li>
        <?php include_once("acesso/sessao.php");
        if (logado()):
            ?>
            <li class="botao-sair"><a href="?pg=acesso/logout">Sair</a></li>
        <?php endif; ?> 
    </ul>
</nav>
