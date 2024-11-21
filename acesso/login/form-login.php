<?php 
include_once("acesso/sessao.php");

//verifica se está logado
if (logado()) {
    echo "<script>alert('Você já está logado!'); window.location.href = 'index.php';</script>";
}
?>

<div class="form-login-container">
    <div class="form-login">
        <h1>Login</h1>
        <form action="acesso/login/login.php" method="post">
            <input type="text" name="usuario" id="usuario" maxlength="50" placeholder="Nome de usuário ou Email" required>
            <input type="password" name="senha" id="senha" maxlength="50" placeholder="Senha" required>
            <button type="submit" class="botao">Entrar</button>
        </form>
        <?php if (isset($_GET['login']) && $_GET['login'] == 1){ ?>
            <p style="color: red;">Nome de usuário ou email, ou senha incorretos. Tente novamente.</p>
        <?php } ?>
    </div>
</div>