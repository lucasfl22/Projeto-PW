<?php
include_once "../../config.inc.php";
include_once "../../acesso/sessao.php";

// Verifica se o usuário está logado
if (!logado()) {
    header("Location: ../../acesso/login/form-login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $post_id = $_POST['post_id'];

    // Prepara a consulta para excluir o post
    $sql_excluir = "DELETE FROM posts WHERE id = ?";
    $stmt = mysqli_prepare($conexao, $sql_excluir);
    mysqli_stmt_bind_param($stmt, 'i', $post_id);

    if (mysqli_stmt_execute($stmt)) {
        // Redireciona de volta para a página de posts
        header("Location: " . $_SERVER['HTTP_REFERER']);
    } else {
        echo "Erro ao excluir o post.";
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($conexao);
?>
