<div class="form_post">
    <h1>Criar Post</h1>

    <form action="crud/cria_post.php" method="post">
        <input type="hidden"   name="tipo"       id="tipo"       value="<?php echo isset($_REQUEST['tipo']) ? $_REQUEST['tipo'] : ''; ?>">  <!--Serve para trazer o dado do banco para informar se se trata de livro, serie ou filme-->
        <input type="text"     name="titulo"     id="titulo"     placeholder = "Título"      required>
        <textarea name="comentario" id="comentario" placeholder = "Comentário"  required></textarea>
        <input type="number"   name="avaliacao"  id="avaliacao"  placeholder = "10" min="0" max="10" step="0.1" required>
        <input type="submit"   value="Postar">  
    </form>
</div>  
