<?php
require_once('../Validations/session.php');
//require_once('../Validations/list_links.php');
?>
<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <script src="../assets/js/bootstrap.js"></script>
    <title>Dashboard</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-light" style="background-color: #2c82a7;">
            <div class="">
                <img src="../assets/img/smallLogo.png" alt="smLogo" width="40px" height="40px">
            </div>
            <a class="navbar-brand">WEBTrackink</a>
            <button class="btn btn-secondary"><a href="../Validations/destroy_session.php">Logout</a></button>
        </nav>
    </header>
    <article>
        <div class="container">
            <div class="row row justify-content-md-center">
                <div class="col-sm-8">
                    <form action="../Validations/insert_link.php" method="POST">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Link:</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="url" name="url" required />
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
                                <button type="submit" class="btn btn-success">Salvar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </article>
    <?php require_once('../Validations/list_links.php'); ?>
</body>

</html>