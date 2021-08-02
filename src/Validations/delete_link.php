<?php
require_once('./session.php');
require_once('../Config/database.php');

$id_link = mysqli_real_escape_string($connection, $_GET['id']);

if (isset($_GET['del'])) {
    if ($_GET['del'] == "true") {
        $id_link = mysqli_real_escape_string($connection, $_GET['id']);
        $query = "delete from hist_link where link_id={$id_link}";
        $result = mysqli_query($connection, $query);
        if ($result == 1) {
            $sql = "delete from link where id={$id_link}";
            $consult = mysqli_query($connection, $sql);
            if($consult == 1){
                header('Location: ../Pages/home.php');
            }
            
        } else {
            die('Erro ao apagar registro: ');
        }
    }
}
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
            $('#staticBackdrop2').modal('show');
        });
    </script>
</head>

<body>
    <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="staticBackdropLabel">Excluir Registro</h5>
                    <a href="../Pages/home.php"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></a>
                </div>
                <div class="modal-body">
                    Você tem certeza que deseja excluir este registro?
                </div>
                <div class="modal-footer">
                    <a href="../Pages/home.php"><button type="button" class="btn btn-danger">Não</button></a>
                    <a href="delete_link.php?del=true&id=<?= $id_link ?>"><button type="button" class="btn btn-success">Sim</button></a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>