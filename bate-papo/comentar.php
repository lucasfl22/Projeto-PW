<?php
include_once "config.inc.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $post_id = $_POST['post_id'];
    $usuario_id = $_SESSION['id_usuario'];
    $comentario = $_POST['comentario'];

    // Insere o comentário
    $sql_inserir = "INSERT INTO interacoes (post_id, usuario_id, comentario) VALUES ($post_id, $usuario_id, '$comentario')";
    mysqli_query($conexao, $sql_inserir);

    header("Location: bate-papo_filme.php"); // Redireciona de volta
    exit();
}
?> 