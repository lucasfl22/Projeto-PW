<div class="form_cria_post">
        <h1>Criar Post</h1>

        <form action="crud/cria_post.php" method="post">
                <input type="hidden" name="tipo" id="tipo" value="<?php echo isset($_REQUEST['tipo']) ? $_REQUEST['tipo'] : ''; ?>">
                <input type="text" name="titulo" id="titulo" placeholder="Título" required>
                <textarea name="comentario" id="comentario" placeholder="Comentário" required></textarea>
                <input type="number" name="avaliacao" id="avaliacao" placeholder="Nota do filme" min="0" max="10" step="0.1" required>
                <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo isset($_REQUEST['usuario_id']) ? $_REQUEST['usuario_id'] : ''; ?>">
                <input type="submit" value="Postar">
        </form>
</div>
