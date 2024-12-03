<?php
include_once "../config.inc.php";

$sql_series = "SELECT posts.*, usuarios.nome AS nome_usuario 
            FROM posts 
            JOIN usuarios ON posts.usuario_id = usuarios.id 
            WHERE posts.tipo = 'serie' 
            ORDER BY posts.id DESC";
$query_series = mysqli_query($conexao, $sql_series);
?>
<div class="div">
    <h2 class="titulo">Postagens de Séries</h2>

    <?php while ($serie = mysqli_fetch_assoc($query_series)): ?>
        <div class="postagem">
            <h3><?= $serie['titulo'] ?></h3>
            <p><strong>Comentário: </strong><?= $serie['comentario'] ?></p>
            <p><strong>Nota: </strong><?= $serie['avaliacao'] ?></p>
            <p><strong>Postado por: </strong><?= $serie['nome_usuario'] ?></p>
            <form method="post" action="posts/excluir_post.php">
                <input type="hidden" name="post_id" value="<?= $serie['id'] ?>">
                <button type="submit" class="delete-btn">Excluir</button>
            </form>
        </div>
    <?php endwhile; ?>
</div>
