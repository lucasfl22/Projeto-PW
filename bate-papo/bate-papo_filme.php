<?php
include_once "config.inc.php";

// Consulta para obter postagens do tipo filme
$sql_filmes = "SELECT posts.*, usuarios.nome AS nome_usuario 
    FROM posts 
    JOIN usuarios ON posts.usuario_id = usuarios.id 
    WHERE posts.tipo = 'filme' 
    ORDER BY posts.id DESC";
$query_filmes = mysqli_query($conexao, $sql_filmes);
?>
<div class="div">
    <h2 class="bate-papo-title">Postagens de Filmes</h2>

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

            <!-- Likes e Dislikes -->
            <div class="interacoes">
                <button class="like-btn" data-post-id="<?= $filme['id'] ?>">👍 <?= $filme['likes'] ?></button>
                <button class="dislike-btn" data-post-id="<?= $filme['id'] ?>">👎 <?= $filme['dislikes'] ?></button>
            </div>

            <hr class="hr-estilo">
        </div>

    <?php endwhile; mysqli_close($conexao); ?>
</div>

<script>
// Seu código JS aqui

document.querySelectorAll('.like-btn, .dislike-btn').forEach(button => {
    button.addEventListener('click', function () {
        const postId = this.dataset.postId;
        const action = this.classList.contains('like-btn') ? 'like' : 'dislike';

        // Enviar requisição para o servidor
        fetch('bate-papo/interagir.php', {
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
