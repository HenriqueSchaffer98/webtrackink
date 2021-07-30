<?php 
require_once('../Config/database.php');
require_once('../Validations/session.php');
require_once('../Templates/header.php');

$idRequest = mysqli_real_escape_string($connection, $_GET['idRequest']);

/* "SELECT * from link INNER JOIN hist_link on link.id = hist_link.link_id where hist_link.link_id = 24; " */
$sql = "select * from hist_link where id = {$idRequest}";
$result = mysqli_query($connection, $sql);
$dataRequest = mysqli_fetch_array($result);

echo $dataRequest['rest'];
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
    
</body>
</html>