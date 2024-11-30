<?php
include_once("../config.inc.php");


$id = $_REQUEST['id'];

$sql = mysqli_query($conexao,"DELETE FROM usuarios WHERE id = $id");

if ($sql) {
    header("Location: ../index_admin.php?pg=admin/lista_user");
    mysqli_close($conexao);
    exit;
}else {
    echo "<h2>Erro ao Excluir: " . mysqli_error($conexao) . "</h2>";
}

mysqli_close($conexao);
?>