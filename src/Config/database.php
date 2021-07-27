<?php

$path = realpath(dirname(__FILE__) . '../../env.ini');
$file = parse_ini_file($path);

$connection = new mysqli($file['host'], $file['username'], $file['password'], $file['database']);

if ($connection->connect_error) {
    die("Error: " . $connection->connect_error);
}

return $connection

?>