<?php

include('../Config/database.php');

$usr = mysqli_real_escape_string($connection, $_POST['username']);
$passwd = mysqli_real_escape_string($connection, $_POST['password']);

$query = "select * from usuarios where username = '{$usr}' and password = '{$passwd}' ";
$result = mysqli_query($connection, $query);
$logged = mysqli_num_rows($result);
$dataUser = mysqli_fetch_assoc($result);

if ($logged > 0) {
    session_start();
    $_SESSION["id_user"] = $dataUser['id'];
    $_SESSION["username"] = $usr;
    //$_SESSION['password'] = $passwd;
    header('Location: ../Pages/home.php');
    exit();
} else {
    header('Location: ../index.php');
    exit();
}
