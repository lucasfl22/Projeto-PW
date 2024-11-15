<?php 
    include_once("acesso/sessao.php");
    if (logado()){
        echo "<script>alert('Você já está logado!');</script>";
        header("Location: index.php");
        exit();
    }
?>

<div class="form-cadastrar">
    <h1>Cadastro</h1>
    <?php 
    if (isset($_GET['cadastrado'])) {
        $cadastrado = $_GET['cadastrado'];

        if($cadastrado == '0') {
            echo "<h2 style='color: red;'>FALHA AO CADASTRAR</h2>";
        }
        else if($cadastrado == '1') {
            echo "<h2 style='color: green;'>Usuário cadastrado com sucesso!</h2>";
        }
        else if($cadastrado == '2') {
            echo "<h2 style='color: orange;'>Usuário ou email já existe!</h2>";
        }
        else if($cadastrado == '3') {
            echo "<h2 style='color: red;'>As senhas não correspondem!</h2>";
        }
    }
    ?>
    <form action="acesso/cadastro/cadastro.php" method="post">
        <input type="text" name="nome_usuario" id="nome_usuario" maxlength="50" placeholder="Nome" required>
        <input type="email" name="email_usuario" id="email_usuario" maxlength="50" placeholder="Email" required>
        <input type="password" name="senha_usuario" id="senha_usuario" maxlength="50" placeholder="Senha" required>
        <input type="password" name="confirmar_senha_usuario" id="confirmar_senha_usuario" maxlength="50" placeholder="Confirmar Senha" required>   
        <button type="submit">Cadastrar</button>
    </form>
</div> 