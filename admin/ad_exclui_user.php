<?php
include_once("../config.inc.php");
include_once("../acesso/sessao.php");

//só exclui se estiver logado
if (!logado()) {
    echo "<script>alert('Você não está logado!'); window.location.href = 'index.php?pg=acesso/login/form-login';</script>";
}

$id = $_REQUEST['id'];

$sql = mysqli_query($conexao,"DELETE FROM usuarios WHERE id = $id");

if ($sql) {
    header("Location: ../index.php?pg=bate-papo/bate-papo_filme"); //redirecionar para o painel de controle
    mysqli_close($conexao);
    exit;
}else {
    echo "<h2>Erro ao Excluir: " . mysqli_error($conexao) . "</h2>";
}

mysqli_close($conexao);
?>