<h1>Filmes</h1>

<?php

    session_start();
    include_once("../config.inc.php");

    if (isset($_SESSION['id_usuario'])) {
        echo '<h2><a href="form_cria_post.php?tipo=filme">Criar Novo Post</a></h2>'; //erro no envio do formulario a partir daqui. problema de referencia no form??
    } else {
        echo '<h2><a href="../acesso/login/form-login.php">Criar Novo Post</a></h2>';
    }

    $sql = mysqli_query($conexao,"SELECT * FROM posts WHERE tipo = 'filme'");

    while($tabela = mysqli_fetch_array($sql)){
        echo "Título:     $tabela[titulo]     <br>";
        echo "Comentário: $tabela[comentario] <br>";
        echo "Avaliação:  $tabela[avaliacao]  <br>";

        // as opcoes de exluir e editar so estarao visiveis para os usuarios logados e donos dos posts
        if (isset($_SESSION['id_usuario']) && $_SESSION['id_usuario'] == $tabela['usuario_id']) {
            echo "<a href='exclui_post.php?id=$tabela[id]&tipo=filme'><b>[X] Excluir</b></a> | ";
            echo "<a href='form_edita_post.php?id=$tabela[id]&tipo=filme'><b>[V] Editar</b></a> <br>";
        } echo "<hr>";
    }

    if(!$sql){
        echo "<h2>Não foi possível realizar as operações</h2>";
    }

    mysqli_close($conexao);

?>