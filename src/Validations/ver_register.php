<?php
include('../Config/database.php');


$name = mysqli_real_escape_string($connection, $_POST['name']);
$usr = mysqli_real_escape_string($connection, $_POST['username']);
$passwd = mysqli_real_escape_string($connection, md5($_POST['password']));

$sql = "insert into usuarios (nome, username, password) values ('$name', '$usr', '$passwd')";
$result = mysqli_query($connection, $sql);

//mysqli_close($connection);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../assets/js/bootstrap.js"></script>
    <script type="text/javascript">
        $(window).on('load', function() {
            $('#insertUser').modal('show');
        });
    </script>
</head>

<body>
    <div class="modal fade" id="insertUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="staticBackdropLabel">Excluir Registro</h5>
                    <a href="../Pages/home.php"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></a>
                </div>
                <div class="modal-body">
                    Usuário Cadastrado com Sucesso!
                </div>
                <div class="modal-footer">
                    <a href="../index.php"><button type="button" class="btn btn-success">OK</button></a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>