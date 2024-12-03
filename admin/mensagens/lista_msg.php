<?php
include_once "../config.inc.php";
include_once "../acesso/sessao.php";

// Verifica se o usuário está logado
if (!logado()) {
    header("Location: ../acesso/login/form-login.php");
    exit();
}

// Consulta para obter todas as mensagens
$sql_mensagens = "SELECT mensagem.*, usuarios.nome AS nome_usuario 
                FROM mensagem
                JOIN usuarios ON mensagem.usuario_id = usuarios.id 
                ORDER BY mensagem.data_envio DESC";

$query_mensagens = mysqli_query($conexao, $sql_mensagens);
?>

<div class="div">
    <h2 class="titulo">Mensagens Recebidas</h2>

    <?php while ($mensagem = mysqli_fetch_assoc($query_mensagens)): ?>
        <div class="postagem">
            <p><strong>Nome:</strong> <?= $mensagem['nome'] ?></p>
            <p><strong>Email:</strong> <?= $mensagem['email'] ?></p>
            <p><strong>Telefone:</strong> <?= $mensagem['telefone'] ?></p>
            <p><strong>Tipo de Mensagem:</strong> <?= ucfirst($mensagem['tipo_mensagem']) ?></p>
            <p><strong>Mensagem:</strong> <?= nl2br($mensagem['mensagem']) ?></p>
            <p><strong>Postado por:</strong> <?= $mensagem['nome_usuario'] ?></p>
            <p><strong>Data de Envio:</strong> <?= date('d/m/Y H:i', strtotime($mensagem['data_envio'])) ?></p>
        </div>
    <?php endwhile; ?>

    <?php
    // Fecha a conexão com o banco
    mysqli_close($conexao);
    ?>
</div>
