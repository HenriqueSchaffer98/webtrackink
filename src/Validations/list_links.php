<?php

require_once('../Config/database.php');
require_once('session.php');


$idUser = $_SESSION['id_user'];
$usuário = $_SESSION['username'];
$query = "select * from link where user_id={$idUser}";

$result = mysqli_query($connection, $query);
$row = mysqli_num_rows($result);
//$dataLink = mysqli_fetch_assoc($result);


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.css" />
    <script src="../assets/js/functions.js"></script>
</head>

<body>
    <div class="container">
        <div class="row row justify-content-md-center">
            <div class="col-sm-10">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Url</th>
                            <th scope="col">Status</th>
                            <th scope="col">Usuário</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <?php
                    while ($dataLink = mysqli_fetch_array($result)) {

                    ?>
                        <tbody>
                            <tr>
                                <th scope="row"><?php $id_link = $dataLink['id'];
                                                echo $id_link;
                                                ?></td>
                                <td><?php echo $dataLink['url']; ?></td>
                                <td><?php
                                    if ($dataLink['status'] == 1) {
                                        echo "Ativo";
                                    } else {
                                        echo "Inativo";
                                    }
                                    ?></td>
                                <td><?php echo $_SESSION['username']; ?></td>
                                <td>
                                    <a href="#"><img src="../assets/img/entrar.png" alt="Entrar" width="20px" height="20px" /></a>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop1"><img src="../assets/img/editar.png" alt="Editar" width="20px" height="20px" /></a>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop2"><img src="../assets/img/excluir.png" alt="Excluir" width="20px" height="20px" /></a>
                                </td>

                            </tr>
                        </tbody>
                    <?php  } ?>
                </table>
            </div>
        </div>
    </div>
    <!-- ================ Modal 1 =================== -->
    <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Editar Usuário</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../Validations/update_link.php?id=<?php echo $id_link;?>" method="POST">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">ID:</label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" placeholder="" value="<?php echo $id_link; ?>" aria-label="Disabled input example" disabled>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Link:</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="url" name="url" required />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Status:</label>
                            <div class="col-sm-3">
                                <select class="form-control" name="status">
                                    <option value=true>Ativo</option>
                                    <option value=false>Inativo</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-success">Salvar</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- ================ Modal 2 =================== -->

    <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Excluir Usuário</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Você tem certeza que deseja excluir este registro?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                    <a href="../Validations/delete_link.php?id=<?php echo $id_link; ?>"><button type="button" class="btn btn-primary">Sim</button></a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>