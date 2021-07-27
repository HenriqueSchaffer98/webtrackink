<?php
include('../Config/database.php');

if (empty($_POST['name'] || $_POST['username'] || $_POST['password'])) {
    header('Location: ../pages/user_register.php');
}

$name = mysqli_real_escape_string($connection, $_POST['name']);
$usr = mysqli_real_escape_string($connection, $_POST['username']);
$passwd = mysqli_real_escape_string($connection, $_POST['password']);

$query = "insert into usuarios (name, username, password) values ('{$name}', '{$usr}', '{$passwd}')";
if (mysqli_query($connection, $query)) {
    session_start();
    $_SESSION['usr_logado'] = $usr;
    header('Location: ../Pages/home.php');
    exit();
} else {
    header('Location: ../index.php');
    exit();
}
mysqli_close($connection);

?>