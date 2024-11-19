<?php

include_once("../config.inc.php");  

session_start();
if (!isset($_SESSION['id_usuario'])) {
    die("Erro: Usuário não está logado.");      //so cria se tiver logado
}

$tipo =       $_REQUEST['tipo'];
$titulo =     $_REQUEST['titulo'];
$comentario = $_REQUEST['comentario'];
$avaliacao =  $_REQUEST['avaliacao'];
$usuario_id = $_SESSION['id_usuario'];      //os dados que eu vou receber serão da sessão de login


$sql = "INSERT INTO posts
(tipo, titulo, comentario, avaliacao, usuario_id) 
VALUES ('$tipo', '$titulo', '$comentario', '$avaliacao', '$usuario_id')";

$query = mysqli_query($conexao, $sql);

if ($query) {
    echo "<h2>Postado com Sucesso</h2>";

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
    echo "<h2>Erro ao postar: " . mysqli_error($conexao) . "</h2>";
}

mysqli_close($conexao);

?>





