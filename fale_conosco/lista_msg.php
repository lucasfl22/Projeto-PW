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
            <p><strong>Mensagem </strong><?= $tabela['mensagem'] ?></p>
            <p><strong>Escrita por: </strong>
            <a href="index.php?pg=perfil/perfil_post&id=<?= $tabela['id'] ?>" class="perfil-link"><?= $tabela['nome'] ?></a>
            <br>
            <br>    
            
            <hr class="hr-estilo">
        </div>
    </div>

    <?php endwhile; mysqli_close($conexao); ?>