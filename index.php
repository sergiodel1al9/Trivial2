<!DOCTYPE html>
<?php
include_once './include/DB.php';
include_once './include/Juego.php';

$cliente = new DB();

echo $cliente->obtienePregunta(1);

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

    </body>
</html>
