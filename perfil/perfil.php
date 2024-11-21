<?php 
include_once("config.inc.php");
include_once("acesso/sessao.php");

//Verifica se está logado
if (!logado()) {
    echo "<script>alert('Você não está logado!'); window.location.href = 'index.php?pg=acesso/login/form-login';</script>";
}
?>

<section class="perfil">
    <div class="container">
        <h1 class="titulo-perfil">Perfil de <span class="perfil-nome"><?php echo $_SESSION['nome_usuario']; ?></span></h1>
        
        <div class="informacoes-perfil">
            <h2>Informações Pessoais</h2>
            <p><strong>Email:</strong> <?php echo $_SESSION['email_usuario']; ?></p>
            <p><strong>Usuário desde:</strong> <?php echo date('d/m/Y', strtotime($_SESSION['data_cadastro'])); ?></p>
        </div>

        <div class="atividades-perfil">
            <h2>Publicações Recentes</h2>
            <ul>
                <?php
                // Consulta para buscar as publicações do usuário
                $usuario_id = $_SESSION['id_usuario'];
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
                    echo "<li>Você ainda não fez nunhuma publicação.</li>";
                }

                mysqli_close($conexao);
                ?>
            </ul>
        </div>
    </div>
</section>
