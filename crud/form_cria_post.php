<div class="form_post">
        <h1>Criar Post</h1>

        <form action="crud/cria_post.php" method="post">
                <input type="hidden"   name="tipo"       id="tipo"       value="<?php echo isset($_REQUEST['tipo']) ? $_REQUEST['tipo'] : ''; ?>"><br>  <!--Serve para trazer o dado do banco para informar se se trata de livro, serie ou filme-->
                <input type="text"     name="titulo"     id="titulo"     placeholder = "Título"      required><br>
                <textarea name="comentario" id="comentario" placeholder = "Comentário"  required></textarea><br>
                <input type="number"   name="avaliacao"  id="avaliacao"  placeholder = "Nota do filme" min="0" max="10" step="0.1" required><br>
                <input type="hidden"   name="usuario_id" id="usuario_id" value="<?php echo isset($_REQUEST['usuario_id']) ? $_REQUEST['usuario_id'] : ''; ?>" readonly><br> <!--Serve para exibir o nome do usuario que fez o post-->
                <input type="submit"   value="Postar">  
        </form>
</div>  
