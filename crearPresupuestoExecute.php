<?php
include('libreria.php');
include('db/searchs.php');
require_once('clases/Cliente.php');
conectarDB();
$cliente = new Cliente();
$cliente->updateDatos($_REQUEST);
// TODO hacer el procesamiento, buscar el cliente
include('crearPresupuestoForm.php');
?>