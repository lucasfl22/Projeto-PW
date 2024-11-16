<?php

    include_once("../config.inc.php");

    $id = $_REQUEST['id'];

    $sql = mysqli_query($conexao,"DELETE FROM posts WHERE id = $id");

    if($sql){
        echo "<h2>Post Excluido</h2>";
    } else {
        echo "<h2>Falha na exclusão</h2>";
    }

    mysqli_close($conexao);

?>