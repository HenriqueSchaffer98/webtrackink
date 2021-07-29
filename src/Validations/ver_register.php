<?php
include('../Config/database.php');


$name = mysqli_real_escape_string($connection, $_POST['name']);
$usr = mysqli_real_escape_string($connection, $_POST['username']);
$passwd = mysqli_real_escape_string($connection, md5($_POST['password']));

$sql = "insert into usuarios (nome, username, password) values ('$name', '$usr', '$passwd')";
$result = mysqli_query($connection, $sql);

header('Location: ../index.php');
//mysqli_close($connection);
?>