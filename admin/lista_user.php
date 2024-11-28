<h1>Usuários Cadastrados</h1>

<?php

    session_start();
    include_once("../config.inc.php");

    $sql = mysqli_query($conexao,"SELECT * FROM usuarios "); // fazer um inner join para exibir o nome do usuário tbm

    while($tabela = mysqli_fetch_array($sql)){
        echo "Usuário:  $tabela[id]     <br>";
        echo "Assunto:  $tabela[email] <br>";

        echo "<a href='ad_exclui_user.php?id=$tabela[id]'><b>[X] Excluir</b></a> | ";
        } echo "<hr>";

    if(!$sql){
        echo "<h2>Não foi possível realizar as operações</h2>";
    }

    mysqli_close($conexao);

?>