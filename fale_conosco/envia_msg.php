<?php

    include_once("config.inc.php");
    include_once("../acesso/sessao.php");

    //só cria se estiver logado
    if (!logado()) {
        header("Location: ../index.php?pg=bate-papo/bate-papo_serie");
    }

    $assunto = $_REQUEST['assunto'];
    $mensagem = $_REQUEST['mensagem'];
    $usuario_id = $_SESSION['id_usuario'];

    $sql = "INSERT INTO mensagem
            (assunto,mensagem, usuario_id) VALUES
            ('$assunto','$mensagem', $usuario_id)";

    $query = mysqli_query($conexao,$sql);

    if($query){
            echo "<script>alert('Mensagem Enviada com Sucesso!'); window.location.href = 'index.php';</script>";
    } else{
        echo "<h3>Erro ao enviar mensagem.</h3>";
    }

    mysqli_close($conexao);