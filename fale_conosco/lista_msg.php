<h1>Filmes</h1>

<?php

    session_start();
    include_once("../config.inc.php");

    if (isset($_SESSION['id_usuario'])) {
        echo '<h2><a href="form_cria_post.php?tipo=filme">Criar Novo Post</a></h2>'; //erro no envio do formulario a partir daqui. problema de referencia no form??
    } else {
        echo '<h2><a href="../acesso/login/form-login.php">Criar Novo Post</a></h2>';
    }

    $sql = mysqli_query($conexao,"SELECT * FROM mensagem "); // fazer um inner join para exibir o nome do usuário tbm

    while($tabela = mysqli_fetch_array($sql)){
        echo "Usuário:  $tabela[usuario_id]     <br>";
        echo "Assunto:  $tabela[assunto] <br>";
        echo "Mensagem: $tabela[mensagem]  <br>";

        echo "<a href='exclui_msg.php?id=$tabela[id]&tipo=filme'><b>[X] Excluir</b></a> | ";
        } echo "<hr>";

    if(!$sql){
        echo "<h2>Não foi possível realizar as operações</h2>";
    }

    mysqli_close($conexao);

?>