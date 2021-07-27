<?php 
session_start();
if(!$_SESSION['usr_logado']){
    header('Location: ../index.php');
    exit();
}

?>