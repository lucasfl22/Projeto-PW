<?php

include_once("../config.inc.php");  

$tipo =       $_REQUEST['tipo'];
$titulo =     $_REQUEST['titulo'];
$comentario = $_REQUEST['comentario'];
$avaliacao =  $_REQUEST['avaliacao'];
$usuario_id = $_REQUEST['usuario_id'];


$sql = "INSERT INTO posts
(tipo, titulo, comentario, avaliacao, usuario_id) 
VALUES ('serie', '$titulo', '$comentario', '$avaliacao', '3')";

$query = mysqli_query($conexao, $sql);

if ($query) {
    echo "<h2>Postado com sucesso!</h2>";
} else {
    echo "<h2>Erro ao postar: " . mysqli_error($conexao) . "</h2>";
}

mysqli_close($conexao);

?>




