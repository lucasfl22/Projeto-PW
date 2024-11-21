<?php 
include_once("acesso/sessao.php");

//verifica se está logado
if (logado()) {
    echo "<script>alert('Você já está logado!'); window.location.href = 'index.php';</script>";
}
?>

<div class="form-cadastrar">
    <h1>Cadastro</h1>

<?php 
if (isset($_GET['cadastrado'])) {
    $cadastrado = $_GET['cadastrado'];

    if($cadastrado == '0') { ?>
    <h2 style='color: red;'>FALHA AO CADASTRAR</h2>;

<?php } else if($cadastrado == '1') { ?>
    <h2 style='color: green;'>Usuário cadastrado com sucesso!</h2>;

<?php } else if($cadastrado == '2') { ?>
    <h2 style='color: orange;'>Usuário ou email já existe!</h2>;

<?php } else if($cadastrado == '3') { ?>
    <h2 style='color: red;'>As senhas não correspondem!</h2>;

<?php }} ?>

    <form action="acesso/cadastro/cadastro.php" method="post">
        <input type="text" name="nome_usuario" id="nome_usuario" maxlength="50" placeholder="Nome" required>
        <input type="email" name="email_usuario" id="email_usuario" maxlength="50" placeholder="Email" required>
        <input type="password" name="senha_usuario" id="senha_usuario" maxlength="50" placeholder="Senha" required>
        <input type="password" name="confirmar_senha_usuario" id="confirmar_senha_usuario" maxlength="50" placeholder="Confirmar Senha" required>   
        <button type="submit">Cadastrar</button>
    </form>
</div> 