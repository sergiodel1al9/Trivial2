<?php


require_once './include/Juego.php';



$cliente = new SoapClient('http://localhost/Trivial2/servicio_wsdl.php?wsdl');
		

echo $cliente->obtienePregunta(1);
echo '<br>';
echo $cliente->obtieneRespuesta1(1);
echo '<br>';
echo $cliente->obtieneRespuesta2(1);
echo '<br>';
echo $cliente->obtieneRespuesta3(1);
echo '<br>';
echo $cliente->obtieneRespuesta4(1);