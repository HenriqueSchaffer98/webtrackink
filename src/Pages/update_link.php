<?php
// -- Formulário de atualização -- //


// -- Realiza importações -- //
require_once('../Config/database.php');
require_once('../Validations/session.php');
require_once('../Templates/header.php');
// -- Pega informações do GET -- //
$idLink = mysqli_real_escape_string($connection, $_GET['id']);
// -- Cria Query -- //
$sql = "select * from link where id={$idLink}";
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
    <script src="../assets/js/functions.js"></script>
    <title>Atualizar Link</title>
</head>

<body>
    <article>
        <div class="container">
            <div class="row row justify-content-md-center">
                <div class="col-sm-8">
                    <form action="../Validations/ver_updt.php?id=<?= $idLink ?>" method="POST">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">ID:</label>
                            <div class="col-sm-2">
                                <input class="form-control" type="text" name="id_link" placeholder="<?= $dataLink['id'] ?>" required disabled/>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Link:</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="url" name="url" value="<?= $dataLink['url'] ?>" required />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Status:</label>
                            <div class="col-sm-2">
                                <select class="form-control" name="status">
                                    <option value=true>Ativo</option>
                                    <option value=false>Inativo</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-success">Editar</button>
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