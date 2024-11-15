<?php
include_once "../../config.inc.php";

$nome_usuario = "";
$email_usuario = "";
$senha_usuario = "";
$confirmar_senha_usuario = "";
$cadastrado = 0;


if (!$_POST) {
    header("Location: ../../?pg=acesso/form-cadastrar&cadastrado=0");
    mysqli_close($conexao);
    exit();
}

$nome_usuario = $_POST['nome_usuario'];
$email_usuario = $_POST['email_usuario'];
$senha_usuario = $_POST['senha_usuario'];
$confirmar_senha_usuario = $_POST['confirmar_senha_usuario'];

$sql_verificacao = "SELECT * FROM usuarios WHERE nome = '$nome_usuario' OR email = '$email_usuario'";
$query_verificacao = mysqli_query($conexao, $sql_verificacao);

if (mysqli_num_rows($query_verificacao) > 0) {
    header("Location: ../../?pg=acesso/form-cadastrar&cadastrado=2");
    mysqli_close($conexao);
    exit();
}

if($senha_usuario != $confirmar_senha_usuario){
    header("Location: ../../?pg=acesso/form-cadastrar&cadastrado=3");
    mysqli_close($conexao);
    exit();
}

$sql = "INSERT INTO usuarios (nome,email,senha) VALUES ('$nome_usuario','$email_usuario','$senha_usuario')";
$query = mysqli_query($conexao, $sql);

if ($query) {
    header("Location: ../../?pg=acesso/form-cadastrar&cadastrado=1");
    mysqli_close($conexao);
    exit();
}else{
    header("Location: ../../?pg=acesso/form-cadastrar&cadastrado=0");
    mysqli_close($conexao);
    exit();
}

mysqli_close($conexao);
?>