<?php
include_once "config.inc.php";

// Verifica se a sessão já está ativa
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Redireciona para a página de login se o usuário não estiver logado
if (!logado()) {
    header("Location: ?pg=acesso/login/form-login");
    exit();
}

// Consulta para obter postagens do tipo livro, incluindo o nome do usuário
$sql_livros = "SELECT posts.*, usuarios.nome AS nome_usuario FROM posts JOIN usuarios ON posts.usuario_id = usuarios.id WHERE posts.tipo = 'livro'";
$query_livros = mysqli_query($conexao, $sql_livros);
?>

<body class="bate-papo-body">
    <h2 class="bate-papo-title">Postagens de Livros</h2>

    <?php while ($livro = mysqli_fetch_array($query_livros)): ?>
        <div class="postagem">
            <h3><?php echo $livro['titulo']; ?></h3>
            <p><strong>Comentário: </strong><?php echo $livro['comentario']; ?></p>
            <p><strong>Nota: </strong><?php echo $livro['avaliacao']; ?></p>
            <p>
                <strong>Postado por: </strong>
                <a href="index.php?pg=perfil/perfil_post&id=<?php echo $livro['usuario_id']; ?>" class="perfil-link"><?php echo $livro['nome_usuario']; ?></a>
            </p>
            
            <!-- Likes e Dislikes -->
            <form action="interagir.php" method="post">
                <input type="hidden" name="post_id" value="<?php echo $livro['id']; ?>">
                <button type="submit" name="acao" value="like">👍 Like</button>
                <button type="submit" name="acao" value="dislike">👎 Dislike</button>
            </form>

            <!-- Comentários -->
            <form action="comentar.php" method="post">
                <input type="hidden" name="post_id" value="<?php echo $livro['id']; ?>">
                <textarea name="comentario" placeholder="Deixe seu comentário..."></textarea>
                <button type="submit">Comentar</button>
            </form>

            <!-- Exibir Comentários -->
            <?php
            $sql_comentarios = "SELECT * FROM interacoes WHERE post_id = {$livro['id']} AND comentario IS NOT NULL";
            $query_comentarios = mysqli_query($conexao, $sql_comentarios);

            while ($comentario = mysqli_fetch_array($query_comentarios)) {
                echo "<p><strong>Usuário {$comentario['usuario_id']}:</strong> {$comentario['comentario']}</p>";
            }
            ?>

            <hr>
        </div>
    <?php endwhile; ?>

    <?php mysqli_close($conexao); ?>
</body>
