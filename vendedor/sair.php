<?php
	session_start();
	unset($_SESSION['id_usuario']);
	unset($_SESSION['nome_usuario']);
	unset($_SESSION['id_organizacao']);
	session_destroy();
	header("Location: ../login.php");
?>