<!-- Criação do formulário de cadastro -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../assets//js/functions.js"></script>
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <title>Cadastro</title>
</head>

<body>
    <div class="container">
        <div class="row row justify-content-md-center">
            <div class="col-sm-4">
                <div class="mb-3">
                    <img src="../assets/img/webtrackink.png" class="rounded mx-auto d-block" alt="logo" width="200px" height="200px" />
                </div>
                <form action="../Validations/ver_register.php" method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nome</label>
                        <input class="form-control" type="text" placeholder="Nome" id="iptUser" name="name" aria-label="default input example" required/>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Username</label>
                        <input class="form-control" type="text" placeholder="Username" id="iptUsername" name="username" aria-label="default input example" required/>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="iptPassword"  required/>
                    </div>
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
