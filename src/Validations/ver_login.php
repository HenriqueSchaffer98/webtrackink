<?php
// ======== Verifica Login ======== //
// -- Puxa conexão do banco -- //
include('../Config/database.php');

// -- Pega informações pelo método post -- //
$usr = mysqli_real_escape_string($connection, $_POST['username']);
$passwd = mysqli_real_escape_string($connection, md5($_POST['password']));
// -- Monta a query -- //
$query = "select * from usuarios where username = '{$usr}' and password = '{$passwd}' ";
// -- Aramazena o reultado -- //
$result = mysqli_query($connection, $query);
// -- Verifica retorno do banco -- //
$logged = mysqli_num_rows($result);
// -- Cria um array com as informações do banco -- //
$dataUser = mysqli_fetch_assoc($result);

// -- Verifica retorno -- //
if ($logged > 0) {
    // -- Cria sessão aramazendo informações do usuário -- //
    session_start();
    $_SESSION["id_user"] = $dataUser['id'];
    $_SESSION["username"] = $usr;
    // -- Redireciona para página home -- //
    header('Location: ../Pages/home.php');
    exit();
} else {
    // -- Retorna ao login com msg de falha -- //
    $checked = "false";
    header("Location: ../index.php?msg=failed");
    exit();
}
?>
