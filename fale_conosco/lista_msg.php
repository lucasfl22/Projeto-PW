<?php

    include_once("config.inc.php");

    $sql = mysqli_query($conexao, "SELECT * FROM mensagem 
    INNER JOIN usuarios 
    ON mensagem.usuario_id = usuarios.id 
    ORDER BY mensagem.id DESC "); ?>

    <div class="div">
    <h2 class="bate-papo-title">Mensagens</h2>
    <?php while ($tabela = mysqli_fetch_array($sql)): ?>
        <div class="postagem">
            <h3><?= $tabela['assunto'] ?></h3>
            <p><strong>Mensagem: </strong><?= $tabela['mensagem'] ?></p>
                <strong>Postado por: </strong>
                <a href="index.php?pg=perfil/perfil_post&id=<?= $tabela['usuario_id'] ?>" class="perfil-link"><?= $tabela['nome'] ?></a>
            </p>
            <br>
            <a href="fale_conosco/exclui_msg.php?id=<?= $tabela['id'] ?>"><b>[X] Excluir</b></a>     
            
            <hr class="hr-estilo">
        </div>
    </div>

    <?php endwhile; mysqli_close($conexao); ?>