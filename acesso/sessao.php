<?php 
    // Verifica se o usuário está logado
    function logado() {
        @session_start();
        return isset($_SESSION['id_usuario']);
    }
?>