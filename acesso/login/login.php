<?php
include_once "../../config.inc.php";

$email_usuario = "";
$senha_usuario = "";

if (!$_POST) {
    header("Location: ../../?pg=acesso/form-login&login=0");
    mysqli_close($conexao);
    exit();
}

$email_usuario = $_POST['email'];
$senha_usuario = $_POST['senha'];

$sql_login = "SELECT * FROM usuarios WHERE email = '$email_usuario' AND senha = '$senha_usuario'";
$query_login = mysqli_query($conexao, $sql_login);

if (mysqli_num_rows($query_login) > 0) {
    // Login bem-sucedido
    header("Location: ../../?pg=acesso/dashboard");
    mysqli_close($conexao);
    exit();
} else {
    // Login falhou
    header("Location: ../../?pg=acesso/form-login&login=1");
    mysqli_close($conexao);
    exit();
}

mysqli_close($conexao);
?>
