<?php
include('libreria.php');
include('db/inserts.php');
include('db/searchs.php');
include('db/updates.php');
require_once('clases/Cliente.php');
//require_once('clases/Factura.php');
conectarDB();
$$cliente = new Cliente();
$cliente->updateDatos($_REQUEST);
$clienteB = $cliente;
$clienteB = buscarClientePorCedula($clienteB);
if($clienteB->getCedula()==$cliente->getCedula()){
    //actualizarCliente($cliente);
}
else{
    insertarCliente($cliente);
}


    $fecha = $_REQUEST['fecha']; // Tomarlo del Sistema
    $fecha_entrega = $_REQUEST['fecha_entrega'];
    $vendedor = $_REQUEST['vendedor'];
    
    $detalles = $_REQUEST['detalles'];
    
    // TODO: Pedir elementos de los productos    
    //$cantidad = $_REQUEST['cantidad'];
    //$precio = $_REQUEST['precio'];
    //$descripcion = $_REQUEST['descripcion'];

    // TODO hacer el procesamiento
    
    include('crearFacturaShow.php');
?>