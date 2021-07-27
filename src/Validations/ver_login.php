<?php
include('../Config/database.php');

/* if (empty($_POST['username'] || $_POST['password'])) {
    header('Location: ../index.php');
    exit();
} */

$usr = mysqli_real_escape_string($connection, $_POST['username']);
$passwd = mysqli_real_escape_string($connection, $_POST['password']);

$query = "select * from usuarios where username = '{$usr}' and password = '{$passwd}' ";
$result = mysqli_query($connection, $query);
$logged = mysqli_num_rows($result);

if ($logged == 1) {
    session_start();
    $_SESSION['usr_logado'] = $usr;
    header('Location: ../Pages/home.php');
    exit();
} else {
    header('Location: ../index.php');
    exit();
}
?>