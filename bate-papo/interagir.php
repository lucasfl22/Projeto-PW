<?php
include_once "config.inc.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $post_id = $_POST['post_id'];
    $usuario_id = $_SESSION['id_usuario'];
    $acao = $_POST['acao'];

    // Verifica se o usuário já interagiu com a postagem
    $sql_verifica = "SELECT * FROM interacoes WHERE post_id = $post_id AND usuario_id = $usuario_id";
    $query_verifica = mysqli_query($conexao, $sql_verifica);

    if (mysqli_num_rows($query_verifica) == 0) {
        // Insere a interação
        $sql_inserir = "INSERT INTO interacoes (post_id, usuario_id, tipo) VALUES ($post_id, $usuario_id, '$acao')";
        mysqli_query($conexao, $sql_inserir);
    } else {
        // Atualiza a interação se já existir
        $sql_atualizar = "UPDATE interacoes SET tipo = '$acao' WHERE post_id = $post_id AND usuario_id = $usuario_id";
        mysqli_query($conexao, $sql_atualizar);
    }

    header("Location: bate-papo_filme.php"); // Redireciona de volta
    exit();
}
?> 