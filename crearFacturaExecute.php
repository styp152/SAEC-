<?php
include('libreria.php');
include('db/searchs.php');
require_once('clases/Cliente.php');
require_once('clases/Factura.php');
conectarDB();
$cliente = new Cliente();
$cliente->updateDatos($_REQUEST);
$cedula=$cliente->getCedula();
$n=$cliente->getNacionalidad();
$cliente=buscarClientePorCedula($cliente);
$codigo=buscarCodigoSiguiente();
include('crearFacturaForm.php');
?>