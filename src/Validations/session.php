<?php
// -- Verifica Sessão -- //
session_start();

if (!isset($_SESSION["id_user"]) || !isset($_SESSION["username"])) {
	// Usuário não logado! Redireciona para a página de login
	header("Location: ../index.php");
	exit;
}

?>
