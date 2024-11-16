<?php

include_once("../config.inc.php");

$id =         $_REQUEST['id'];
$tipo =       $_REQUEST['tipo'];
$titulo =     $_REQUEST['titulo'];
$comentario = $_REQUEST['comentario'];
$avaliacao =  $_REQUEST['avaliacao'];
$usuario_id = $_REQUEST['usuario_id'];


$sql = "UPDATE posts SET titulo = '$titulo', comentario = '$comentario', avaliacao = '$avaliacao' WHERE id = $id";

$query = mysqli_query($conexao, $sql);

if ($query) {
    echo "<h2>Post Alterado com Sucesso!</h2>";
} else {
    echo "<h2>Erro ao alterar o post: " . mysqli_error($conexao) . "</h2>";
}

mysqli_close($conexao);

?>