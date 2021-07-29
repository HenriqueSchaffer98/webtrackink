<?php
require_once('../Config/database.php');
require_once('./session.php');

$idLink = mysqli_real_escape_string($connection, $_GET['id']);
$url = mysqli_real_escape_string($connection, $_POST['url']);
$status = mysqli_real_escape_string($connection, $_POST['status']);


if($status == "true"){
    $status = true;
} else if($status == "false"){
    $status = false;
}

$query = "update link set url='{$url}', status='{$status}' where id={$idLink}";

if (mysqli_query($connection, $query)) {
    header('Location: ../Pages/home.php');
    exit();
} else {
    die("Error" . $connection->connect_error);
    header('Location: ../Pages/home.php');
    exit();
}
mysqli_close($connection);

?>
