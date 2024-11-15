<?php 
    include_once("acesso/sessao.php");
    if (logado()){
        echo "<script>alert('Você já está logado!');</script>";
        header("Location: index.php");
        exit();
    }
?>

<div class="form-login-container">
    <div class="form-login">
        <h1>Login</h1>
        <form action="acesso/login/login.php" method="post">
            <input type="text" name="email" id="email" maxlength="50" placeholder="Email" required>
            <input type="password" name="senha" id="senha" maxlength="50" placeholder="Senha" required>
            <button type="submit" class="botao">Entrar</button>
        </form>
        <?php if (isset($_GET['login']) && $_GET['login'] == 1): ?>
            <p style="color: red;">Email ou senha incorretos. Tente novamente.</p>
        <?php endif; ?>
    </div>
</div>