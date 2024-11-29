<?php
include_once "../config.inc.php";
include_once "../acesso/sessao.php";

// Verifica se o usuário está logado
if (!logado()) {
    header("Location: acesso/login/form-login.php");
    exit();
}

// Verifica se o usuário tem acesso administrativo
if ($_SESSION['acesso_admin'] != 1) {
    echo "<script>alert('Você não tem permissão para acessar esta área.'); window.location.href = '../index.php';</script>";
    exit();
}
?><!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <title>CineBookly - Admin</title>
    <link rel="stylesheet" href="../style/topo.css">
    <link rel="icon" type="image/x-icon" href="../favicon.ico">
    <link rel="stylesheet" href="../style/conteudo.css">
    <link rel="stylesheet" href="../style/menu.css">
    <link rel="stylesheet" href="../style/rodape.css">
    <link rel="stylesheet" href="../style/login.css">
    <link rel="stylesheet" href="../style/cadastro.css">
    <link rel="stylesheet" href="../style/perfil.css">
    <link rel="stylesheet" href="../style/cria_post.css">
    <link rel="stylesheet" href="../style/bate-papo_filme.css">
    <link rel="stylesheet" href="../style/bate-papo_serie.css">
    <link rel="stylesheet" href="../style/bate-papo_livro.css">
    <link rel="stylesheet" href="../style/global.css">
</head>
<body>
    <?php 
        include_once("components/topo.php");
        include_once("components/menu.php");

        if (empty($_SERVER["QUERY_STRING"])) {
            $var = "components/conteudo.php";
            include_once($var);
        } else {
            $pg = basename($_GET['pg']);
            $path = "components/$pg.php";

            if (file_exists($path)) {
                include_once($path);
            } else {
                echo "<h2>Página não encontrada.</h2>";
            }
        }

        include_once("components/rodape.php");
    ?> 
</body>
</html>
