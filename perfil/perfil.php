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
                // Consulta para buscar as publicações do usuário, incluindo o tipo
                $usuario_id = $_SESSION['id_usuario'];
                $sql_publicacoes = "SELECT titulo, comentario, avaliacao, tipo FROM posts WHERE usuario_id = $usuario_id";
                $query_publicacoes = mysqli_query($conexao, $sql_publicacoes);

                // Verifica se há publicações e exibe
                if (mysqli_num_rows($query_publicacoes) > 0) {
                    while ($publicacao = mysqli_fetch_array($query_publicacoes)) {
                        // Define a URL com base no tipo da publicação
                        $url_publicacao = '';
                        if ($publicacao['tipo'] === 'filme') {
                            $url_publicacao = 'http://localhost/projetopw/index.php?pg=bate-papo/bate-papo_filme';
                        } elseif ($publicacao['tipo'] === 'serie') {
                            $url_publicacao = 'http://localhost/projetopw/index.php?pg=bate-papo/bate-papo_serie'; // Exemplo para série
                        } elseif ($publicacao['tipo'] === 'livro') {
                            $url_publicacao = 'http://localhost/projetopw/index.php?pg=bate-papo/bate-papo_livro'; // Exemplo para livro
                        }

                        echo "<li><strong>Título:</strong> {$publicacao['titulo']}<br>";
                        echo "<strong>Tipo:</strong> {$publicacao['tipo']}<br>";
                        echo "<strong>Comentário:</strong> {$publicacao['comentario']}<br>";
                        echo "<strong>Avaliação:</strong> {$publicacao['avaliacao']}<br>";
                        echo "<a href='{$url_publicacao}' class='btn-publicacao'>Veja a Publicação</a><br><hr>";
                    }
                } else {
                    echo "<li>Você ainda não fez nenhuma publicação.</li>";
                }

                mysqli_close($conexao);
                ?>
            </ul>
        </div>
    </div>
</section>
