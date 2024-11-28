<?php 
include_once("acesso/sessao.php");

//só cria se estiver logado
if (!logado()) {
    echo "<script>alert('Você não está logado!'); window.location.href = 'index.php?pg=acesso/login/form-login';</script>";
}
?>

<div class="form_cria_post">


<h3>Entre em contato conosco </h3>


<form action="?pg=envia_msg" method="post">
  <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo isset($_REQUEST['usuario_id']) ? $_REQUEST['usuario_id'] : ''; ?>">
  Assunto: <input type="text" name="assunto"> <br>
  Mensagem: <textarea name="mensagem"> </textarea><br>
 <input type="submit" value="Enviar">
</form>