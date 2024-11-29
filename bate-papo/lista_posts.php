<?php
include_once "config.inc.php";

// Consulta para obter postagens do tipo livro, incluindo o nome do usuário
$sql = "SELECT posts.*, usuarios.nome AS nome_usuario FROM posts JOIN usuarios ON posts.usuario_id = usuarios.id ORDER BY posts.id DESC";
$query = mysqli_query($conexao, $sql); ?>
<div class="div">
    <h2 class="bate-papo-title">Todas as Postagens</h2>

    <?php while ($posts = mysqli_fetch_array($query)): ?>
        <div class="postagem">
            <h3><?= $posts['titulo'] ?></h3>
            <p><strong>Comentário: </strong><?= $posts['comentario'] ?></p>
            <p><strong>Nota: </strong><?= $posts['avaliacao'] ?></p>
            <p>
                <strong>Postado por: </strong>
                <a href="index.php?pg=perfil/perfil_post&id=<?= $posts['usuario_id'] ?>" class="perfil-link"><?= $posts['nome_usuario'] ?></a>
            </p>
                <a href="admin/ad_exclui_post.php?id=<?= $posts['id'] ?>"><b>[X] Excluir</b></a>

            <hr class="hr-estilo">
        </div>

        <?php endwhile; ?>
        <?php mysqli_close($conexao); ?>
</div>
</body>