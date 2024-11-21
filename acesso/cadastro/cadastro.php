<?php
include_once "../../config.inc.php";
include_once("../sessao.php");

//verifica se está logado
if (logado()) {
    echo "<script>alert('Você já está logado!'); window.location.href = 'index.php';</script>";
}

$nome_usuario = "";
$email_usuario = "";
$senha_usuario = "";
$confirmar_senha_usuario = "";
$cadastrado = 0;

// Verifica se o formulário foi enviado
if (!$_POST) {
    header("Location: ../../?pg=acesso/cadastro/form-cadastrar&cadastrado=0");
    mysqli_close($conexao);
    exit();
}

$nome_usuario = $_POST['nome_usuario'];
$email_usuario = $_POST['email_usuario'];
$senha_usuario = $_POST['senha_usuario'];
$confirmar_senha_usuario = $_POST['confirmar_senha_usuario'];

$sql_verificacao = "SELECT * FROM usuarios WHERE nome = '$nome_usuario' OR email = '$email_usuario'";
$query_verificacao = mysqli_query($conexao, $sql_verificacao);

// Verifica se o nome ou email já existe
if (mysqli_num_rows($query_verificacao) > 0) {
    header("Location: ../../?pg=acesso/cadastro/form-cadastrar&cadastrado=2");
    mysqli_close($conexao);
    exit();
}

// Verifica se as senhas correspondem
if($senha_usuario != $confirmar_senha_usuario){
    header("Location: ../../?pg=acesso/cadastro/form-cadastrar&cadastrado=3");
    mysqli_close($conexao);
    exit();
}

// Insere o usuário no banco de dados
$sql = "INSERT INTO usuarios (nome, email, senha, data_cadastro) VALUES ('$nome_usuario', '$email_usuario', '$senha_usuario', NOW())";
$query = mysqli_query($conexao, $sql);

if ($query) {
    // Cadastro bem-sucedido
    header("Location: ../../?pg=acesso/cadastro/form-cadastrar&cadastrado=1");
    mysqli_close($conexao);
    exit();
}else{
    // Caso ocorra um erro ao inserir o usuário
    header("Location: ../../?pg=acesso/cadastro/form-cadastrar&cadastrado=0");
    mysqli_close($conexao);
    exit();
}

mysqli_close($conexao);
?>