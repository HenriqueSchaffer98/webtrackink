<?php
// -- Visualização dos links -- //

// -- Realiza importações -- //
require_once('../Config/database.php');
require_once('../Validations/session.php');
require_once('../Templates/header.php');
// -- Pega GET -- /
$idLink = mysqli_real_escape_string($connection, $_GET['id']);
// -- Cria Query -- //
$sql = "select * from link inner join hist_link on link.id = hist_link.link_id where hist_link.link_id = {$idLink}";
$result = mysqli_query($connection, $sql);
$dataLink = mysqli_fetch_array($result);

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.css" />
    <link rel="stylesheet" href="../assets/css/default.css" />
    <script src="../assets/js/functions.js"></script>
    <title>Informações do Link</title>
</head>

<body>
    <article>
        <div class="container">
            <div class="row row justify-content-md-center">
                <div class="col-sm-8">
                    <form action="">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">ID:</label>
                            <div class="col-sm-2">
                                <input class="form-control" type="text" name="id_link" placeholder="<?= $dataLink['id'] ?>" required disabled />
                            </div>
                            <label class="col-sm-2 col-form-label">Status:</label>
                            <div class="col-sm-2">
                                <?php
                                if ($dataLink['status'] == 1) {
                                    $status = "Ativo";
                                } else {
                                    $status = "Inativo";
                                }
                                ?>
                                <input class="form-control" type="text" name="id_link" placeholder="<?= $status ?>" required disabled />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Link:</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="url" name="url" value="<?= $dataLink['url'] ?>" required disabled />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Código HTTP:</label>
                            <div class="col-sm-2">
                                <input class="form-control" type="url" name="url" value="<?= $dataLink['cod_http'] ?>" required disabled />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Body:</label>
                            <div class="col-sm-10">
                                <a href="view_body.php?idRequest=<?= $dataLink['id'] ?>" class="iconOpen"><img src="../assets/img/Arrow.png" width="20px" height="20px"></a>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="13"><?= $dataLink['rest'] ?></textarea>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div id="resposta"></div>

    </article>
</body>

</html>