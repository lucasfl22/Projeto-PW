<?php
// Verifica se o usuário está logado
function logado() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    return isset($_SESSION['id_usuario']);
}
?>
