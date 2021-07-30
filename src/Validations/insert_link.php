<?php 
require_once('../Config/database.php');
require_once('./session.php');

$idUser = $_SESSION['id_user'];

$url = mysqli_real_escape_string($connection, $_POST['url']);
$status = mysqli_real_escape_string($connection, $_POST['status']);

if($status == "true"){
    $status = true;
} else if($status == "false"){
    $status = false;
}

$query = "insert into link (url, status, user_id) values ('{$url}', '{$status}', '{$idUser}')";

if (mysqli_query($connection, $query)) {
    header('Location: ../Pages/home.php?msg=sucess');
    exit();
} else {
    die("Error" . $connection->connect_error);
    header('Location: ../Pages/home.php');
    exit();
}
mysqli_close($connection);

?>