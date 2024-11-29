<?php
// Consulta para contar usuários cadastrados
$sql_usuarios = "SELECT COUNT(*) AS total_usuarios FROM usuarios";
$query_usuarios = mysqli_query($conexao, $sql_usuarios);
$total_usuarios = mysqli_fetch_assoc($query_usuarios)['total_usuarios'];

// Consulta para contar posts por tipo
$sql_posts = "SELECT tipo, COUNT(*) AS total_posts FROM posts GROUP BY tipo";
$query_posts = mysqli_query($conexao, $sql_posts);
$posts_count = [];
while ($row = mysqli_fetch_assoc($query_posts)) {
    $posts_count[$row['tipo']] = $row['total_posts'];
}

// Consulta para contar mensagens enviadas
$sql_mensagens = "SELECT COUNT(*) AS total_mensagens FROM mensagem";
$query_mensagens = mysqli_query($conexao, $sql_mensagens);
$total_mensagens = mysqli_fetch_assoc($query_mensagens)['total_mensagens'];
?>
<!-- Incluindo o CSS -->
<link rel="stylesheet" href="styles/estatisticas.css">

<div class="estatisticas">
    <h2 class="titulo">Bem-vindo à Área Administrativa</h2>
    <p class="subtitulo">Aqui você pode gerenciar usuários, posts e mensagens de contato.</p>

    <h3 class="titulo-secundario">Estatísticas do Site</h3>
    <div class="cards-container">
        <div class="card">
            <p class="numero"><?= $total_usuarios ?></p>
            <p class="descricao">Usuários Cadastrados</p>
        </div>
        <div class="card">
            <p class="numero"><?= $total_mensagens ?></p>
            <p class="descricao">Mensagens Enviadas</p>
        </div>
        <div class="card">
            <p class="numero"><?= isset($posts_count['filme']) ? $posts_count['filme'] : 0 ?></p>
            <p class="descricao">Publicações de Filmes</p>
        </div>
        <div class="card">
            <p class="numero"><?= isset($posts_count['serie']) ? $posts_count['serie'] : 0 ?></p>
            <p class="descricao">Publicações de Séries</p>
        </div>
        <div class="card">
            <p class="numero"><?= isset($posts_count['livro']) ? $posts_count['livro'] : 0 ?></p>
            <p class="descricao">Publicações de Livros</p>
        </div>
    </div>
</div>
