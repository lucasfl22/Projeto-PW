<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <title>CineBookly</title>
    <link rel="stylesheet" href="style/topo.css">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="style/conteudo.css">
    <link rel="stylesheet" href="style/menu.css">
    <link rel="stylesheet" href="style/rodape.css">
    <link rel="stylesheet" href="style/login.css">
    <link rel="stylesheet" href="style/cadastro.css">
    <link rel="stylesheet" href="style/perfil.css">
    <link rel="stylesheet" href="style/cria_post.css">
    <link rel="stylesheet" href="style/bate-papo_filme.css">
    <link rel="stylesheet" href="style/bate-papo_serie.css">
    <link rel="stylesheet" href="style/bate-papo_livro.css">
    <link rel="stylesheet" href="style/global.css">
</head>
<body>
    <?php 

        include_once("components/topo/topo.php");
        include_once("components/menu/menu.php");

        if (empty($_SERVER["QUERY_STRING"])) {
            $var = "components/conteudo/conteudo.php";
            include_once("$var");
        } else {
            $pg = $_GET['pg'];
            include_once("$pg.php");
        }

        include_once("components/rodape/rodape.php");

    ?> 
</body>
</html>