<?php
    include('../Validations/session.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <input type="text" name="link" id="iptLink" />
        <button type="submit" onsubmit="">Salvar</button>
    </form>
    <a href="../index.php" onclick="<?= session_destroy(); ?>">Logout</a>
</body>

</html>