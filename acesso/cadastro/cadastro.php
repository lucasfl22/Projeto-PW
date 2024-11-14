<?php
include_once "../../config.inc.php";

$nome_usuario = "";
$email_usuario = "";
$senha_usuario = "";
$cadastrado = 0;

//verifica se o usuario enviou os dados
if (($_POST)) {
    $nome_usuario = $_POST['nome_usuario'];
    $email_usuario = $_POST['email_usuario'];
    $senha_usuario = $_POST['senha_usuario'];
}
else{
    //retorna para a pagina de cadastro com a mensagem de erro
    header("Location: ../../?pg=acesso/form-cadastrar&cadastrado=0");
    mysqli_close($conexao);
    exit();
}   

//verifica se o usuario ja existe
$sql_verificacao = "SELECT * FROM usuarios WHERE nome = '$nome_usuario' OR email = '$email_usuario'";
$query_verificacao = mysqli_query($conexao, $sql_verificacao);

if (mysqli_num_rows($query_verificacao) > 0) {
    //retorna para a pagina de cadastro com a mensagem de erro
    header("Location: ../../?pg=acesso/form-cadastrar&cadastrado=2");
    mysqli_close($conexao);
    exit();
}else{
    //insere o usuario no banco de dados
    $sql = "INSERT INTO usuarios (nome,email,senha) VALUES ('$nome_usuario','$email_usuario','$senha_usuario')";
    $query = mysqli_query($conexao, $sql);

    if ($query) {
        //retorna para a pagina de cadastro com a mensagem de sucesso
        header("Location: ../../?pg=acesso/form-cadastrar&cadastrado=1");
        mysqli_close($conexao);
        exit();
    }else{
        //retorna para a pagina de cadastro com a mensagem de erro
        header("Location: ../../?pg=acesso/form-cadastrar&cadastrado=0");
        mysqli_close($conexao);
        exit();
    }
}
mysqli_close($conexao);
?>