<div class="topo-biblioteca">
    <img src="img/CB.png" alt="Logo CineBookly" class="logo-img">
    <div class="logo">
        <h1>CineBookly</h1>
    </div>
    <?php include_once("acesso/sessao.php");
    if (logado()): ?>
        <a href="?pg=perfil/perfil" class="botao-perfil">
            <span class="usuario-simbolo">👤</span>
            <span class="usuario-nome"><?= $_SESSION['nome_usuario'] ?></span>
        </a>
        <a href="?pg=acesso/logout" class="botao-sair">
            Sair
        </a>
    <?php else: ?>
        <div class="botoes">
            <a href="?pg=acesso/login/form-login"><button class="botao-login">Login</button></a>
            <a href="?pg=acesso/cadastro/form-cadastrar"><button class="botao-cadastro">Cadastro</button></a>
        </div>
    <?php endif; ?>
</div>