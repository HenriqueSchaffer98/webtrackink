<?php 
// -- Realiza importações -- //
require_once('./session.php');
// -- Pega sessions -- //
unset ($_SESSION['id_user']);
unset ($_SESSION['username']);
// -- Destroi a Session -- //
session_destroy();
// -- Redireciona para o Login -- /
header('Location: ../index.php')


?>