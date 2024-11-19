<?php

include_once("../config.inc.php");

session_start();
if (!isset($_SESSION['id_usuario'])) {      //so edita se tiver logado
    die("Erro: Usuário não está logado.");
}

$id =         $_REQUEST['id'];
$tipo =       $_REQUEST['tipo'];
$titulo =     $_REQUEST['titulo'];
$comentario = $_REQUEST['comentario'];
$avaliacao =  $_REQUEST['avaliacao'];
$usuario_id = $_SESSION['id_usuario'];

    $sql = "UPDATE posts SET titulo = '$titulo', comentario = '$comentario', avaliacao = '$avaliacao' WHERE id = $id AND usuario_id = {$_SESSION['id_usuario']}";

    $query = mysqli_query($conexao, $sql);

    if ($query) {
        echo "<h2>Post Editado</h2>";
    
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
        echo "<h2>Erro ao Editar: " . mysqli_error($conexao) . "</h2>";
    }

    mysqli_close($conexao);

?>