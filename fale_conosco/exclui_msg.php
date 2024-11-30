<?php

    // arquivo que serve para excluir uma mensagem, e consequentemente um contato, da tabela contatos do banco de dados
    
    include_once("../config.inc.php");
    
    $id =  $_REQUEST['id'];

    $sql = mysqli_query($conexao,"DELETE FROM mensagem WHERE id = $id");

    if ($sql) {
        header("Location: ../index_admin.php?pg=fale_conosco/lista_msg");
        mysqli_close($conexao);
        exit;
    }else {
        echo "<h2>Erro ao Excluir: " . mysqli_error($conexao) . "</h2>";
    }

    mysqli_close($conexao);

?>