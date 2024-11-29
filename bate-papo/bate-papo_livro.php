<?php
include_once "config.inc.php";

// Consulta para obter postagens do tipo livro, incluindo o nome do usuário
$sql_livros = "SELECT posts.*, usuarios.nome AS nome_usuario, 
    (SELECT COUNT(*) FROM interacoes WHERE post_id = posts.id AND tipo = 'like') AS likes,
    (SELECT COUNT(*) FROM interacoes WHERE post_id = posts.id AND tipo = 'dislike') AS dislikes
    FROM posts 
    JOIN usuarios ON posts.usuario_id = usuarios.id 
    WHERE posts.tipo = 'livro' 
    ORDER BY posts.id DESC";
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
            
            <!-- Permitir que apenas os donos dos posts editem ou excluam -->
            <?php if (isset($_SESSION['id_usuario']) && $_SESSION['id_usuario'] == $livro['usuario_id']) { ?>
                <a href="crud/exclui_post.php?id=<?= $livro['id'] ?>&tipo=livro"><b>[X] Excluir</b></a> | 
                <a href="index.php?pg=crud/form_edita_post&id=<?= $livro['id'] ?>&tipo=livro"><b>[V] Editar</b></a><br><br>
            <?php } ?>

            <!-- Likes e Dislikes com contagem -->
            <div class="interacoes">
                <button class="like-btn" data-post-id="<?= $livro['id'] ?>">👍 <?= $livro['likes'] ?></button>
                <button class="dislike-btn" data-post-id="<?= $livro['id'] ?>">👎 <?= $livro['dislikes'] ?></button>
            </div>

            <!-- Comentários -->
            <form action="comentar.php" method="post">
                <input type="hidden" name="post_id" value="<?= $livro['id'] ?>">
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

            <hr class="hr-estilo">
        </div>

    <?php endwhile; mysqli_close($conexao); ?>
</div>

<script>
// Script para gerenciar likes e dislikes
document.querySelectorAll('.like-btn, .dislike-btn').forEach(button => {
    button.addEventListener('click', function () {
        const postId = this.dataset.postId;
        const action = this.classList.contains('like-btn') ? 'like' : 'dislike';

        // Enviar requisição para o servidor
        fetch('interagir.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `post_id=${postId}&acao=${action}`
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                // Atualizar os botões com os novos valores
                document.querySelector(`.like-btn[data-post-id="${postId}"]`).textContent = `👍 ${data.likes}`;
                document.querySelector(`.dislike-btn[data-post-id="${postId}"]`).textContent = `👎 ${data.dislikes}`;
            } else {
                alert(data.message);
            }
        })
        .catch(err => console.error('Erro ao processar a ação:', err));
    });
});
</script>

</body>
