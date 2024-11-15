<div class="topo-biblioteca">
    <div class="logo">
        <h1>CineBookly</h1>
    </div>
    <?php include_once("acesso/sessao.php");
    if (!logado()):
        ?>
        <div class="botoes">
            <button class="botao-login"><a href="?pg=acesso/login/form-login">Login</a></button>
            <button class="botao-cadastro"><a href="?pg=acesso/cadastro/form-cadastrar">Cadastro</a></button>
        </div>
    <?php endif; ?>
</div>