<div class="topo-biblioteca">
    <img src="img/CB.png" alt="Logo CineBookly" class="logo-img">
    <div class="logo">
        <h1>CineBookly</h1>
    </div>
    <?php include_once("acesso/sessao.php"); ?>
    <?php if (logado()): ?>
        <a href="?pg=perfil/perfil" class="botao-perfil">
            <span class="usuario-simbolo">👤</span>
            <span class="usuario-nome"><?php echo $_SESSION['nome_usuario']; ?></span>
        </a>
        <a href="?pg=acesso/logout" class="botao-sair">
            Sair
        </a>
    <?php else: ?>
        <div class="botoes">
            <button class="botao-login"><a href="?pg=acesso/login/form-login">Login</a></button>
            <button class="botao-cadastro"><a href="?pg=acesso/cadastro/form-cadastrar">Cadastro</a></button>
        </div>
    <?php endif; ?>
</div>