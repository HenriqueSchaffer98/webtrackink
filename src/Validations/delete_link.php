<?php
require_once('../Config/database.php');
require_once('./session.php');

$id_link = mysqli_real_escape_string($connection, $_GET['id']);

$query = "delete from link where id={$id_link}";
$result = mysqli_query($connection, $query);

if ($result == 1) {
    echo "<script>window.alert('Registro Excluído com Sucesso!!')</script>";
    header('Location: ../Pages/home.php');
} else {
    die('Erro ao apagar registro: ');
}

?>