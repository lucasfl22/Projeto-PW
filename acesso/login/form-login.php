<div class="form-login-container">
    <div class="form-login">
        <h1>Login</h1>
        <form action="login/login.php" method="post">
            <input type="text" name="email" placeholder="Email" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <button type="submit" class="botao">Entrar</button>
        </form>
        <?php if (isset($_GET['login']) && $_GET['login'] == 1): ?>
            <p style="color: red;">Email ou senha incorretos. Tente novamente.</p>
        <?php endif; ?>
    </div>
</div>