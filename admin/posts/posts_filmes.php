<?php
include_once "../config.inc.php";
include_once "../acesso/sessao.php";

// Verifica se o usuário está logado
if (!logado()) {
    header("Location: ../acesso/login/form-login.php");
    exit();
}

// Consulta para obter postagens do tipo "filme"
$sql_filmes = "SELECT posts.*, usuarios.nome AS nome_usuario 
            FROM posts 
            JOIN usuarios ON posts.usuario_id = usuarios.id 
            WHERE posts.tipo = 'filme' 
            ORDER BY posts.id DESC";

$query_filmes = mysqli_query($conexao, $sql_filmes);
?>
<div class="div">
    <h2 class="titulo">Postagens de Filmes</h2>

    <?php while ($filme = mysqli_fetch_assoc($query_filmes)): ?>
        <div class="postagem">
            <h3><?= $filme['titulo'] ?></h3>
            <p><strong>Comentário: </strong><?= $filme['comentario'] ?></p>
            <p><strong>Nota: </strong><?= $filme['avaliacao'] ?></p>
            <p><strong>Postado por: </strong><?= $filme['nome_usuario'] ?></p>
        </div>
    <?php endwhile; ?>
</div>
