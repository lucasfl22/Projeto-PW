<?php 
include_once("acesso/sessao.php");
?>

<div class="form_cria_post">
  <h1>Entre em Contato Conosco</h1>
  <p>Se você tiver qualquer questão sobre nossos serviços, produtos ou precisar de suporte, não hesite em nos enviar uma mensagem.</p>
  <p>Ficaremos Felizes em Ler!</p>

  <form action="?pg=fale_conosco/envia_msg" method="post">
    <input type="text" name="nome" id="nome" placeholder="Nome" required>
    <input type="email" name="email" id="email" placeholder="E-mail" required class="input-field">
    <input type="text" name="telefone" id="telefone" placeholder="Telefone" required class="input-field">
    
    <label for="tipo_mensagem">Tipo de Mensagem:</label>
    <select name="tipo_mensagem" id="tipo_mensagem" required class="input-field">
      <option value="comentario"></option>
      <option value="comentario">Comentário</option>
      <option value="denuncia">Denúncia</option>
      <option value="sugestao">Sugestão</option>
      <option value="avaliacao">Avaliação do Site</option>
    </select>

    <textarea name="mensagem" id="mensagem" placeholder="Sua Mensagem" required class="input-field"></textarea>
    <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo isset($_REQUEST['usuario_id']) ? $_REQUEST['usuario_id'] : ''; ?>">
    <input type="submit" value="Enviar" class="input-submit">
  </form>
</div>
