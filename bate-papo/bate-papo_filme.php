<?php
include_once "config.inc.php";

// Verifica se a sessão já está ativa
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Consulta para obter postagens do tipo filme, incluindo o nome do usuário
$sql_filmes = "SELECT posts.*, usuarios.nome AS nome_usuario FROM posts JOIN usuarios ON posts.usuario_id = usuarios.id WHERE posts.tipo = 'filme' ORDER BY posts.id DESC";
$query_filmes = mysqli_query($conexao, $sql_filmes);
?>

<body class="bate-papo-body">
    <h2 class="h2-estilo">Postagens de Filmes</h2>

    <?php while ($filme = mysqli_fetch_array($query_filmes)): ?>
        <div class="postagem">
            <h3><?php echo $filme['titulo']; ?></h3>
            <p><strong>Comentário: </strong><?php echo $filme['comentario']; ?></p>
            <p><strong>Nota: </strong><?php echo $filme['avaliacao']; ?></p>
            <p>
                <strong>Postado por: </strong>
                <a href="index.php?pg=perfil/perfil_post&id=<?php echo $filme['usuario_id']; ?>" class="perfil-link"><?php echo $filme['nome_usuario']; ?></a>
            </p>

            <!-- Permitir que apenas os donos dos posts editem-nos ou excluam-nos >:C -->
            <?php if (isset($_SESSION['id_usuario']) && $_SESSION['id_usuario'] == $filme['usuario_id']) { ?>
                <a href="crud/exclui_post.php?id=<?php echo $filme['id']; ?>&tipo=filme"><b>[X] Excluir</b></a> | 
                <a href="crud/form_edita_post.php?id=<?php echo $filme['id']; ?>&tipo=filme"><b>[V] Editar</b></a><br><br>
            <?php } ?>            
            
            <!-- Likes e Dislikes -->
            <form action="interagir.php" method="post">
                <input type="hidden" name="post_id" value="<?php echo $filme['id']; ?>">
                <button type="submit" name="acao" value="like">👍 Like</button>
                <button type="submit" name="acao" value="dislike">👎 Dislike</button>
            </form>

            <!-- Comentários -->
            <form action="comentar.php" method="post">
                <input type="hidden" name="post_id" value="<?php echo $filme['id']; ?>">
                <textarea name="comentario" placeholder="Deixe seu comentário..."></textarea>
                <button type="submit">Comentar</button>
            </form>

            <!-- Exibir Comentários -->
            <?php
            $sql_comentarios = "SELECT * FROM interacoes WHERE post_id = {$filme['id']} AND comentario IS NOT NULL";
            $query_comentarios = mysqli_query($conexao, $sql_comentarios);

            while ($comentario = mysqli_fetch_array($query_comentarios)) {
                echo "<p><strong>Usuário {$comentario['usuario_id']}:</strong> {$comentario['comentario']}</p>";
            }
            ?>

            <hr class="hr-estilo">
        </div>
    <?php endwhile; ?>

    <?php mysqli_close($conexao); ?>
</body>
