<?php
include_once("../config.inc.php");
include_once("acesso/sessao.php");

//só edita se estiver logado
if (!logado()) {
    echo "<script>alert('Você não está logado!'); window.location.href = 'index.php?pg=acesso/login/form-login';</script>";
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
    if ($tipo == 'filme') {     //as variaveis de tipo vao ser fornecidas pela url
        header("Location: ../index.php?pg=bate-papo/bate-papo_filme");
        mysqli_close($conexao);
        exit;
    }else if ($tipo == 'serie'){
        header("Location: ../index.php?pg=bate-papo/bate-papo_serie");
        mysqli_close($conexao);
        exit;
    }else if ($tipo == 'livro'){
        header("Location: ../index.php?pg=bate-papo/bate-papo_livro");
        mysqli_close($conexao);
        exit;
    }
} else {
    echo "<h2>Erro ao Editar: " . mysqli_error($conexao) . "</h2>";
}

mysqli_close($conexao);
?>