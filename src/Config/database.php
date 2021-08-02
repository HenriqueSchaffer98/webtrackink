<?php
// -- COnfiguração do Bancod e Dados -- //
// -- Busca diretorio do env.ini -- //
$path = realpath(dirname(__FILE__) . '../../env.ini');
$file = parse_ini_file($path);
// -- Cria conexão -- //
$connection = new mysqli($file['host'], $file['username'], $file['password'], $file['database']);
// -- Valida Conexão -- //
if (!$connection) {
    echo "Error: Falha ao conectar-se com o banco de dados MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

return $connection;
?>


