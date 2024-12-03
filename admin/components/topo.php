<div class="topo-biblioteca">
   <a href="?pg=components/conteudo"><img src="../img/CB.png" alt="Logo CineBookly" class="logo-img"></a> 
    <div class="logo">
       <a href="?pg=components/conteudo"><h1>CineBookly - Área Administrativa</h1></a> 
    </div>

    <?php include_once("../acesso/sessao.php");
    if (logado()): ?>
        <div class="usuario-info">
            <span class="usuario-nome"><?= $_SESSION['nome_usuario'] ?></span>
            <a href="../index.php" class="botao-sair">Voltar para o site</a>
        </div>
    <?php else: ?>
        <div class="botoes">
            <a href="?pg=acesso/login/form-login"><button class="botao-login">Login</button></a>
            <a href="?pg=acesso/cadastro/form-cadastrar"><button class="botao-cadastro">Cadastro</button></a>
        </div>
    <?php endif; ?>
</div>
