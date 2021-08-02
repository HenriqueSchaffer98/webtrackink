<?php
// -- Realiza importações -- //
require_once('../Config/database.php');
require_once('session.php');
// -- Pega informações da Session -- //
$idUser = $_SESSION['id_user'];
$usuário = $_SESSION['username'];
// -- Cria a Query e Executa -- //
$query = "select * from link where user_id={$idUser}";
$result = mysqli_query($connection, $query);
$row = mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.css" />
    <script src="../assets/js/bootstrap.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row row justify-content-md-center">
            
            <div class="col-sm-10">
            <h3>Links Cadastrados</h3>
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
                    // -- Laço de repetição para apresentar os dados da tabela Link -- //
                    while ($dataLink = mysqli_fetch_array($result)) {

                    ?>
                        <tbody>
                            <?php
                            // -- Verifica status do link -- //
                            if ($dataLink['status'] == 0) {
                                echo "<tr class='table-danger'>";
                            } else {
                                echo "<tr class='table-success'>";
                            }
                            ?>
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
                                <!-- Ações -->
                                <a href="../Pages/view_link.php?id=<?= $dataLink['id'] ?>"><img src="../assets/img/entrar.png" alt="Entrar" width="20px" height="20px" /></a>
                                <a href="../Pages/update_link.php?id=<?= $dataLink['id'] ?>"><img src="../assets/img/editar.png" alt="Editar" width="20px" height="20px" /></a>
                                <a href="../Validations/delete_link.php?id=<?= $dataLink['id'] ?>" data-confirm="Tem certeza que deseja excluir o registro?"><img src="../assets/img/excluir.png" alt="Editar" width="20px" height="20px" /></a>

                            </td>

                            </tr>
                        </tbody>
                    <?php  } ?>
                </table>

            </div>
        </div>
    </div>


</body>

</html>