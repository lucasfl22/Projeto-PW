<h2>Filmes</h2>

<p><a href="?pg=form_cria_post">Criar Novo Post</a></p>

<?php


    include_once("../config.inc.php");

    $sql = mysqli_query($conexao,"SELECT * FROM posts WHERE tipo = 'filme'");

    while($tabela = mysqli_fetch_array($sql)){
        echo "Título:     $tabela[titulo]     <br>";
        echo "Comentário: $tabela[comentario] <br>";
        echo "Avaliação:  $tabela[avaliacao]  <br>";

        echo "<a href=?pg=exclui_post&id=$tabela[id]><b>[X] Excluir</b></a>  |";
        echo "<a href=?pg=form_edita_post&id=$tabela[id]><b>[V] Editar</b></a> <br>";
        echo "<hr>";
    }

    if(!$sql){
        echo "<h2>Não foi possível realizar as operações</h2>";
    }

    mysqli_close($conexao);

?>