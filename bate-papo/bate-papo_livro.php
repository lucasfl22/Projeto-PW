<?php
include_once "config.inc.php";

// Consulta para obter postagens do tipo livro, incluindo o nome do usuário
$sql_livros = "SELECT posts.*, usuarios.nome AS nome_usuario FROM posts JOIN usuarios ON posts.usuario_id = usuarios.id WHERE posts.tipo = 'livro' ORDER BY posts.id DESC";
$query_livros = mysqli_query($conexao, $sql_livros);
?>
<div class="div">
    <h2 class="bate-papo-title">Postagens de Livros</h2>

    <?php while ($livro = mysqli_fetch_array($query_livros)): ?>
        <div class="postagem">
            <h3><?= $livro['titulo'] ?></h3>
            <p><strong>Comentário: </strong><?= $livro['comentario'] ?></p>
            <p><strong>Nota: </strong><?= $livro['avaliacao'] ?></p>
            <p>
                <strong>Postado por: </strong>
                <a href="index.php?pg=perfil/perfil_post&id=<?= $livro['usuario_id'] ?>" class="perfil-link"><?= $livro['nome_usuario'] ?></a>
            </p>
            
            <!-- Permitir que apenas os donos dos posts editem-nos ou excluam-nos >:C -->
            <?php if (isset($_SESSION['id_usuario']) && $_SESSION['id_usuario'] == $livro['usuario_id']) { ?>
                <a href="crud/exclui_post.php?id=<?= $livro['id'] ?>&tipo=livro"><b>[X] Excluir</b></a> | 
                <a href="index.php?pg=crud/form_edita_post&id=<?= $livro['id'] ?>&tipo=livro"><b>[V] Editar</b></a><br><br>
            <?php } ?> 
            
            <hr class="hr-estilo">
        </div>


        <?php endwhile; mysqli_close($conexao); ?>
</div>

</body>