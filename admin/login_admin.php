<?php
include_once "config.inc.php";
include_once("sessao.php");

session_start();

// Verifica se está logado
if (logado()) {
    echo "<script>alert('Você já está logado!'); window.location.href = 'index_admin.php';</script>";
    exit();
}

$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../../?pg=acesso/login/form-login&login=0");
    exit();
}

$sql_login = "SELECT * FROM admin WHERE email = '$email' AND senha = '$senha'";
$query_login = mysqli_query($conexao, $sql_login);

if (mysqli_num_rows($query_login) > 0) {
    $dados_admin = mysqli_fetch_array($query_login);
    // Verifica se o usuário tem acesso administrativo
    if ($dados_admin['acesso_admin'] == 1) {
        // Login bem-sucedido e inicia a sessão
        $_SESSION['id'] = $dados_admin['id'];
        $_SESSION['email'] = $dados_admin['email'];
        $_SESSION['acesso_admin'] = $dados_admin['acesso_admin'];

        header("Location: ../../index.php");
        exit();
    } else {
        // Usuário não tem acesso administrativo
        header("Location: ../../?pg=acesso/login/form-login&login=2");
        exit();
    }
} else {
    // Login falhou
    header("Location: ../../?pg=acesso/login/form-login&login=1");
    exit();
}

mysqli_close($conexao);
?>
