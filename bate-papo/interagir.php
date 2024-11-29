<?php
include_once "config.inc.php";

if (isset($_POST['post_id']) && isset($_POST['acao'])) {
    $post_id = (int)$_POST['post_id'];
    $acao = $_POST['acao'];

    if ($acao == 'like') {
        // Incrementar o contador de likes
        $sql = "UPDATE posts SET likes = likes + 1 WHERE id = ?";
    } elseif ($acao == 'dislike') {
        // Incrementar o contador de dislikes (se necessário)
        $sql = "UPDATE posts SET dislikes = dislikes + 1 WHERE id = ?";
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Ação inválida']);
        exit;
    }

    // Preparar e executar a consulta
    if ($stmt = mysqli_prepare($conexao, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $post_id);
        if (mysqli_stmt_execute($stmt)) {
            // Obter o número atualizado de likes e dislikes
            $result = mysqli_query($conexao, "SELECT likes, dislikes FROM posts WHERE id = $post_id");
            $post = mysqli_fetch_array($result);

            // Retornar os novos valores de likes e dislikes em formato JSON
            echo json_encode([
                'status' => 'success',
                'likes' => $post['likes'],
                'dislikes' => $post['dislikes']
            ]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Erro ao atualizar o banco de dados']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Erro ao preparar a consulta']);
    }

    // Fechar a conexão
    mysqli_close($conexao);
}
?>
