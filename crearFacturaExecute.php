<?php
include('libreria.php');
include('db/searchs.php');
require_once('clases/Cliente.php');
conectarDB();
$cliente = new Cliente();
$cliente->updateDatos($_REQUEST);
$cedula=$cliente->getCedula();
$cliente=buscarClientePorCedula($cliente);
include('crearFacturaForm.php');
?>