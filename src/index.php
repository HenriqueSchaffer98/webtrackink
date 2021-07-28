<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/bootstrap.css">
    <script src="./assets/js/functions.js"></script>
    <title>Login</title>
</head>

<body>
    <div class="container">
        <div class="row row justify-content-md-center">
            <div class="col-sm-4">
                <div class="mb-3">
                    <img src="./assets/img/webtrackink.png" class="rounded mx-auto d-block" alt="logo" width="250px" height="250px"/>
                </div> 
                <form action="./Validations/ver_login.php" method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Username</label>
                        <input class="form-control" type="text" placeholder="Username" id="iptUsername" name="username" aria-label="default input example" />
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="iptPassword" />
                    </div>
                    <button type="submit" onclick="validaLogin()" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
        <div>
            <a href="./Pages/user_register.php">Cadastre-se</a>
        </div>
    </div>

</body>

</html>