<?php
include_once "../config.inc.php";

$sql_livros = "SELECT posts.*, usuarios.nome AS nome_usuario 
            FROM posts 
            JOIN usuarios ON posts.usuario_id = usuarios.id 
            WHERE posts.tipo = 'livro' 
            ORDER BY posts.id DESC";
$query_livros = mysqli_query($conexao, $sql_livros);
?>
<div class="div">
    <h2 class="titulo">Postagens de Livros</h2>

    <?php while ($livro = mysqli_fetch_assoc($query_livros)): ?>
        <div class="postagem">
            <h3><?= $livro['titulo'] ?></h3>
            <p><strong>Comentário: </strong><?= $livro['comentario'] ?></p>
            <p><strong>Nota: </strong><?= $livro['avaliacao'] ?></p>
            <p><strong>Postado por: </strong><?= $livro['nome_usuario'] ?></p>
        </div>
    <?php endwhile; ?>
</div>
