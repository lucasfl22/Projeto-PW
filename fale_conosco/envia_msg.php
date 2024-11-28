<?php

    include_once("config.inc.php");

    $id =  $_REQUEST['id'];
    $assunto = $_REQUEST['assunto'];
    $mensagem = $_REQUEST['mensagem'];
    $usuario_id = $_SESSION['id_usuario'];

    $sql = "INSERT INTO mensagem
            (assunto,mensagem, usuario_id) VALUES
            ('$assunto','$mensagem', $usuario_id)";

    $query = mysqli_query($conexao,$sql);

    if($query){
        echo "<h3> Mensagem enviada com sucesso.</h3>";
    }else{
        echo "<h3>Erro ao enviar mensagem.</h3>";
    }

    mysqli_close($conexao);