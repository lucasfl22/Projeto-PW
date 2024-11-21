<?php
include_once "../../config.inc.php";
include_once("../sessao.php");

//verifica se está logado
if (logado()) {
    echo "<script>alert('Você já está logado!'); window.location.href = 'index.php';</script>";
}

$usuario = "";
$senha_usuario = "";

// Verifica se o formulário foi enviado
if (!$_POST) {
    header("Location: ../../?pg=acesso/login/form-login&login=0");
    mysqli_close($conexao);
    exit();
}

$usuario = $_POST['usuario'];
$senha_usuario = $_POST['senha'];

$sql_login = "SELECT * FROM usuarios WHERE (email = '$usuario' OR nome = '$usuario') AND senha = '$senha_usuario'";
$query_login = mysqli_query($conexao, $sql_login);

if (mysqli_num_rows($query_login) > 0) {
    $dados_usuario = mysqli_fetch_array($query_login);
    if ($senha_usuario == $dados_usuario['senha']) {
        // Login bem-sucedido e inicia a sessão
        session_start();
        $_SESSION['id_usuario'] = $dados_usuario['id'];
        $_SESSION['nome_usuario'] = $dados_usuario['nome'];
        $_SESSION['email_usuario'] = $dados_usuario['email'];
        $_SESSION['data_cadastro'] = $dados_usuario['data_cadastro'];

        header("Location: ../../index.php");
        mysqli_close($conexao);
        exit();
    }
    else {
        // Senha incorreta
        header("Location: ../../?pg=acesso/login/form-login&login=1");
        mysqli_close($conexao);
        exit();
    }
} else {
    // Login falhou
    header("Location: ../../?pg=acesso/login/form-login&login=1");
    mysqli_close($conexao);
    exit();
}

mysqli_close($conexao);
?>
