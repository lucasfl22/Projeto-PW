<?php 
include_once("acesso/sessao.php");
?>

<div class="form_cria_post">

  <h1>Entre em Contato Conosco </h1>
  <p>Se você tiver qualquer questão sobre nossos serviços, produtos ou precisar de suporte, não hesite em nos enviar uma mensagem. </p>
  <p>Ficaremos Felizes em Ler!</p>

  <form action="?pg=fale_conosco/envia_msg" method="post">
    <input type="text" name="assunto" id="assunto" placeholder="Título" required>
    <textarea name="comentario" id="comentario" placeholder="Comentário" required></textarea>
    <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo isset($_REQUEST['usuario_id']) ? $_REQUEST['usuario_id'] : ''; ?>">
    <input type="submit" value="Enviar">
  </form>
</div>

