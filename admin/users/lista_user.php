<?php
include_once "../config.inc.php";
include_once "../acesso/sessao.php";

// Verifica se o usuário está logado
if (!logado()) {
    header("Location: ../acesso/login/form-login.php");
    exit();
}

// Consulta para obter todos os usuários
$sql_usuarios = "SELECT * FROM usuarios ORDER BY data_cadastro DESC";

$query_usuarios = mysqli_query($conexao, $sql_usuarios);
?>

<div class="div">
    <h2 class="titulo">Lista de Usuários</h2>

    <?php while ($usuario = mysqli_fetch_assoc($query_usuarios)): ?>
        <div class="postagem">
            <p><strong>Nome:</strong> <?= $usuario['nome'] ?></p>
            <p><strong>Email:</strong> <?= $usuario['email'] ?></p>
            <p><strong>Data de Cadastro:</strong> <?= date('d/m/Y H:i', strtotime($usuario['data_cadastro'])) ?></p>
            <p><strong>Senha:</strong> <?= $usuario['senha'] ?></p>
            <p><strong>Acesso Admin:</strong> <?= $usuario['acesso_admin'] ? 'Sim' : 'Não' ?></p>
        </div>
    <?php endwhile; ?>

    <?php
    // Fecha a conexão com o banco
    mysqli_close($conexao);
    ?>
</div>
