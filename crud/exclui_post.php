<?php

    include_once("../config.inc.php");

    session_start();
    if (!isset($_SESSION['id_usuario'])) {  //so exclui se tiver logado
        die("Erro: Usuário não está logado.");
    }

    $id = $_REQUEST['id'];
    $tipo =       $_REQUEST['tipo'];

    $sql = mysqli_query($conexao,"DELETE FROM posts WHERE id = $id AND usuario_id = {$_SESSION['id_usuario']}");

    if ($sql) {
        echo "<h2>Post Excluido</h2>";
    
        if ($tipo == 'filme') {     //as variaveis de tipo vao ser fornecidas pela url
            header("Location: ../index.php?pg=bate-papo/bate-papo_filme");
            exit;
        }else if ($tipo == 'serie'){
            header("Location: ../index.php?pg=bate-papo/bate-papo_serie");
            exit;
        }else if ($tipo == 'livro'){
            header("Location: ../index.php?pg=bate-papo/bate-papo_livro");
            exit;
        }
    } else {
        echo "<h2>Erro ao Excluir: " . mysqli_error($conexao) . "</h2>";
    }

    mysqli_close($conexao);

?>