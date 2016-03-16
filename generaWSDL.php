<?php

require_once("./include/DB.php");
// Ruta a WSDLDocument
require_once("WSDLDocument.php");

$uri = 'http://localhost/Trivial2/';

$url = "http://localhost/Trivial2/servicio_wsdl.php";

$wsdl = new WSDLDocument("DB", $url, $uri);

echo $wsdl->saveXml();
?>
