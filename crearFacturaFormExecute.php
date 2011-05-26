<?php
include('session.php');
include('libreria.php');
include('db/inserts.php');
include('db/searchs.php');
include('db/updates.php');
require_once('clases/Cliente.php');
require_once('clases/Factura.php');
require_once('clases/Articulo.php');
conectarDB();
$cliente = new Cliente();
$cliente->updateDatos($_REQUEST);
$clienteB = $cliente;
$clienteB = buscarClientePorCedula($clienteB);
if($clienteB->getCedula()==$cliente->getCedula()){
    actualizarCliente($cliente);
}
else{
    insertarCliente($cliente);
}
$factura = new Factura();
$factura->updateDatos($_REQUEST);
$factura->setCedulaCliente($cliente->getCedula());
$factura->setFechaRegistro(date('Y-m-d'));
$factura->setFechaEntrega(fecha_es2in($factura->getFechaEntrega()));
$factura->setCedulaVendedor($_SESSION['Cedula']);
$vendedor = $_SESSION['Nombre'];

    // TODO: Pedir elementos de los productos    
    //$cantidad = $_REQUEST['cantidad'];
    //$precio = $_REQUEST['precio'];
    //$descripcion = $_REQUEST['descripcion'];

    // TODO hacer el procesamiento
    
include('crearFacturaShow.php');
?>