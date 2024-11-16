<?php

    include_once("../config.inc.php");

    $id = $_REQUEST['id'];

    $sql = "SELECT * FROM posts WHERE id = $id";   

    $query = mysqli_query($conexao, $sql);

    while ($posts = mysqli_fetch_array($query)){ 


?>

<h3>Alterar Post</h3>

<div class="form_edita_post">
    <h1>Editar Post</h1>

    <form action="edita_post.php" method="post">
            <input type="hidden"   name="id"         id="id"         value="<?=$posts['id'];?>">
            <input type="hidden"   name="tipo"       id="tipo"       value="<?=$posts['tipo'];?>">  
            <input type="text"     name="titulo"     id="titulo"     value="<?=$posts['titulo'];?>"     required><br>
            <input type="textarea" name="comentario" id="comentario" value="<?=$posts['comentario'];?>" required><br>
            <input type="number"   name="avaliacao"  id="avaliacao"  value="<?=$posts['avaliacao'];?>"  required min="0" max="10" step="0.1" ><br>
            <input type="hidden"   name="usuario_id" id="usuario_id" value="<?=$posts['usuario_id'];?>" readonly><br>
            <input type="submit"   value="Postar">  

    </form>
</div> 

<?php

}


?>

