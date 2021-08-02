<?php 
// -- Visualização do Body -- //

// -- Realiza importações -- //
require_once('../Config/database.php');
require_once('../Validations/session.php');
require_once('../Templates/header.php');

$idRequest = mysqli_real_escape_string($connection, $_GET['idRequest']);
// -- Cria Query -- //
$sql = "select * from hist_link where id = {$idRequest}";
$result = mysqli_query($connection, $sql);
$dataRequest = mysqli_fetch_array($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    
    <title>Body</title>
</head>
<body>
    <div class="container">
        <?= $dataRequest['rest'] ?>
    </div>
</body>
</html>