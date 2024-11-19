<?php 
include_once "acesso/sessao.php";
include_once "config.inc.php";

if (!logado()) {
    header("Location: ../?pg=acesso/login/form-login");
    exit();
}

// Verifica se o ID do usuário foi passado
if (isset($_GET['id'])) {
    $usuario_id = intval($_GET['id']); // Converte para inteiro para segurança

    // Consulta para obter informações do usuário
    $sql_usuario = "SELECT * FROM usuarios WHERE id = $usuario_id";
    $query_usuario = mysqli_query($conexao, $sql_usuario);

    if (mysqli_num_rows($query_usuario) == 0) {
        echo "Usuário não encontrado.";
        exit();
    }

    $usuario = mysqli_fetch_array($query_usuario);
} else {
    echo "ID do usuário não fornecido.";
    exit();
}
?>

<section class="perfil">
    <div class="container">
        <h1 class="titulo-perfil">Perfil de <span class="perfil-nome"><?php echo $usuario['nome']; ?></span></h1>
        
        <div class="informacoes-perfil">
            <h2>Informações Pessoais</h2>
            <p><strong>Email:</strong> <?php echo $usuario['email']; ?></p>
            <p><strong>Usuário desde:</strong> <?php echo date('d/m/Y', strtotime($usuario['data_cadastro'])); ?></p>
        </div>

        <div class="atividades-perfil">
            <h2>Publicações Recentes</h2>
            <ul>
                <?php
                // Consulta para buscar as publicações do usuário
                $sql_publicacoes = "SELECT titulo, comentario, avaliacao FROM posts WHERE usuario_id = $usuario_id";
                $query_publicacoes = mysqli_query($conexao, $sql_publicacoes);

                // Verifica se há publicações e exibe
                if (mysqli_num_rows($query_publicacoes) > 0) {
                    while ($publicacao = mysqli_fetch_array($query_publicacoes)) {
                        echo "<li><strong>Título:</strong> {$publicacao['titulo']}<br>";
                        echo "<strong>Comentário:</strong> {$publicacao['comentario']}<br>";
                        echo "<strong>Avaliação:</strong> {$publicacao['avaliacao']}<br>";
                        echo "<hr></li>";
                    }
                } else {
                    echo "<li>Nenhuma publicação encontrada.</li>";
                }

                mysqli_close($conexao);
                ?>
            </ul>
        </div>
    </div>
</section>