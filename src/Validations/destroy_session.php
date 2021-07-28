<?php 
require_once('./session.php');

unset ($_SESSION['id_user']);
unset ($_SESSION['username']);

session_destroy();

header('Location: ../index.php')


?>