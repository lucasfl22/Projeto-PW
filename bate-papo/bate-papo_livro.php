<?php
include_once "config.inc.php";

// Consulta para obter postagens do tipo filme
$sql_filmes = "SELECT posts.*, usuarios.nome AS nome_usuario 
    FROM posts 
    JOIN usuarios ON posts.usuario_id = usuarios.id 
    WHERE posts.tipo = 'livro' 
    ORDER BY posts.id DESC";
$query_filmes = mysqli_query($conexao, $sql_filmes);
?>
<div class="div">
    <h2 class="bate-papo-title">Postagens de Livros</h2>

    <?php while ($filme = mysqli_fetch_array($query_filmes)): ?>
        <div class="postagem">
            <h3><?= $filme['titulo'] ?></h3>
            <p><strong>Comentário: </strong><?= $filme['comentario'] ?></p>
            <p><strong>Nota: </strong><?= $filme['avaliacao'] ?></p>
            <p>
                <strong>Postado por: </strong>
                <a href="index.php?pg=perfil/perfil_post&id=<?= $filme['usuario_id'] ?>" class="perfil-link"><?= $filme['nome_usuario'] ?></a>
            </p>

            <!-- Permitir que apenas os donos dos posts editem ou excluam -->
            <?php if (isset($_SESSION['id_usuario']) && $_SESSION['id_usuario'] == $filme['usuario_id']) { ?>
                <a href="crud/exclui_post.php?id=<?= $filme['id'] ?>&tipo=filme"><b>[X] Excluir</b></a> | 
                <a href="index.php?pg=crud/form_edita_post&id=<?= $filme['id'] ?>&tipo=filme"><b>[V] Editar</b></a><br><br>
            <?php } ?>

            <hr class="hr-estilo">
        </div>

    <?php endwhile; mysqli_close($conexao); ?>
</div>
