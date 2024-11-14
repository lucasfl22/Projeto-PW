<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineBookly</title>
    <link rel="stylesheet" href="style/topo.css">
    <link rel="stylesheet" href="style/conteudo.css">
    <link rel="stylesheet" href="style/menu.css">
    <link rel="stylesheet" href="style/rodape.css">
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