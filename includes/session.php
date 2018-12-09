
<?php
session_start();
if (!isset($_SESSION['id_usuario']) && !isset($_SESSION['nome_usuario'])) {
    $_SESSION['alertaW'] = 'Insira seus dados novamente.';
    header("Location: ./login.php"); // Se não está logado, retorna para a página de login com uma mensagem de erro
}
?>
