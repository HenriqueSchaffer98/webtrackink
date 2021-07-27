<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <div>
        <form action="./Validations/ver_login.php" method="POST">
            <label>Username: </label>
            <input type="text" name="username"/>
            <label>Password: </label>
            <input type="password" name="password">
            <button type="submit">Login</button>

        </form>
    </div>
    <div>
        <a href="./Pages/user_register.php">Cadastre-se</a>
    </div>
</body>

</html>