<?php
session_start();
if (!isset($_SESSION['id_usuario']) && !isset($_SESSION['nome_usuario'])) {
    header("Location: ./login.php?erro_login=1"); // Se não está logado, retorna para a página de login com uma mensagem de erro
}
?>
