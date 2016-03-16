<?php

require_once('./include/DB.php');

$server = new SoapServer('http://localhost/Trivial2/db_wsdl.wsdl');

$server->setClass('DB');
$server->handle();


?>
