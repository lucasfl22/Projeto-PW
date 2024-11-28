<?php
include_once "../config.inc.php";
include_once("../sessao.php");

//verifica se está logado
if (logado()) {
    echo "<script>alert('Você já está logado!'); window.location.href = 'index_admin.php';</script>";
}

$email = "";
$senha = "";

// Verifica se o formulário foi enviado
if (!$_POST) {
    header("Location: ../../?pg=acesso/login/form-login&login=0");
    mysqli_close($conexao);
    exit();
}

$email = $_POST['email'];
$senha= $_POST['senha'];

$sql_login = "SELECT * FROM admin WHERE (email = '$email') AND senha = '$senha'";
$query_login = mysqli_query($conexao, $sql_login);

if (mysqli_num_rows($query_login) > 0) {
    $dados_admin = mysqli_fetch_array($query_login);
    if ($senha == $dados_admin['senha']) {
        // Login bem-sucedido e inicia a sessão
        session_start();
        $_SESSION['id'] = $dados_admin['id'];
        $_SESSION['email'] = $dados_admin['email'];

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
