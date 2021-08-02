<?php 
// -- Realiza importações -- //
require_once('../Config/database.php');
require_once('./session.php');
// -- Pega Session -- //
$idUser = $_SESSION['id_user'];
// -- Pega dados enviado pelo POST -- //
$url = mysqli_real_escape_string($connection, $_POST['url']);
$status = mysqli_real_escape_string($connection, $_POST['status']);
// -- Verifica Status -- //
if($status == "true"){
    $status = true;
} else if($status == "false"){
    $status = false;
}
// -- Cria query -- //
$query = "insert into link (url, status, user_id) values ('{$url}', '{$status}', '{$idUser}')";
// -- Verifica se a query foi executada -- //
if (mysqli_query($connection, $query)) {
    header('Location: ../Pages/home.php?msg=sucess');
    exit();
} else {
    // -- Erro na execução da Query -- //
    die("Error" . $connection->connect_error);
    header('Location: ../Pages/home.php');
    exit();
}
mysqli_close($connection);

?>