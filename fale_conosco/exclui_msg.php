<?php

    // arquivo que serve para excluir uma mensagem, e consequentemente um contato, da tabela contatos do banco de dados
    
    include_once("../config.inc.php");
    include_once("../acesso/sessao.php");
    
    //só exclui se estiver logado
    if (!logado()) {
        echo "<script>alert('Você não está logado!'); window.location.href = 'index.php?pg=acesso/login/form-login';</script>";
    }
    
    $id =  $_REQUEST['id'];

    $sql = mysqli_query($conexao,"DELETE FROM mensagem WHERE id = $id");

    if($sql){
        echo "<h2>Mensagem apagada com sucesso</h2>";
    } else {
        echo "<h2>Falha na exclusão</h2>";
    }

    mysqli_close($conexao);

?>