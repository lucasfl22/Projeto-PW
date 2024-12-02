<?php

    include_once("config.inc.php");

    $sql = mysqli_query($conexao,"SELECT * FROM usuarios "); ?>

    <div class="div">
    <h2 class="bate-papo-title">Usuários Cadastrados</h2>
    <?php while ($tabela = mysqli_fetch_array($sql)): ?>
        <div class="postagem">
            <h3><?= $tabela['nome'] ?></h3>
            <p><strong>Email: </strong><?= $tabela['email'] ?></p>
            <p><strong>Data de Cadastro: </strong><?= $tabela['data_cadastro'] ?></p>
            <p><strong>Veja o perfil de </strong>
            <a href="index_admin.php?pg=perfil/perfil_post&id=<?= $tabela['id'] ?>" class="perfil-link"><?= $tabela['nome'] ?></a>
            <br>
            <br>
            <a href="admin/ad_exclui_user.php?id=<?= $tabela['id'] ?>"><b>[X] Excluir</b></a>     
            
            <hr class="hr-estilo">
        </div>
    </div>

    <?php endwhile; mysqli_close($conexao); ?>

