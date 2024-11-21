<?php
//verifica se a sessao já está ativa
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
session_destroy();
header("Location: index.php");
?>  